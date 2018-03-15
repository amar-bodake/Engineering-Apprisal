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
              <div class="form-bootstrapWizard">
                 <div class="row">
                 <div class="col-md-12 text-center"><h2>Your Appraisal Form Status</h2></div>
                 </div>
                   <div class="row" style = "margin-top:3%;margin-bottom:3%;">

                                     
                                    <?php 

                                       $reject_status = $form_total['reject_status'];


                                      if($form_total['form_total'] == '1') 
                                      {
                                      $sca = '1';
                                      $pda = '0';
                                      $rc = '0';
                                      $ahp = '0';
                                      $my = '0';
                                      } 

                                      else if($form_total['form_total'] == '3') 
                                      {
                                      $sca = '1';
                                      $pda = '1';
                                      $rc = '0';
                                      $ahp = '0';
                                      $my = '0';
                                      } 

                                      else if($form_total['form_total'] == '6') 
                                      {
                                      $sca = '1';
                                      $pda = '1';
                                      $rc = '1';
                                      $ahp = '0';
                                      $my = '0';
                                      } 

                                      else if($form_total['form_total'] == '10') 
                                      {
                                      $sca = '1';
                                      $pda = '1';
                                      $rc = '1';
                                      $ahp = '1';
                                      $my = '0';
                                      }

                                      else
                                      {
                                       $sca = '0';
                                      $pda = '0';
                                      $rc = '0';
                                      $ahp = '0';
                                      $my = '0';

                                      }

                                    ?>
                                    <ul class="bootstrapWizard form-wizard">
                                        <?php 
                                         $forward_status = $form_total['forward_status'];
                                       
                                        ?>
                                        <li <?php echo ($sca == '1') ? "class='active'" : ""; ?> >
                                            <a> <span class="step">1</span> <span class="title">SCA Submit</span> </a>
                                        </li>
                                        <li <?php echo ($pda == '1') ? "class='active'" : ""; ?>>
                                            <a> <span class="step">2</span> <span class="title">PDA Submit</span> </a>
                                        </li>
                                        <li <?php echo ($rc == '1') ? "class='active'" : ""; ?>>
                                           <a> <span class="step">3</span> <span class="title">RC Submit</span> </a>
                                        </li>
                                        <li <?php echo ($ahp == '1') ? "class='active'" : ""; ?>>
                                            <a> <span class="step">4</span> <span class="title">AHP Submit</span> </a>
                                        </li>
                                          <li <?php echo ($forward_status == '1') ? "class='active'" : ""; ?>>
                                            <a> <span class="step">5</span> <span class="title">Forward Appraisal</span> </a>
                                        </li>


                                    </ul>
                                    <div class="clearfix"></div>
                                

                            </div>

                            <div class="row" style = "margin-top:3%;margin-bottom:3%;">
                            <div class="span7 text-center" >
                            
                            <a href = "<?php echo base_url();?>index.php/apraisal_form/sca_submit_form"> <button type="button" class="btn-lg btn-primary text-center" <?php if( ( $reject_status == 1)) {?> style ="display:none" <?php } ?>>Go</button> </a>
                            </div>

                            <div class="span7 text-center" >
                            
                            <a href = "<?php echo base_url();?>index.php/apraisal_form/update_sca"> <button type="button" class="btn-lg btn-primary text-center" <?php if( ( $reject_status == 0)) {?> style ="display:none" <?php } ?>>Update Rejected</button> </a>
                            </div>

                            <div class="span7 text-center" style = "margin-top:3%">
                            <a href = "<?php echo base_url();?>index.php/apraisal_form/submited"> <button type="button" class="btn-lg btn-primary text-center"  <?php if( ( $ahp == 0 || $forward_status == 1)) {?> style ="display:none" <?php } ?>>Forward</button> </a>
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