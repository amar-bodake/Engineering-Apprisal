<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	protected $table = "employee";
	protected $id;
	protected $username;
	protected $password;
	protected $email_addresss;
	protected $emp_code;
	protected $session_id;
	protected $login_at;
	protected $expired_at;
	protected $ip;
   

	function pre_init()
	{

				$this->db->where('emp_code',$this->input->post('emp_code'));
	    //$this->db->where('email',$this->input->post('username'));
		//$this->db->where('password',$this->input->post('password'));

		$query =  $this->db->get( $this->table );
        if($query->num_rows()>0)
        {
        	$this->db->where('emp_code',$this->input->post('emp_code'));
	        $this->db->where('email',$this->input->post('username'));
		    $this->db->where('password',$this->input->post('password'));
		    $query =  $this->db->get( $this->table );
		    if($query->num_rows()>0)
		    {
		    	return 'valid';
		    }

		    else
		    {
		    	return 'Incorrect Email or Password combination';
		    }

           
        }

        else
        {
        	return 'Incorrect Employee Code';
        }

	}

	function insert_pre_init()
	{
		  

         $newdata = array(
        'username'  => $this->input->post('username'),
         'emp_code' => $this->input->post('emp_code'),
         'logged_in' => TRUE
         );

         $this->session->set_userdata($newdata);

	     $session_id = session_id();
	     $ip = $_SERVER['REMOTE_ADDR'];

	        $mycode = $this->session->userdata('emp_code');


	        //cheking role, inst, dep

            
	           $query = $this->db->get_where('employee', array('emp_code' => $mycode));

			    foreach ( $query->result() as $row)  
			    {  
			      $set_profile = $row->set_profile;
			      $is_active = $row->is_active;
			      $password_set = $row->password_set; 
                }


                   if($password_set == 0)
	                {
	                	
	                  //$this->load->model('generate_profile_model');
		             // $this->generate_profile_model->pre_insert();
		              redirect('profile/reset_password'); 
	                }  

	            
	               if($set_profile == 0)
	                {
	                	
	                  //$this->load->model('generate_profile_model');
		             // $this->generate_profile_model->pre_insert();
		             redirect('apraisal_form/generate_profile'); 
	                }

		             else if($is_active == 0)
		             {
		                	
		                 // $this->load->model('generate_profile_model');
			              $this->load->view('v0.1/active_profile_view'); 
		             }




                else
               {
                $query = $this->db->get_where('employee', array('emp_code' => $mycode));

			    foreach ( $query->result() as $row)  
			    {  
			      $role_id = $row->role_id;
			      $inst =  $row->institute_id;
			      $dept = $row->department_id;
			      $des = $row->designation_id;
			      $name = $row->name;
                }
                  

			    $this->session->set_userdata('role_id', $role_id);
			    $this->session->set_userdata('inst', $inst);
			    $this->session->set_userdata('dept', $dept);
			    $this->session->set_userdata('name', $name);
			    $this->session->set_userdata('des_id', $des);


			 //cheking rights


			   $role_id = $this->session->role_id;
			  

               $query = $this->db->get_where('roles', array('role_id' => $role_id));
              // var_dump($query);


			    foreach ( $query->result() as $row)  
			    {  
			      
			      $read = $row->auth_read;
			      $write = $row->auth_write; 


			    }  

			     $this->session->set_userdata('auth_read', $read);
			   
			     $this->session->set_userdata('auth_write', $write); 


	      $data = array(
          'session_id' =>  $session_id,
          'ip' => $ip,
          'login_at' => date('Y-m-d H:i:s')
           );

          $this->db->where('emp_code', $this->input->post('emp_code'));
          $this->db->update('login', $data);
          //redirect('notification/my_notification');
          redirect('login/valid');
          //echo "Your Profile Is Updated";

        }

        
    }


}



