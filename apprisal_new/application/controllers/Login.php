<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {





	 
	public function index()
	{

		$this->load->library('user_agent');
		 $browser = $this->agent->browser();
		 if($browser == 'Chrome')
		 {
		 //echo "supported";
		 	$this->load->view('v0.1/login_form');
		 	//$this->load->view('v0.1/maintenance');
		 }

		 else
		 {
             //$this->load->view('v0.1/login_form');
             $this->load->view('v0.1/browser_invalid');
		 } 
		
		
		//$this->load->view('v0.1/maintenance');
		
	}

	public function valid_creadentail()
	{	

  
	$this->load->model('login_model');

	$initialized['data'] = $this->login_model->pre_init();


	if($initialized['data'] == 'valid'){



        $this->load->model('login_model');
	    $this->login_model->insert_pre_init();
	   // $this->init();
       
       }



	else {
		$this->load->view('v0.1/login_form',$initialized);
	}
	
	}

	public function valid()
	{

         if(isset($this->session->role_id))
         {

         $this->load->view('v0.1/dashboard');
         }
         else
         {
         	$this->index();
         }
	}

    //forget password 
	public function forget_password()
	{
	  $this->load->view('v0.1/forgetpassword_form');
	} 


	public function send_password()
	{
	   $reg_email = $this->input->post('reg_email');


       
       $this->load->model('get_password_model');
       $status['data'] = $this->get_password_model->get_password($reg_email);
       $this->load->view('v0.1/forgetpassword_form',$status);
	} 


	
}
