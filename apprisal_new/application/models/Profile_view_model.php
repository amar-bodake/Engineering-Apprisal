<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_view_model extends CI_Model {

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

    function view_profile()
    {
      $emp_code = $this->session->userdata('emp_code');
      $query = $this->db->get_where('employee', array('emp_code' => $emp_code));
     //passing forign key value
       foreach ($query->result() as $row)
      {
         $emp_code = $row->emp_code;
       $email = $row->email;
         $mobile = $row->mobile;
       $name = $row->name;
          $institute_id = $row->institute_id;
        $designation_id = $row->designation_id;
        $date_of_joining = $row->date_of_joining;
        $date_of_leaving = $row->date_of_leaving;
        $role_id = $row->role_id;
        $last_login_in = $row->last_login_in;
          $department_id = $row->department_id;
         // $shift_id = $row->shift_id;
          $profile_img = $row->profile_img;
        $set_profile = $row->set_profile;
      }


      $query = $this->db->get_where('institutes', array('id' => $institute_id));

       foreach ($query->result() as $row)
      {
        $institute_id = $row->name;
        $inst_id =  $row->id;
    }

       $query = $this->db->get_where('designations', array('id' => $designation_id));

       foreach ($query->result() as $row)
      {
        $designation_id = $row->name;
    }

    $query = $this->db->get_where('department', array('id' => $department_id));

       foreach ($query->result() as $row)
      {
        $department_id = $row->title;
    }

    //Passing Drop Down List


    $amar[''] = 'Please Select';
            $this->db->order_by('name', 'asc'); 
            $query = $this->db->get('institutes'); 
            foreach($query->result_array() as $row){
                $amar[$row['id']] = $row['name'];
            }

             $lists['inst'] =  $amar;

                      //select designation
             $ret[''] = 'Please Select';
            $this->db->order_by('name', 'asc'); 
            $query = $this->db->get('designations'); 
            foreach($query->result_array() as $row){
                $ret[$row['id']] = $row['name'];
            }

             $lists['des'] =  $ret;

            
                       
                       //select department
            $depa[''] = 'Please Select';
            $this->db->order_by('title', 'asc'); 
            $this->db->where('institute_id', $inst_id);
            $query = $this->db->get('department');

            foreach($query->result_array() as $row){
            $depa[$row['id']] = $row['title'];
            }

             $lists['dep'] =  $depa;
                   
          
     

$formdata = array(
              
                'emp_code' => $emp_code, 
                'email' =>  $email, 
                    'mobile' => $mobile,
                'name' =>  $name, 
                'institute_id' =>  $institute_id , 
                'designation_id' =>  $designation_id ,  
                'date_of_joining' =>  $date_of_joining, 
                'date_of_leaving' => $date_of_leaving, 
                'role_id' => $role_id, 
                'last_login_in' => $last_login_in, 
                'department_id' => $department_id, 
              //  'shift_id' => $shift_id, 

                'set_profile' =>  $set_profile,
                    'profile_img' => $profile_img
                 
       
                  );


             $ttl['title'] = 'Profile';

             $data = array_merge($lists, $formdata,$ttl);
             $this->load->view('v0.1/profile_view',$data);
 }



}
