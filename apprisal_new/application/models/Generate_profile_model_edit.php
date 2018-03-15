<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_profile_model_edit extends CI_Model {

  protected $table = "employee";
  protected $emp_code;
  protected $email;
  protected $name;
  protected $institute_id;
  protected $designation_id;
  protected $date_of_joining;
  protected $date_of_leaving;
  protected $role_id;
  protected $last_login_in;
  protected $department_id;
  protected $set_profile;



    

   


        function add_data($data)
        {
          $this->db->where('emp_code', $this->session->userdata('emp_code'));
          $this->db->update('employee', $data);
          $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
               return 'Something Get wrong try again';
            }

            else
            {

            //echo $this->input->post('name');
            //die;

               $newdata = array( 
               'name'  => $this->input->post('name'),
               'inst'  => $this->input->post('inst_id'),
               'dept' => $this->input->post('dept_id'),
               //'role_id' => $this->input->post('role'),
               'des_id' =>$this->input->post('des'),
               
               'logged_in' => TRUE
               );


              

               $this->session->set_userdata($newdata);
               return 'Profile Generated';
               
            }

        }

  

}
