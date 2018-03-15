<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Changepass_model extends CI_Model {

  public function insert($oldpass,$newpass) 
  {

      $emp_code =  $this->session->emp_code;
      //echo $oldpass;

      $this->db->select('*');
      $this->db->from('employee');
      $this->db->where('emp_code', $emp_code);
      $query = $this->db->get();
        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
               
                $email = $row->email;
                $password = $row->password;
                $name = $row->name;
                $sr = $row->sr;
                
             }

          }

          else
          {
            echo "Wrong employee codee";
          }

          if($password == $oldpass)
          {
            $data=array('password'=>$newpass,
                         'password_set'=>1
              );
            $this->db->where('emp_code',$emp_code);
            $this->db->update('employee',$data);

              if ($this->db->affected_rows() == '1')
              {
                  return 'Your Password Successfully Change!';
              }

              else
              {
                return 'Your Password Not Change!';
              }
              
          }

          else
          {
            return 'Your Old Password is not match please try again!';
          }


     
    
  }
}
