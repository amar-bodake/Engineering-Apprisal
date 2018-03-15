<?php  $role = $this->session->role_id;?>
<?php include 'header.php';?>
<?php 
   if($role == 4)
   {
    include 'nav_emp.php';
   }
   else if($role == 0)
   {
    include 'nav_hr.php';
   }
    else
   {
   include 'nav.php';
   }

$emp_code = $this->session->emp_code;

 $this->db->select('*');
      $this->db->from('sca');
      $this->db->where('emp_code', $eid);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                
              $sca_total2 = $row->sca_total2;
              $pda_total2 = $row->pda_total2;
              $rc_total2 = $row->rc_total2;
              $reject_status = $row->reject_status;
              $sca_id = $row->sca_id;
             }

         }



      $this->db->select('*');
      $this->db->from('approvals');
      $this->db->where('approval_id',  $sca_id);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                
              $status_hod = $row->status_hod;
             
             }

          }


     


// for senior officer...

  if($sca_total2 > 0 && $pda_total2> 0 && $rc_total2 > 0 &&  $reject_status == 0)
  {
    $path = 'assessment';
  }

  else
  {

       if($emp_code == $officer)
      {
        $path = 'edit_sca';
      }

      else
      {
        $path = 'view_sca';
      }

 }


?>

             <!-- title message -->
        <div class="container wrapper-title">
            <div class="row">
                <div class="col-md-6"><h3>Appraisal/My Appraisal</h3></div>
                <div class="col-md-6 text-right">
                  <?php

                  // I'm India so my timezone is Asia/Calcutta
                        date_default_timezone_set('Asia/Calcutta');

                        // 24-hour format of an hour without leading zeros (0 through 23)
                        $Hour = date('G');
                        $wtxt = "";
                        if ( $Hour >= 5 && $Hour < 12 ) {
                             $wtxt =  "Good Morning";
                             
                        } else if ( $Hour >= 12 && $Hour <16 ) {
                           $wtxt = "Good Afternoon";
                        } else if ( $Hour >= 16 || $Hour <= 4 ) {
                           $wtxt = "Good Evening";
                        }

                  ?>
                  
                    <h3><?php echo $wtxt; ?>, <span class="text-warning"><?php echo $this->session->name?></span></h3>
                </div>
            </div>
        </div>
        <!-- end of : title message -->
    
        
   
    
     <div class = "container wrapper-dashboard-content">
     
    <h6 style = "color:red"> <?php echo validation_errors(); ?> </h6>
       <?php
          echo '<script> $("#myModal").modal({backdrop: "static"}); </script>'; 
       ?>

  <div class="row">
    <div class="col-md-12">
      
       <a href = "<?php echo base_url();?>index.php/apraisal_form/<?php echo $path; ?>/<?php echo $eid; ?>" target="_blank"><button class="col-md-4" type="button" class="btn btn-success">Explore Appraisal</button></a>  
      <div class="dashboard-content">
     
         
                        <!-- content goes here -->    
      <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr.No.</th>
      <th>Fields</th>
      <th>Details</th>
     
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <th scope="row">1</th>
      <td>Employee Code</td>
      <td> <?php  echo $eid?></td>
    
    </tr>


     <tr>
      <th scope="row">2</th>
      <td>Employee Name</td>
      <td> <?php  echo $name;?></td>
    
    </tr>

    <tr>
      <th scope="row">3</th>
      <td>Score SCA</td>
      <td><?php echo $sca?></td>
    </tr>

     <tr>
      <th scope="row">4</th>
      <td>Score PDAC</td>
      <td><?php echo $pdac  ?></td>
    </tr>

    <tr>
      <th scope="row">5</th>
      <td>Score RC</td>
      <td><?php  echo $rc ?></td>
    </tr>

     <tr>
      <th scope="row">6</th>
      <td>Score AHP</td>
      <td> <?php  echo $ahp ?></td>
    </tr>

    <tr>
      <th scope="row">7</th>
      <td>PI</td>
      <td>------</td>
    </tr>

     <tr>
      <th scope="row">8</th>
      <td>Year of PI</td>
      <td><?php  echo $year_of_pi?></td>
    </tr>

     <tr>
      <th scope="row">9</th>
      <td>Date Of Creation</td>
      <td><?php  echo $date_of_pi_creation?></td>
    </tr>

      <tr>
      <th scope="row">10</th>
      <td>Appraisal Officer</td>
      <td><?php echo $approval_officer?></td>
    </tr>
   
      <tr>
      <th scope="row">11</th>
      <td>Last Assigned At</td>
      <td><?php echo $last_assign_at?></td>
    </tr>


    <tr>
      <th scope="row">12</th>
      <td>Status</td>
      <td><?php if($status == 0) echo "Pending"; 
           else if($status == -1) echo "<p style='color:red';>Rejected</p>";
           else if($status == 2) echo "<p style='color:blue';>Filed</p>";
       else echo "<p style='color:green';>Approve</p>";?></td>
    </tr>
  



</tbody>
</table>
</div>
</div>
</div>





</div>

<script>
$(document).ready(function(){
$("#edit").click(function(){

$("#myModal").modal({backdrop: "static"});
        });
});
</script>

<?php include 'footer.php';?>