<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Deptform_model extends CI_Model {

	public function insert($data)
  {
           $string = serialize($data);
          
         

            $emp_code = $this->session->emp_code;
            $role_id = $this->session->role_id;
            $dept_data = $string;
            $year =  trim($this->session->ayear);
            $dept_total = $this->uri->segment(3);
            $dept_total2 = $this->uri->segment(4);



           if($role_id == 3)
          {
            if($dept_total > 100)
            {
              $dept_total = 100; 
            }
          }

          else if($role_id == 2)
          {
            if($dept_total > 150)
            {
              $dept_total = 150; 
            } 
          }

           


            $data = array(
            
            //'pi_id' => $pi_id,
            'emp_code' =>  $emp_code,
            'dept_data' =>  $dept_data,
            'year_of_pi' => $year,
            'timing' =>  date('Y-m-d H:i:s'),
            'dept_total' =>  $dept_total,
            'form_total' => '1',
            'AY' => $year
           );
         

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
            $dept_data = $string;
            $year =  date("Y");
            $dept_total = $this->uri->segment(3);  
            $dept_total2 = $this->uri->segment(4);

           

             if($dept_total > 100)
            {
              $dept_total = 100; 
            }

             if($dept_total2 > 100)
            {
              $dept_total2 = 100; 
            }
         
           
            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'dept_data' =>  $dept_data,
            'year_of_pi' => $year,
            'timing' =>  date('Y-m-d H:i:s'),
            'dept_total' =>  $dept_total,
            'dept_total2' =>  $dept_total2,
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
     

            $year =  trim($this->session->ayear);
            $string = serialize($data);

            $emp_code = ($this->session->app_emp);

            $dept_data = $string;

             $this->db->where('emp_code', $emp_code);

             $query = $this->db->get('employee');

             foreach ($query->result() as $row)
              {
                $emp_role =  $row->role_id;
              }
           

            $year =  $year;
            $dept_total = $this->uri->segment(3);  
            $dept_total2 = $this->uri->segment(4);
            
     
            if($emp_role == 3)
            {

                if($dept_total > 100)
                {
                  $dept_total = 100; 
                }

                if($dept_total2 > 100)
                {
                  $dept_total2 = 100; 
                }
            }

            else if($emp_role == 2)
            {
               if($dept_total > 150)
                {
                  $dept_total = 150; 
                }

                if($dept_total2 > 150)
                {
                  $dept_total2 = 150; 
                } 
            } 


           
            $data = array(
            
            //'pi_id' => $pi_id,
            //'emp_code' =>  $emp_code,
            'dept_data' =>  $dept_data,
            'year_of_pi' => $year,
            //'timing' =>  date('Y-m-d H:i:s'),
            'dept_total' =>  $dept_total,
            'dept_total2' =>  $dept_total2,
            'form_total' => '10'
           );

        
          $this->db->where('emp_code',$emp_code);
          $this->db->where('forward_status','1');
          $this->db->where('AY', $year);
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

