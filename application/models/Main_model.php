<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Main_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function __construct()
        {
                parent::__construct();
        }

        public function get_all_ganres()
        {
            return $this->db->get('ganre')->result();
        }
        
}