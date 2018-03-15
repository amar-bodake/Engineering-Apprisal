<?php
 $code = base64_decode($this->uri->segment(3));
 $role = $this->session->role_id;




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
                $fac_role_id =   $row->role_id; 
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
                  $status_vice = $row->status_vice;
                  $status_hr = $row->status_hr;

 
             }
          } 

          else
          {

                  $status_principal = 0;  
          }    
  
          
  

      $this->db->select('*');
      $this->db->from('employee');
      $this->db->where('emp_code', $approval_officer);
      $query = $this->db->get();
     
       
        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {

                $hod = $row->name;
                $hod_inst = $row->institute_id;
                
             }

          }

          else
          {
            $hod = 'NA';
            $hod_inst = 'NA'; 
          }


      $this->db->select('*');
      $this->db->from('institutes');
      $this->db->where('id', $hod_inst);
      $query = $this->db->get();
     
       
        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {

                $principal_id = $row->principal_id;
               
                
             }

          }

           else
          {
            $principal_id = 'NA';
           
          }


      $this->db->select('*');
      $this->db->from('employee');
      $this->db->where('emp_code', $principal_id);
      $query = $this->db->get();
     
       
        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {

                $principal = $row->name;
                
                
             }

          }

          else
          {
            $principal = 'NA'; 
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
          <h3>Report <small>Analysis</small></h3>
 <small></small></h3>
        </div>
      </div>  
      <div class="clearfix"></div>

         
             <div class="row">
              <div class="col-md-12">
                <div class="x_panel">                  
                  <div class="x_content">
                    <section class="content invoice">

                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-globe"></i> Performance Appraisal
                                          <small class="pull-right">Appraisal ID 

                                          <a><strong>#<?php echo $sca_id?></strong></a></small>
                          </h1>
                          <h6>
                         
                          </h6>
                        </div>
                        <!-- /.col -->


                      </div>

                       <div class="row">
                       <?php if($role_id != 3 ){ ?>
                       <p class="pull-right">
                       <?php
                         echo '<a href='.base_url().'index.php/apraisal_form/view_staff_apraisal/'.base64_encode($emp_code1).' class="btn btn-dark btn-xs" ><i class="fa fa-globe"></i> Show Appraisal </a>'; 
                        ?>
                        </p>
                          <?php }?> 

                        </td>

                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-8 invoice-col">
                          of
                          <address>
                                          <strong><?php echo $name1;?></strong>
                                          <br/><strong><?php echo $des1?></strong>
                                          <br>Emp Code : <?php echo $emp_code1;?>
                                          <br><?php echo $inst1?>
                                          <br><?php echo $dept1?>
                                          <br><?php echo $email1?>

                          </address>
                        </div> 
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->


                      <div class="row">
                        <div class="col-md-12">


                          <p>Congratulations ! </p>

                           <p>Your Performance Appraisal for Academic Year <?php echo $ayear; ?> has been submitted and evaluated as per Self evaluation,  <?php if ($fac_role_id == 4): ?>HOD and Principal  <?php endif; ?>
                           <?php if ($fac_role_id == 3): ?>Principal  <?php endif; ?>
                          <?php if ($fac_role_id == 2): ?>Vice President  <?php endif; ?>


                            review. </p>

                          <p>The performance has been marked as <b> "<?php if(isset($grade)) { echo $grade; } ?> " </b></p>
                        </div>
                      </div>
                      <!-- /.row -->

                      <?php if ($fac_role_id == 4): ?>

                      <div class="row"  <?php if ($role == 3): ?> style = "display:none;"  <?php endif; ?>>                        
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Assessment Head</th>
                                <th>Self Evaluation</th>
                                <th>HOD Evaluation</th>
                                <th>Scaled Score</th>
                                
                              </tr>                               
                            </thead>
                            <tbody>
                              <tr>
                                <td>Student Centric Activities (SCA)</td>
                                <td><?php if(!isset($sca) || $sca == 0 ) { echo '0'; } else { echo $sca; } ?></td>
                                <td><?php if(!isset($sca2) || $sca2 == 0 ) { echo '0'; } else { echo $sca2; } ?></td>
                                <td><?php if(!isset($sca2) || $sca2 == 0 ) { echo '0'; } else { echo $scale_sca; } ?></td>
                               
                              </tr>
                              <tr>
                                <td>Professional Developement &amp; Academic Contribution (PDAC)</td>
                                <td><?php if(!isset($pdac) || $pdac == 0) { echo '0'; } else { echo $pdac; } ?></td>
                                <td><?php if(!isset($pdac2) || $pdac2 == 0) { echo '0'; } else { echo $pdac2; } ?></td>
                                <td><?php if(!isset($pdac2) || $pdac2 == 0) { echo '0'; } else { echo $scale_pda; } ?></td>
                               
                              </tr>
                              <tr>
                                <td>Research Contribution (RC)</td>
                                <td><?php if(!isset($rc) || $rc == 0) { echo '0'; } else { echo $rc; } ?></td>
                                <td><?php if(!isset($rc2) || $rc2 == 0) { echo '0'; } else { echo $rc2; } ?></td>
                                <td><?php if(!isset($rc2) || $rc2 == 0) { echo '0'; } else { echo $scale_rc; } ?></td>
                               
                              </tr>
                              <tr>
                                <td>Assessment by HOD/Princiapl (AHP)</td>
                                <td><?php if(!isset($ahp) || $ahp == 0) { echo '0'; } else { echo $ahp; } ?></td>
                                <td><?php if(!isset($ahp2) || $ahp2 == 0) { echo '0'; } else { echo $ahp2; } ?></td>
                                <td><?php if(!isset($ahp2) || $ahp2 == 0) { echo '0'; } else { echo $scale_ahp; } ?></td>
                               
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div><!-- .row -->

                    <?php endif; ?>

                     <?php if ($fac_role_id == 3 || $fac_role_id == 2): ?>

                              <div class="row"  <?php if ($role == 3): ?> style = "display:none;"  <?php endif; ?>>                        
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Assessment Head</th>
                                <th>Self Evaluation</th>
                                <th><?php if ($fac_role_id == 3): ?> Principal Evaluation   
                                <?php endif; ?>
                                <?php if ($fac_role_id == 2): ?>VP Evaluation   
                                <?php endif; ?>
                                  
                                </th>
                                <th>Scaled Score</th>
                                
                              </tr>                               
                            </thead>
                            <tbody>
                              <tr>
                                <td>Department</td>
                                <td><?php if(!isset($dept) || $dept == 0 ) { echo '0'; } else { echo $dept; } ?></td>
                                <td><?php if(!isset($dept2) || $dept2 == 0 ) { echo '0'; } else { echo $dept2; } ?></td>
                                <td><?php if(!isset($scale_dept) || $scale_dept == 0 ) { echo '0'; } else { echo $scale_dept; } ?></td>
                               
                              </tr>
                              <tr>
                                <td>Academics</td>
                                <td><?php if(!isset($acd) || $acd == 0) { echo '0'; } else { echo $acd; } ?></td>
                                <td><?php if(!isset($acd2) || $acd2 == 0) { echo '0'; } else { echo $acd2; } ?></td>
                                <td><?php if(!isset($scale_acd) || $scale_acd == 0) { echo '0'; } else { echo $scale_acd; } ?></td>
                               
                              </tr>
                              <tr>
                                <td>Industry / Other Institutes</td>
                                <td><?php if(!isset($insts) || $insts == 0) { echo '0'; } else { echo $insts; } ?></td>
                                <td><?php if(!isset($insts2) || $insts2 == 0) { echo '0'; } else { echo $insts2; } ?></td>
                                <td><?php if(!isset($scale_insts) || $scale_insts == 0) { echo '0'; } else { echo $scale_insts; } ?></td>
                               
                              </tr>
                              <tr>
                                <td>Students</td>
                                <td><?php if(!isset($stds) || $ahp == 0) { echo '0'; } else { echo $stds; } ?></td>
                                <td><?php if(!isset($stds2) || $stds2 == 0) { echo '0'; } else { echo $stds2; } ?></td>
                                <td><?php if(!isset($scale_stds) || $scale_stds == 0) { echo '0'; } else { echo $scale_stds; } ?></td>
                               
                              </tr>

                                <tr>
                                <td>Faculty and Staff</td>
                                <td><?php if(!isset($fas) || $fas == 0) { echo '0'; } else { echo $fas; } ?></td>
                                <td><?php if(!isset($fas2) || $fas2 == 0) { echo '0'; } else { echo $fas2; } ?></td>
                                <td><?php if(!isset($scale_fas) || $scale_fas == 0) { echo '0'; } else { echo $scale_fas; } ?></td>
                               
                              </tr>


                                 <tr>
                                <td>Professional Conduct/ Development and Contribution to Institution/STES</td>
                                <td><?php if(!isset($pcd) || $pcd == 0) { echo '0'; } else { echo $pcd; } ?></td>
                                <td><?php if(!isset($pcd2) || $pcd2 == 0) { echo '0'; } else { echo $pcd2; } ?></td>
                                <td><?php if(!isset($scale_pcd) || $scale_pcd == 0) { echo '0'; } else { echo $scale_pcd; } ?></td>
                               
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div><!-- .row -->

                      <?php endif; ?>
                     
             

                      <div class="row">                        
                        <div class="col-md-8">
                          <p class="lead">Performance Indicator</p>
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Academic Year</th>
                                <th>PI Score</th>
                                <th>Grade</th>
                              </tr>                               
                            </thead>
                            <tbody>
                            
                              <tr>
                                <td><?php echo $ayear;?></td>
                                <td><?php if((!isset($fpi) || $fpi == 0)) { echo '0'; } else { echo $fpi; } ?></td>
                                <td><?php if(isset($grade)) { echo $grade; } ?></td>
                              </tr>                             
                            </tbody>
                          </table>
                        </div>

                        <div class="col-md-4">
                          <div class="bs-example" data-example-id="simple-jumbotron">
                            <div class="jumbotron">   
                              <span>Avarage Performance Indicator</span>                                                      
                              <h1><?php if((!isset($fpi) || $fpi == 0)) { echo '0'; } else { echo $fpi; } ?></h1>    
                              <a class="btn btn-success"><?php if(isset($grade)) { echo $grade; } ?></a>        
                                
                            </div>
                          </div>
                        </div>
                      </div><!-- .row -->
                     



                    </section>
                  </div>
                </div>
              </div>
             </div>
               
                
                  <div class="row" <?php if ($role == 3): ?> style = "display:none;"  <?php endif; ?>>
               <div class="col-md-12">
                <div class="x_panel">                  
                  <div class="x_content">
                 
                  <h4>Comments</h4>
                  
                  <ul class="messages">



                           <?php if ($vp_comment != NULL) { ?>

                          <li>
                            <img src="<?php echo base_url();?>assets/images/user.png" class="avatar" alt="Avatar">

                            <div class="message_date">
                              <h3 class="date text-info"><?php echo date("j", strtotime($vp_time)); ?></h3>
                              <p class="month"><?php echo date("F", strtotime($vp_time)); ?></p>
                            </div>
                         
                            <div class="message_wrapper">
                              <h4 class="heading">Rachana Navale-Ashtekar <small> Vice-President</small></h4>
                               <blockquote class="message"><?php echo $vp_comment ?>
                              </blockquote>
                              
                                                        
                            </div>
                          </li>
                          <?php } ?>
                        
                          <?php if ($pricipal_comment != NULL) { ?>

                          <li>
                            <img src="<?php echo base_url();?>assets/images/user.png" class="avatar" alt="Avatar">
                             <div class="message_date">
                              <h3 class="date text-info"><?php echo date("j", strtotime($principal_time)); ?></h3>
                              <p class="month"><?php echo date("F", strtotime($principal_time)); ?></p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading"><?php echo $principal?> <small>Principal</small></h4>
                               <blockquote class="message"><?php echo $pricipal_comment ?>
                              </blockquote>
                              
                                                        
                            </div>
                          </li>
                          <?php } ?>

                         <?php if ($hod_comment != NULL) { ?> 
                          <li>

                            <img src="<?php echo base_url();?>assets/images/user.png" class="avatar" alt="Avatar">
                            <div class="message_date">
                              <h3 class="date text-info"><?php echo date("j", strtotime($hod_time)); ?></h3>
                              <p class="month"><?php echo date("F", strtotime($hod_time)); ?></p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading"><?php echo $hod?> <small>Head of Department</small></h4>
                              <blockquote class="message"><?php echo $hod_comment?>
                              </blockquote>
                                                            
                            </div>
                          </li>
                           <?php } ?>
                           
                          
                  </ul>

                  </div>
                 </div> 
               </div>
             </div>
             

                <div class="row no-print" style = "margin-bottom:3%">
               <div class="col-md-12">
                <div class="x_panel">                  
                  <div class="">
                    <button class="btn btn-danger" <?php if(($role>1) || ($status_vice == -1))  echo 'style = "display:none"'?>  data-toggle="modal" data-target="#myModal"><i class="fa fa-close"></i> Disapprove</button>

                    <button class="btn btn-primary" <?php if(($role!=5) || ($status_hr == 1)  )  echo 'style = "display:none"'?>  data-toggle="modal" data-target="#myModal1"><i class="fa fa-cog  fa-spin"></i>To be File</button>

                    <?php  if ($status_hr == 1): ?> 
                    <button class="btn btn-success"><i class="fa fa-cog"></i> Filed</button>
                     <?php endif; ?>


                    <button class="btn btn-success pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    <?php
                    if($role != 3)
                    {
                    echo '<a href='.base_url().'index.php/apraisal_form/pdf_report/'.base64_encode($emp_code1).'><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button></a>';
                     }
                    ?>
                   
                  </div>
                </div>
              </div>
            </div>


          <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            
            <form action = '<?php echo base_url();?>index.php/Apraisal_form/reject_apraisal/' onsubmit="return confirm('Are you sure? You want to reject appraisal')" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Disapprove Apprisal -  <strong>#<?php echo $sca_id?></strong></h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                <label for="email"> Apprisal ID : #</label>
                 <input type="email" class="form-control" id="app_id" placeholder="Apprisal ID" name="app_id" value = "<?php echo $sca_id?>" readonly>
               </div>

                <div class="form-group">
                <label for="name">Name :</label>
                 <input type="text" class="form-control" id="name" placeholder="Name" name="name" value = "<?php echo $name1?>" readonly>
               </div>

               <div class="form-group">
                <label for="name">Email ID :</label>
                 <input type="text" class="form-control" id="email" placeholder="Email" name="email" value = "<?php echo $email1?>" readonly>
               </div>
          
              <div class="form-group">
              <label for="email">Please Enter Comment</label>
              <textarea class="form-control" placeholder="Comment" name="comment" id = "comment" required="required"></textarea>
               </div>
                 <button type="submit" class="btn btn-default">Submit</button>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>

          </div>

        </div>
      </div>



   <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            
            <form action = '<?php echo base_url();?>index.php/Apraisal_form/file_apraisal/'   onsubmit="return confirm('Are you sure? You want to filed appraisal')" method="post")>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">File the Apprisal -  <strong>#<?php echo $sca_id?></strong></h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                <label for="email"> Apprisal ID : #</label>
                 <input type="email" class="form-control" id="app_id" placeholder="Apprisal ID" name="app_id" value = "<?php echo $sca_id?>" readonly>
               </div>

                <div class="form-group">
                <label for="email"> Email ID :</label>
                 <input type="email" class="form-control" id="app_id" placeholder="Apprisal ID" name="email_id" value = "<?php echo $email1?>" readonly>
               </div>
          
              <div class="form-group">
              <label for="email">Please Enter Comment(Which has to send by Email)</label>
              <textarea class="form-control" placeholder="Comment" name="comment" id = "comment" required="required">Hi <?php echo $name1;?>, Your Appraisal has been filed by HR Department for year <?php echo $ayear?></textarea>
               </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>

          </div>

        </div>
      </div>



<?php include 'footer.php';?>



