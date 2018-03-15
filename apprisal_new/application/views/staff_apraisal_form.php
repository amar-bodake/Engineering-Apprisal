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
?>
   <!-- title message -->
        <div class="container wrapper-title">
            <div class="row">
                <div class="col-md-6"><h3>Notifications/Staff Appraisal</h3></div>
                <div class="col-md-6 text-right">
                  <?php

                  // I'm India so my timezone is Asia/Calcutta
                        date_default_timezone_set('Asia/Calcutta');

                        // 24-hour format of an hour without leading zeros (0 through 23)
                        $Hour = date('G');
                        $wtxt = "";
                        if ( $Hour >= 5 && $Hour <12 ) {
                             $wtxt =  "Good Morning";
                             
                        } else if ( $Hour >= 12 && $Hour < 16 ) {
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

  <div class="container wrapper-dashboard-content">
  <div class="row">
    <div class="col-md-12">
    <div class="dashboard-content">
     
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
</div>
</div>

  
<?php include 'footer.php';?>
