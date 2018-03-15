<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_model extends CI_Model {

   function insert()
    {
         $emp_code = $this->session->userdata('emp_code');
         $myrole = $this->session->role_id;
         $year = trim($this->session->ayear);


         $this->db->select('*');
         $this->db->from('performance_indicater');
         $this->db->where('emp_code', $emp_code);
         $query = $this->db->get();
         
         foreach ($query->result() as $row)
          {
            $approval_officer = $row->approval_officer;
            $date_of_pi_creation = $row->date_of_pi_creation;
            $pi_id =  $row->pi_id;
           
          }  
          

          //selecting the role
          $this->db->select('*');
          $this->db->from('employee');
          $this->db->where('emp_code', $approval_officer);
          $query = $this->db->get();

         foreach ($query->result() as $row)
          {
            $role = $row->role_id;
          
          } 
         

         $this->db->select('*');
         $this->db->from('approvals');
         $this->db->where('approval_id', $pi_id);
         $query = $this->db->get();
         $no = $query->num_rows();

        

        
        date_default_timezone_set('Asia/Kolkata');
        $timecal = date('m/d/Y h:i:s a', time());

        if($myrole == 4)
        {

          $data = array(
            'approval_emp_code' => $approval_officer,
            //'last_assigned_at' => $role,
            'status_my' => '1',
            'pi_id' => $pi_id, 
            'approval_id' => $pi_id,
            'AY' => $year,
             'time_submit' =>  date('Y-m-d H:i:s')

            );
        } 

        else if($myrole == 3)
        {
             $data = array(
            'approval_emp_code' => $approval_officer,
            //'last_assigned_at' => $role,
            'status_hod' => '1',
            'status_my' => '1',
            'pi_id' => $pi_id, 
            'approval_id' => $pi_id,
            'AY' => $year,
             'time_submit' =>  date('Y-m-d H:i:s')

            );
        }

        else if($myrole == 2)
        {
             $data = array(
            'approval_emp_code' => $approval_officer,
           // 'last_assigned_at' => $role,
            'status_hod' => '1',
            'status_my' => '1',
            'status_principal' => '1',
            'pi_id' => $pi_id, 
            'approval_id' => $pi_id,
            'AY' => $year,
             'time_submit' =>  date('Y-m-d H:i:s')

            );
        }

      
        $this->db->insert('approvals', $data);

       
          
       }



}



  







