<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('form_validation');
    }

    public function index()
	{ 
        $this->load->view('home');
	}
        
        public function fillgrid(){
            $this->Home_model->fillgrid();

        }


        public function create(){
            $this->form_validation->set_rules('name', 'Name', 'required');
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
           //$this->form_validation->set_rules('contact', 'Contact Number', 'required|numeric|max_length[10]|min_length[10]');
            if ($this->form_validation->run() == FALSE){
               echo'<div class="alert alert-danger">'.validation_errors().'</div>';
               exit;
            }
            else{
                $this->Home_model->create();
            }
        }
        
        public function edit(){
            $id =  $this->uri->segment(3);

            $this->db->where('sr',$id);
            $data['query'] = $this->db->get('employee');
            $data['id'] = $id;
            $this->load->view('edit', $data);
            }
            
        public function update(){
               

                $res['error']="";
                $res['success']="";

                //$this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
               
                if ($this->form_validation->run() == FALSE){
                $res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';    
                }           
            else{
                $data = array('emp_code'=>  $this->input->post('emp_code'),
                              'email'=>$this->input->post('email'),
                              'password'=>$this->input->post('password'),
                              'name'=>$this->input->post('name'),
                              'institute_id'=>  $this->input->post('institute_id'),
                              'designation_id'=>$this->input->post('designation_id'),
                              'date_of_joining'=>$this->input->post('date_of_joining'),
                              'date_of_leaving'=>$this->input->post('date_of_leaving'),
                              'role_id'=>  $this->input->post('role_id'),
                              'last_login_in'=>$this->input->post('last_login_in'),
                              'department_id'=>$this->input->post('department_id'),
                              'set_profile'=>$this->input->post('set_profile'),
                              'is_active'=>  $this->input->post('is_active')
                              );

              

                               $this->db->where('sr', $this->input->post('hidden'));
                               $this->db->update('employee', $data);
                               $data['success'] = '<div class="alert alert-success">One record inserted Successfully</div>';
            }
            header('Content-Type: application/json');
            echo json_encode($res);
            exit;
        }


        public function delete(){
            $id =  $this->input->POST('id');
            

            $this->db->where('sr', $id);
            $this->db->delete('employee');
            echo'<div class="alert alert-success">One record deleted Successfully</div>';
            exit;
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */