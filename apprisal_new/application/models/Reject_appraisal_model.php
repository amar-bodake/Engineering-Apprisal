<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Reject_appraisal_model extends CI_Model {

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


  function reject_sucess()
  {
       
         $codex = $this->input->post('app_id');
         
         $mycode = $this->session->emp_code;
       
         $comment = $this->input->post('comment');

         $name = $this->input->post('name');
         
         $email = $this->input->post('email');

               
         //updating performance indicater............
        $data=array(
                    'status_id'=> -1,
                    'vp_comment'=> $comment
                   );

        $this->db->where('pi_id',$codex);
        $this->db->update('performance_indicater',$data);
        

        $data=array(
                    'reject_status'=> '1'
                    
                   );

        $this->db->where('sca_id',$codex);
        $this->db->update('sca',$data);


         $data=array(
                    'status_vice'=> -1
                   );

        $this->db->where('pi_id',$codex);
        $this->db->update('approvals',$data);
        $afftectedRows1 = $this->db->affected_rows();
         if($afftectedRows1 == 1)
        {
             $this->load->library('My_PHPMailer');
                  $mail = new PHPMailer();
                  $mail->IsSMTP(); // we are going to use SMTP
                  $mail->SMTPAuth   = true; // enabled SMTP authentication
                  $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
                  $mail->Host       = "smtp.sendgrid.net";      // setting GMail as our SMTP server
                  $mail->Port       = 465;                   // SMTP port to connect to GMail
                  $mail->Username   = "";  // user email address
                   $mail->Password   = "";            // password in GMail
                  $mail->SetFrom('enggappraisal@sinhgad.edu', 'Teaching Appraisal');  //Who is sending the email
                  $mail->AddReplyTo("enggappraisal@sinhgad.edu","Teaching Appraisal");  //email address that receives the response
                  $mail->Subject    = "Teaching Appraisal | Appraisal Reject";
                  $mail->Body      = "Hi <b>".$name. "</b>,<br> Your apprisal has been rejected by vice-president, saying ".$comment. "";
                  $mail->AltBody    = "Plain text message";
                  $destino =  $email; // Who is addressed the email to
                   
                  $mail->AddAddress($email, "");

                  if(!$mail->Send()) {
                      $data["message"] = "Error: " . $mail->ErrorInfo;
                     echo $data["message"];
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
          echo "Error in Rejection";
        }




  }

}





  







