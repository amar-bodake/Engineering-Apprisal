<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Rc_check_model extends CI_Model {

	public function check() 
  {

     $code = base64_decode($this->uri->segment(3));

     $role = $this->session->role_id;
     $mycode = $this->session->emp_code;

     $this->session->set_userdata('app_emp', $code);


    $this->db->where('emp_code', $mycode); 
    $query = $this->db->get('employee');



     if($query->num_rows() > 0)
     {
       foreach ($query->result() as $row)
       {
        
        $my_inst =  $row->institute_id;
        
       }
    }


    
      if (empty($code))
      { 
          $emp_code = $this->session->emp_code;   
      }

      else
      {
         $emp_code = $code;

      }

    

     $this->db->where('emp_code', $emp_code); 
     $query = $this->db->get('sca');

     if($query->num_rows() > 0)
   {

    foreach ($query->result() as $row)
     {
        $forward_status =  $row->forward_status;
        $rc_data =  $row->rc_data;
         $sca_id =  $row->sca_id;
     }


     $this->db->where('pi_id', $sca_id); 
     $query = $this->db->get('performance_indicater');

     if($query->num_rows() > 0)
   {

       foreach ($query->result() as $row)
     {
        $approval_officer =  $row->approval_officer;
        
     }

   }

     else
    {
       $approval_officer = 'NA'; 
    }


    $this->db->where('emp_code', $approval_officer); 
    $query = $this->db->get('employee');



     if($query->num_rows() > 0)
     {
       foreach ($query->result() as $row)
       {
        
        $off_inst =  $row->institute_id;
        
       }
    }


    
  
      if(trim($approval_officer) == trim($this->session->emp_code))   
     {

       redirect('apraisal_form/edit_rc/'.base64_encode($emp_code).'/');  
     
     }


      else if($role == 2)
     {
        if($off_inst == $my_inst)
        {
           redirect('apraisal_form/edit_rc/'.base64_encode($emp_code).'');
        }

        else
        {
          echo "You are not authenticated user to Access";
        }
     }

        else if($role == 1 || $role == 5)
     {
       
           redirect('apraisal_form/edit_rc/'.base64_encode($emp_code).'');

     }


  else


   {  

      if($forward_status == 0 && $rc_data == NULL)
     {
       
        $this->load->view('v0.1/rc_form_view');
    
     }


    else if($forward_status == 1)
     {
       
        redirect('apraisal_form/view_rc/'.base64_encode($emp_code).'/');
    
     }



     else 
     {
    
       redirect('apraisal_form/update_rc/'.base64_encode($emp_code).'/');
     }

   }

    }

    else
    {
     $this->load->view('v0.1/rc_form_view');
    
    }   
    
  }
}
