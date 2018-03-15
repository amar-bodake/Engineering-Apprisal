<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
    
    public function fillgrid(){
        $this->db->order_by("sr", "desc"); 
        $data = $this->db->get('employee');
        foreach ($data->result() as $row){
           

            $edit = base_url().'index.php/home/edit/';
            $delete = base_url().'index.php/home/delete/';
            echo "<tr>
                        <td>$row->emp_code</td>
                        <td>$row->email</td>
                        <td>$row->password</td>
                        <td>$row->name</td>
                        <td>$row->institute_id</td>

                        <td>$row->designation_id</td>
                        <td style = 'display:none'>$row->date_of_joining</td>
                        <td style = 'display:none'>$row->date_of_leaving</td>
                        <td>$row->role_id</td>
                        <td style = 'display:none'>$row->last_login_in</td>

                         <td>$row->department_id</td>
                        <td>$row->set_profile</td>
                        <td>$row->is_active</td>



                        <td><a href='$edit' data-id='$row->sr' class='btnedit' title='edit'><i class='glyphicon glyphicon-pencil' title='edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$delete' data-id='$row->sr' class='btndelete' title='delete'><i class='glyphicon glyphicon-remove'></i></a></td>    
                    </tr>";
            
        }
        exit;
    }

    public function create(){
        $data = array('emp_code'=>  $this->input->post('emp_code'),
                              'email'=>$this->input->post('email'),
                              'password'=>$this->input->post('password'),
                              'name'=>$this->input->post('name'),
                              'institute_id'=>  $this->input->post('institute_id'),
                              'designation_id'=>$this->input->post('designation_id'),
                              'date_of_joining'=>$this->input->post('date_of_joining'),
                              'date_of_leaving'=>$this->input->post('date_of_leaving'),
                              'role_id'=>  $this->input->post('role_id'),
                              'last_login_in'=>$this->input->post('last_login_in'),
                              'department_id'=>$this->input->post('department_id'),
                              'set_profile'=>$this->input->post('set_profile'),
                              'is_active'=>  $this->input->post('is_active'));
           
            $this->db->insert('employee', $data);
            echo'<div class="alert alert-success">One record inserted Successfully</div>';
            exit;
    }
   
   private function edit(){}
   
   private function delete(){}
    
    
}

?>
