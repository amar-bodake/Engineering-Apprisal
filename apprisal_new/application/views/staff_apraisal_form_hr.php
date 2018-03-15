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
                <div class="col-md-6"><h3>Staff Appraisal</h3></div>
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

  <script type="text/javascript">
  $(document).ready(function(){
    $('button[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('button[href="' + activeTab + '"]').tab('show');
    }
  });
  </script>

  <div class="container wrapper-dashboard-content">
  <div class="row">
    <div class="col-md-12">

                  <div class="col-md-12" style = "margin-top:2%">
                  <div class="col-sm-12">
                     <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                  
                        <div class="btn-group" role="group">
                            <button type="button" id="favorites" class="btn btn-default" href="#approved" data-toggle="tab"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                                <div class="hidden-xs">Approved Appraisal</div>
                            </button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="following" class="btn btn-default" href="#filed" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                <div class="hidden-xs">Filed Appraisal</div>
                            </button>
                        </div>
                    </div>

                    <div class="well">
                            <div class="tab-content">

                                   <!--Staff Approve-->
                                  <div class="tab-pane fade in active" id="approved">
                                   
                                   <form class="form-inline" action="<?php echo base_url();?>/index.php/apraisal_form/filter_apraisal" method="post" style = "<?php if($role == 1 || $role == 2) echo "display: none";?>">
                                    <select class="form-control" name="field">
                                        <option selected="selected" disabled="disabled" value="">Filter By</option>
                                        <option value="id">ID</option>
                                        <option value="name">Name</option>
                                       
                                    </select>
                                    <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                                    <input class="btn btn-primary" type="submit" name="filter" value="Go">
                                  </form>
                                          <?php

                                         // print_r($stafs_aprv);
                                         // die;
                                              if (count($stafs_aprv)) {

                                                               
                                             echo '<table class="table table-striped table-hover ">';
                                             echo  '<thead>';
                                             echo '<tr>';
                                             echo '<th>Sr.No</th>';
                                             echo  '<th>Employee ID</th>';
                                             echo  '<th>Employee Name</th>';
                                             echo  '<th>Date Of PI </th>';
                                              echo '<th>Action View</th>';
                                              if( $role == 0)
                                              {
                                               echo '<th>Action Filed</th>';
                                               echo '<th>Action Print</th>';
                                               }
                                              if( $role == 1)
                                              {
                                               echo '<th>Action Reject</th>';
                                              }
                                              
                                             echo '</tr>';


                                             echo '</thead>';




                                              $i = 1;
                                              foreach ($stafs_aprv as $key => $list) 
                                              {
                                               echo "<tr class = 'tab'>";
                                               echo "<td>".$i."</td>";
                                               echo "<td>".$list['emp_code']."</td>";
                                               echo "<td>".$list['name']."</td>";
                                               echo "<td>".$list['date_of_pi_creation']."</td>";
                                               //echo '<td><a href = "view_apraisal/'.$list['emp_code'].'"><button type="button" class="btn btn-raised btn-primary button1">View</button></a></td>';

                                               echo '<td><a href = '.base_url().'index.php/apraisal_form/view_apraisal/'.$list['emp_code'].'><button type="button" class="btn btn-raised btn-primary button1">View</button></a></td>';
                                               

                                               if($role == 0)
                                               {
                                               echo '<td><a href = '.base_url().'index.php/apraisal_form/forward_apraisal/'.$list['emp_code'].'><button type="button" class="btn btn-raised btn-success button1">Filed</button></a></td>';
                                                
                                                echo '<td><a href = '.base_url().'index.php/apraisal_form/print_apraisal/'.$list['emp_code'].'/'.$list['pi_id'].'><button type="button" class="btn btn-raised btn-warning button1">Print</button></td>';
                                                echo "</tr>";
                                                }

                                                if($role == 1)
                                                {
                                                echo '<td><a href = '.base_url().'index.php/apraisal_form/reject_apraisal/'.$list['emp_code'].'><button type="button" class="btn btn-raised btn-danger button1">Reject</button></td>';
                                                  echo "</tr>";
                                                } 

                                             
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
                            
                                  
                                  <!--Staff filed-->
                                <div class="tab-pane fade in" id="filed">
                                          
                                   <form class="form-inline" action="<?php echo base_url();?>/index.php/apraisal_form/filter_apraisal" method="post" style = "<?php if($role == 1 || $role == 2) echo "display: none";?>">
                                    <select class="form-control" name="field">
                                        <option selected="selected" disabled="disabled" value="" >Filter By</option>
                                        <option value="id">ID</option>
                                        <option value="name">Name</option>
                                       
                                    </select>
                                    <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                                    <input class="btn btn-primary" type="submit" name="filter" value="Go">
                                </form>

                                         <?php

                                             //print_r($stafs_filed);
                                            // die;
                                              if (count($stafs_filed)) {

                                                               
                                             echo '<table class="table table-striped table-hover ">';
                                             echo  '<thead>';
                                             echo '<tr>';
                                             echo '<th>Sr.No</th>';
                                             echo  '<th>Employee ID</th>';
                                             echo  '<th>Employee Name</th>';
                                             
                                              echo  '<th>Date Of PI </th>';
                                              
                                              echo '<th>Action View</th>';
                                              
                                             if($role == 0)
                                             {
                                              echo '<th>Action Print</th>';

                                              } 

                                              if($role == 1)
                                              {
                                                 echo '<th>Action Reject</th>';  
                                              }
                                              
                                             echo '</tr>';


                                             echo '</thead>';




                                              $i = 1;
                                              foreach ($stafs_filed as $key => $lists) 
                                              {

                                               echo "<tr class = 'tab'>";
                                               echo "<td>".$i."</td>";
                                               echo "<td>".$lists['emp_code']."</td>";
                                               echo "<td>".$lists['name']."</td>";
                                               echo "<td>".$lists['date_of_pi_creation']."</td>";
                                               //echo '<td><a href = "view_apraisal/'.$list['emp_code'].'"><button type="button" class="btn btn-raised btn-primary button1">View</button></a></td>';

                                               echo '<td><a href = '.base_url().'index.php/apraisal_form/view_apraisal/'.$lists['emp_code'].'><button type="button" class="btn btn-raised btn-primary button1">View</button></a></td>';
                                               


                                               if($role == 0)
                                                {
                                               echo '<td><a href = '.base_url().'index.php/apraisal_form/print_apraisal/'.$lists['emp_code'].'/'.$lists['pi_id'].'><button type="button" class="btn btn-raised btn-warning button1">Print</button></td>';
                                                echo "</tr>";
                                                 }

                                                if($role == 1)
                                                {
                                                 echo '<td><a href = '.base_url().'index.php/apraisal_form/reject_apraisal/'.$lists['emp_code'].'/'.$lists['pi_id'].'><button type="button" class="btn btn-raised btn-danger button1">Reject</button></td>';
        
                                                echo "</tr>";
                                                }

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
                        

            </div>
      </div>
   </div>
</div>


  
<?php include 'footer.php';?>
