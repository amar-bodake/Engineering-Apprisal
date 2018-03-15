<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Admin_academic_year_model extends CI_Model {

	public function check() 
  {
    
     $role = $this->session->role_id;
     $mycode = $this->session->emp_code;

     $this->db->select('year');
     $this->db->from('academic_year');
     $this->db->where('status_show', '1');
     $this->db->order_by("ay_id","desc");
     $query = $this->db->get();

   if ($query->num_rows() > 0)
         {
            foreach ($query->result_array() as $row)
            {
              $data[] = $row;

            }

            return $data;
           
             
         }

     

    

      

  



     

   
  }
}
