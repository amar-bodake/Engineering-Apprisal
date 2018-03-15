<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_field_model extends CI_Model {

	protected $table = "login";
	protected $id;
	protected $username;
	protected $password;
	protected $email_addresss;
	protected $emp_code;
	protected $session_id;
	protected $login_at;
	protected $expired_at;
	protected $ip;
   

	function get_inst($inst_id)
	{
	   //for fetting all institutes....
	    $query = $this->db->get('institutes'); 
        echo "<h4>Getting all institutes</h4>";
        foreach($query->result_array() as $row){
         var_dump($row);
        }

        echo "<h4>My Institute Is</h4>";
        $query = $this->db->get_where('institutes', array('id' => $inst_id));

        foreach ($query->result() as $row)
        {
        $institute_id = $row->name;
	    }
        echo $institute_id;

    }



	function get_desi($desi)
	{
	   //for fetting all institutes....
	    $query = $this->db->get('designations'); 
        echo "<h4>Getting all designations</h4>";

        foreach($query->result_array() as $row){
         var_dump($row);
        }

        echo "<h4>My designations Is</h4>";
        $query = $this->db->get_where('designations', array('id' => $desi));
        foreach ($query->result() as $row)
        {
        $designations_id = $row->name;
	    }
        echo $designations_id;

    }


    function get_dept($dept)
	{
	   //for fetting all institutes....
	    $query = $this->db->get('department'); 
        echo "<h4>Getting all department</h4>";

        foreach($query->result_array() as $row){
         var_dump($row);
        }

        echo "<h4>My department Is</h4>";
         $query = $this->db->get_where('department', array('id' => $dept));
        foreach ($query->result() as $row)
        {
        $department_id = $row->title;
	    }
        echo $department_id;

    }

 }



	






