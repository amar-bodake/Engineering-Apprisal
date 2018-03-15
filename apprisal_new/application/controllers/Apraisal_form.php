<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');


class Apraisal_form extends CI_Controller {

      
     
     public function __construct()
        {
            parent::__construct();
            $this->login();
            $emp_code = $this->session->emp_code; 

            // echo $emp_code; 
           

        }
   

       public function login()
       {
               $is_log_in = $this->session->userdata('logged_in');

                // Your own constructor
                if(isset($is_log_in))
                {
               return true;
                }
              else
                {
               echo "You don't have permisssion to acesss this page<br>";
               echo "<a href='../login'>Login</a>";
               die();
                }
       }

  
        public function sca_submit_form()
       {

           
           $this->load->model('sca_check_model');
           $this->sca_check_model->check();
       } 


        public function department_submit_form()
       {

           
          $this->load->model('department_check_model');
          $this->department_check_model->check();
         // $this->load->view('v0.1/department_form_view');
       } 

      public function academic_submit_form()
       {

           
          $this->load->model('academic_check_model');
         $this->academic_check_model->check();
         //$this->load->view('v0.1/academic_form_view');
       } 

       public function industry_submit_form()
       {

           
         $this->load->model('industry_check_model');
         $this->industry_check_model->check();
        // $this->load->view('v0.1/industry_form_view');
       } 


         public function student_submit_form()
       {

           
          $this->load->model('student_check_model');
          $this->student_check_model->check();
          //$this->load->view('v0.1/student_form_view');
       } 


        public function fas_submit_form()
       {

           
          $this->load->model('fas_check_model');
          $this->fas_check_model->check();
          //$this->load->view('v0.1/fas_form_view');
       } 


      public function pcd_submit_form()
       {

           
          $this->load->model('pcd_check_model');
          $this->pcd_check_model->check();
          //$this->load->view('v0.1/pcd_form_view');
       }


        public function pda_submit_form()
       {
          $this->load->model('pda_check_model');
          $this->pda_check_model->check();
          //$this->load->view('v0.1/pda_form_view');
       } 


      public function rc_submit_form()
       {
          $this->load->model('rc_check_model');
          $this->rc_check_model->check();
        //$this->load->view('v0.1/rc_form_view');
       } 

         public function ahp_submit_form()
       {
          $this->load->model('ahp_check_model');
          $this->ahp_check_model->check();
          //$this->load->view('v0.1/ahp_form_view');
       } 


   
       public function submited()
       {
           echo '<script>alert("After you submited you can not change!!")</script>';

          $emp_code = $this->session->emp_code;
          $this->load->model('Pi_cal_model');
          $result = $this->Pi_cal_model->set_pi($emp_code);
         
         if( $result > 0 )
          {
          $this->load->model('approval_model');
          $this->approval_model->insert();
         

           //updating approval table....
           // redirect('Apraisal_form/view_apraisal');
           redirect('Apraisal_form/my_apprisal');
          
             
          }


          else
          {
           echo '<script language="javascript">';
           echo 'alert("Error in Insertion!!!!")';
            echo '</script>';
          }
          

        }

       //submit SCA form.....
        public function sca_submited()
       {
           
          $this->load->model('sca_form_model');
          $this->sca_form_model->set_sca();
             
       }




       public function view_apraisal(){
       $this->load->model('my_apraisal_model');
       $this->my_apraisal_model->view();
       }


      
       //view staff apprisal 
       public function view_staff_apraisal(){
       $this->load->model('view_staff_apraisal_apraisal_model');
       $this->view_staff_apraisal_apraisal_model->view();
       }
 


