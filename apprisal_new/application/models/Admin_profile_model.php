<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_profile_model extends CI_Model {

	protected $table = "employee";
	protected $read;
	protected $write;
	protected $role_id;


		public function display(){       //ceking role to display rights

		 $role = $this->session->userdata('role_id');
          $read = $this->session->userdata('auth_read');
          $dept = $this->session->userdata('dept');
          $inst = $this->session->userdata('inst');
          //$role = $this->session->userdata('emp_code');

          if($role == 2)
          {
             $arrays = array('set_profile' => '1', 'institute_id' => $inst, 'role_id >' => 2, 'is_active' => 1);
           }

           else if($role == 1)
           {
              $arrays = array('set_profile' => '1', 'is_active' => 1, 'role_id >=' => 2);
           }

             else if($role == 5)
           {
              $arrays = array('set_profile' => '1', 'is_active' => 1, 'role_id >' => 1);
           }

           else
           {
            $arrays = array('set_profile' => '1','department_id' => $dept, 'institute_id' => $inst, 'role_id' => 4, 'is_active' => 1);
           }

            $query = $this->db->get_where('employee',$arrays) ; 
            return $query->result();
         
         }
}


