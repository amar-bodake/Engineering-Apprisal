<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewsca_model extends CI_Model {

   function view()
  {
     $emp_code = $this->session->emp_code; 
     $code = base64_decode($this->uri->segment(3));
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
        redirect('apraisal_form/my_apprisal');
      }

      //print_r($query);

        if($res ->num_rows() > 0) {



        foreach ($res->result() as $row)
             {
                $sca_data =  $row->sca_data;
                $sca_id = $row->sca_id; 
             }
            
            $array = unserialize($sca_data);

           
         

            return($array);
        }

        

        
         


}

}



  







