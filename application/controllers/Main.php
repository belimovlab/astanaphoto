<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	var $data;
        
        function __construct() {
            parent::__construct();
            
        }
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
