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
                <div class="col-md-6"><h3>Profile</h3></div>
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

      <div class="dashboard-content">

        <div class="row">
      <button id = "edit" type="" class="btn  btn-raised btn-black">Edit Profile</button>
     </div>
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
      <td> <?php echo $emp_code; ?></td>
    
    </tr>


     <tr>
      <th scope="row">2</th>
      <td>Employee Name</td>
      <td> <?php echo $name; ?></td>
    
    </tr>

    <tr>
      <th scope="row">3</th>
      <td>Email</td>
      <td><?php echo $email; ?></td>
    </tr>

     <tr>
      <th scope="row">4</th>
      <td>Institute</td>
      <td><?php echo $institute_id; ?></td>
    </tr>

    <tr>
      <th scope="row">5</th>
      <td>Department</td>
      <td><?php echo $department_id; ?></td>
    </tr>

     <tr>
      <th scope="row">6</th>
      <td>Designation</td>
      <td> <?php echo $designation_id; ?></td>
    </tr>

    <tr>
      <th scope="row">7</th>
      <td>Date of Joining</td>
      <td><?php echo $date_of_joining; ?></td>
    </tr>

     <tr>
      <th scope="row">8</th>
      <td>Date of Leaving</td>
      <td><?php echo $date_of_leaving; ?></td>
    </tr>

     <tr>
      <th scope="row">9</th>
      <td>Last Login In</td>
      <td><?php echo $last_login_in; ?></td>
    </tr>
</tbody>
</table>
</div>
</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <!-- Modal Body start -->
      <div class="modal-body">
      
      <h6 style = "color:red"> <?php echo validation_errors(); ?> </h6>
   <fieldset>
     <div class="col-md-12 text-left">
      <hr/>
    <form  role="form" action='<?= base_url();?>index.php/profile/profile_view' method="post">
     <div class="form-group row">
        <label for="emp_code" class="col-lg-3 control-label">Employee Code</label>
        <div class="col-lg-6">
          <input type="text" value= "<?php echo $this->session->userdata('emp_code')?>" class="form-control" name="emp_code" id="emp_code" placeholder="Employee Code" disabled> 
        </div>
      </div> 

      <div class="form-group row">
        <label for="email" class="col-lg-3 control-label">Email</label>
        <div class="col-lg-6">
          <input type="text"  value= "<?php echo $this->session->userdata('username')?>" class="form-control" name="email" id="email" placeholder="Email" disabled>
        </div>
      </div>

      <div class="form-group row">
        <label for="name" class="col-lg-3 control-label">Name</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="name" id="name" placeholder="Name" value= "<?php echo $name ?>">
        </div>
      </div>
       
     
       <div class="form-group row">
        <label for="institute_id" class="col-lg-3 control-label">Institute</label>
        <div class="col-lg-6">
          <?php echo form_dropdown('inst', $inst, set_value('inst'), 'class="form-control"') ?>
          
        
        </div>
      </div>

       <div class="form-group row">
        <label for="designation_id" class="col-lg-3 control-label">Designation</label>
        <div class="col-lg-6">
          <?php echo form_dropdown('des', $des, set_value('des'), 'class="form-control"') ?>
        </div>
      </div>

        <div class="form-group row">
        <label for="doj" class="col-lg-3 control-label">Date of Joining</label>
        <div class="col-lg-6">
          <input type="text" id = "doj" class="form-control datepicker"  placeholder="Date Of Joining" name="doj" value= "<?php  echo $date_of_joining;?>"/>
        </div>
      </div>

       <div class="form-group row">
        <label for="dol" class="col-lg-3 control-label">Date of Leaving</label>
        <div class="col-lg-6">
           <input type="text" id = "dol"  class="form-control datepicker"  placeholder="Date Of Leaving" name="dol" value= "<?php  echo $date_of_leaving;?>"/>
        </div>
      </div>
      
      <!--<div class="form-group">
        <label for="Role" class="col-lg-3 control-label">Role</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="role_id" id="role_id" placeholder="Role">
        </div>
      </div>-->


      <div class="form-group row">
        <label for="dep" class="col-lg-3 control-label">Department</label>
        <div class="col-lg-6">
         <?php echo form_dropdown('dep', $dep, set_value('dep'), 'class="form-control"') ?>
        </div>
      </div>


      <hr>

      <div class="form-group row">
        <div class="col-lg-offset-3 col-lg-10">
          <button type="submit" id = "sub" class="btn btn-raised btn-black">Save</button>
           <button type="reset"  class="btn btn-raised btn-black">Reset</button>
        </div>
      </div>
    </form>
    </div>
   </fieldset>
                       
      </div>

       <!-- Modal Body End -->

      <div class="modal-footer">
        <button type="button" class="btn btn-raised btn-black" data-dismiss="modal">Close</button>
      </div>
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