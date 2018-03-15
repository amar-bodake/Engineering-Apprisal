<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Form_status_model extends CI_Model {

	public function status_check()
  {
           
           $emp_code = $this->session->emp_code;
            
           $query = $this->db->get_where('sca', array('emp_code' => $emp_code));
            $form_total = -1;
            $forward_status = 0;
             $reject_status = 0;
            foreach ($query->result() as $row)
            {
             $form_total = $row->form_total;
             $forward_status =  $row->forward_status;
             $reject_status =  $row->reject_status;
            }

             $data = array(
                          //'emp_code'=>  $code,
                          'form_total' => $form_total,
                          'forward_status' => $forward_status,
                          'reject_status' => $reject_status
                          
                         );

             return($data);

  }

}

