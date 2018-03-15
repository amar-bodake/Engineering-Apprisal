<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_apraisal_model extends CI_Model {


   
   function view()
    {

      $code = base64_decode($this->uri->segment(3));
      $nts_id = $this->uri->segment(4);
      $role = $this->session->userdata('role_id');
      $year = trim($this->session->ayear);


      //echo $nts_id;
      if (empty($code))
      { 
   
      //$emp_code = $this->session->emp_code; 

        $emp_code = $this->session->userdata('emp_code');
        $this->db->select('performance_indicater.emp_code, name, date_of_pi_creation, performance_indicater.pi_id,sca.AY,approvals.approval_id,sca.sca_id');
        $this->db->from('approvals');
        $this->db->join('performance_indicater', 'performance_indicater.pi_id = approvals.pi_id');

        $this->db->join('sca', 'sca.sca_id = approvals.approval_id');
       
        $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
        $this->db->where('sca.AY', $year);
        $this->db->where('performance_indicater.status_id', 0);

        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0)
         {
            foreach ($query->result_array() as $row)
            {
              $data[] = $row;
            }
              return $data;
         }
         
      }
      else
      {

              
             $data1 = array(
                  'flag' => '1'
               
                 );

                $this->db->where('id', $nts_id);
                $this->db->update('notification', $data1);
            if($role == 0)
            { 
            $emp_code = $this->session->userdata('approval_emp_code');

            $this->db->select('performance_indicater.emp_code, name, date_of_pi_creation, performance_indicater.pi_id');
            $this->db->from('approvals');
            $this->db->join('performance_indicater', 'performance_indicater.pi_id = approvals.pi_id');
           
            $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
            $this->db->where('approval_emp_code', $emp_code);
             $this->db->where('performance_indicater.status_id',1);
             $this->db->where('performance_indicater.emp_code', $code);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0)
             {
                foreach ($query->result_array() as $row)
                {
                  $data[] = $row;
                }
                  return $data;
             }
             
            }


            else
            {
          $emp_code = $this->session->userdata('emp_code');
          $this->db->select('performance_indicater.emp_code, name, date_of_pi_creation,performance_indicater.pi_id');
          $this->db->from('approvals');
          $this->db->join('performance_indicater', 'performance_indicater.pi_id = approvals.pi_id');
           
          $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
          $this->db->where('approval_emp_code', $emp_code);
          $this->db->where('performance_indicater.status_id',0);
          $this->db->where('performance_indicater.emp_code', $code);
          $query = $this->db->get();
            
            if ($query->num_rows() > 0)
             {
                foreach ($query->result_array() as $row)
                {
                  $data[] = $row;
                }
                  return $data;
             } 
            }
            
            



      }
       
       
        
    }  
    
       
}



  







