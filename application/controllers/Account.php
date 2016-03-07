<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

        
        private $data;
        private $post;
        function __construct() {
            parent::__construct();
        }

        private function set_post_session()
        {
            $this->post = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'repassword' => $this->input->post('repassword'),
                'first_name' => $this->input->post('first_name'),
                'second_name' => $this->input->post('second_name'),
                'birthday' => $this->input->post('birthday'),
                'sex' => $this->input->post('sex'),
                'account' => $this->input->post('account')
            );
            $this->session->set_userdata($this->post);
        }
        
        
        private function get_post_session()
        {
            $this->data['email'] = $this->themelib->getSessionValue('email');
            $this->data['password'] = $this->themelib->getSessionValue('password');
            $this->data['repassword'] = $this->themelib->getSessionValue('repassword');
            $this->data['first_name'] = $this->themelib->getSessionValue('first_name');
            $this->data['second_name'] = $this->themelib->getSessionValue('second_name');
            $this->data['birthday'] = $this->themelib->getSessionValue('birthday');
            $this->data['account'] = $this->themelib->getSessionValue('account');
            $this->data['sex'] = $this->themelib->getSessionValue('sex');
        }

        private function is_value_empty($array)
        {
            $res = 0;
            foreach ($array as $key => $value) {
                $value = trim($value);
                if(empty($value))
                {
                    $res++;
                }
            }
            if($res > 0)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        
        public function index()
	{
            if($this->userlib->is_logined())
            {
                redirect('/profile');
            }
            else
            {
                redirect('/account/login');
            }
	}
        
        public function login()
        {
            if($this->userlib->is_logined())
            {
                redirect('/profile');
            }
            else
            {
                $this->data['header'] = $this->themelib->get_header('Войти в сервис','account/account_common',  $this->data);
                $this->data['footer'] = $this->themelib->get_footer();
                $this->data['error'] = $this->themelib->getSessionValue('error');
                $this->data['success'] = $this->themelib->getSessionValue('success');
                $this->load->view('/account/login',  $this->data);
            }
        }
        
        
        
        public function registration()
        {
            if($this->userlib->is_logined())
            {
                redirect('/profile');
            }
            else
            {
                $this->data['header'] = $this->themelib->get_header('Регистрация в сервисе','account/account_common',  $this->data);
                $this->data['footer'] = $this->themelib->get_footer('account/registration');
                $this->data['error'] = $this->themelib->getSessionValue('error');
                $this->get_post_session();
                $this->data['user_types']  = $this->ganres_model->get_all_user_types();
               
                $this->load->view('/account/registration',  $this->data);
            }
        }
        
        public function try_registration()
        {
            if($this->userlib->is_logined())
            {
                redirect('/profile');
            }
            else
            {
                $this->set_post_session();
                if($this->is_value_empty($this->post))
                {
                    if($this->user_model->check_email_is_free($this->post['email']))
                    {
                        if($this->post['password'] == $this->post['repassword'])
                        {
                            $response = $this->user_model->add_user($this->post);
                            if($response['status'] == 'success')
                            {
                                
                                $this->session->set_userdata(array(
                                    'reg_complete' =>  1,
                                    'email'        =>  $response['email'],
                                    'active_code'  =>  $response['active_code']
                                ));
                                redirect('/account/registration_complete');
                            }
                            else
                            {
                                $this->session->set_userdata('error',$response['error']);
                                redirect('/account/registration');
                            }
                        }
                        else
                        {
                            $this->session->set_userdata('error','Пароли не совпадают!');
                            redirect('/account/registration');
                        }
                    }
                    else
                    {
                        $this->session->set_userdata('error','Этот Email уже используется. Введите новый Email или восстановите доступ к вашему аккаунту.');
                        redirect('/account/registration');
                    }
                }
                else
                {
                    $this->session->set_userdata('error','Заполните все поля!');
                    redirect('/account/registration');
                }
            }
        }
        
        public function registration_complete()
        {
            $reg_complete = $this->themelib->getSessionValue('reg_complete');
            $email = $this->themelib->getSessionValue('email');
            $active_code = $this->themelib->getSessionValue('active_code');
            $this->get_post_session();
            if($reg_complete)
            {
                $this->data['header'] = $this->themelib->get_header('Завершение регистрации','account/account_common',  $this->data);
                $this->data['footer'] = $this->themelib->get_footer();
                $this->load->library('Emailsmtp');
                $this->data['email'] = $email;
                $this->data['active_code'] = $active_code;
                $html_content = $this->load->view('email/noreply',  $this->data,true);
                $this->emailsmtp->send_email_html($email, 'Регистрация в сервисе', $html_content);
                $this->load->view('account/registration_complete',  $this->data);
                
            }
            else
            {
                redirect('/account/login');
            }
        }
        
        public function activate($email,$active_code)
        {
            $email = strtolower($email);
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $res = $this->db->select('id')->get_where('account',array(
                    'email'=>$email,
                    'active_code'=>$active_code,
                    'is_active' => 0
                ))->row();
                if($res->id)
                {
                    $this->db->where(array('email'=>$email,
                    'active_code'=>$active_code,
                    'is_active' => 0))->update('account',array(
                        'is_active'=>1,
                        'active_code'=>''
                    ));
                    $this->session->set_userdata('success','Аккаунт успешно активирован! Войдите используя ваш Email и пароль.');
                    redirect('/account/login');
                }
                else
                {
                    $this->session->set_userdata('error','Пользователя с такими данными не существует.');
                    redirect('/account/login');
                }
            }
            else
            {
                $this->session->set_userdata('error','Указанные email неверен.');
                redirect('/account/login');
            }
        }
        
        public function try_login()
        {
            if($this->userlib->is_logined())
            {
                redirect('/profile');
            }
            else
            {
                if($this->input->post('email') && $this->input->post('password'))
                {
                    if(filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL))
                    {
                        $response = $this->userlib->login($this->input->post('email'), $this->input->post('password'));
                        if($response['status'] == "success")
                        {
                            redirect('/profile');
                        }
                        else
                        {
                            $this->session->set_userdata('error',$response['error']);
                            redirect('/account/login');
                        }
                    }
                    else
                    {
                        $this->session->set_userdata('error','Заполните все поля корректно.');
                        redirect('/account/login');
                    }
                }
                else
                {
                    $this->session->set_userdata('error','Заполните все поля.');
                    redirect('/account/login');
                }
            }
        }
        
        
        public function logout()
        {
            if(!$this->userlib->is_logined())
            {
                redirect('/account/login');
            }
            else
            {
                $this->userlib->logout();
                redirect('/account/logout');
            }
        }
        
        
        public function forgot()
        {
            if($this->userlib->is_logined())
            {
                redirect('/profile');
            }
            else
            {
                $this->data['header'] = $this->themelib->get_header('Восстановление доступа','account/account_common',  $this->data);
                $this->data['footer'] = $this->themelib->get_footer();
                $this->data['error'] = $this->themelib->getSessionValue('error');
                $this->data['success'] = $this->themelib->getSessionValue('success');
                $this->load->view('/account/forgot',  $this->data);
            }
        }
        
        
        
        public function try_forgot()
        {
            if($this->userlib->is_logined())
            {
                redirect('/profile');
            }
            else
            {
                if($this->input->post('email'))
                {
                    $user_info = $this->db->get_where('account',array(
                        'email'=> strtolower($this->input->post('email'))
                    ))->row();
                    if($user_info->id)
                    {
                        $active_code =md5(MainSiteConfig::get_item('encryption_key').mktime());
                        $this->db->update('account',array(
                            'is_active'=>0,
                            'active_code'=>$active_code
                        ),array(
                            'id'=>$user_info->id
                        ));
                        
                        $this->data['email'] = $user_info->email;
                        $this->data['active_code'] = $active_code;
                        $html_content = $this->load->view('email/forgot',  $this->data,true);
                        $this->load->library('Emailsmtp');
                        $this->emailsmtp->send_email_html($this->data['email'], 'Восстановление доступа', $html_content);
                        $this->data['header'] = $this->themelib->get_header('Восстановление доступа','account/account_common',  $this->data);
                        $this->data['footer'] = $this->themelib->get_footer();
                        $this->load->view('/account/try_forgot',  $this->data);
                    }
                    else
                    {
                        $this->session->set_userdata('error','Заполните все поля.');
                        redirect('/account/login');
                    }
                }
                else
                {
                    $this->session->set_userdata('error','Заполните все поля.');
                    redirect('/account/login');
                }
            }
        }
        
        
        
        public function activate_forgot($email,$active_code)
        {
            if($this->userlib->is_logined())
            {
                redirect('/profile');
            }
            else
            {
                $email = strtolower($email);
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $res = $this->db->select('id')->get_where('account',array(
                        'email'=>$email,
                        'active_code'=>$active_code,
                        'is_active' => 0
                    ))->row();
                    if($res->id)
                    {
                        $this->data['header'] = $this->themelib->get_header('Восстановление доступа','account/account_common',  $this->data);
                        $this->data['footer'] = $this->themelib->get_footer('account/registration');
                        $this->session->set_userdata('forgot_email',  $email);
                        $this->load->view('/account/activate_forgot',  $this->data);
                    }
                    else
                    {
                        $this->session->set_userdata('error','Пользователя с такими данными не существует.');
                        redirect('/account/login');
                    }
                }
                else
                {
                    $this->session->set_userdata('error','Указанные email неверен.');
                    redirect('/account/login');
                }
            
            }
        }
        
        
        public function try_forgot_2()
        {
            if($this->userlib->is_logined())
            {
                redirect('/profile');
            }
            else
            {
                if($this->input->post('password') && $this->input->post('repassword') && $this->input->post('password') == $this->input->post('repassword'))
                {
                    $email = $this->themelib->getSessionValue('forgot_email');
                    if($email)
                    {
                        $this->db->update('account',array(
                            'is_active'=>1,
                            'active_code'=>'',
                            'password'=>md5(MainSiteConfig::get_item('encryption_key').$this->input->post('password'))
                        ),array(
                            'email'=>$email
                        ));
                        $this->session->set_userdata('success','Пароль успешно изменен! Авторизуйтесь с помощью нового пароля.');
                        redirect('/account/login');
                    }
                    else
                    {
                        $this->session->set_userdata('error','Пароль изменить невозможно!');
                        redirect('/account/login');
                    }
                }
                else
                {
                    $this->session->set_userdata('error','Пароли не совпадают.');
                    redirect('/account/login');
                }
            }
        }
        
}
