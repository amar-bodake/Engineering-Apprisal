<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plain_page extends CI_Controller {

     public function __construct()
        {
         parent::__construct();
         
         
        }
 
      

       public function index()
       {
        $this->load->view('v0.1/plain_page');

       }


       
}