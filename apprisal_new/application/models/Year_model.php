<?php
class Year_model extends CI_Model {
 

 
function get_years() {

$this ->db->select('ay_id, year');
$this->db->where('status_show', '1');
$query = $this->db->get('academic_year');  

 
$year = array();
 
if ($query -> result()) {
 foreach ($query->result() as $row) {
 $year[$row ->ay_id] = $row ->year;
 }

 return $year;
 } else {
 return FALSE;
 }
 }
 
}
?>