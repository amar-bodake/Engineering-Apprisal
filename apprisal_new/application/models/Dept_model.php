<?php
class Dept_model extends CI_Model {
 

 
function get_depts($inst = null){

$role = $this->session->role_id;
$dept = $this->session->dept;

 $this->db->select('id, title');
 
 if($inst != NULL){
 if($role == 3)
      {
       $this->db->where('institute_id', $inst);
       $this->db->where('id', $dept);
      }
      else
      {
         $this->db->where('institute_id', $inst);

      }
 }


    $query = $this->db->get('department');

 
 $depts = array();
 if($role != 3)
 {
 array_unshift($depts, "All");
 }
 
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