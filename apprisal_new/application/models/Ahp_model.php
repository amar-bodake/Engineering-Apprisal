<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Ahp_model extends CI_Model {

	public function insert($data)
  {
     $string = serialize($data);
     

            $emp_code = $this->session->emp_code;
            $ahp_data = $string;
            $year = trim($this->session->ayear); 
            $ahp_total = $this->uri->segment(3); 

              if($ahp_total > 100)
             {
               $ahp_total = 100; 
             }
             
            
          $this->db->where('emp_code',$emp_code); 
            $this->db->where('AY',$year);
          $this->db->set('form_total', 'form_total+4',FALSE);
          $this->db->update('sca', array('ahp_data'=>$ahp_data,'ahp_total'=>$ahp_total));
          
        
         
           if($this->db->affected_rows()>0)  
              {
                 redirect('Apraisal_form/my_apprisal');
              }
            else 
            {
              echo "No Record found"; 
            }

     } 

    

      public function update($data)
     {
                
            $string = serialize($data);
            $emp_code = ($this->session->app_emp);
            $ahp_data = $string;
            $year =  date("Y");
            $ahp_total = $this->uri->segment(3);  
            $ahp_total2 = $this->uri->segment(4);

              if($ahp_total > 100)
             {
              $ahp_total = 100; 
             }

             if($ahp_total2 > 100)
             {
              $ahp_total2 = 100; 
             }
         
           
            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'ahp_data' =>  $ahp_data,
            'year_of_pi' => $year,
            'timing' =>  date('Y-m-d H:i:s'),
            'ahp_total' =>  $ahp_total,
            'ahp_total2' =>  $ahp_total2,
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
           
            $ahp_data = $string;
            $year = trim($this->session->ayear); 
            $ahp_total = $this->uri->segment(3);  
            $ahp_total2 = $this->uri->segment(4);

              if($ahp_total > 100)
             {
              $ahp_total = 100; 
             }

             if($ahp_total2 > 100)
             {
              $ahp_total2 = 100; 
             }
           
           
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

