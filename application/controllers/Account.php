<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	var $data;
        
        function __construct() {
            parent::__construct();
            if(!$this->auth->is_logined())
            {
                $this->auth->set_redirect_url();
                redirect('/profile/signin');
            }
            else
            {
                $this->data['user_info'] = $this->profile_model->get_user_info();
            }
        }
	public function index()
	{
            $this->data['header'] = $this->themelib->get_header($this->data['user_info']->first_name." ".$this->data['user_info']->second_name,'account,photoswipe,default-skin/default-skin',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('photoswipe.min,photoswipe-ui-default.min,main');
            $this->data['ganres'] = $this->main_model->get_all_ganres();
            $this->load->view('account/index',  $this->data);
	}
        
        public function temp()
        {
            echo "temp";
        }
}
