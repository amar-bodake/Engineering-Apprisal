<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updatepda_model extends CI_Model {

   function view()
  {

    
     $emp_code = $this->session->emp_code; 
     $code =  base64_decode($this->uri->segment(3));
      if($code)
      {
        
         $this->db->where('forward_status', '0');
         $this->db->where('emp_code', $code);
         $res = $this->db->get('sca');
      }

      else
      {
         echo "Apprisal is submitd you can not change";

      }

      //print_r($query);

        if($res ->num_rows() > 0) {

        foreach ($res->result() as $row)
             {
                $pda_data =  $row->pda_data;
               
             }
            
            $array = unserialize( $pda_data );

           
            return($array);
        }


        
         


}

}



  







