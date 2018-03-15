<?php
$emp_code = $this->session->emp_code; 


      $this->db->select('*');
      $this->db->from(' employee');
      $this->db->where('emp_code', $emp_code);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
               
                $name = $row->name;
                $institute_id = $row->institute_id;
                $designation_id = $row->designation_id;
                $department_id = $row->department_id;
                $email =  $row->email;
             }

          }


      $this->db->select('*');
      $this->db->from(' designations');
      $this->db->where('id', $designation_id);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $des = $row->name;
             }
          }


       $this->db->select('*');
       $this->db->from('institutes');
       $this->db->where('id', $institute_id);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $inst = $row->name;
             }
          }


        $this->db->select('*');
       $this->db->from('department');
       $this->db->where('id', $department_id);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $dept = $row->title;
             }
          }

?>

<?php include 'header.php';?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';?> 
   <!-- title message -->
  <div class="right_col" role="main">        
  <div class="">
     
 <?php
      if (count($stafs)) {

                       
     echo '<table class="table table-striped table-hover ">';
     echo  '<thead>';
     echo '<tr>';
     echo '<th>Sr.No</th>';
     echo  '<th>Employee ID</th>';
     echo  '<th>Employee Name</th>';
     
      echo  '<th>Date Of PI </th>';
      
      echo '<th>Action View</th>';
      
      echo '<th>Action Aprove</th>';
      echo '<th>Action Reject</th>';
      
     echo '</tr>';


     echo '</thead>';




      $i = 1;
      foreach ($stafs as $key => $list) 
      {
       echo "<tr class = 'tab'>";
       echo "<td>".$i."</td>";
       echo "<td>".$list['emp_code']."</td>";
       echo "<td>".$list['name']."</td>";
       echo "<td>".$list['date_of_pi_creation']."</td>";
       //echo '<td><a href = "view_apraisal/'.$list['emp_code'].'"><button type="button" class="btn btn-raised btn-primary button1">View</button></a></td>';

       echo '<td><a href = '.base_url().'index.php/apraisal_form/view_apraisal/'.$list['emp_code'].'><button type="button" class="btn btn-raised btn-primary button1">View</button></a></td>';
       


       echo '<td><a href = '.base_url().'index.php/apraisal_form/forward_apraisal/'.$list['emp_code'].'><button type="button" class="btn btn-raised btn-success button1">Forward</button></a></td>';
       echo '<td><a href = '.base_url().'index.php/apraisal_form/reject_apraisal/'.$list['emp_code'].'><button type="button" class="btn btn-raised btn-danger button1">Reject</button></td>';
        echo "</tr>";
         $i++;
      } 
    } 


    else
    {
      echo "<h1>This  action is Completed!</h1>";
    }
  
    
   
  echo "</tbody>";

  echo "</table>";

?>
</div>
</div>


  
<?php include 'footer.php';?>
