<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updateindustry_model extends CI_Model {

   function view()
  {
     $emp_code = $this->session->emp_code; 
     $code = base64_decode($this->uri->segment(3));


  
       if($code)
      {
         $this->db->where('forward_status', '0');
         $this->db->where('emp_code', $code);
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
                $insts_data =  $row->insts_data;
                $sca_id = $row->sca_id; 
             }
            
            $array = unserialize($insts_data);

           
         

            return($array);
        }

        

        
         


}

}



  







