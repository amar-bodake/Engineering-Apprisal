<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Rc_model extends CI_Model {

	public function insert($data)
  {
     $string = serialize($data);
     
            
            $emp_code = $this->session->emp_code;
            $rc_data = $string;
            $rc_total = $this->uri->segment(3);
            $year = trim($this->session->ayear); 

            if($rc_total > 100)
             {
               $rc_total = 100; 
             }
             
           
          
         // $array = array('emp_code =' => $emp_code, 'sca_total !' => '0', 'pda_total !' => '0','rc_data =' => '0','ahp_data' => '');

          $this->db->where('emp_code',$emp_code);
           $this->db->where('AY',$year);
          $this->db->set('form_total', 'form_total+3',FALSE);
          $this->db->update('sca', array('rc_data'=>$rc_data,'rc_total'=>$rc_total));
          
          
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
            $emp_code = $this->session->emp_code;
            $rc_data = $string;
            $year =  date("Y");
            $rc_total = $this->uri->segment(3);  
            $rc_total2 = $this->uri->segment(4);

             if($rc_total > 100)
            {
              $rc_total = 100; 
            }

             if($rc_total2 > 100)
            {
              $rc_total2 = 100; 
            }
         
           
            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'rc_data' =>  $rc_data,
            'year_of_pi' => $year,
            'timing' =>  date('Y-m-d H:i:s'),
            'rc_total' =>  $rc_total,
            'rc_total2' =>  $rc_total2,
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
        

            $rc_data = $string;
             $year = trim($this->session->ayear); 
            $rc_total = $this->uri->segment(3);  
            $rc_total2 = $this->uri->segment(4);

             if($rc_total > 100)
            {
              $rc_total = 100; 
            }

             if($rc_total2 > 100)
            {
              $rc_total2 = 100; 
            }

           
           
            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'rc_data' =>  $rc_data,
            'year_of_pi' => $year,
            //'timing' =>  date('Y-m-d H:i:s'),
            'rc_total' =>  $rc_total,
            'rc_total2' =>  $rc_total2,
            'form_total' => '10'
           );

        
          $this->db->where('emp_code',$emp_code);
          $this->db->where('forward_status','1');
          $this->db->where('AY',$year);
          $this->db->update('sca',$data);

           if($this->db->affected_rows()>0)  
              {
                
                 //redirect(base_url().'index.php/apraisal_form/view_sca',refresh);
                  // redirect('apraisal_form/edit_rc/');

                redirect('apraisal_form/view_staff_apraisal/'.base64_encode($emp_code).'/');
         
              }

              else
              {

                redirect('apraisal_form/view_staff_apraisal/'.base64_encode($emp_code).'/'); 
              }

        }

}

