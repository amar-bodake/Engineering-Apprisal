<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sca_form extends CI_Controller {

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
                    $sca_data =  $row->sca_data;
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
         $data = $_POST ; 
       // print_r($data);
        //die;
        //$this->form_validation->set_rules('ftlecta', ' ', 'required|numeric');
       // $this->form_validation->set_rules('ftlectt', ' ', 'required|numeric');
        //$this->form_validation->set_rules('stlecta', ' ', 'required|numeric');
       // $this->form_validation->set_rules('stlectt', ' ', 'required|numeric');

      //  $this->form_validation->set_rules('val1121', ' ', 'required|numeric');
       // $this->form_validation->set_rules('val1122', ' ', 'required|numeric');
     //   $this->form_validation->set_rules('val1123', ' ', 'required|numeric');
       // $this->form_validation->set_rules('val1124', ' ', 'required|numeric');




        $this->form_validation->set_rules('para113', ' ', 'required|numeric');
        $this->form_validation->set_rules('para114', ' ', 'required|numeric');
        $this->form_validation->set_rules('para115', ' ', 'required|numeric');
        $this->form_validation->set_rules('para116', ' ', 'required|numeric');
        $this->form_validation->set_rules('para117', ' ', 'required|numeric');
        $this->form_validation->set_rules('para118', ' ', 'required|numeric');
       // $this->form_validation->set_rules('para121', ' ', 'required|numeric');
        //$this->form_validation->set_rules('val221', ' ', 'required');
        $this->form_validation->set_rules('para122', ' ', 'required|numeric');
        $this->form_validation->set_rules('para130', ' ', 'required|numeric');
        $this->form_validation->set_rules('para140', ' ', 'required|numeric');
        $this->form_validation->set_rules('para150', ' ', 'required|numeric');

     
       

       
        if ($this->form_validation->run() == FALSE)
                {
                 $this->load->view('v0.1/sca_form_view');
            
                }

                else if ($this->form_validation->run() == TRUE)
                {

                    $this->load->model('sca_model');
                    $result = $this->sca_model->insert($data);
                  
                }

       
          }


        public function updatecategory()
        {
          
          $data = $_POST ;

         
          $this->load->model('sca_model');  
          $result = $this->sca_model->update($data);

        }


        public function editcategory()
        {
          
          $data = $_POST ;
         
          $this->load->model('sca_model');  
          $result = $this->sca_model->edit($data);

        }
}