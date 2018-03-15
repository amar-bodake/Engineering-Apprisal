<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ntfs extends CI_Controller {

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


         public function my_ntfs(){
        
        $this->load->model('notification_model');  

       // $data['status'] = $this->notification_model->status();   // apriasal status
      
        //$data['ntfs'] = $this->notification_model->view();       // staff notification
        
       $data['myntfs'] = $this->notification_model->myview();   // my notification

        if($data['myntfs'])
         {
          $this->load->view('my_ntfs_view', $data);  
         }

        }


        public function staff_ntfs(){
        
        $this->load->model('notification_model');  

       // $data['status'] = $this->notification_model->status();   // apriasal status
      
        $data['ntfs'] = $this->notification_model->view();       // staff notification
        
        //$data['myntfs'] = $this->notification_model->myview();   // my notification

         if($data['ntfs'])
         {
          $this->load->view('staff_ntfs_view', $data);  
         }

        }
     
}
