<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_apraisal_model extends CI_Model {

   function view()
    {
      $code = $this->uri->segment(3);
      $pi_id = $this->uri->segment(4);
      $role = $this->session->userdata('role_id');

      //echo $nts_id;
   
    if($role == 0)
            { 
            $emp_code = $this->session->userdata('emp_code');
            $this->db->select('performance_indicater.emp_code, employee.name, date_of_pi_creation, performance_indicater.pi_id,email,institute_id,campus,score_sca,score_pdac,score_rc,   score_ahp,year_of_pi');
            $this->db->from('approvals');
            $this->db->join('performance_indicater', 'performance_indicater.pi_id = approvals.pi_id');
           
            $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
            $this->db->join('institutes', 'employee.institute_id = institutes.id');
            

            $this->db->where('approval_emp_code', $emp_code);
            // $this->db->where('performance_indicater.status_id',2);
             $this->db->where('performance_indicater.emp_code', $code);
             $this->db->where('performance_indicater.pi_id', $pi_id);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0)
             {
                foreach ($query->result_array() as $row)
                {
                  $data[] = $row;
                }
                  return $data;

                  print_r($data);
             }
             
            }


        
}  
    
       
}



  







