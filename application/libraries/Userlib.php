<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Userlib {

        protected $CI;
        protected  $data;


        public function __construct()
        {
            $this->CI =& get_instance();
        }

        public function is_logined()
        {
            return $this->CI->session->userdata('user_logined') ? true : false;
        }
        
        public function user_login($user_info)
        {
            $this->CI->session->set_userdata('user_info',$user_info);
            $this->CI->session->set_userdata('user_logined','1');
        }
        
        
        public function logout()
        {
            $this->CI->session->unset_userdata('user_info');
            $this->CI->session->unset_userdata('user_logined');
        }

        
        public function user_logout()
        {
            $this->CI->session->unset_userdata('user_info');
            $this->CI->session->unset_userdata('user_logined');
        }
        
        
        public function set_redirect_url()
        {
            $this->CI->session->set_userdata('redirected_url',$this->CI->uri->uri_string());
        }
        
        
        
        public function login($email,$password)
        {
            $email = strtolower($email);
            
            $res = $this->CI->db->get_where('account',array(
                'email'    =>$email,
                'password' => md5(MainSiteConfig::get_item('encryption_key').$password)
            ))->row();
            
            if($res->id)
            {
                if($res->is_active)
                {
                    $user_info = $this->CI->db->get_where('profile',array(
                        'user_id'=>$res->id
                    ));
                    
                    $user_info->email = $res->email;
                    $user_info->create_date =$res->create_date;
                    
                    $this->user_login($user_info);
                    
                    return array(
                        'status' => 'success'
                    );
                    
                }
                else
                {
                    return array(
                        'status' => 'error',
                        'error'  => 'Аккаунт не активирован. Если вам не пришло письмо с активацией вашего профиля, воспользуйтесь системой восстановления пароля.'
                    );
                }
            }
            else
            {
                return array(
                    'status' => 'error',
                    'error'  => 'Пользователя с такими данными не существует.'
                );
            }
        }
}

/* End of file Auth.php */