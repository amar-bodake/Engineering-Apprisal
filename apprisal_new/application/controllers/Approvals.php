<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approvals extends CI_Controller {

     public function __construct()
        {
                parent::__construct();
                $this->login();
                $emp_code = $this->session->emp_code; 
                //echo $emp_code;  
        }
 
       public function login()
       {
        $is_log_in = $this->session->userdata('logged_in');

                // Your own constructor
                if(isset($is_log_in))
              {
             return true;
              }
            else
              {
             echo "You don't have permisssion to acesss this page<br>";
             echo "<a href='../login'>Login</a>";
             die();
              }
       }


        public function submit_form()
       {
        //Calculating Apraisal Officer...

        $this->load->view('apraisal_form_view');
      
      } 


    }





