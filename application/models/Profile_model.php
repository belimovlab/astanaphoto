<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Profile_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function __construct()
        {
                parent::__construct();
        }


        public function check_user_by_email($email)
        {
            return $this->db->get_where('users',array('email'=>$email))->row()->id ? true : false;
        }
        
        
        public function set_new_user($email,$password,$name,$surname,$birthday,$account_type)
        {
           return $this->db->insert('users',array(
               'id'=>'',
               'create_date'=>date('Y-m-d H:i:s'),
               'email'=> strtolower($email),
               'password'=> md5(ENCRYPTION_KEY.$password),
               'active'=>1,
               'active_code'=>'',
               'account_type'=>$account_type,
               'first_name'=>$name,
               'second_name'=>$surname,
               'birthday'=>$birthday
               ));
        }
        
        
        public function get_user_info_by_email_and_password($email, $password)
        {
            return $this->db->get_where('users',array('email'=>$email,'password'=>md5(ENCRYPTION_KEY.$password)))->row();
        }
                
        public function get_user_info()
        {
            return $this->session->userdata('user_info');
        }
}