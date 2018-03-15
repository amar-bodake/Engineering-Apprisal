<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Apraisal_check_model extends CI_Model {

	public function check() 
  {
     
     $emp_code = $this->session->emp_code;
     $this->db->where('emp_code', $emp_code); 
     $query = $this->db->get('sca');
     $form_total = -1;
     foreach ($query->result() as $row)
     {
        $row->sca_id;
        $form_total =  $row->form_total;
     }

    

     if($form_total == 10)
     {
      $this->load->view('sca_form_view');
     }

     else if($form_total == 6)
     {
       $this->load->view('ahp_form_view');
     }

     else if($form_total == 3)
     {
       $this->load->view('rc_form_view');
     }

      else if($form_total == 1)
     {
       $this->load->view('pda_form_view');
     }

      else if($form_total == -1)
     {
       $this->load->view('sca_form_view');
     }

     else
     {
      
      echo "No form to submit";

     }
  
  }

}

