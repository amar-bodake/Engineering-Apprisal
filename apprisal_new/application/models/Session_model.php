<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_model extends CI_Model {

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
   

	function get_session()
	{
	  
	  return $this->session;    
	}


	function set_session()
	{
	  
	echo "This function for setting the session data";
    /*
          containing all the data of session variable...

	     $newdata = array(
        'username'  => 'value',
        'email'     => 'value',
        'logged_in' => 'value',

        'username'  => 'value',
        'emp_code'     => 'value',
        'logged_in' => 'value',

        'role_id'  => 'value',
        'inst'     => 'value',
        'dept' => 'value',

        'name'  => 'value',
        'auth_read'  => 'value',
        'auth_write' => 'value'

      );

      $this->session->set_userdata($newdata);

     */

	}

	


}



