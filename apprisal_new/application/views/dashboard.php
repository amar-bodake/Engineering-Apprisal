<?php
$emp_code = $this->session->emp_code; 


      $this->db->select('*');
      $this->db->from(' employee');
      $this->db->where('emp_code', $emp_code);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
               
                $name = $row->name;
                $institute_id = $row->institute_id;
                $designation_id = $row->designation_id;
                $department_id = $row->department_id;
                $email =  $row->email;
             }

          }


      $this->db->select('*');
      $this->db->from(' designations');
      $this->db->where('id', $designation_id);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $des = $row->name;
             }
          }


       $this->db->select('*');
       $this->db->from('institutes');
       $this->db->where('id', $institute_id);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $inst = $row->name;
             }
          }


        $this->db->select('*');
       $this->db->from('department');
       $this->db->where('id', $department_id);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $dept = $row->title;
             }
          }

       
        $this->db->select('*');
        $this->db->from('sca');
        $this->db->where('emp_code', $emp_code);
        $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $sca_id = $row->sca_id;
                  $timing_initialised = $row->timing;
                  $forward_status = $row->forward_status;

             }
          }



        $this->db->select('*');
        $this->db->from('sca');
        $this->db->where('emp_code', $emp_code);
        $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $sca_id = $row->sca_id;
                  $timing_initialised = $row->timing;
                  $forward_status = $row->forward_status;

             }
          }

          else
          {
                  $sca_id = 0;
                  $timing_initialised = 0;
                  $forward_status = 0; 
          }


        $this->db->select('*');
        $this->db->from('performance_indicater');
        $this->db->where('pi_id', $sca_id); 
        $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $pi_id = $row->pi_id;
                  $timing_submited = $row->date_of_pi_creation;
             }
          }

          else
          {
                  $pi_id = 0;
                  $timing_submited = 0;  
          }


        $this->db->select('*');
        $this->db->from('approvals');
        $this->db->where('pi_id', $pi_id);  
        $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $hod_time = $row->hod_time;
                  $status_hod = $row->status_hod;
                  $status_vice = $row->status_vice;

             }
          }

          else
          {
           
                  $hod_time = 0;
                  $status_hod = 0;
                  $status_vice = 0;


          }
         
    // echo date("F j, Y, g:i a", strtotime($hod_time));
    // die;
         
     

?>

