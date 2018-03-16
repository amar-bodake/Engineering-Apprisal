<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Get_password_model extends CI_Model {

	public function get_password($reg_email) 
  {

      

       $this->load->library('My_PHPMailer');
      $this->db->select('*');
      $this->db->from(' employee');
      $this->db->where('email', $reg_email);
      $query = $this->db->get();
        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
               
                $email = $row->email;
                $password = $row->password;
                $name = $row->name;
                $sr = $row->sr;
                $emp_code = $row->emp_code;
                
             }

             //$msg = $reg_email . " is  register!";
             //echo $msg;
                //  $email = "sdc@sinhgad.edu";
                  $mail = new PHPMailer();
                  $mail->IsSMTP(); // we are going to use SMTP
                  $mail->SMTPAuth   = true; // enabled SMTP authentication
                  $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
                  $mail->Host       = "";      // setting GMail as our SMTP server
                  $mail->Port       = 465;                   // SMTP port to connect to GMail
                  $mail->Username   = "apikey";  // user email address
                   $mail->Password   = "";            // password in GMail
                  $mail->SetFrom('enggappraisal@sinhgad.edu', 'Engineering Appraisal');  //Who is sending the email
                  $mail->AddReplyTo("enggappraisal@sinhgad.edu","Engineering Appraisal");  //email address that receives the response
                  $mail->Subject    = "Engineering Appraisal | Login Credential";
                  $mail->Body      = "<p>Hi <b>". $name. "</b>, <br><br>Your Engineering Appriasal Credential are - <br><br>Employee Code:<br>".$emp_code ."<br><br>Employee Email:<br>".$email ."<br><br>Password:<br>".$password ."</p>";
                  $mail->AltBody    = "Plain text message";
                  $destino =  $email; // Who is addressed the email to
                   
                  $mail->AddAddress($email, "Amar Bodake");

                 // $mail->AddAttachment("images/phpmailer.gif");      // some attached files
                  //$mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
                  if(!$mail->Send()) {
                      $data["message"] = "Error: " . $mail->ErrorInfo;
                      echo $data["message"]; 
                      
                  } 
                  else {
                      $data["message"] = "Message sent correctly!";
                      echo $data["message"]; 
                  }

                  $msg = "Password send to <b>" .$reg_email . "  </b>please check!";
                 
                  //echo $data;
                  //die;
                  return $msg;

           }

          else
          {
                $msg = $reg_email . " is not register kindly contact <b>DATACENTER</b>!";
                return $msg;
              
          }



     }
}
