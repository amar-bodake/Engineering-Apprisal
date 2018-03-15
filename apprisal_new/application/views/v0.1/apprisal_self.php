<?php

$role = $this->session->role_id;
$year = $this->session->ayear;
 
$emp_code1 = $this->session->emp_code; 
$code = $this->session->emp_code;  

      $this->db->select('*');
      $this->db->from(' employee');
      $this->db->where('emp_code', $emp_code1);
      $query = $this->db->get();
     
       
        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {

                $name1 = $row->name;
                $institute_id1 = $row->institute_id;
                $designation_id1 = $row->designation_id;
                $department_id1 = $row->department_id;
                $email1 =  $row->email;
                $profile_img = $row->profile_img;
             }

          }


      $this->db->select('*');
      $this->db->from(' designations');
      $this->db->where('id', $designation_id1);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $des1 = $row->name;
             }
          }


       $this->db->select('*');
       $this->db->from('institutes');
       $this->db->where('id', $institute_id1);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $inst1 = $row->name;
             }
          }


        $this->db->select('*');
       $this->db->from('department');
       $this->db->where('id', $department_id1);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $dept1 = $row->title;
             }
          }
      


?>



<?php include 'header.php';?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';?> 
      <!-- /top navigation -->

        <!-- page content -->
    <!-- page content -->
        <div class="right_col" role="main">        
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>Performance Appraisal <small>Year <?php echo $year;?></small></h3>
              </div>
            </div>

             <div class="clearfix"></div>

             <div class="row" style="margin-top: 25px;">
              
                <div class="row" style="margin-top: 25px;">
              
             <div class="col-md-4">
               <div class="">
                 <div class="x_panel">
                   <div class="x_title">
                    <h2><i class="fa fa-info-circle"></i> Guidelines</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <ul class="list-unstyled timeline widget">
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>Faculty has to complete the appraisal under the mentioned 3 heads.</a>
                                          </h2>                            
                            <p class="excerpt" style="padding-top: 10px;"> </p>
                            
                              <p>Student Centric Activities (SCA)</p>
                              <p>Professional Developement & Academic Contribution (PDAC)</p>
                              <p>Research Contribution (RC)</p>
                            
                           
                           
                          </div>
                        </div>
                      </li>
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                               <a>The total scores for each will be automatically calculated and Performance Indicator will reflect depending on the grade/profile of the Faculty.</a>
                            </h2><br>                            
                            
                          </div>
                        </div>
                      </li>
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                              <a>Only after all segments are complete, the faculty can submit the form.</a>
                            </h2> <br>                        
                          
                          </div>
                        </div>
                      </li>
                  </ul>              
                  </div>
                 </div>
               </div>
             </div>


              <div class="col-md-8">
              <div class="">
                <div class="x_panel">                  
                  <div class="x_title">
                    <h2><i class="fa fa-pie-chart"></i> Performance Appraisal Forms <small>Year <?php echo $year;?></small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

           
                  <address>
                    <div class="col-md-12">

                           <div class="profile_pic col-md-4" style = "margin-top:-22px height:30%;width:30%">
                            <img src="<?php echo base_url();?>uploads/<?php echo $profile_img; ?>" alt="..." class="img-circle profile_img">
                           </div>

                           <div class="col-md-8">
                              <strong><?php echo $name1;?></strong>
                              <br><strong><?php echo $des1?></strong>
                              <br>Emp Code : <?php echo $emp_code1;?>
                              <br><?php echo $inst1?>
                              <br><?php echo $dept1?>
                              <br><?php echo $email1?>
                          </div>
                    </div>
                  </address>

                 
                 
                   <?php if ($reject_status == 1) { ?>
                    <div class = "approval">
                      <h4 style = "color:red;"><small>Your Apprisal is </small>Disapproved by Vice - President <small>saying</small>  <?php echo $vp_comment;?> <small>Click below to start new one...</small></h4>
                     <?php
                      echo '<a href='.base_url().'index.php/apraisal_form/refill/'.' class="btn btn-info btn-xs"><i class="fa fa-file"></i> Start New </a>';
                      ?>                     
                    </div>

                     <?php } else { ?>
                    <div class = "approval" ng-app="" style="padding-bottom:100px;">
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width:10%;" class="text-center">Status</th>
                          <th>Assessment Head</th>
                          <th style="width:20%;">Self Evaluation</th>  
                         

                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                          <?php
                           if(!isset($sca) || $sca == -1 )
                           {
                              echo  '<td><a class="btn btn-dark btn-block btn-md">To Do <i class="fa fa-exclamation"></i></a></td>';
                           }

                          else
                          {
                          
                            echo '<td><a class="btn btn-success btn-block btn-md">Done <i class="fa fa-check-circle"></i></a></td>'; 
                          }

                        ?>
                        
                          <td>
                            <h5>
                              <a href="<?php echo base_url();?>index.php/Apraisal_form/sca_submit_form/<?php echo  base64_encode($code);?>" class="text-primary" data-toggle="tooltip" data-placement="top" title="Click To Visit The SCA-Form">Student Centric Activities (SCA)</a>
                            </h5>
                          </td>
                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" placeholder="SCA" value="<?php if(!isset($sca) || $sca == -1 ) { echo 'To Do'; } else { echo $sca; } ?>">
                            </div>
                          </td>

                         
                          
                        </tr>

                        <tr>
                           <?php
                           if(!isset($pdac) || $pdac == -1 )
                           {
                              echo  '<td><a class="btn btn-dark btn-block btn-md">To Do <i class="fa fa-exclamation"></i></a></td>';
                           }

                          else
                          {
                          
                            echo '<td><a class="btn btn-success btn-block btn-md">Done <i class="fa fa-check-circle"></i></a></td>'; 
                          }

                        ?>


                          <td>
                            <h5>
                              <a href="<?php echo base_url();?>index.php/Apraisal_form/pda_submit_form/<?php echo base64_encode($code);?>" class="text-primary" data-toggle="tooltip" data-placement="top" title="Click To Visit The PDAC-Form">Professional Development &amp; Academic Contribution (PDAC)</a>
                            </h5>
                          </td>
                          
                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" placeholder="SCA" value="<?php if(!isset($pdac) || $pdac == -1) { echo 'To Do'; } else { echo $pdac; } ?>">
                            </div>
                          </td>

                           
                          
                        </tr>

                        <tr>
                        <?php
                           if(!isset($rc) || $rc == -1 )
                           {
                              echo  '<td><a class="btn btn-dark btn-block btn-md">To Do <i class="fa fa-exclamation"></i></a></td>';
                           }

                          else
                          {
                          
                            echo '<td><a class="btn btn-success btn-block btn-md">Done <i class="fa fa-check-circle"></i></a></td>'; 
                          }

                        ?>
                          <td>
                            <h5>
                              <a href="<?php echo base_url();?>index.php/Apraisal_form/rc_submit_form/<?php echo base64_encode($code);?>" class="text-primary" data-toggle="tooltip" data-placement="top" title="Click To Visit The RC-Form">Research Contribution (RC)</a>
                            </h5>
                          </td>
                         
                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" value ="<?php if(!isset($rc) || $rc == -1) { echo 'To Do'; } else { echo $rc; } ?>">
                            </div>
                          </td>

                         
                          
                        </tr>

                        <tr <?php if ($role == 4){ echo 'style="display:none;"'; } ?>>
                          <?php
                           if(!isset($ahp) || $ahp == -1 )
                           {
                              echo  '<td><a class="btn btn-dark btn-block btn-md">To Do <i class="fa fa-exclamation"></i></a></td>';
                           }

                          else
                          {
                          
                            echo '<td><a class="btn btn-success btn-block btn-md">Done <i class="fa fa-check-circle"></i></a></td>'; 
                          }

                        ?>
                          <td>
                            <h5>
                              <a href="<?php echo base_url();?>index.php/Apraisal_form/ahp_submit_form/<?php echo base64_encode($code);?>" class="text-primary" data-toggle="tooltip" data-placement="top" title="Click To Visit The AHP-Form">Assessment by HOD/Principal (AHP)</a>
                            </h5>
                          </td>
                        
                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" value = "<?php if(!isset($ahp) || $ahp == -1) { echo 'To Do'; } else { echo $ahp; } ?>">
                            </div>
                          </td>

                          
                          
                        </tr>

                         <tr>
                          <td colspan="2">
                            <h4 class="text-right">
                              <strong>Performance Indicator (PI)</strong>
                              <br/><small>Based on Self Evaluation</small>
                            </h4>
                          </td>
                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" readonly="readonly" value="<?php if(!isset($pi) || $pi == -1) { echo 'To Do'; } else { echo $pi; } ?>">
                            </div>
                          </td>
                        </tr>
                   
                      </tbody>
                    </table>


                    
                     <?php if(isset($sca)  && isset($rc) && isset($pdac) &&  isset($ahp) && $sca!=-1 && $pdac !=-1 && $rc!=-1){ ?>
                    
                     <p class="text-right">
                         <div class="checkbox" <?php if($forward_status == 1) echo 'style = display:none';?>  >
                          <label>
                          <input type="checkbox" name = "checkit" ng-model = "checkit" >
                          <b>I hereby certify that all the above information is true and correct to the best of my knowledge and belief.</b>
                        </label>
                       
                         </div>
                     <a  href = "<?php echo base_url();?>index.php/apraisal_form/submited">
                  
                     <button <?php if($forward_status == 1) echo 'style = display:none';?>  class="btn btn-success btn-lg" id = "sub" type="reset" ng-show ="checkit">Submit <i class="fa fa-check-circle"></i></button></a>
                     </p>
                 

                      <?php } 
                       ?> 

                      
                  
                      <p>
                     <?php if($forward_status == 1) echo '<h2 style = "margin-bottom: 5%" class="text-right">submitted</h2>';?>
                     </p>
                   
                  
                   </div>

                   <?php } ?>



                  </div>
                </div>
              </div>
              </div>
              <!-- /.col-md-12 -->

             </div>
             <!-- /.row -->
          </div>
        </div>
        <!-- /page content -->
       
        <!-- /page content -->

        <!-- footer content -->
       <?php include 'footer.php';?>
        <!-- /footer content -->
 

<script>
$(document).ready(function(){
    $("#edit").click(function(){

        $("#myModal").modal({backdrop: "static"});
    });


     $("#sub").click(function(){

          var status = confirm("Are you sure to submit your appraisal ?");
           if(status == false){
           return false;
           }
           else{
           return true; 
           }
     });


 


});



</script>