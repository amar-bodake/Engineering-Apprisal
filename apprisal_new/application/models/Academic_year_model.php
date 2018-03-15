<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Academic_year_model extends CI_Model {

	public function check() 
  {
    
     $role = $this->session->role_id;
     $mycode = $this->session->emp_code;

     $this->db->select('AY,filed_status');
     $this->db->from('sca');
     $this->db->where('emp_code', $mycode);
     $this->db->order_by("sca_id","desc");
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
