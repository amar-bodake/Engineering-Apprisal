<?php
class Des_model extends CI_Model {
 

 
function get_des() {

 $role = $this->session->role_id;
 $inst = $this->session->inst;


 $this ->db->select('id, name');

 $query = $this->db->get('designations');
 
 
$inst = array();
 
if ($query -> result()) {
 foreach ($query->result() as $row) {
 $inst[$row ->id] = $row ->name;
 }

 return $inst;
 } else {
 return FALSE;
 }
 }
 
}
?>