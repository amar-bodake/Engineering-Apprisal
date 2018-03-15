<?php
$emp_code = $this->session->emp_code; 
$role_id = $this->session->role_id; 
//print_r($this->session);
//die;




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
                $profile_img = $row->profile_img; 
             }

          }


  


?>
 

    <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>index.php/login/valid" class="site_title"><img src="<?php echo base_url();?>assets/images/SI_logo.png" alt="Sinhgad Institutes"></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>uploads/<?php echo $profile_img; ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $name ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side  main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-user"></i> My Profile <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li><a href="<?php echo base_url();?>index.php/profile/profile_view">View Profile</a></li>

                        <li><a href="<?php echo base_url();?>index.php/apraisal_form/edit_profile">Edit Profile <i class="fa fa-edit"></i></a></li>
                    </ul>
                  </li>

                 
                  <li><a><i class="fa fa-edit"></i>Evaluation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       
                       <li><a href="<?php echo base_url();?>index.php/login/valid">My Dashboard  <i class="fa fa-male"></i></a></li>

                      <?php if($role_id == 4 || $role_id == 3 || $role_id == 2){ ?>
                      <li><a href="<?php echo base_url();?>index.php/Apraisal_form/academic_year">My Appraisals <i class="fa fa-pencil-square"></i></a></li>
                       <?php } ?>
                     
                       <?php if($role_id != 4){ ?>
                       <li><a href="<?php echo base_url();?>index.php/apraisal_form/academic_year_admin">Staff   Appraisals <i class="fa fa-users"></i></a></li>
                       <?php }?>    


                    </ul>
                  </li>

                <?php if($role_id == 3){ ?>
                <li><a><i class="fa fa-users"></i>Faculty Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       
                   
                      <li><a href="<?php echo base_url();?>index.php/Upload_data/emp_data">Upload Employee Data</a></li>
                    
                       <li><a href="<?php echo base_url();?>index.php/Upload_data/choose_data">Upload Department Data</a></li>
                     

                      </ul>
                  </li>
               <?php }?> 




            
                  <li><a><i class="fa fa-bar-chart-o"></i> Report Analysis <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                          <?php if($role_id == 1 || $role_id == 5){ ?>
                       <li><a href="<?php echo base_url();?>index.php/Apraisal_form/report_graphical"> Graphical Presentation <i class="fa fa-area-chart"></i></a></li>

                       <li><a href="<?php echo base_url();?>index.php/Apraisal_form/report_graphical_grade"> Grade Presentation <i class="fa fa-pie-chart"></i></a></li>

                        <li><a href="<?php echo base_url();?>index.php/Apraisal_form/report_tabular">Tabular Presentation <i class="fa fa-table"></i></a></li>
                       <?php }?>  

                        <?php if($role_id == 2 ){ ?>
                       <li><a href="<?php echo base_url();?>index.php/Apraisal_form/report_graphical">Graphical Presentation <i class="fa fa-area-chart"></i></a></li>

                         <li><a href="<?php echo base_url();?>index.php/Apraisal_form/report_graphical_grade"> Grade Presentation <i class="fa fa-pie-chart"></i></a></li>

                        <li><a href="<?php echo base_url();?>index.php/Apraisal_form/report_tabular">Tabular Prsentation <i class="fa fa-table"></i></a></li>
                       <?php }?> 

                           <?php if($role_id == 3 ){ ?>
                       <li><a href="<?php echo base_url();?>index.php/Apraisal_form/report_graphical">Graphical Presentation <i class="fa fa-area-chart"></i></a></li>

                       <li><a href="<?php echo base_url();?>index.php/Apraisal_form/report_graphical_grade"> Grade Presentation <i class="fa fa-pie-chart"></i></a></li>

                        <li><a href="<?php echo base_url();?>index.php/Apraisal_form/report_tabular">Tabular Prsentation <i class="fa fa-table"></i></a></li>
                       <?php }?> 

                         <?php if($role_id == 4){ ?>
                       <li><a href="#">My Report  <i class="fa fa-area-chart"></i></a></li>
                       <?php }?> 

                    </ul>
                  </li>


                  <li><a><i class="fa fa-child"></i> Help <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li><a href="http://sim.sinhgad.edu/appraisals/engineering/assets/Documentation/Engg-appraisal.pdf" target="_blank">Documentation <i class="fa fa-book"></i></a></li>

                       <li><a href="<?php echo base_url();?>index.php/Apraisal_form/contact_us">Contact Us <i class="fa fa-envelope"></i></a></li>

                       

                    </ul>
                  </li>

                
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url();?>index.php/profile/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>