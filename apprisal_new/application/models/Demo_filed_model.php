<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Demo_filed_model extends CI_Model{
    function getRows($params = array()){
                 
                 $code = $this->uri->segment(3);
                 $nts_id = $this->uri->segment(4);
                $role = $this->session->userdata('role_id');

                $filter = $this->input->post('filter');
               $field  = $this->input->post('field');
               $search = $this->input->post('search');
         
                 

                 $emp_code = $this->session->userdata('emp_code');

                    $this->db->select('performance_indicater.emp_code, name, date_of_pi_creation, performance_indicater.pi_id');
                $this->db->from('approvals');
                $this->db->join('performance_indicater', 'performance_indicater.pi_id = approvals.pi_id');
               
                $this->db->join('employee', 'employee.emp_code = performance_indicater.emp_code');
                $this->db->where('approval_emp_code', $emp_code);
                $this->db->where('performance_indicater.status_id', 2);
                   if (($field) AND !empty($field)  AND ($field == "id") AND !empty($search))
                    { 
                      $search = $this->input->post('search');
                      $this->db->where('performance_indicater.emp_code',  $search);
                    }

                   if (($field) AND !empty($field)  AND ($field == "name") AND !empty($search))
                   { 
                    $search = $this->input->post('search');
                     //$this->db->where('employee.name',  $search);
                     $this->db->like('employee.name', $search, 'both');
                   }
                   $this->db->order_by('date_of_pi_creation', 'DESC');

                
                  if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                        $this->db->limit($params['limit'],$params['start']);
                    }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                        $this->db->limit($params['limit']);
                    }
                    
                    $query = $this->db->get();

   // print_r($query);

        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
}