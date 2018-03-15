<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel_cntr extends CI_Controller
{
 
   public function excel_upload()
   {
     
      $this->load->view('excel_view');      
   }

}
?>