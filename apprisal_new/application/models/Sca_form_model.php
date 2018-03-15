<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Sca_form_model extends CI_Model {

     function set_sca()
    {
            //getting post data here..

          
            $emp_code = $this->session->emp_code;
            $para111 = $this->input->post('para111');
            $para112 = $this->input->post('para112'); 
            $para113 = $this->input->post('para113'); 
            $para114 = $this->input->post('para114'); 
            $para115 = $this->input->post('para115'); 
            $year =  date("Y");

            $data = array(
            
            //'pi_id' => $pi_id,
            'emp_code' =>  $emp_code,
            'para111' =>  $para111,
            'para112' =>  $para112,
            'para113' => $para113,
            'para114' =>  $para114,
            'para115' =>  $para115,
            'year_of_pi' => $year,
           );

          $this->db->insert('sca', $data);

           if($this->db->affected_rows()>0)  
              {
                 echo "Data Inserted Sucessfully";
              }


     }

}

 

	






