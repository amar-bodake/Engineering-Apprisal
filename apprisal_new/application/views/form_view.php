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
                <div class="col-md-6"><h3>Appraisal</h3></div>
                <div class="col-md-6 text-right"> 
                  <?php

                  // I'm India so my timezone is Asia/Calcutta
                        date_default_timezone_set('Asia/Calcutta');

                        // 24-hour format of an hour without leading zeros (0 through 23)
                        $Hour = date('G');
                        $wtxt = "";
                        if ( $Hour >= 5 && $Hour < 12 ) {
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
            <div class="col-md-6 text-center"><h3></h3></div>


           <div class="col-md-12 text-center">
      <hr/>
       <form style="margin-top: 100px;" id = "frm_details" action = "<?php echo base_url();?>index.php/Serialize_form/insertcategory" method = "POST">
         <div class="form-group row">
        <label for="emp_code" class="col-lg-3 control-label">Score SCA</label>
        <div class="col-lg-6">
          <input type="text" value= "" class="form-control" name="score_sca" id="score_sca" placeholder="Score SCA"> 
        </div>
      </div>

       <div class="form-group row">
        <label for="emp_code" class="col-lg-3 control-label">Score PDAC</label>
        <div class="col-lg-6">
          <input type="text" value= "" class="form-control" name="score_pdac" id="score_pdac" placeholder="Score PDAC" > 
        </div>
      </div>

       <div class="form-group row">
        <label for="emp_code" class="col-lg-3 control-label">Score RC</label>
        <div class="col-lg-6">
          <input type="text" value= "" class="form-control" name="score_rc" id="score_rc" placeholder="Score RC"> 
        </div>
      </div>


        <div class="form-group row">
        <label for="emp_code" class="col-lg-3 control-label">Score AHP</label>
        <div class="col-lg-6">
          <input type="text" value= "" class="form-control" name="score_ahp" id="score_ahp" placeholder="Score AHP"> 
        </div>
       </div>


  
        
      <div class="form-group row">
        <div class="col-lg-offset-3 col-lg-10">
          <button type="submit" id = "sub" class="btn btn-raised btn-warning">Save</button>
           <button type="reset"  class="btn btn-raised btn-warning">Reset</button>
        </div>
      </div>
        </form>

        <script>
       $(function() {
            
                $("#frm_details").on("submit", function(event) {
                
                 // event.preventDefault();
                    var url1 = "<?php echo base_url();?>";
                   
                    $.ajax({
                        url: "<?php echo base_url();?>index.php/Serialize_form/insertcategory",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function(d) {
                            
                          

                        }

                    });
                });
            });
            
       
        </script>