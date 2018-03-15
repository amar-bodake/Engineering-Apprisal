<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_area_model extends CI_Model {

	protected $table = "employee";
	protected $sr;
	protected $emp_code;
	protected $email;
	protected $name;
	protected $institute_id;
	protected $designation_id;
	protected $date_of_joining;
	protected $date_of_leaving;
	protected $role_id;
	protected $department_id;
	protected $set_profile;
   
   

	function pre_init()  // calculating frofile is set or not
	{   	
      $emp_code = $this->session->userdata('emp_code');
        

        $this->db->where('emp_code',$emp_code);
		$query =  $this->db->get($this->table);

            if ( $query->num_rows() > 0 )
          {
              $row = $query->row_array();
              $set_profile = $row['set_profile'];

              

              if($set_profile == 0)
               {
              // echo "Your profile is not Generetaed!!"; 
               	   //select inst


				    $amar[''] = 'Please Select';
				    $this->db->order_by('name', 'asc'); 
				    $query = $this->db->get('institutes'); 
				    foreach($query->result_array() as $row){
				        $amar[$row['id']] = $row['name'];
				    }

				     $data['inst'] =  $amar;

                      //select designation
				     $ret[''] = 'Please Select';
				    $this->db->order_by('name', 'asc'); 
				    $query = $this->db->get('designations'); 
				    foreach($query->result_array() as $row){
				        $ret[$row['id']] = $row['name'];
				    }

				     $data['des'] =  $ret;
                       
                       //select department
				    $depa[''] = 'Please Select';
				    $this->db->order_by('title', 'asc'); 
				    $query = $this->db->get('department'); 
				    foreach($query->result_array() as $row){
				    $depa[$row['id']] = $row['title'];
				    }

				     $data['dep'] =  $depa;
                   $this->load->view('generate_profile_view', $data);
                 
                 } 

               else
               {

               	$data['title'] = 'Dashboard'; //will be available as $page_title in view
              
                $this->load->view('dashboared',$data);
               }
          } 


	}


}
