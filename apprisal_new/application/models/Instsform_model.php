<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Instsform_model extends CI_Model {

  public function insert($data)
  {
            $string = serialize($data);
            $emp_code = $this->session->emp_code;
            $role_id = $this->session->role_id;
            $insts_data = $string;
            $insts_total = $this->uri->segment(3);
           // echo $pda_total;

            $year = trim($this->session->ayear);

        if($role_id == 3)
        {

           if($insts_total > 100)
            {
              $insts_total = 100; 
            }
        }
  
        else  if($role_id == 2)
        {

           if($insts_total > 150)
            {
              $insts_total = 150; 
            }
        }

            
           

            $this->db->where('emp_code',$emp_code);
            $this->db->where('AY',$year);
            $this->db->set('form_total', 'form_total+2',FALSE);
            $this->db->update('sca', array('insts_data'=>$insts_data,'insts_total'=>$insts_total));
            
            
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
              $insts_data = $string;
              $year =  date("Y");
              $insts_total = $this->uri->segment(3); 
              $insts_total2 = $this->uri->segment(4);   

               if($insts_total > 100)
               {
                 $insts_total = 100; 
               }

               if($insts_total2 > 100)
               {
                 $insts_total2 = 100; 
               }


              $data = array(
              
              //'pi_id' => $pi_id,
              //'emp_code' =>  $emp_code,
              'insts_data' =>  $insts_data,
              'year_of_pi' => $year,
              'timing' =>  date('Y-m-d H:i:s'),
              'insts_total' =>  $insts_total,
              'insts_total2' =>  $insts_total2,
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
            $year = trim($this->session->ayear);
           


           
            $insts_data = $string;
            //$year =  date("Y");
            $insts_total = $this->uri->segment(3);  
            $insts_total2 = $this->uri->segment(4);

             $this->db->where('emp_code', $emp_code);
           
             $query = $this->db->get('employee');

             foreach ($query->result() as $row)
              {
                $emp_role =  $row->role_id;
              }


        if($emp_role == 3)
        {
             if($insts_total > 100)
            {
              $insts_total = 100; 
            }

             if($insts_total2 > 100)
            {
              $insts_total2 = 100; 
            }
           
        }

        else  if($emp_role == 2)
        {
             if($insts_total > 150)
            {
              $insts_total = 150;
            }

             if($insts_total2 > 150)
            {
              $insts_total2 = 150; 
            }
           
        }

            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'insts_data' =>  $insts_data,
            'year_of_pi' => $year,
            //'timing' =>  date('Y-m-d H:i:s'),
            'insts_total' =>  $insts_total,
            'insts_total2' =>  $insts_total2,
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

