<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahp_form extends CI_Controller {

     public function __construct()
        {
         parent::__construct();
         $this->login();
         $emp_code = $this->session->emp_code; 
         
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
             $this->db->where('emp_code', $emp_code); 
             $query = $this->db->get('sca');
            if($query->num_rows()>0)
            
             {
                    foreach ($query->result() as $row)
                 {
                    $forward_status =  $row->forward_status;
                    $ahp_data =  $row->ahp_data;
                 }

                 if($forward_status == 0 && $ahp_data == NULL)
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
          // print_r($data);

          $this->form_validation->set_rules('para4a', ' ', 'required|numeric');
          $this->form_validation->set_rules('para4b', ' ', 'required|numeric');
        

         if ($this->form_validation->run() == FALSE)
                {
                 $this->load->view('v0.1/ahp_form_view');
                 // echo "False";
                }

                else
                {
                  $this->load->model('ahp_model');
                  $result = $this->ahp_model->insert($data);
                  
                }

        }

        public function updatecategory()
        {
          $data = $_POST ; 
          $this->load->model('ahp_model');
          $result = $this->ahp_model->update($data);

        }

         public function editcategory()
        {
           $data = $_POST ; 
          //print_r($data);
          //die;
          
           $this->load->model('ahp_model');
           $result = $this->ahp_model->edit($data);

        }
}