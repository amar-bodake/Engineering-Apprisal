<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Pda_model extends CI_Model {

	public function insert($data)
  {
            $string = serialize($data);
            $emp_code = $this->session->emp_code;
            $pda_data = $string;
            $pda_total = $this->uri->segment(3);
            $year =  trim($this->session->ayear);
           // echo $pda_total;

            $year = trim($this->session->ayear);

           if($pda_total > 100)
            {
              $pda_total = 100; 
            }

            
           

            $this->db->where('emp_code',$emp_code);
            $this->db->where('AY',$year);
            $this->db->set('form_total', 'form_total+2',FALSE);
            $this->db->update('sca', array('pda_data'=>$pda_data,'pda_total'=>$pda_total));
            
            
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
              $pda_data = $string;
              $year =  date("Y");
              $pda_total = $this->uri->segment(3); 
              $pda_total2 = $this->uri->segment(4);   

               if($pda_total > 100)
               {
                 $pda_total = 100; 
               }

               if($pda_total2 > 100)
               {
                 $pda_total2 = 100; 
               }


              $data = array(
              
              //'pi_id' => $pi_id,
              //'emp_code' =>  $emp_code,
              'pda_data' =>  $pda_data,
              'year_of_pi' => $year,
              'timing' =>  date('Y-m-d H:i:s'),
              'pda_total' =>  $pda_total,
              'pda_total2' =>  $pda_total2,
              'form_total' => '10'
             );

          
            $this->db->where('emp_code',$emp_code);
            $this->db->where('reject_status','1');
            $this->db->update('sca',$data);

             if($this->db->affected_rows()>0)  
                {
                  
                   //redirect(base_url().'index.php/apraisal_form/view_sca',refresh);
                    redirect('Apraisal_form/appraisal_front');
           
                }


       }


         public function edit($data)
         {

            $string = serialize($data);
            $emp_code = ($this->session->app_emp);

         
           


           
            $pda_data = $string;
            $year =  trim($this->session->ayear);
            $pda_total = $this->uri->segment(3);  
            $pda_total2 = $this->uri->segment(4);

             if($pda_total > 100)
            {
              $pda_total = 100; 
            }

             if($pda_total2 > 100)
            {
              $pda_total2 = 100; 
            }
           

            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'pda_data' =>  $pda_data,
            'year_of_pi' => $year,
            //'timing' =>  date('Y-m-d H:i:s'),
            'pda_total' =>  $pda_total,
            'pda_total2' =>  $pda_total2,
            'form_total' => '10',
             //'pda_ass' => '1'
           );

        
          $this->db->where('emp_code',$emp_code);
          $this->db->where('forward_status','1');
          $this->db->where('AY',$year);
          $this->db->update('sca',$data);

           if($this->db->affected_rows()>0)  
              {
                //redirect('apraisal_form/edit_pda/');
                redirect('apraisal_form/view_staff_apraisal/'.base64_encode($emp_code).'/');
         
              }

              else
              {
                
                redirect('apraisal_form/view_staff_apraisal/'.base64_encode($emp_code).'/');

              }


     }

}

