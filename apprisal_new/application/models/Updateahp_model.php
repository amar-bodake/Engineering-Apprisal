<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updateahp_model extends CI_Model {

   function view()
  {
     $emp_code = $this->session->emp_code; 
     $code = $this->encrypt->decode($this->uri->segment(3));
     
       if($code)
      {
         $this->db->where('forward_status', '1');
         $this->db->where('emp_code', $code);
         $res = $this->db->get('sca');
         //
         
      }

      else
      {
        
        // $this->db->where('forward_status', '0');
          $this->db->where('emp_code', $emp_code);
         // $this->db->where('reject_status', '1');
              
            $res = $this->db->get('sca');
     }

      //print_r($query);

        if($res ->num_rows() > 0) {

        foreach ($res->result() as $row)
             {
                $ahp_data =  $row->ahp_data;
               
             }
            
            $array = unserialize( $ahp_data );
           
            return($array);
        }

        
         


}

}



  







