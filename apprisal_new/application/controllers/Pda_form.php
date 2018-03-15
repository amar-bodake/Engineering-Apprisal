<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pda_form extends CI_Controller {

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
            //$this->load->view('form_view');

             $emp_code = $this->session->emp_code;
             $this->db->where('emp_code', $emp_code); 
             $query = $this->db->get('sca');
             if($query->num_rows()>0)
            
            {
    
             foreach ($query->result() as $row)
               {
                  $forward_status =  $row->forward_status;
                  $pda_data =  $row->pda_data;
               }

               if($forward_status == 0 && $sca_data == NULL)
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
        
         //$this->form_validation->set_rules('para211', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para221', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para231', ' ', 'required|numeric');
         //$this->form_validation->set_rules('para241', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para251', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para261', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para271', ' ', 'required|numeric');
        // $this->form_validation->set_rules('para281', ' ', 'required|numeric');   
        // $this->form_validation->set_rules('para291', ' ', 'required|numeric');
        // $this->form_validation->set_rules('val2101', ' ', 'required');
        // $this->form_validation->set_rules('para2101', ' ', 'required|numeric');


     

                    $this->load->model('pda_model');
                    $result = $this->pda_model->insert($data);
                  
                

         }


        public function updatecategory()
        {
         $data = $_POST ; 
        

          $this->load->model('pda_model');
          $result = $this->pda_model->update($data);

        }


        public function editcategory()
        {
          $data = $_POST ; 
        // print_r($data);
         //die;
          $this->load->model('pda_model');
          $result = $this->pda_model->edit($data);

        }
}