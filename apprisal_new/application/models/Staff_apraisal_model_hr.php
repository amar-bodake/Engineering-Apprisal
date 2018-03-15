<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_apraisal_model_hr extends CI_Model {

   function view_approved()
    {
      $code = $this->uri->segment(3);
      $nts_id = $this->uri->segment(4);
      $role = $this->session->userdata('role_id');

      $filter = $this->input->post('filter');
      $field  = $this->input->post('field');
      $search = $this->input->post('search');

      //echo $nts_id;
                if (empty($code))
                { 

                //$emp_code = $this->session->emp_code; 

                  $emp_code = $this->session->userdata('emp_code');

                  $this->db->select('performance_indicater.emp_code, name, date_of_pi_creation, performance_indicater.pi_id');
                  $this->db->from('approvals');
                  $this->db->join('performance_indicater', 'performance_indicater.pi_id = approvals.pi_id');
                 
                  $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
                 // $this->db->where('approval_emp_code', $emp_code);
                  $this->db->where('performance_indicater.status_id', 1);
                   if (($field) AND !empty($field)  AND ($field == "id"))
                    { 
                      $search = $this->input->post('search');
                      $this->db->where('performance_indicater.emp_code',  $search);
                    }

                   if (($field) AND !empty($field)  AND ($field == "name"))
                   { 
                    $search = $this->input->post('search');
                     //$this->db->where('employee.name',  $search);
                     $this->db->like('employee.name', $search, 'both');
                   }

                  $this->db->order_by('date_of_pi_creation', 'DESC');
                  
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
              
                    $emp_code = $this->session->userdata('emp_code');
                    $this->db->select('performance_indicater.emp_code, name, date_of_pi_creation, performance_indicater.pi_id');
                    $this->db->from('approvals');
                    $this->db->join('performance_indicater', 'performance_indicater.pi_id = approvals.pi_id');
                   
                    $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
                    $this->db->where('approval_emp_code', $emp_code);
                    $this->db->where('performance_indicater.status_id',1);
                    $this->db->where('performance_indicater.emp_code', $code);
                     $this->db->order_by('date_of_pi_creation', 'DESC');
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



    function view_filed()
    {
      $code = $this->uri->segment(3);
      $nts_id = $this->uri->segment(4);
      $role = $this->session->userdata('role_id');

        $filter = $this->input->post('filter');
        $field  = $this->input->post('field');
        $search = $this->input->post('search');



             //echo $nts_id;
              if (empty($code))
              { 

              //$emp_code = $this->session->emp_code; 

                $emp_code = $this->session->userdata('emp_code');
                $this->db->select('performance_indicater.emp_code, name, date_of_pi_creation, performance_indicater.pi_id');
                $this->db->from('approvals');
                $this->db->join('performance_indicater', 'performance_indicater.pi_id = approvals.pi_id');
               
                $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
               // $this->db->where('approval_emp_code', $emp_code);
                $this->db->where('performance_indicater.status_id', 2);
                if (($field) AND !empty($field)  AND ($field == "id"))
                 { 
                    $search = $this->input->post('search');

                 $this->db->where('performance_indicater.emp_code',  $search);
                }

                 if (($field) AND !empty($field)  AND ($field == "name"))
                 { 
                
                  $search = $this->input->post('search');
                  //$this->db->where('employee.name',  $search);
                  $this->db->like('employee.name', $search, 'both');
                 }

                 $this->db->order_by('date_of_pi_creation', 'DESC');
                
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
            
                  $emp_code = $this->session->userdata('emp_code');
                  $this->db->select('performance_indicater.emp_code, name, date_of_pi_creation, performance_indicater.pi_id');
                  $this->db->from('approvals');
                  $this->db->join('performance_indicater', 'performance_indicater.pi_id = approvals.pi_id');
                 
                  $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
                  $this->db->where('approval_emp_code', $emp_code);
                  
                   $this->db->where('performance_indicater.emp_code', $code);
                   $this->db->where('performance_indicater.status_id', 1);
                   $this->db->order_by('date_of_pi_creation', 'DESC');
                     //$this->db->where('performance_indicater.pi_id', );
                  $query = $this->db->get();
                  
                      if ($query->num_rows() > 0)
                       {
                              foreach ($query->result_array() as $row)
                              {
                                $data1[] = $row;
                              }
                             //   return $data;
                       }
                  }
              
            
     }
       

}
    
       
        
 



  







