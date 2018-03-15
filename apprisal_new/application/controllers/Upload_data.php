<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Upload_data extends CI_Controller {

      

     public function __construct()
        {
            parent::__construct();
            $this->login();
            $emp_code = $this->session->emp_code; 
            // echo $emp_code; 
            //$this->load->library('My_PHPMailer');

              $this->load->model('home_model');
             $this->load->library('form_validation');

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

      public function choose_data()
       {
          
          $this->load->view('v0.1/Upload_data_view');        
       }


       public function emp_data()
       {
         
          $this->load->view('v0.1/Upload_emp_data_view');        
       }
      

      
      
}