      public function update_sca(){
        
       $this->load->model('updatesca_model');
       $sca['data'] = $this->updatesca_model->view();

       //var_dump($sca['data']);
       //die;

       //print_r( $sca['data']);
      // die;
       if( !$sca['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);

        $this->load->view('v0.1/viewsca_form_view',$sca);


       }
               
      }


        public function view_sca(){
        
       $this->load->model('viewsca_model');
       $sca['data'] = $this->viewsca_model->view();


       //var_dump($sca['data']);
       //die;

       //print_r( $sca['data']);
      // diss
       if( !$sca['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {


    
        $this->load->view('v0.1/viewsca_form_view',$sca);

       }
               
      }



      public function update_pda(){
        
       $this->load->model('updatepda_model');
       $pda['data'] = $this->updatepda_model->view();
     
       if( !$pda['data'])
       {
        redirect('Apraisal_form/my_apprisal');
       }
       else
       {
       //$this->load->view('v0.1/pda_form_view',$pda);

        $this->load->view('v0.1/viewpda_form_view',$pda);
       }

               
      }



      public function view_pda(){
        
       $this->load->model('viewpda_model');
       $pda['data'] = $this->viewpda_model->view();
     
       if( !$pda['data'])
       {
        redirect('Apraisal_form/my_apprisal');
       }
       else
       {
       $this->load->view('v0.1/viewpda_form_view',$pda);
       }
      }
               
      

    

      public function update_rc(){
        
       $this->load->model('updaterc_model');
       $rc['data'] = $this->updaterc_model->view();

      // print_r($rc['data']);
      // die;
     
       if( !$rc['data'])
       {
        redirect('Apraisal_form/my_apprisal');
       }
       else
       {
       // echo "<pre>";
      //  print_r($rc);
      //  echo "</pre>";//
    
       //$this->load->view('v0.1/rc_form_view',$rc);

         $this->load->view('v0.1/viewrc_form_view',$rc);
         
       }

               
      }



      public function view_rc(){
        
       $this->load->model('viewrc_model');
       $rc['data'] = $this->viewrc_model->view();

      // print_r($rc['data']);
      // die;
     
       if( !$rc['data'])
       {
        redirect('Apraisal_form/my_apprisal');
       }
       else
       {
       // echo "<pre>";
      //  print_r($rc);
      //  echo "</pre>";//
    
       $this->load->view('v0.1/viewrc_form_view',$rc);
       }

               
      }


       public function view_ahp(){
        
       $this->load->model('viewahp_model');
       $ahp['data'] = $this->viewahp_model->view();
      
       
       $this->load->view('ahp_view',$ahp);

               
      }


       public function update_ahp(){
          
         $this->load->model('updateahp_model');
         $ahp['data'] = $this->updateahp_model->view();
        // print_r($ahp['data']);
        // die;
       
         if( !$ahp['data'])
         {
         redirect('Apraisal_form/my_apprisal');
         }
         else
         {
         $this->load->view('v0.1/ahp_form_view',$ahp);
         }

               
      }

      public function update_department(){

       $role_id = $this->session->role_id;
        
       $this->load->model('updatedepartment_model');
       $dept['data'] = $this->updatedepartment_model->view();
      
       if( !$dept['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);

            if($role_id == 2)
            {
            $this->load->view('v0.1/viewdept_form_view_pri',$dept);
            }

            else
            {
               $this->load->view('v0.1/viewdept_form_view',$dept);  
            }


       }
               
      }

      public function view_department(){

      $role_id = $this->session->role_id;
        
       $this->load->model('viewdepartment_model');
       $dept['data'] = $this->viewdepartment_model->view();
      
        if( !$dept['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);

            if($role_id == 2)
            {
            $this->load->view('v0.1/viewdept_form_view_pri',$dept);
            }

            else
            {
               $this->load->view('v0.1/viewdept_form_view',$dept);  
            }

      
      }


    }


      public function update_academic(){

       $role_id = $this->session->role_id;
        
       $this->load->model('updateacademic_model');
       $acd['data'] = $this->updateacademic_model->view();

      
       if( !$acd['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

       
        if($role_id == 2)
            {

               $this->load->view('v0.1/viewacd_form_view_pri',$acd);
            }
         else if($role_id == 3) 
            {
               $this->load->view('v0.1/viewacd_form_view',$acd); 
            }  


       }
               
      }


      public function view_academic(){
       $role_id = $this->session->role_id;
        
       $this->load->model('viewacademic_model');
       $acd['data'] = $this->viewacademic_model->view();

       
       if( !$acd['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);
        if($role_id == 2)
            {

               $this->load->view('v0.1/viewacd_form_view_pri',$acd);
            }
         else if($role_id == 3) 
            {
               $this->load->view('v0.1/viewacd_form_view',$acd); 
            }  


       }


     
               
      }


       public function update_industry(){

       $role_id = $this->session->role_id; 
        
       $this->load->model('updateindustry_model');
       $insts['data'] = $this->updateindustry_model->view();

      
       if( !$insts['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);

         if( $role_id == 2)
         {
           $this->load->view('v0.1/viewinsts_form_view_pri',$insts);
         }
         else if( $role_id == 3)  
         {
         $this->load->view('v0.1/viewinsts_form_view',$insts);
         }


       }
               
      }


      public function view_industry(){
        $role_id = $this->session->role_id;  
       $this->load->model('viewindustry_model');
       $insts['data'] = $this->viewindustry_model->view();


       if( !$insts['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);

         if( $role_id == 2)
         {
           $this->load->view('v0.1/viewinsts_form_view_pri',$insts);
         }
         else if( $role_id == 3)  
         {
         $this->load->view('v0.1/viewinsts_form_view',$insts);
         }


       }


      }


      public function update_student(){
       $role = $this->session->role_id;
        
       $this->load->model('updatestudent_model');
       $studs['data'] = $this->updatestudent_model->view();

      
       if( !$studs['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);
        if($role == 2)
        {
          $this->load->view('v0.1/viewstudent_form_view_pri',$studs);
        }
        else if($role == 3)
        {
         $this->load->view('v0.1/viewstudent_form_view',$studs);  
        }



       }
               
      }


      public function view_student(){
       $role = $this->session->role_id; 
       $this->load->model('viewstudent_model');
       $studs['data'] = $this->viewstudent_model->view();


        if( !$studs['data'])
       {
         redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);
        if($role == 2)
        {
          $this->load->view('v0.1/viewstudent_form_view_pri',$studs);
        }
        else if($role == 3)
        {
         $this->load->view('v0.1/viewstudent_form_view',$studs);  
        }



       }
      
      }


       public function update_fas(){

       $role = $this->session->role_id;
        
       $this->load->model('updatefas_model');
       $fas['data'] = $this->updatefas_model->view();

      
       if( !$fas['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);
        if($role == 2)
        {
          $this->load->view('v0.1/viewfas_form_view_pri',$fas); 
        }

        else  if($role == 3)
        {
         $this->load->view('v0.1/viewfas_form_view',$fas);   
        }

        


       }
               
      }


       public function view_fas(){


        $role = $this->session->role_id;
        
       $this->load->model('viewfas_model');
       $fas['data'] = $this->viewfas_model->view();

        if( !$fas['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        
        if($role == 2)
        {
          $this->load->view('v0.1/viewfas_form_view_pri',$fas); 
        }

        else  if($role == 3)
        {
         $this->load->view('v0.1/viewfas_form_view',$fas);   
        }

        


       }

        

 
      }


       public function update_pcd(){
        $role = $this->session->role_id;  
       $this->load->model('updatepcd_model');
       $pcd['data'] = $this->updatepcd_model->view();

      
       if( !$pcd['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);
          if($role == 2)
          {
           $this->load->view('v0.1/viewpcd_form_view_pri',$pcd);
          }
          else if($role == 3)
          {
            $this->load->view('v0.1/viewpcd_form_view',$pcd); 
          }

           


       }
               
      }


       public function view_pcd(){

       $role = $this->session->role_id;
        
       $this->load->model('viewpcd_model');
       $pcd['data'] = $this->viewpcd_model->view();

       if( !$pcd['data'])
       {


        redirect('Apraisal_form/my_apprisal');
       }
       else
       {

        //$this->load->view('v0.1/sca_form_view',$sca);
          if($role == 2)
          {
           $this->load->view('v0.1/viewpcd_form_view_pri',$pcd);
          }
          else if($role == 3)
          {
            $this->load->view('v0.1/viewpcd_form_view',$pcd); 
          }

           


       }


        
      
      }





      
       public function staff_apraisal(){
        
        $role = $this->session->userdata('role_id');
        
         if($role == 0 || $role == 1 || $role == 2)
          { 
            $this->load->model('staff_apraisal_model_hr');
            $data['stafs_aprv'] = $this->staff_apraisal_model_hr->view_approved();
            $data['stafs_filed'] = $this->staff_apraisal_model_hr->view_filed();
            // print_r($data);
            
            $this->load->view('staff_apraisal_form_hr',$data);
          }

          else
          {
            $this->load->model('staff_apraisal_model');
            $data['stafs'] = $this->staff_apraisal_model->view();  
            $this->load->view('v0.1/staff_apraisal_form',$data); 
          }
        
       
       }


       public function forward_apraisal(){

           $this->load->view('forward_apraisal_view');  
           $this->load->model('forward_apraisal_model');  
           $this->forward_apraisal_model->init();
        }


       public function notification(){
         $this->load->view('notification_view');  
        }

        public function reject_apraisal(){

          $this->load->model('reject_appraisal_model');  
          $this->reject_appraisal_model->reject_sucess();
       
        }

        public function file_apraisal(){
          $this->load->model('file_appraisal_model');  
          $this->file_appraisal_model->file_sucess();
       
        }
 
        
         public function print_apraisal()
         {
               $this->load->model('pdf_report_model');
               $this->pdf_report_model->view();
            
              $html=$this->load->view('print_apraisal_view', $data, true); 
              $pdfFilePath = "Apraisal.pdf";
              $this->load->library('m_pdf');
              $pdf = $this->m_pdf->load();
              $pdf->WriteHTML($html);
              $pdf->Output($pdfFilePath, "D");    
         }


          public function filter_apraisal()
         {
                 $role = $this->session->role_id; 
                if( $role == 0 )
                { 
                  $this->load->model('staff_apraisal_model_hr');
                  $data['stafs_aprv'] = $this->staff_apraisal_model_hr->view_approved();
                  $data['stafs_filed'] = $this->staff_apraisal_model_hr->view_filed();
                 // print_r($data);
                  $role = $this->session->role_id;  
                  $this->load->view('staff_apraisal_form_hr',$data);
                }
         

        }

         public function appraisal_front()
         { 
          $this->load->model('Form_status_model');
          $data['form_total'] = $this->Form_status_model->status_check(); 
          //print_r($data['form_total']);

          $this->load->view('form_status', $data);
                
         }
       
      public function edit_sca(){
        
       $this->load->model('viewsca_model');
       $sca['data'] = $this->viewsca_model->view();

     
       if( !$sca['data'])
       {
        $this->load->view('my_form_null');
       }
       else
       {
       $this->load->view('v0.1/edit_sca',$sca);
       }
               
      }


    public function edit_pda(){
        
       $this->load->model('viewpda_model');
       $pda['data'] = $this->viewpda_model->view();

          
       if( !$pda['data'])
       {
        $this->load->view('my_form_null');
       }
       else
       {
       $this->load->view('v0.1/edit_pda',$pda);
       }
               
      }


      public function edit_rc(){
        
       $this->load->model('viewrc_model');
       $rc['data'] = $this->viewrc_model->view();



          
       if( !$rc['data'])
       {
        $this->load->view('my_form_null');
       }
       else
       {
       $this->load->view('v0.1/edit_rc',$rc);
       }
               
      }

       public function edit_ahp(){
        
       $this->load->model('viewahp_model');
       $ahp['data'] = $this->viewahp_model->view();
      
      
       if( !$ahp['data'])
       {
        $this->load->view('v0.1/edit_ahp',$ahp);
       }
       else
       {
       $this->load->view('v0.1/edit_ahp',$ahp);
       }
               
      }


      public function edit_department(){

        
       $this->load->model('viewdepartment_model');
       $dept['data'] = $this->viewdepartment_model->view();

       $this->load->model('viewdepartment_model');
       $emp_role = $this->viewdepartment_model->cal_emp();



       //print_r( $dept['data']);
       //die;

      
       if( $emp_role == 2)
       {

         $this->load->view('v0.1/edit_department_pri',$dept);
       }
       else if( $emp_role == 3)
       {

        $this->load->view('v0.1/edit_department',$dept);

       }
               
      }

      public function edit_academic(){
        
       $this->load->model('viewacademic_model');
       $acd['data'] = $this->viewacademic_model->view();
       $this->load->model('viewacademic_model');
       $emp_code = $this->viewacademic_model->cal_emp();
       if($emp_code == 2)
       {
         $this->load->view('v0.1/edit_academic_pri',$acd);
       }

       else if($emp_code == 3)
       {
         $this->load->view('v0.1/edit_academic',$acd);
       }

      
     
      }

      public function edit_industry(){
        
       $this->load->model('viewindustry_model');
       $ind['data'] = $this->viewindustry_model->view();

       $this->load->model('viewindustry_model');
       $emp_code = $this->viewindustry_model->cal_emp();
       
      
       if($emp_code == 3)
       {

        $this->load->view('v0.1/edit_industry',$ind);
       }
       else if($emp_code == 2)
       {

        $this->load->view('v0.1/edit_industry_pri',$ind);

       }
               
      }


       public function edit_student(){
        
       $this->load->model('viewstudent_model');
       $std['data'] = $this->viewstudent_model->view();

       $this->load->model('viewstudent_model');
       $emp_code = $this->viewstudent_model->cal_emp();


       //print_r( $std['data']);
       //die;
      
       if($emp_code == 3)
       {

        $this->load->view('v0.1/edit_student',$std);
       }
       else if($emp_code == 2)
       {

        $this->load->view('v0.1/edit_student_pri',$std);

       }
               
      }

       public function edit_fas(){
        
       $this->load->model('viewfas_model');
       $fas['data'] = $this->viewfas_model->view();

       $this->load->model('viewfas_model');
       $emp_code = $this->viewfas_model->cal_emp();



       
      
       if($emp_code == 3)
       {

        $this->load->view('v0.1/edit_fas',$fas);
       }
       else if($emp_code == 2)
       {

        $this->load->view('v0.1/edit_fas_pri',$fas);

       }
               
      }

        public function edit_pcd(){
        
       $this->load->model('viewpcd_model');
       $pcd['data'] = $this->viewpcd_model->view();

       $this->load->model('viewpcd_model');
       $emp_code = $this->viewpcd_model->cal_emp();
      
       if( $emp_code == 3)
       {

        $this->load->view('v0.1/edit_pcd',$pcd);
       }
       else if( $emp_code == 2)
       {

        $this->load->view('v0.1/edit_pcd_pri',$pcd);

       }
               
      }


       public function assessment(){
          $this->load->model('assessment_model');
          $data['ass'] = $this->assessment_model->cal();  
         // print_r($data['ass']);
        // die;
         $this->load->view('assessment_view',$data);
       }

       //v0.1
       //go to my apprisal

         public function set_year(){
           //echo $inst;  
         // $set_year = $this->input->post('year');
         $set_year =  $_POST['data']; 
          $this->session->set_userdata('ayear', $set_year);

        
        
       }

       public function my_apprisal(){

         
          
         $this->load->model('my_apraisal_model');
          $this->my_apraisal_model->view();
         // $this->load->view('v0.1/apprisal_self');
       }


       public function submit_assesement(){
         
        $this->load->model('submit_assesement_model');
        $this->submit_assesement_model->insert();

      }


      public function view_report(){  
        
      $this->load->model('view_report_model');
      $this->view_report_model->view();
      
      // $this->load->view('v0.1/view_report');

      }

      public function pdf_report(){  
        
      $this->load->model('pdf_report_model');
      $this->pdf_report_model->view();
      
      // $this->load->view('v0.1/view_report');

      }

       public function refill(){  
        
      $this->load->model('refill_model');
      $this->refill_model->view();
       redirect('Apraisal_form/my_apprisal');
      
     }


        public function getdata(){  

          //$this->load->model('graph_data');
          //$data['year_graph']  = $this->graph_data->collect_data();
          //return  $data;
         //$this->load->view('v0.1/report_analysis_view');
      
        }




        


        public function report_graphical(){  

        $role = $this->session->role_id;

        $this->load->model('inst_model');
        $data['inst'] = $this->inst_model->get_insts();

        $this->load->model('year_model');
        $data['year'] = $this->year_model->get_years();

       if($role == 1 || $role == 5 )
        {
        array_unshift($data['inst'], "All");
        }


        $this->load->view('v0.1/report',$data);
      
        }



        public function report_graphical_grade(){  

        $this->load->model('year_model');
        $data['year'] = $this->year_model->get_years();
        $this->load->view('v0.1/report_gradewise',$data);
      
        }



        



         public function report_tabular(){  

        $role = $this->session->role_id;
        $this->load->model('inst_model');
        $data['inst'] = $this->inst_model->get_insts();

        $this->load->model('year_model');
        $data['year'] = $this->year_model->get_years();

        if($role == 1 || $role == 5 )
        {
        array_unshift($data['inst'], "All");
        }
       // print_r($data);
       // die;


        $this->load->view('v0.1/report_tabular',$data);
      
        }


        function get_depts($inst){

         
         $this->load->model('dept_model');
         header('Content-Type: application/x-json; charset=utf-8');
         echo(json_encode($this->dept_model->get_depts($inst)));
        }


     

          public function report_analysis($inst,$dept,$year){  

            $this->load->model('graph_data');
            $data['year_graph']  = $this->graph_data->collect_data_para($inst,$dept,$year);
            //return $data;
            echo(json_encode($data));
            //$this->load->view('v0.1/report_analysis_view',$data);
      
      
         }


              public function report_analysis_gradewise($yr){  

            $this->load->model('graph_data');
            //$data['year_graph']  = $this->graph_data->collect_data_para($inst,$dept);
            $data['year_graph']  = $this->graph_data->collect_data_para_all($yr);
           
            //return $data;
            echo(json_encode($data));
            //$this->load->view('v0.1/report_analysis_view',$data);
      
      
         }


        public function contact_us()
        {  
          $this->load->view('v0.1/contact_us');
       
        }

         public function generate_profile(){  

          

        $this->load->model('inst_model_gp');
        $data['inst'] = $this->inst_model_gp->get_insts();

        $this->load->model('des_model');
        $data['des'] = $this->des_model->get_des();


        $this->load->view('v0.1/generate_profile',$data);
      
        }


        function get_depts_gp($inst){

         
         $this->load->model('dept_model_gp');
         header('Content-Type: application/x-json; charset=utf-8');
         echo(json_encode($this->dept_model_gp->get_depts($inst)));
        }




      public function edit_profile(){  

          

        $this->load->model('inst_model_gp');
        $data['inst'] = $this->inst_model_gp->get_insts();

        $this->load->model('des_model');
        $data['des'] = $this->des_model->get_des();


        $this->load->view('v0.1/edit_profile',$data);
      
        }



          public function do_upload(){    
      
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'jpeg|jpg|png'; 
         //$config['max_size']      = 100000; 
         //$config['max_width']     = 1024; 
        // $config['max_height']    = 768;  
         $this->load->library('upload', $config);
      
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            print_r($error);
           // $this->load->view('v0.1/upload_form', $error); 
         }
      
         else { 
            $data = array('upload_data' => $this->upload->data());
            //echo "<pre>";
           // var_dump($data);
          // echo "</pre>";
          // die;
            // foreach ($data as $item => $value);
            // $item['file_path']
            //print_r($data); 
            $imgpath = $data['upload_data']['file_name'];

            $data =array(
             'name' => $this->input->post('name'),
             'emp_code' => $this->input->post('emp_code'),
             'institute_id' => $this->input->post('inst_id'),

             'department_id' => $this->input->post('dept_id'),
             //'shift_id' => $this->input->post('shift_id'),
             'designation_id' => $this->input->post('des'),
             'email' => $this->input->post('email'),
             'role_id' => $this->input->post('role'),
             'mobile' => $this->input->post('mobile'),
             'date_of_joining' => $this->input->post('doj'),
              'set_profile'=> 1,
             'profile_img' => $imgpath
              );


           // die;

           
             $this->load->model('generate_profile_model');
             $data['msg'] = $this->generate_profile_model->add_data($data);
             //echo $data['msg'];

              redirect('profile/profile_view'); 
              
            
         } 


  }




   public function do_upload_edit(){    
      
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'jpeg|jpg|png'; 
         //$config['max_size']      = 100000; 
         //$config['max_width']     = 1024; 
        // $config['max_height']    = 768;  
         $this->load->library('upload', $config);
      
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            print_r($error);
           // $this->load->view('v0.1/upload_form', $error); 
         }
      
         else { 
            $data = array('upload_data' => $this->upload->data());
            //echo "<pre>";
           // var_dump($data);
          // echo "</pre>";
          // die;
            // foreach ($data as $item => $value);
            // $item['file_path']
            //print_r($data); 
            $imgpath = $data['upload_data']['file_name'];

            $data =array(
             'name' => $this->input->post('name'),
             'emp_code' => $this->input->post('emp_code'),
             'institute_id' => $this->input->post('inst_id'),

             'department_id' => $this->input->post('dept_id'),
             //'shift_id' => $this->input->post('shift_id'),
             'designation_id' => $this->input->post('des'),
             'email' => $this->input->post('email'),
             //'role_id' => $this->input->post('role'),
             'mobile' => $this->input->post('mobile'),
             'date_of_joining' => $this->input->post('doj'),
              'set_profile'=> 1,
             'profile_img' => $imgpath
              );


           // die;

           
             $this->load->model('generate_profile_model_edit');
             $data['msg'] = $this->generate_profile_model_edit->add_data($data);
             //echo $data['msg'];

              redirect('profile/profile_view'); 
              
            
         } 


  }

        public function academic_year()
       {
         $this->load->model('academic_year_model');
         $data['year'] = $this->academic_year_model->check();




         $this->load->view('v0.1/academic_year',$data);
       } 

      public function academic_year_admin()
       {
         $this->load->model('admin_academic_year_model');
         $data['year'] = $this->admin_academic_year_model->check();
         

        $this->load->view('v0.1/admin_academic_year',$data);
       } 






}