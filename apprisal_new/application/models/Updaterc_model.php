<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updaterc_model extends CI_Model {

   function view()
  {
     $emp_code = $this->session->emp_code; 
     $code = base64_decode($this->uri->segment(3));



  
       if($code)
      {
        
       $this->db->where('forward_status', '0');
         $this->db->where('emp_code', $code);
         $res = $this->db->get('sca');

         //
         
      }

      else
      {
        echo 'You can not change after you submited';     
      }

      //print_r($query);

        if($res ->num_rows() > 0) {



        foreach ($res->result() as $row)
             {
                $rc_data =  $row->rc_data;
               
             }           
            
            $array = unserialize($rc_data);           

            return($array);
        }

        
         


}

}



  







