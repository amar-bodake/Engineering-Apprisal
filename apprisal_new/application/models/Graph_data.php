<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graph_data extends CI_Model {

   

  function collect_data()
  {
      $this->db->select('*');
      $this->db->from('performance_indicater');
      $query = $this->db->get();
      return $query->result_array();
             
  }


   function collect_data_para($inst,$dept,$year)
  {

  	  
     // $this->db->select('*');
     // $this->db->from('performance_indicater');
     // $query = $this->db->get();
     // return $query->result_array();


       $query1 = $this->db->get_where('academic_year', array('ay_id' => $year));

        foreach ($query1->result() as $row)
        {
        $ayear = $row->year;
        }


         $newdata = array(
                      'ayear'  => $ayear
                     );

               $this->session->set_userdata($newdata);

  	  $this->db->select('performance_indicater.emp_code, performance_indicater.pi_id, score_sca,score_sca2,scale_sca,score_pdac,score_pdac2,scale_pdac,score_rc,score_rc2,scale_rc,score_ahp,score_ahp2,scale_ahp,pi,status_id,performance_indicater.year_of_pi,hod_comment,pricipal_comment,vp_comment,date_of_pi_creation,approval_officer,officer,employee.name,employee.date_of_joining,sca.ahp_total2,employee.designation_id');
        $this->db->from('performance_indicater');
        $this->db->join('approvals', 'performance_indicater.pi_id = approvals.approval_id');
        $this->db->where('approvals.status_principal', 1);
       
       $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
        $this->db->join('sca', 'sca.emp_code = performance_indicater.emp_code');
        if($inst > 0)
       {
       $this->db->where('employee.institute_id', $inst);


          if($dept > 0)
          {  
          $this->db->where('employee.department_id', $dept);
          }
       }

        $this->db->where('approvals.AY', $ayear);
        $this->db->where('employee.set_profile', 1);
        $this->db->where('employee.role_id', 4);

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


     function collect_data_para_all($yr)
  {
          $role = $this->session->role_id;
          $inst = $this->session->inst;
          $dept = $this->session->dept;


        $query1 = $this->db->get_where('academic_year', array('ay_id' => $yr));

        foreach ($query1->result() as $row)
        {
        $ayear = $row->year;
        }


          $this->db->select('performance_indicater.emp_code, performance_indicater.pi_id, score_sca,score_sca2,scale_sca,score_pdac,score_pdac2,scale_pdac,score_rc,score_rc2,scale_rc,score_ahp,score_ahp2,scale_ahp,pi,status_id,year_of_pi,hod_comment,pricipal_comment,vp_comment,date_of_pi_creation,approval_officer,officer,employee.name,employee.date_of_joining');
          $this->db->from('performance_indicater');
          $this->db->join('approvals', 'performance_indicater.pi_id = approvals.approval_id');
          $this->db->where('approvals.status_principal', 1);
       
          $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
          if( $role == 2)
          {
            $this->db->where('employee.institute_id', $inst); 
          }

            if( $role == 3)
          {
            $this->db->where('employee.institute_id', $inst);
            $this->db->where('employee.department_id', $dept);
          }

           $this->db->where('approvals.AY', $ayear);
         
        

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



  







