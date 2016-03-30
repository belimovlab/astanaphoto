<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

        
        private $data;
        
        function __construct() {
            parent::__construct();
            $this->data['user_info'] = $this->session->userdata('user_info');
            
        }


        

        public function index()
	{
            $this->data['header'] = $this->themelib->get_header('Сервис поиска исполнителей AstanaFoto','profile/index',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer();
            $this->data['user_types'] = $this->ganres_model->get_all_user_types();
            $this->load->view('/main/index',  $this->data);
	}
}
