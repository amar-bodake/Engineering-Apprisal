<?php
class Dept_model_gp extends CI_Model {
 

 
function get_depts($inst = null){

$role = $this->session->role_id;
$dept = $this->session->dept;

 $this->db->select('id, title');
 $this->db->where('institute_id', $inst);
     
 $query = $this->db->get('department');

 
 $depts = array();
 
 if($query->result()){
 foreach ($query->result() as $dep) {
 $depts[$dep->id] = $dep->title;
 }
 return $depts;
 }else{
 return FALSE;
 }
}
 
}
?>