<?php include 'header.php';?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';?> 
      <!-- /top navigation -->

        <!-- page content -->
 <div class="right_col" role="main">        

          <!-- top tiles -->
  <div class="row tile_count">
           
           <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <img class = "img-responsive" src="<?php echo base_url();?>assets/images/Logo_Celebrating-25-Years.png" >            
            </div>

            
           
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-rocket"></i> Initialised</span>
              <div class="count">4,567</div>   
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>21% </i> From last Year</span>           
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-space-shuttle"></i> Submitted</span>
              <div class="count">2,315</div>             
               <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>2% </i> From last Year</span> 
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-check-circle"></i> Approved</span>
              <div class="count green">2,315</div>             
               <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>82% </i> From last Year</span> 
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-star"></i> Filed</span>
              <div class="count green">2,315</div>             
               <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>62% </i> From last Year</span> 
            </div>                    
          
          </div>
          <!-- /top tiles -->


                   <div class="row"> 

                      
                      <!--  #######################################################
                            #######################################################
                            ##  Appraisal Status
                            ######################################################## 
                            ######################################################## -->
                            <div class="col-md-6 col-xs-12">
                              <div class="x_panel">
                                <div class="x_title">
                                  <h2><i class="fa fa-user"></i> Profile</h2>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                  <div class="row">
                                    <div class="col-md-4">
                                     <div class="profile_img">
                                        <div id="crop-avatar">
                                          <!-- Current avatar -->
                                          <img class="img-responsive img-thumbnail avatar-view" src="<?php echo base_url();?>assets/images/user.png" alt="Avatar" title="Change the avatar">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-8">
                                      <h3><?php echo $name?></h3>
                                      <address>
                                          <strong><?php echo $des?></strong>
                                          <BR/><strong>Emp Code : <?php echo $emp_code ?></strong>
                                          <br><?php echo $inst ?>
                                          <br><?php echo $dept ?>
                                          <br><?php echo $email ?>
                                         
                                      </address>
                                      <a class="btn btn-dark" href = "<?php echo base_url();?>index.php/profile/profile_view""><i class="fa fa-edit m-right-xs"></i> Edit Profile</a>
                                    </div>
                                  </div> <!-- /.row -->

                                  <div class="row" style="margin-top: 25px;">
                                    <div class="col-md-12">                                      
                                      <h4>Appraisal Status 2017 Tracker</h4>                                      
                                    </div>
                                  </div><!-- /.row -->

                                  <div class="row">
                                    <div class="col-md-3">
                                      <p>Initialised
                                      <br/><small><?php if(isset($timing_initialised)) { echo date("F j, Y", strtotime($timing_initialised)); } else { echo "Pending"; } ?></small>
                                      </p>
                                      <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" <?php if(isset($timing_initialised)) { echo 'data-transitiongoal="100"'; } else { echo 'data-transitiongoal="0"'; } ?>></div>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <p>Submitted
                                        <br/><small><?php if($forward_status == 1) { echo date("F j, Y", strtotime($timing_submited)); } else { echo "Pending"; } ?></small>
                                      </p>
                                      <div class="progress progress_sm">
                                       <div class="progress-bar bg-green" role="progressbar" <?php if($forward_status == 1) { echo 'data-transitiongoal="100"'; } else { echo 'data-transitiongoal="0"'; } ?> ></div>
                                      </div>
                                    </div>
                                    <?php if ($status_vice == -1) { ?>
                
                                    <div class="col-md-3">
                                      <p>Disapproved
                                      <br/><small> by Vice President</small>
                                      </p>
                                      <div class="progress progress_sm">
                                        <div class="progress-bar bg-red" role="progressbar" data-transitiongoal="100"></div>
                                      </div>
                                    </div>
                                    
                                    <?php } else { ?>

                                    <!-- ///////////////////////-->
                                    <div class="col-md-3">
                                      <p>Approved
                                      <br/><small><?php if($status_hod == 1 ) { echo date("F j, Y", strtotime($hod_time)); } else { echo "Pending"; } ?></small>
                                      </p>
                                      <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" <?php if($status_hod == 1) { echo 'data-transitiongoal="100"'; } else { echo 'data-transitiongoal="0"'; } ?>></div>
                                      </div>
                                    </div>
                                    <?php } ?>


                                    <div class="col-md-3">
                                      <p>Filed
                                      <br/><small>Pending...</small>
                                      </p>
                                      <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="0"></div>
                                      </div>
                                    </div>
                                  </div><!-- /.row -->

                                  <div class="row">
                                    <div class="col-md-12">                                     
                                      <p>&nbsp;</p>
                                       <?php if($role_id == 4){ ?>
                                      <p class="text-right">
                                        <a href = "<?php echo base_url();?>index.php/Apraisal_form/my_apprisal" class="btn btn-success">Go To My Appraisal <i class="fa fa-angle-double-right"></i></a>
                                      </p><br><br>
                                        <?php } else ?>
                                         <?php if($role_id != 4) { ?>
                                         <p class="text-right">
                                        <a href = "#" class="btn btn-success">Go To My Appraisal <i class="fa fa-angle-double-right"></i></a>
                                      </p><br><br>
                                        <?php } ?>

                                    </div>
                                  </div><!-- /.row -->

                                  
                                </div>

                              </div>
                            </div>




                      <!--  #######################################################
                            #######################################################
                            ##  Guidelines
                            ######################################################## 
                            ######################################################## -->
                            <div class="col-md-6 col-xs-12">
                              <div class="x_panel">

                                <div class="x_title">
                                  <h2><i class="fa fa-bars"></i> Step-by-Step online Appraisal Guide</h2>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                  <ul class="list-unstyled timeline">
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag text-center">
                            <span>Step 1</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                              <a href="#">Initialise the process by clicking on “Go to my Appraisal” .</a><br><br>
                           </h2>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag text-center">
                            <span>Step 2</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                            <a href="#">Once faculty completes the appraisal and submit for approval, Status will change to “Submitted”.</a><br>
                          </h2>                          
                         
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag text-center">
                            <span>Step 3</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                              <a href="#">HOD approval will reflect in “Approved” status .</a><br><br>
                          </h2>                          
                          
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag text-center">
                            <span>Step 4</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                              <a href="#">As soon as HR files the appraisal the status will changed “Filed”.</a><br><br>
                          </h2>                        
                        
                        </div>
                      </div>
                    </li>
                  </ul>

                </div>

                              
                          </div>
                      </div>






          </div>
        

            <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-dialog modal-lg">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                <h4><strong>The Faculty has to complete the Appraisal form by accessing all 3 forms</strong></h4>
                <ul>
                  <li>Student Centric Activities (SCA)</li>
                  <li>Professional Development and Academic Contribution (PDAC)</li>
                  <li>Research Contribution ( RC)</li>
                </ul><br>
                <h5><strong>Accessing all the above forms is compulsory. </strong></h5>
                <p>However only SCA form marking is compulsory (if any field inapplicable here, please mark as “0”). The other 2 forms for PDAC and RC are not mandatory and only applicable fields can be completed.
                <br>
                Wherever a text box with the words “Please specify” appears, kindly enter the explanatory text <br>eg – Papers submitted. 
                </p><br>
                <h5><strong>Wherever “Please specify Google drive link” eg – VAP, appears.</strong></h5>
                <ul>
                  <li>Please upload the supporting document on the Google drive of your sinhgad.edu email id.</li>
                  <li>Make the settings as “Public”.</li>
                  <li>Then provide the same link in this box.</li>
                </ul><br>
                <p>Once all entries are complete, the “Submit” form would appear. Kindly ensure that all fields are filed out satisfactorily, as once submitted, no changes are allowed. The form can later be accessed only in View mode.<br><br>

                After the Faculty submits the appraisal, the HOD would then complete his marking followed by the Principal.<br><br>

                The tracker on the Employee dashboard would display the approval stage i.e submitted, approved etc.<br>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            </div>
            
          </div>
        </div>














        </div>
       
        <!-- /page content -->

        <!-- footer content -->

       <?php include 'footer.php';?>
         


     
        <!-- /footer content -->
      