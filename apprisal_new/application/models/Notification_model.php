<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Notification_model extends CI_Model {

  protected $table = "performance_indicater";
  protected $pi_id;
  protected $emp_code;
  protected $score_sca;
  protected $score_pdac;
  protected $scpore_rc;
  protected $pi;
  protected $status_id;
  protected $year_of_pi;
  protected $obtained_score;
  protected $scaled_score;
  protected $date_of_pi_creation;
  protected $approval_officer;


   
//model for staff notificatopn
  function view()
  {
      //$code = $this->uri->segment(3);
     


       $emp_code = $this->session->userdata('emp_code');
       $role_id = $this->session->userdata('role_id');
       $inst = $this->session->userdata('inst');
       $dept = $this->session->userdata('dept');
       // $array = array('assign_to' => 'all', 'role_id <' => $role_id);

      if($role_id == 1 || $role_id == 0)
        {
        $this->db->select('notification.emp_code,message, given_by,   assign_to,assign_of,given_at,name,comment,emp_name,given_by,notification.role,id,flag, notification.comment');
        $this->db->from('notification');
        $this->db->join('employee','notification.assign_of =  employee.emp_code');

        $this->db->where('notification.assign_to', $emp_code);
         //$this->db->where('assign_to' , 'all');
         //$this->db->where('notification.inst',  $inst);
          $this->db->order_by('given_at', 'DESC');
        $query = $this->db->get();
      
        $data = $query->result();
        return $data;
        }


        if($role_id == 2)
        {
        $this->db->select('notification.emp_code,message, given_by,   assign_to,assign_of,given_at,name,comment,emp_name,given_by,notification.role,id,flag, notification.comment');
        $this->db->from('notification');
        $this->db->join('employee','notification.assign_of =  employee.emp_code');

        $this->db->where('notification.assign_to', $emp_code);
         $this->db->or_where('assign_to', 'all');
         $whereClause = 'notification.role'.'>'.$role_id;
        $this->db->where($whereClause);
         $this->db->where('notification.inst',  $inst);
          $this->db->order_by('given_at', 'DESC');
          $query = $this->db->get();
      
        $data = $query->result();
        return $data;
        }


         if($role_id == 3)
        {
        $this->db->select('notification.emp_code,message, given_by,   assign_to,assign_of,given_at,name,comment,emp_name,given_by,notification.role,id,flag, notification.comment');
        $this->db->from('notification');
        $this->db->join('employee','notification.assign_of =  employee.emp_code');

        $this->db->where('notification.assign_to', $emp_code);
        $this->db->or_where('assign_to' ,'all');


        $whereClause = 'notification.role'.'>'.$role_id;
        $this->db->where($whereClause);

         $this->db->where('notification.inst',  $inst);
          $this->db->where('notification.dept',  $dept);
          $this->db->order_by('given_at', 'DESC');
          $query = $this->db->get();
      
        $data = $query->result();
        return $data;
        }


         if($role_id == 4)
        {
        $this->db->select('notification.emp_code,message, given_by,   assign_to,assign_of,given_at,name,comment,emp_name,given_by,notification.role,id,flag, notification.comment');
        $this->db->from('notification');
        $this->db->join('employee','notification.assign_of =  employee.emp_code');

        $this->db->where('notification.assign_to', 'xyz');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
        }

    }




//model for self notification

function myview()
  {
       
       $emp_code = $this->session->userdata('emp_code');
       $role_id = $this->session->userdata('role_id');
       $inst = $this->session->userdata('inst');
       $dept = $this->session->userdata('dept');

        $this->db->select('notification.emp_code,message, given_by, given_at,name,id,flag,notification.comment');
        $this->db->from('notification');
        $this->db->join('employee','notification.given_by =  employee.emp_code');
        $this->db->where('notification.emp_code', $emp_code);
        

        $this->db->order_by('given_at', 'DESC');
        $query = $this->db->get();

        $data1 = $query->result();
        return $data1;
    }

//model for status GUI....
  
  function status()
  {
        $emp_code = $this->session->userdata('emp_code');

      
        $this->db->select('status_my, status_hod, status_principal, status_vice, status_hr,approvals.pi_id');
        $this->db->from('approvals');

       
        $this->db->join('performance_indicater','performance_indicater.pi_id =  approvals.pi_id');
       
        $this->db->where('performance_indicater.emp_code', $emp_code);

        
         $query = $this->db->get();
         $data3 = $query->result();
         return $data3;
         //print_r($data3);
   }


}











  







