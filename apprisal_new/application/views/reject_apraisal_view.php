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
                <div class="col-md-6"><h3>Apprisal/Rejection</h3></div>
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
     
  

  <div class="row">
    <div class="col-md-12">

      <div class="dashboard-content">

        <h1>Appraisal Rejection<h1>

        <?php $code = $this->uri->segment(3);

            $newdata = array(
            'user'  => $code
             
            );

            $this->session->set_userdata($newdata);

      


        ?>

        <form  role="form" action='<?= base_url();?>index.php/apraisal_form/reject_apraisal/' method="post">
               <div class="col-md-10 text-left">
                        <hr/>
                            <form action='<?= base_url();?>index.php/login/valid_creadentail' method="post">
                                <div class="form-group label-floating">
                                    <label for="empcode"  class="control-label">Comment</label>
                                    <input type="text" class="form-control"   id="comment" name="comment">
                                    <span class="help-block">Please enter your valid<code>Comment</code></span>
                                    
                                </div>
                                 <h6 style = "color:red;"> <?php echo validation_errors(); ?></h6>

                                <div class="form-group">
                                    <button type="submit" id = "sub" class="btn btn-raised btn-warning">Save</button>
                                    <button type="reset"  class="btn btn-raised btn-warning">Reset</button>
                                </div>


               </div>
      </form>


    </div>
    
  </div>
  </div>




</div>



<?php include 'footer.php';?>