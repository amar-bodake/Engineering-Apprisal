<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Sca_check_model extends CI_Model {

	public function check() 
  {
     $code = base64_decode($this->uri->segment(3));
     $role = $this->session->role_id;
     $mycode = $this->session->emp_code;
     $year = trim($this->session->ayear);

     $this->session->set_userdata('app_emp', $code);


    $this->db->where('emp_code', $mycode); 
    $query = $this->db->get('employee');



     if($query->num_rows() > 0)
     {
       foreach ($query->result() as $row)
       {
        
        $my_inst =  $row->institute_id;
        
       }
    }



      

  
    
     if (empty($code))
      { 
          $emp_code = $this->session->emp_code;   
      }

      else
      {
         
         $emp_code = $code;
      }



     
       //fetching from excel data(from table userdata);
       $this->db->where('emp_no', $emp_code); 
       $this->db->where('year', $year);
       $query = $this->db->get('userdata');

      if($query->num_rows() > 0)
      {
           foreach ($query->result() as $row)
        {
         
         $lecasem1 =  $row->lecasem1;
         $leccsem1 = $row->leccsem1;
         $praasem1 = $row->praasem1;
         $pracsem1 = $row->pracsem1; 

        $lecasem2 =  $row->lecasem2;
        $leccsem2 = $row->leccsem2;
        $praasem2 = $row->praasem2;
        $pracsem2 = $row->pracsem2;


       $tsem1f1 = $row->tsem1f1;
       $tsem1f2 = $row->tsem1f2;

      $psem1f1 = $row->psem1f1;
      $psem1f2 =  $row->psem1f2;


      $tsem2f1 = $row->tsem2f1;
      $tsem2f2 = $row->tsem2f2;

      $psem2f1 = $row->psem2f1;
      $psem2f2 = $row->psem2f2;


      //theory result sem1

      $tsem1r1 = $row->tsem1r1;
      $tsem1ra1 = $row->tsem1ra1;

      $tsem1r2 = $row->tsem1r2;
      $tsem1ra2 = $row->tsem1ra2;
      //practical result
      $pr1sem1 = $row->pr1sem1;
      $pra1sem1 = $row->pra1sem1;

      $pr2sem1 = $row->pr2sem1;
      $pra2sem1 = $row->pra2sem1;

      //theory result sem2

      $tsem2r1 = $row->tsem2r1;
      $tsem2ra1 = $row->tsem2ra1;

      $tsem2r2 = $row->tsem2r2;
      $tsem2ra2 = $row->tsem2ra2;

      //practical result
      $pr1sem2 = $row->pr1sem2;
      $pra1sem2 = $row->pra1sem2;

      $pr2sem2 = $row->pr2sem2;
      $pra2sem2 = $row->pra2sem2;

       //attendance sem 1

      $th1aasem1 = $row->th1aasem1;
      $th2aasem1 = $row->th2aasem1;

      $pr1aasem1 = $row->pr1aasem1;
      $pr2aasem1 = $row->pr2aasem1;


      //attendance sem 2

      $th1aasem2 = $row->th1aasem2;
      $th2aasem2 = $row->th2aasem2;

      $pr1aasem2 = $row->pr1aasem2;
      $pr2aasem2 = $row->pr2aasem2;
         
          }
      }

      else
      {

         $lecasem1 =  0;
         $leccsem1 = 0;
         $praasem1 = 0;
         $pracsem1 = 0; 

        $lecasem2 =  0;
        $leccsem2 = 0;
        $praasem2 = 0;
        $pracsem2 = 0;


       $tsem1f1 = 0;
       $tsem1f2 = 0;

      $psem1f1 = 0;
      $psem1f2 = 0;


      $tsem2f1 = 0;
      $tsem2f2 = 0;

      $psem2f1 = 0;
      $psem2f2 = 0;


      //theory result sem1

      $tsem1r1 = 0;
      $tsem1ra1 = 0;

      $tsem1r2 = 0;
      $tsem1ra2 = 0;

      //practical result
      $pr1sem1 = 0;
      $pra1sem1 = 0;

      $pr2sem1 = 0;
      $pra2sem1 = 0;

      //theory result sem2

      $tsem2r1 = 0;
      $tsem2ra1 = 0;

      $tsem2r2 = 0;
      $tsem2ra2 = 0;

      //practical result
      $pr1sem2 = 0;
      $pra1sem2 = 0;

      $pr2sem2 = 0;
      $pra2sem2 = 0;

       //attendance sem 1

      $th1aasem1 = 0;
      $th2aasem1 = 0;

      $pr1aasem1 = 0;
      $pr2aasem1 = 0;


      //attendance sem 2

      $th1aasem2 = 0;
      $th2aasem2 = 0;

      $pr1aasem2 = 0;
      $pr2aasem2 = 0;
           
      }


    

    //setting a userdata

     $newdata = array(
         'lecasem1' =>  $lecasem1,
         'leccsem1' => $leccsem1,
         'praasem1' => $praasem1,
         'pracsem1' => $pracsem1,

        'lecasem2' =>  $lecasem2,
        'leccsem2' => $leccsem2,
        'praasem2' => $praasem2,
        'pracsem2' => $pracsem2,


       'tsem1f1' => $tsem1f1,
       'tsem1f2' => $tsem1f2,

      'psem1f1' => $psem1f1,
      'psem1f2' => $psem1f2,


      'tsem2f1' => $tsem2f1,
      'tsem2f2' => $tsem2f2,

      'psem2f1' => $psem2f1,
      'psem2f2' => $psem2f2,


      //theory result sem1

      'tsem1r1' => $tsem1r1,
      'tsem1ra1' => $tsem1ra1,

      'tsem1r2' => $tsem1r2,
      'tsem1ra2' => $tsem1ra2,

      //practical result
      'pr1sem1' => $pr1sem1,
      'pra1sem1' => $pra1sem1,

      'pr2sem1' => $pr2sem1,
      'pra2sem1' => $pra2sem1,

      //theory result sem2

      'tsem2r1' => $tsem2r1,
      'tsem2ra1' => $tsem2ra1,

      'tsem2r2' => $tsem2r2,
      'tsem2ra2' => $tsem2ra2,

      //practical result
      'pr1sem2' => $pr1sem2,
      'pra1sem2' => $pra1sem2,

      'pr2sem2' => $pr2sem2,
      'pra2sem2' => $pra2sem2,

       //attendance sem 1

      'th1aasem1' => $th1aasem1,
      'th2aasem1' => $th2aasem1,

      'pr1aasem1' => $pr1aasem1,
      'pr2aasem1' => $pr2aasem1,


      //attendance sem 2

      'th1aasem2' => $th1aasem2,
      'th2aasem2' => $th2aasem2,

      'pr1aasem2' => $pr1aasem2,
      'pr2aasem2'=> $pr2aasem2
     );



    $this->session->set_userdata($newdata);
    




      $this->db->where('emp_code', $emp_code); 
      $this->db->where('AY', $year);
      $query = $this->db->get('sca');



     if($query->num_rows() > 0)
     {

       foreach ($query->result() as $row)
     {
        $forward_status =  $row->forward_status;
        $sca_data =  $row->sca_data;
        $sca_id =  $row->sca_id;
     }


     $this->db->where('pi_id', $sca_id); 
     $query = $this->db->get('performance_indicater');

     if($query->num_rows() > 0)
   {

       foreach ($query->result() as $row)
     {
        $approval_officer =  $row->approval_officer;
        
     }

   }

     else
    {
       $approval_officer = 'NA'; 
    }


    $this->db->where('emp_code', $approval_officer); 
    $query = $this->db->get('employee');



     if($query->num_rows() > 0)
     {
       foreach ($query->result() as $row)
       {
        
        $off_inst =  $row->institute_id;
        
       }
    }

   
     if( trim($approval_officer) == trim($this->session->emp_code) )   
     {
      
       redirect('apraisal_form/edit_sca/'.base64_encode($emp_code).'');  
     }


      else if($role == 1 || $role == 5)
     {
       
           redirect('apraisal_form/edit_sca/'.base64_encode($emp_code).'');

     }



     

     else if($role == 2)
     {
        if($off_inst == $my_inst)
        {
           redirect('apraisal_form/edit_sca/'.base64_encode($emp_code).'');
        }

        else
        {
          echo "You are not authenticated user to Access";
        }
     }



    else if($forward_status == 0 && $sca_data == NULL)
     {
       
        $this->load->view('v0.1/sca_form_view');
    
     }

     else if($forward_status == 1)
     {
       
         redirect('apraisal_form/view_sca/'.base64_encode($emp_code).'');
    
     }

    else 
     {
       redirect('apraisal_form/update_sca/'.base64_encode($emp_code).'');
     }

    }

    else
    {
     $this->load->view('v0.1/sca_form_view');
    
    }   
    
  }
}
