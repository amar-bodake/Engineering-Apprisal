<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewahp_model extends CI_Model {

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
     
        echo 'You can not change after you submited';
      }


        if($res ->num_rows() > 0) {

        foreach ($res->result() as $row)
             {
                $ahp_data =  $row->ahp_data;
             }
            
            $array = unserialize( $ahp_data );

            return($array);
        }

      
         
 

   }



        public function edit($data)
         {
            $string = serialize($data);
            $emp_code = $this->session->emp_is;
            echo  $emp_code;
            die;

            $ahp_data = $string;
            $year =  date("Y");
            $ahp_total = $this->uri->segment(3);  
            $ahp_total2 = $this->uri->segment(4);
           
           
            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'ahp_data' =>  $ahp_data,
            'year_of_pi' => $year,
            //'timing' =>  date('Y-m-d H:i:s'),
            'ahp_total' =>  $ahp_total,
            'ahp_total2' =>  $ahp_total2,
            'form_total' => '10'
           );

        
          $this->db->where('emp_code',$emp_code);
          $this->db->where('forward_status','1');
          $this->db->update('sca',$data);

           if($this->db->affected_rows()>0)  
          {
                
                 //redirect(base_url().'index.php/apraisal_form/view_sca',refresh);
                   redirect('apraisal_form/edit_ahp/');
          }

        }

}



  







