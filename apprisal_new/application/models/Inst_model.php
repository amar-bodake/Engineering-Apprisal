<?php
class Inst_model extends CI_Model {
 

 
function get_insts() {

 $role = $this->session->role_id;
 $inst = $this->session->inst;

 if($role == 1 || $role == 5)
 {
 $this ->db->select('id, name');

 $query = $this->db->get('institutes');
 }

 else if($role == 2 || $role == 3)
 {
    $this ->db->select('id, name');
     $this->db->where('id', $inst);
    $query = $this->db->get('institutes');  
 }
 
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