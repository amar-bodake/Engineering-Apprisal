<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

     public function __construct()
        {
                parent::__construct();
                $this->login();
                $emp_code = $this->session->emp_code; 
                echo $emp_code;  
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

       public function session_details()
       {

          $inst_id = $this->session->inst; 
          $desi = $this->session->role_id;
          $dept = $this->session->role_id;
          //echo $inst_id;
         //for setting the session data...
          $this->load->model('session_model');
          $data = $this->Session_model->get_session();

           echo "<h2>Session Details</h2>" ;//session details
           var_dump($data);

          echo "<h2>Setting up the Session</h2>";
          $this->load->model('session_model');  //setting the session data
          $data = $this->session_model->set_session();

       
         //Getting all Employee Fields...

          //getting all data
          echo "<h2>Getting all the data</h2>";
          $this->load->model('emp_field_model');

          //getting inst
           $this->emp_field_model->get_inst($inst_id);

          //getting designation
           $this->emp_field_model->get_desi($desi);


            //getting department
           $this->emp_field_model->get_dept($dept);

              


      }



      public function pi_cal()
       {
          $emp_code  = "lok1"; 

          //Getting PI......
          $this->load->model('pi_cal_model');
          $this->pi_cal_model->get_pi();

          //Setting PI........
          $this->pi_cal_model->set_pi($emp_code);


        }


   
}
