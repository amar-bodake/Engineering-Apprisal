<?php
echo !extension_loaded('openssl')?"Not Available":"Available";
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Send_email extends CI_Controller {

      

     public function __construct()
        {
                parent::__construct();
                //$this->login();
                $emp_code = $this->session->emp_code; 
               $this->load->library('My_PHPMailer');

        }
   

     public function mail_send() {
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
        $mail->AddReplyTo("enggappraisal@sinhgad.edu","Engineering Appraisal");  //email address that receives the response
        $mail->Subject    = "Appraisal | Reject";
        $mail->Body      = "HTML message";
        $mail->AltBody    = "Plain text message";
        $destino = "amarit2013@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Amar Bodake");

       // $mail->AddAttachment("images/phpmailer.gif");      // some attached files
        //$mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
        if(!$mail->Send()) {
            $data["message"] = "Error: " . $mail->ErrorInfo;
        } else {
            $data["message"] = "Message sent correctly!";
        }
        echo $data["message"]; 
    }

  
       

}