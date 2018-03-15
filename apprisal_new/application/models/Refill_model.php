<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refill_model extends CI_Model {
function view()
  {

     $emp_code = $this->session->emp_code; 
     

      $this->db->select('*');
        $this->db->from('sca');
        $this->db->where('emp_code', $emp_code);
      $query = $this->db->get();
     
              

      if($query->num_rows())
      {
      foreach ($query->result() as $row)
          {
            $sca_id = $row->sca_id; 
          } 
        }
      

        $this->db->where('sca_id', $sca_id);
        $this->db->delete('sca');

        $this->db->where('pi_id', $sca_id);
        $this->db->delete('performance_indicater');

        $this->db->where('approval_id', $sca_id);
        $this->db->delete('approvals');




             

}

}



  







