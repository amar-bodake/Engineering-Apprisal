<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewpda_model extends CI_Model {

   function view()
  {

    
     $emp_code = $this->session->emp_code; 
     $code =  base64_decode($this->uri->segment(3));
     $year = trim($this->session->ayear);

      if($code)
      {
        
         $this->db->where('forward_status', '1');
         $this->db->where('emp_code', $code);
         $this->db->where('AY', $year);
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



  







