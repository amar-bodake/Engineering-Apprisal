<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class File_appraisal_model extends CI_Model {

 

  function file_sucess()
  {
       
         $codex = $this->input->post('app_id');
         
         $mycode = $this->session->emp_code;
       
         $comment = $this->input->post('comment');
         $email = "amarit2013@gmail.com";

        

   
            
         //updating performance indicater............
        $data=array(
                    'status_hr'=> 1,
                    'hr_time' =>date('Y/m/d H:i:s')
                   
                   );
       
        $this->db->where('approval_id',$codex);
        $this->db->update('approvals',$data);
        $afftectedRows1 = $this->db->affected_rows();
        if($afftectedRows1 == 1)
        {
             $data=array(
                    'filed_status'=> 1

                   );

        $this->db->where('sca_id',$codex);
        $this->db->update('sca',$data); 
        }
        
        $afftectedRows2 = $this->db->affected_rows();
        if($afftectedRows2 == 1)
        {
                  //$email = "amarit2013@gmail.com";
                  $this->load->library('My_PHPMailer');
                  $mail = new PHPMailer();
                  $mail->IsSMTP(); // we are going to use SMTP
                  $mail->SMTPAuth   = true; // enabled SMTP authentication
                  $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
                  $mail->Host       = "";      // setting GMail as our SMTP server
                  $mail->Port       = 465;                   // SMTP port to connect to GMail
                  $mail->Username   = "";  // user email address
                   $mail->Password   = "";            // password in GMail
                  $mail->SetFrom('enggappraisal@sinhgad.edu', 'Teaching Appraisal');  //Who is sending the email
                  $mail->AddReplyTo("enggappraisal@sinhgad.edu","Teaching Appraisal");  //email address that receives the response
                  $mail->Subject    = "Teaching Appraisal | Appraisal Filed";
                  $mail->Body      = $comment;
                  $mail->AltBody    = "Plain text message";
                  $destino =  $email; // Who is addressed the email to
                   
                  $mail->AddAddress($email, "");

                 // $mail->AddAttachment("images/phpmailer.gif");      // some attached files
                  //$mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
                  if(!$mail->Send()) {
                      $data["message"] = "Error: " . $mail->ErrorInfo;
                    echo $data["message"];
                    // die;
                    redirect('profile/admin_profile');
                      
                  } 
                  else {
                      $data["message"] = "Message sent correctly!";
                       //echo $data["message"];
                       redirect('profile/admin_profile');
                  }


          
        }

        else
        {
          echo "Error in filed apprisal please try again!";
          die;
        }


        



  }

}





  







