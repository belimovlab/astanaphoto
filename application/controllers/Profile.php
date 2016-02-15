<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	var $data;
        
        function __construct() {
            parent::__construct();
            
        }
	public function index()
	{
		redirect('/main');
	}
        
        public function signin()
	{
            $this->data['header'] = $this->themelib->get_header('Авторизация в сервисе','profile_signin');
            $this->data['footer'] = $this->themelib->get_footer();
            $this->load->view('profile/signin',  $this->data);
	}
}
