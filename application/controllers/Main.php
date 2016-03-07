<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

        
        private $data;
        
        function __construct() {
            parent::__construct();
            
            
        }

        public function test()
        {
            $this->load->view('email/noreply');
        }

        

        public function index()
	{

		$this->load->view('welcome_message');
	}
}
