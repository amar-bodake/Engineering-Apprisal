<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class CIPHP extends CI_Controller {
 
  function __construct(){
      parent::__construct();
      $this->load->library('phpmailer');
  }
  function send_email() {
 
      $subject = 'Testing Email';
      $name = 'iCoreThink Technologies';
      $email = 'amarbodake2020@gmail.com';
      $body = "This is body text for test email to combine CodeIgniter and PHPmailer";
      $this->phpmailer->AddAddress($email);
      $this->phpmailer->IsMail();
      $this->phpmailer->From = 'amarbodake2020@gmail.com';
      $this->phpmailer->FromName = 'iCoreThink Technologies';
      $this->phpmailer->IsHTML(true);
      $this->phpmailer->Subject = $subject;
      $this->phpmailer->Body = $body;
     if($this->email->send())
            {
              echo "Your Email was send";
            }

            else
            {
              show_error($this->email->print_debugger());
            }
       
       
 
  }
}
?>