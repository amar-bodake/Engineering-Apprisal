<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rc_form extends CI_Controller {

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
            $this->load->view('v0.1/rc_form_view');
             $emp_code = $this->session->emp_code;
             $this->db->where('emp_code', $emp_code); 
             $query = $this->db->get('sca');
         if($query->num_rows()>0)
            
         {
             foreach ($query->result() as $row)
             {
                $forward_status =  $row->forward_status;
                $rc_data =  $row->rc_data;
             }

             if($forward_status == 0 && $rc_data == NULL)
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
         $data = $_POST; 
        // print_r($data);
         //die;
        // $this->form_validation->set_rules('para311', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para321', ' ', 'required|numeric');
         //$this->form_validation->set_rules('para331', ' ', 'required|numeric');
         //$this->form_validation->set_rules('para341', ' ', 'required|numeric');
         //$this->form_validation->set_rules('para351', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para361', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para371', ' ', 'required|numeric');
         //$this->form_validation->set_rules('para381', ' ', 'required|numeric');   
       //  $this->form_validation->set_rules('para39a', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para39b', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para39c', ' ', 'required|numeric');


        // $this->form_validation->set_rules('val3101', ' ', 'required');   
         //$this->form_validation->set_rules('para3101', ' ', 'required|numeric');
         //$this->form_validation->set_rules('para3111', ' ', 'required|numeric');
        // $this->form_validation->set_rules('val3121', ' ', 'required');
        // $this->form_validation->set_rules('val3122', ' ', 'required');   
        // $this->form_validation->set_rules('para3121', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para3131', ' ', 'required|numeric');
       
                  $this->load->model('rc_model');
                  $result = $this->rc_model->insert($data);
                  
              

        }


         public function updatecategory()
        {
           $data = $_POST ; 
           $this->load->model('rc_model');
           $result = $this->rc_model->update($data);

        }


         public function editcategory()
        {
         
          $data = $_POST ; 
          $this->load->model('rc_model');
          $result = $this->rc_model->edit($data);
       }
}