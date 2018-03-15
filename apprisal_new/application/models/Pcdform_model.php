<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Pcdform_model extends CI_Model {

  public function insert($data)
  {
            $string = serialize($data);
            $emp_code = $this->session->emp_code;
            $role = $this->session->role_id;
            
            $pcd_data = $string;
            $pcd_total = $this->uri->segment(3);
           // echo $pda_total;

            $year = trim($this->session->ayear);

          if($role == 2)

          {
              if($pcd_total > 50)
            {
              $pcd_total = 50; 
            }
          }

          else if($role == 3)
          {
              if($pcd_total > 100)
            {
              $pcd_total = 100; 
            }

          }

          
            
           

            $this->db->where('emp_code',$emp_code);
            $this->db->where('AY',$year);
            $this->db->set('form_total', 'form_total+2',FALSE);
            $this->db->update('sca', array('pcd_data'=>$pcd_data,'pcd_total'=>$pcd_total));
            
            
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
              $pcd_data = $string;
              $year = trim($this->session->ayear);
              $pcd_total = $this->uri->segment(3); 
              $pcd_total2 = $this->uri->segment(4);   

               if($pcd_total > 100)
               {
                 $pcd_total = 100; 
               }

               if($pcd_total2 > 100)
               {
                 $pcd_total2 = 100; 
               }


              $data = array(
              
              //'pi_id' => $pi_id,
              //'emp_code' =>  $emp_code,
              'pcd_data' =>  $pcd_data,
              'year_of_pi' => $year,
              'timing' =>  date('Y-m-d H:i:s'),
              'pcd_total' =>  $pcd_total,
              'pcd_total2' =>  $pcd_total2,
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
         
            $this->db->where('emp_code', $emp_code);
            $query = $this->db->get('employee');

             foreach ($query->result() as $row)
              {
                $emp_role =  $row->role_id;
              }


           
            $pcd_data = $string;
          
            $pcd_total = $this->uri->segment(3);  
            $pcd_total2 = $this->uri->segment(4);
          if($emp_role == 3)
          {

             if($pcd_total > 100)
            {
              $pcd_total = 100; 
            }

             if($pcd_total2 > 100)
            {
              $pcd_total2 = 100; 
            }
          }

          else if($emp_role == 2)
          {

             if($pcd_total > 50)
            {
              $pcd_total = 50; 
            }

             if($pcd_total2 > 50)
            {
              $pcd_total2 = 50; 
            }
          }



           

            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'pcd_data' =>  $pcd_data,
            'year_of_pi' => $year,
            //'timing' =>  date('Y-m-d H:i:s'),
            'pcd_total' =>  $pcd_total,
            'pcd_total2' =>  $pcd_total2,
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

