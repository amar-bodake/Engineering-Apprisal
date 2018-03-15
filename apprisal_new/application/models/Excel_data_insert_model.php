<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Excel_data_insert_model extends CI_Model {

  public function add_user($data)
  {
    
    $this->db->insert('userdata', $data);
    
    $this->session->set_flashdata('info', 'Data Inserted Suceessfully!!!');

  } 


   public function add_emp_user($data)
  {
    
    $this->db->insert('employee', $data);
    
    $this->session->set_flashdata('info', 'Data Inserted Suceessfully!!!');

  } 


  

      
}

