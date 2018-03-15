<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Studentform_model extends CI_Model {

  public function insert($data)
  {
            $string = serialize($data);
            $emp_code = $this->session->emp_code;
            $role_id = $this->session->role_id;
            $stds_data = $string;
            $stds_total = $this->uri->segment(3);
           // echo $pda_total;

            $year = trim($this->session->ayear);

            

           if($stds_total > 100)
            {
              $stds_total = 100; 
            }

            
           

            $this->db->where('emp_code',$emp_code);
            $this->db->where('AY',$year);
            $this->db->set('form_total', 'form_total+2',FALSE);
            $this->db->update('sca', array('stds_data'=>$stds_data,'stds_total'=>$stds_total));
            
            
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
              $stds_data = $string;
              $year = trim($this->session->ayear);
              $stds_total = $this->uri->segment(3); 
              $stds_total2 = $this->uri->segment(4);   

               if($insts_total > 100)
               {
                 $stds_total = 100; 
               }

               if($stds_total2 > 100)
               {
                 $stds_total2 = 100; 
               }


              $data = array(
              
              //'pi_id' => $pi_id,
              //'emp_code' =>  $emp_code,
              'stds_data' =>  $stds_data,
              'year_of_pi' => $year,
              'timing' =>  date('Y-m-d H:i:s'),
              'stds_total' =>  $stds_total,
              'stds_total2' =>  $stds_total2,
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
          
         
            
            $stds_data = $string;
             $year = trim($this->session->ayear);
            $stds_total = $this->uri->segment(3);  
            $stds_total2 = $this->uri->segment(4);


            $this->db->where('emp_code', $emp_code);
             $query = $this->db->get('employee');

             foreach ($query->result() as $row)
              {
                $emp_role =  $row->role_id;
              }
          

        if($emp_role == 3)
        {
             if($stds_total > 100)
            {
              $stds_total = 100; 
            }

             if($stds_total2 > 100)
            {
              $stds_total2 = 100; 
            }
         } 


        else if($emp_role == 2)
        {
             if($stds_total > 100)
            {
              $stds_total = 100; 
            }

             if($stds_total2 > 100)
            {
              $stds_total2 = 100; 
            }
         }   
  

            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'stds_data' =>  $stds_data,
            'year_of_pi' => $year,
            //'timing' =>  date('Y-m-d H:i:s'),
            'stds_total' =>  $stds_total,
            'stds_total2' =>  $stds_total2,
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

