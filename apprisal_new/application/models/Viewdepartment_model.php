<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewdepartment_model extends CI_Model {

   function view()
  {
     $emp_code = $this->session->emp_code; 
     $code = base64_decode($this->uri->segment(3));
     $year =  trim($this->session->ayear);


   
       if($code)
      {
        

         $this->db->where('forward_status', '1');
         $this->db->where('emp_code', $code);
         $this->db->where('AY', $year);

         $res = $this->db->get('sca');
         
      }

      else
      {
        redirect('apraisal_form/my_apprisal');
      }

      //print_r($query);

        if($res ->num_rows() > 0) {



        foreach ($res->result() as $row)
             {
                $dept_data =  $row->dept_data;
                $sca_id = $row->sca_id; 
             }
            
            $array = unserialize($dept_data);

           
           
         

            return($array);
        }

   

}

   function cal_emp()
  {
     $emp_code = $this->session->emp_code; 
     $code = base64_decode($this->uri->segment(3));

   
       if($code)
      {
        
         $this->db->where('emp_code', $code);
        
         $query = $this->db->get('employee');

         foreach ($query->result() as $row)
          {
            $emp_role =  $row->role_id;
          }
           
          return($emp_role); 
      }

      


}

}



  







