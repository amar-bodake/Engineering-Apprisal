<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pcd_form extends CI_Controller {

     public function __construct()
        {
         parent::__construct();
         $this->login();
         $emp_code = $this->session->emp_code;
         $year = trim($this->session->ayear);
         
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

       public function index()
       {
             //$this->load->view('v1.0/form_view');



              $emp_code = $this->session->emp_code;
              
             // $code = base64_decode($this->uri->segment(3));
              $year = $this->session->ayear;
              $this->db->where('emp_code', $emp_code); 
              $this->db->where('AY', $year);
              $query = $this->db->get('sca');
             
             if($query->num_rows()>0)
            
            {
                foreach ($query->result() as $row)
                 {
                    $forward_status =  $row->forward_status;
                    $pcd_data =  $row->pcd_data;
                 }

                 if($forward_status == 0 && $pcd_data == NULL)
                 {
                   
                    $this->insertcategory();
                
                 }
                 else
                {  
                   
                   

                   $this->updatecategory();
                  
                }
            }

            else
            {
               $this->insertcategory(); 
            }



        }


        public function insertcategory()
        {
          $data = $_POST ; 
        
       
          $this->load->model('pcdform_model');
          $result = $this->pcdform_model->insert($data);
         
         }


        public function updatecategory()
        {
          
          $data = $_POST ;
          $this->load->model('pcdform_model');  
          $result = $this->pcdform_model->update($data);

        }


        public function editcategory()
        {
          
          $data = $_POST ;
         
          $this->load->model('pcdform_model');  
          $result = $this->pcdform_model->edit($data);

        }
}