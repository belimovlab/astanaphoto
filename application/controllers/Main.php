<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	var $data;
        
        function __construct() {
            parent::__construct();
            $this->data['user_info'] = $this->profile_model->get_user_info();
            
        }
	public function index()
	{
            $this->data['header'] = $this->themelib->get_header('Astanafoto - сервис подбора исполнителей.','',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('main');
            $this->data['ganres'] = $this->main_model->get_all_ganres();
            $this->load->view('welcome_message',  $this->data);
	}
}
