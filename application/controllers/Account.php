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
            $this->data['footer'] = $this->themelib->get_footer('photoswipe.min,photoswipe-ui-default.min,account');
            $this->data['ganres'] = $this->main_model->get_all_ganres();
            $this->load->view('account/index',  $this->data);
	}
        
        public function edit_info()
	{
            $this->data['header'] = $this->themelib->get_header('Редактирование информации','account,profile_signin',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('account_edit_info');
            $this->data['photo_ganres'] = $this->main_model->get_all_photo_ganres();
            $this->load->view('account/edit_info',  $this->data); 
	}
        
        
        public function set_new_value()
        {
            if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                echo json_encode(array($this->input->post('name')=>$this->input->post('value')));
            }
            else
            {
                echo json_encode(array('error'=>'1','description'=>'Not AJAX'));
            }
        }
        
        
        public function edit_avatar()
        {
            $this->data['header'] = $this->themelib->get_header('Редактирование информации','account,profile_signin',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('account_edit_avatar');
            $this->load->view('account/edit_avatar',  $this->data); 
        }
        
}
