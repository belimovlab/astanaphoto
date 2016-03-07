<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Ganres_model extends CI_Model {

        

        public function __construct()
        {
                parent::__construct();
        }

        public function get_all_user_types()
        {
            $data = $this->db->order_by('name')->get('user_type');
            return $data->result();
        }
        
        
        
}