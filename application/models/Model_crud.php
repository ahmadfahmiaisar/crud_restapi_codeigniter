<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_crud extends CI_Model
{
    public function get_data($table=""){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }
}