<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

     public function __construct()
        {
                parent::__construct();
                $this->login();
                
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

    public function meber_area()
    {
      //   echo "This is member area<br>";
      // echo "<a href='logout'>Logout</a><br>";
       
       $this->load->model('member_area_model');
        $this->member_area_model->pre_init();
    }

    function logout()
    {

          $data = array(
          //'session_id' =>  $session_id,
          //'ip' => $ip,
          'expired_at' => date('Y-m-d H:i:s')
           );

           $emp_code = $this->session->emp_code;

          $this->db->where('emp_code', $emp_code);  
          $this->db->update('login', $data);

           $user_data = $this->session->all_userdata();
            foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                                $this->session->unset_userdata($key);
                                 }
                                 }
               $this->session->sess_destroy();
               
               redirect('login');
    }

    function pre_init()
    {
       $this->load->model('generate_profile_model');
       $this->generate_profile_model->pre_insert(); 
    }

    function init()//for inserting value in employeee table(profile generating)....
    {
       $this->load->model('generate_profile_model');
       $this->generate_profile_model->insert();
    } 


    function profile_view()
    {
      $this->load->model('profile_view_model'); 
      $this->profile_view_model->view_profile();   
    }


   function admin_profile()
  {
         //$this->session->userdata();
         // var_dump($a);
        //die();
          $this->load->model('admin_profile_model'); 
          
          

          $emp['emp'] =  $this->admin_profile_model->display();

         
          
           $ttl['title'] = 'Profile';
           $this->load->model('staff_apraisal_model');
           $app['stafs'] = $this->staff_apraisal_model->view(); 
           //print_r($app);
           //die;



          $data = array_merge($emp,$ttl,$app);

       
          


          $role = $this->session->role_id;

             if($role == 1)
            {
             $this->load->view('v0.1/staff_profile_view_president',$data);
            }
            else if($role == 2)
            {
             $this->load->view('v0.1/staff_profile_view_priciple',$data);
            }

            else if($role == 5)
            {
             $this->load->view('v0.1/staff_profile_view_hr',$data);
            }

            else
            {
              $this->load->view('v0.1/staff_profile_view',$data);
            }
        
        
   }


   function admin_profile_dea()
   {

    $this->load->view('admin_profile_view');
   
   }



    function change_password()
   {

    $this->load->view('v0.1/change_password_view');
   
   }


     function reset_password()
   {

    $this->load->view('v0.1/reset_password');
   
   }

    function chk_pass()
   {

       $oldpass = $this->input->post('oldpassword');
       $newpass = $this->input->post('password2');
       $this->load->model('changepass_model');
       $status['data'] = $this->changepass_model->insert($oldpass,$newpass);

       $this->load->view('v0.1/change_password_view',$status);
       //$this->load->view('v0.1/sucess_password',$status);
   }

   function reset_pass()
   {
      $oldpass = $this->input->post('oldpassword');
       $newpass = $this->input->post('password2');
       $this->load->model('changepass_model');
       $status['data'] = $this->changepass_model->insert($oldpass,$newpass);


       $this->load->view('v0.1/reset_password',$status);
      // $this->load->view('v0.1/sucess_password',$status);
   }



  
  
}
