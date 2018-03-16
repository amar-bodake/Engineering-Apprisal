<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Forward_apraisal_model extends CI_Model {

  protected $table = "performance_indicater";
  protected $pi_id;
  protected $emp_code;
  protected $score_sca;
  protected $score_pdac;
  protected $scpore_rc;
  protected $pi;
  protected $status_id;
  protected $year_of_pi;
  protected $obtained_score;
  protected $scaled_score;
  protected $date_of_pi_creation;
  protected $approval_officer;


   

  function init()
  {
    $code = $this->uri->segment(3);
    $myrole = $this->session->userdata('role_id');
    $myinst = $this->session->userdata('inst');
    $codex = $this->uri->segment(3);


    //calculating details of employee

           $query = $this->db->get_where('employee', array('emp_code' => $codex));
                 foreach ($query->result() as $row)
                  {
                     $institute_id =  $row->institute_id;
                     $department_id =  $row->department_id;
                     $role_id =  $row->role_id;
                     $name =  $row->name;
                     $email =  $row->email;
                     
                  }

          


          if($myrole == 3)
          {
             $query = $this->db->get_where('institutes', array('id' => $myinst));
             foreach ($query->result() as $row)
                  {
                     $off =  $row->principal_id;
                     $lastoff = $this->session->userdata('emp_code');
                  }

          } 

          else if($myrole == 2)
          {
               $des = "president";
               $query = $this->db->get_where('stes', array('designation' => $des));
                 foreach ($query->result() as $row)
                  {
                     $off =  $row->emp_code;
                     $lastoff = $this->session->userdata('emp_code');
                  }
          }

           else if($myrole == 1 || $myrole == 0)
          {
               $des = "hr";
               $query = $this->db->get_where('stes', array('designation' => $des));
                 foreach ($query->result() as $row)
                  {
                     $off =  $row->emp_code;
                     $lastoff = $this->session->userdata('emp_code');
                  }


          }

        




     //updating performance indicater


          if($myrole == 0)
        {
          $data=array(
                      'approval_officer'=>  $off,
                      'last_assign_at'=>  $lastoff,
                       'status_id' => 2

                     );

          


          }


        else if($myrole == 1)
        {
          $data=array(
                      'approval_officer'=>  $off,
                      'last_assign_at'=>  $lastoff,
                       'status_id' => 1
                     );

          


          }

           else
           {

                $data=array(
                          'approval_officer'=>  $off,
                          'last_assign_at'=>  $lastoff,
                         //  'status_id' => 1
                         );
            
           }

              $this->db->where('emp_code',$code);
              $this->db->update('performance_indicater',$data);






              //Getting pi_id.....
              $query = $this->db->get_where('performance_indicater', array('emp_code' => $code));
               foreach ($query->result() as $row)
                    {
                       $pi_id =  $row->pi_id;

                    }

         // updating aproval 

              $data = array(
                          ' approval_emp_code '=>  $off
                         // 'last_assign_at'=>  $lastoff;
                         
                         );

              $this->db->where('pi_id',$pi_id);
              $this->db->update('approvals',$data);

      

          //updating the notification....

       if($myrole == 0)
        {
          
          $msg = "Your appraisal is Filed!!";

                 $data = array(
                          'emp_code'=>  $code,
                          'pi_id' => $pi_id,
                          'given_by' => $lastoff,
                          'message' => $msg,
                          'given_at' => date('Y-m-d H:i:s')
                         );

         $this->db->insert('notification', $data); 

         
              $data = array(
                            'status_hr' =>  '1'
                         // 'last_assign_at'=>  $lastoff;
                         
                         );
                    $this->db->where('pi_id',$pi_id);
                    $this->db->update('approvals',$data);

               //sending mail
                  $mail = new PHPMailer();
                  $mail->IsSMTP(); // we are going to use SMTP
                  $mail->SMTPAuth   = true; // enabled SMTP authentication
                  $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
                  $mail->Host       = "";      // setting GMail as our SMTP server
                  $mail->Port       = 465;                   // SMTP port to connect to GMail
                  $mail->Username   = "";  // user email address
                  $mail->Password   = "";            // password in GMail
                  $mail->SetFrom('enggappraisal@sinhgad.edu', 'Engineering Appraisal');  //Who is sending the email
                  $mail->AddReplyTo("enggappraisal@sinhgad.edu","Engineering Appraisal");  //email address that receives the response
                  $mail->Subject    = "Appraisal | Filed";
                  $mail->Body      = "<p>Hi <b>". $name. "</b>, <br><br>Your Appriasal is Filed by <b>HR</b></p>";
                  $mail->AltBody    = "Plain text message";
                  $destino = $email; // Who is addressed the email to
                  $mail->AddAddress($destino, "Amar Bodake");

                 // $mail->AddAttachment("images/phpmailer.gif");      // some attached files
                  //$mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
                  if(!$mail->Send()) {
                      $data["message"] = "Error: " . $mail->ErrorInfo;
                       echo $data["message"];
                  } 
                  else {
                      $data["message"] = "Message sent correctly!";
                  }




        }

        else if($myrole == 1)
        {
          
          $msg = "Your appraisal is Approved!!";

                 $data = array(
                          'emp_code'=>  $code,
                          'pi_id' => $pi_id,
                          'given_by' => $lastoff,
                          'message' => $msg,
                          //'emp_name' => $name,
                          'given_at' => date('Y-m-d H:i:s')
                         );

          $this->db->insert('notification', $data); 



             $msg = "appraisal is approved!! submited";

                 $data = array(
                          //'emp_code'=>  $code,
                          'assign_to' => "all",
                          'assign_of' => $code,
                          'pi_id' => $pi_id,
                          'given_by' => $lastoff,
                          'message' => $msg,
                          'inst' => $institute_id,
                          'dept' => $department_id,
                          'role' => $role_id,
                          'given_at' => date('Y-m-d H:i:s')
                         );

            $this->db->insert('notification', $data);

            $data = array(
                          'status_vice '=>  '1'
                         // 'last_assign_at'=>  $lastoff;
                         
                         );
                    $this->db->where('pi_id',$pi_id);
                    $this->db->update('approvals',$data);

                  $mail = new PHPMailer();
                  $mail->IsSMTP(); // we are going to use SMTP
                  $mail->SMTPAuth   = true; // enabled SMTP authentication
                  $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
                  $mail->Host       = "smtp.sendgrid.net";      // setting GMail as our SMTP server
                  $mail->Port       = 465;                   // SMTP port to connect to GMail
                  $mail->Username   = "apikey";  // user email address
                  $mail->Password   = "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";            // password in GMail
                  $mail->SetFrom('enggappraisal@sinhgad.edu', 'Engineering Appraisal');  //Who is sending the email
                  $mail->AddReplyTo("enggappraisal@sinhgad.edu","Engineering Appraisal");  //email address that receives the response
                  $mail->Subject    = "Appraisal | Approved";
                  $mail->Body      = "<p>Hi <b>". $name. "</b>, <br><br>Your Appriasal is approved by <b>vice - president</b></p>";
                  $mail->AltBody    = "Plain text message";
                  $destino = $email; // Who is addressed the email to
                  $mail->AddAddress($destino, "Amar Bodake");

                 // $mail->AddAttachment("images/phpmailer.gif");      // some attached files
                  //$mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
                  if(!$mail->Send()) {
                      $data["message"] = "Error: " . $mail->ErrorInfo;
                       echo $data["message"];
                  } 
                  else {
                      $data["message"] = "Message sent correctly!";
                  }
                  

        }

        else
        {
        
        $msg = "Your appraisal is forwarded";

                 $data = array(
                          'emp_code'=>  $code,
                          'pi_id' => $pi_id,
                          'given_by' => $lastoff,
                          'message' => $msg,
                          'given_at' => date('Y-m-d H:i:s')
                         );

         $this->db->insert('notification', $data); 

               if($myrole == 2)//principal
               {
                    
                     $data = array(
                          'status_principal '=>  '1'
                         // 'last_assign_at'=>  $lastoff;
                         
                         );

                    $this->db->where('pi_id',$pi_id);
                    $this->db->update('approvals',$data);
               }

                if($myrole == 3)//hod
               {

                     $data = array(
                          'status_hod '=>  '1'
                         // 'last_assign_at'=>  $lastoff;
                         
                         );

                    $this->db->where('pi_id',$pi_id);
                    $this->db->update('approvals',$data);


                     $data = array(
                          'status_id '=>  '1'
                         // 'last_assign_at'=>  $lastoff;
                         
                         );

                    $this->db->where('pi_id',$pi_id);
                    $this->db->update('performance_indicater',$data);





               }




        }

          //updating staff forward notification 
            $msg = "appraisal is waiting submited";

                 $data = array(
                          //'emp_code'=>  $code,
                          'assign_to' => "all",
                          'assign_of' => $code,
                          'pi_id' => $pi_id,
                          'given_by' => $lastoff,
                          'message' => $msg,
                          'inst' => $institute_id,
                          'dept' => $department_id,
                          'role' => $role_id,
                          'given_at' => date('Y-m-d H:i:s')
                         );

            $this->db->insert('notification', $data);
                         

       }

}









