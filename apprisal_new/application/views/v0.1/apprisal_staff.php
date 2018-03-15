<?php

 $code = base64_decode($this->uri->segment(3));
 $role = $this->session->role_id;
 $ayear = trim($this->session->ayear);



 if (empty($code))
      { 

        $emp_code1 = $this->session->emp_code;  

      }

      else
      {
         $emp_code1 = $code; 
      }


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
                $profile_img1 = $row->profile_img;
                $mobile =  $row->mobile;

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

       

       $this->db->select('*');
       $this->db->from('approvals');
       $this->db->where('approval_id', $sca_id);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $status_hod = $row->status_hod;
                  $status_principal = $row->status_principal;

             }
          } 

          else
          {

                  $status_principal = -1;  
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
                <h3>Performance Appraisal <small>Year <?php echo $ayear;?></small></h3>
              </div>
            </div>

             <div class="clearfix"></div>

             <div class="row" style="margin-top: 25px;">
              
                    <div class="col-md-3">
               <div class="">
                 <div class="x_panel">
                   <div class="x_title">
                    <h2><i class="fa fa-info-circle"></i> Calculations Guide</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <ul class="list-unstyled timeline widget">
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                            <a>Faculty has to complete the appraisal under the mentioned 4 heads.</a>
                            </h2>                            
                           <p>Student Centric Activities (SCA)</p>
                              <p>Professional Developement & Academic Contribution (PDAC)</p>
                              <p>Research Contribution (RC)</p>
                              <p>Assessment by HOD/Princiapl (AHP)</p><br>
                          </div>
                        </div>
                      </li>
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                 <a>The total scores for each will be automatically calculated and Performance Indicator will reflect depending on the grade/profile of the Faculty.</a>
                            </h2>                            
                          </div>
                        </div>
                      </li>
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                               <a>Only after all segments are complete, the faculty can submit the form.</a>
                            </h2>                            
                          </div>
                        </div>
                      </li>
                  </ul>              
                  </div>
                 </div>
               </div>
             </div>


              <div class="col-md-9">
              <div class="">

                <div class="x_panel">                  
                  <div class="x_title">
                    <h2><i class="fa fa-pie-chart"></i> Performance Appraisal Forms <small>Year <?php echo $ayear?></small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
           
                  <address>

                  <div class="col-md-12">
                       
                            <div class="profile_pic col-md-4" style = "margin-top:-20px height:30%;width:30%">
                            <img src="<?php echo base_url();?>uploads/<?php echo $profile_img1; ?>" alt="..." class="img-circle profile_img">
                           </div>
                     
                    <div class="col-md-8">
                      <strong><?php echo $name1;?></strong>
                      <br><strong><?php echo $des1?></strong>
                      <br>Emp Code : <?php echo $emp_code1;?>
                      <br><?php echo $inst1?>
                      <br><?php echo $dept1?>
                      <br><?php echo $email1?>
                      <br><?php echo $mobile?>
                    </div>
                      </div>

                  </address>
                     <form action = "<?php echo base_url();?>index.php/Apraisal_form/submit_assesement" method="post">
                     <div class="form-group">
                        <label for="Appraisal ID">Appraisal ID</label>         
                     </div>
                     <div class="form-group">
                               <input style="width:10%;" type="text" class="form-control input-md" readonly="readonly" placeholder="SCA" name = "sca_id" value="<?php if(!isset($sca_id) || $sca_id == -1 ) { echo 'To Do'; } else { echo $sca_id; } ?>">
                     </div>
                    <table class="table table-striped projects">

                      <thead>
                        <tr>
                          <th style="width:10%;" class="text-center">Status</th>
                          <th>Assessment Head</th>
                          <th style="width:20%;">Self Evaluation</th>  
                           <th style="width:20%;">HOD Evaluation</th>  
                           <th style="width:20%;">Final Score</th>

                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                          <?php
                           if(!isset($sca2) || $sca2 == -1 )
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
                              <a href="<?php echo base_url();?>index.php/Apraisal_form/sca_submit_form/<?php echo base64_encode($code);?>" class="text-primary" data-toggle="tooltip" data-placement="top" title="Click To Visit The SCA-Form">Student Centric Activities (SCA)</a>
                            </h5>
                          </td>
                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" placeholder="SCA" name = "sca" value="<?php if(!isset($sca) || $sca == -1 ) { echo 'To Do'; } else { echo $sca; } ?>">
                            </div>
                          </td>

                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" placeholder="SCA2" name = "sca2" value="<?php if(!isset($sca2) || $sca2 == -1 ) { echo 'To Do'; } else { echo $sca2; } ?>">
                            </div>
                          </td>

                            <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" placeholder="SCA"  name = "scale_sca" value="<?php if(!isset($sca2) || $sca2 == -1 ) { echo 'To Do'; } else { echo $scale_sca; } ?>">
                            </div>
                          </td>
                          
                        </tr>

                        <tr>
                           <?php


                           if(!isset($pdac2) || $pdac2 == -1 )
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
                                <input type="text" class="form-control input-md" readonly="readonly" placeholder="SCA"  name = "pdac" value="<?php if(!isset($pdac) || $pdac == -1) { echo 'To Do'; } else { echo $pdac; } ?>">
                            </div>
                          </td>

                           <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" placeholder="SCA"  name = "pdac2" value="<?php if(!isset($pdac2) || $pdac2 == -1) { echo 'To Do'; } else { echo $pdac2; } ?>">
                            </div>
                          </td>

                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" placeholder="SCA"  name = "scale_pdac" value="<?php if(!isset($pdac2) || $pdac2 == -1) { echo 'To Do'; } else { echo $scale_pda; } ?>">
                            </div>
                          </td>
                          
                        </tr>

                        <tr>
                        <?php
                           if(!isset($rc2) || $rc2 == -1 )
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
                                <input type="text" class="form-control input-md" readonly="readonly"  name = "rc" value ="<?php if(!isset($rc) || $rc == -1) { echo 'To Do'; } else { echo $rc; } ?>">
                            </div>
                          </td>

                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly"  name = "rc2" value ="<?php if(!isset($rc2) || $rc2 == -1) { echo 'To Do'; } else { echo $rc2; } ?>">
                            </div>
                          </td>

                            <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" name = "scale_rc" value ="<?php if(!isset($rc2) || $rc2 == -1) { echo 'To Do'; } else { echo $scale_rc; } ?>">
                            </div>
                          </td>
                          
                        </tr>

                        <tr>
                          <?php
                           if(!isset($ahp2) || $ahp2 == -1 )
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
                                <input type="text" class="form-control input-md" readonly="readonly" name = "ahp" value = "<?php if(!isset($ahp) || $ahp == -1) { echo 'NA'; } else { echo $ahp; } ?>">
                            </div>
                          </td>

                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly" name = "ahp2" value = "<?php if(!isset($ahp2) || $ahp2 == -1) { echo 'To Do'; } else { echo $ahp2; } ?>">
                            </div>
                          </td>

                           <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-md" readonly="readonly"  name = "scale_ahp" value = "<?php if(!isset($ahp2) || $ahp2 == -1) { echo 'To Do'; } else { echo $scale_ahp; } ?>">
                            </div>
                          </td>
                          
                        </tr>

                         <tr>
                          <td colspan="2">
                            <h4 class="text-right">
                              <strong>Performance Indicator (PI)</strong>
                              <br/> <small>Based on HOD Evaluation &amp; Designation</small>
                            </h4>
                          </td>
                          <td>
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" name = "fpi" readonly="readonly" value="<?php if((!isset($ahp2) || $ahp2 == -1)) { echo 'To Do'; } else { echo $fpi; } ?>">

                                <br/> <small> <?php if(isset($grade)) { echo $grade; } ?></small>


                            </div>
                          </td>
                        </tr>
                   
                   
                      </tbody>
                    </table>
                     </div>
                 
                    <?php if(($role == 3 && $status_hod != 1) || ($role == 2 && $status_principal != 1)){ ?>
                     <p>
                      <label>Please Comment, if the above PI score is <em><u>Outstanding</u></em> or <em><u>Below Average</u></em></label>
                      <textarea class="form-control" name = "hod_comment" type = "text" class="resizable_textarea form-control" placeholder="..."></textarea>
                    </p>

                      <?php } 
                      ?> 
                 

                     
                    <div class="ln_solid"></div>

                    <?php if(($role == 3 && $status_hod != 1) || ($role == 2 && $status_principal != 1)){ ?>

                    <?php if(isset($sca2)  && isset($rc2) && isset($pdac2) &&  isset($ahp2) && $sca2!=-1 && $pdac2 !=-1 && $rc2!=-1 && $ahp2 !=-1){ ?>

                    <p class="text-right" style = "margin-bottom: 4%">
                      <button class="btn btn-success btn-lg" type="submit">Submit Staff Appraisal <i class="fa fa-check-circle"></i></button>                     
                    </p>



                     <?php } 
                      ?> 

                       <?php } 
                      ?> 

                  </form>

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
});
</script>