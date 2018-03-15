<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Sca_model extends CI_Model {

	public function insert($data)
  {
           $string = serialize($data);
          
     

            $emp_code = $this->session->emp_code;
            $sca_data = $string;
            $year =  trim($this->session->ayear);
            $sca_total = $this->uri->segment(3);
            $sca_total2 = $this->uri->segment(4);


            if($sca_total > 100)
            {
              $sca_total = 100; 
            }

           


            $data = array(
            
            //'pi_id' => $pi_id,
            'emp_code' =>  $emp_code,
            'sca_data' =>  $sca_data,
            'year_of_pi' => $year,
            'timing' =>  date('Y-m-d H:i:s'),
            'sca_total' =>  $sca_total,
            'form_total' => '1',
            'AY' => $year
           );
          // print_r($data);
           //die;

          $this->db->insert('sca', $data);

           if($this->db->affected_rows()>0)  
              {
                
                 //redirect(base_url().'index.php/apraisal_form/view_sca',refresh);
                  redirect('Apraisal_form/my_apprisal');
         
              }


     }


  public function update($data)
  {
     
            
            $string = serialize($data);
            $emp_code = $this->session->emp_code;
            $sca_data = $string;
           $year = trim($this->session->ayear);
            $sca_total = $this->uri->segment(3);  
            $sca_total2 = $this->uri->segment(4);

           

             if($sca_total > 100)
            {
              $sca_total = 100; 
            }

             if($sca_total2 > 100)
            {
              $sca_total2 = 100; 
            }
         
           
            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'sca_data' =>  $sca_data,
            'year_of_pi' => $year,
            'timing' =>  date('Y-m-d H:i:s'),
            'sca_total' =>  $sca_total,
            'sca_total2' =>  $sca_total2,
            'form_total' => '10'
           );

        
          $this->db->where('emp_code',$emp_code);
          //$this->db->where('forward_status','1');
          $this->db->update('sca',$data);

           if($this->db->affected_rows()>0)  
              {
                
                 //redirect(base_url().'index.php/apraisal_form/view_sca',refresh);
                   redirect('Apraisal_form/my_apprisal');
         
              }


     }


       public function edit($data)
         {
     

            $string = serialize($data);

            $emp_code = ($this->session->app_emp);
            $sca_data = $string;
            $year =  trim($this->session->ayear);
            $sca_total = $this->uri->segment(3);  
            $sca_total2 = $this->uri->segment(4);
            
     

            if($sca_total > 100)
            {
              $sca_total = 100; 
            }

            if($sca_total2 > 100)
            {
              $sca_total2 = 100; 
            }


           
            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'sca_data' =>  $sca_data,
            'year_of_pi' => $year,
            //'timing' =>  date('Y-m-d H:i:s'),
            'sca_total' =>  $sca_total,
            'sca_total2' =>  $sca_total2,
            'form_total' => '10'
           );

        
          $this->db->where('emp_code',$emp_code);
          $this->db->where('forward_status','1');
          $this->db->where('AY',$year);
          $this->db->update('sca',$data);

           if($this->db->affected_rows()>0)  
              {
                
                 //redirect(base_url().'index.php/apraisal_form/view_sca',refresh);
                   redirect('apraisal_form/view_staff_apraisal/'.base64_encode($emp_code).'/');
         
              }


              else
              {
                   redirect('apraisal_form/view_staff_apraisal/'.base64_encode($emp_code).'/');
                
              }


     }

}

