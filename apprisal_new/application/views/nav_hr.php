  <div class="container-fluid" id="wrapper-dashboard-header">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- navigation -->
                            <div class="navbar navbar-warning" id="nav-primary">
                              <div class="container-fluid">
                                <div class="navbar-header">
                                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                  </button>
                                  <a class="navbar-brand" href="javascript:void(0)">Performance Appraisal</a>
                                </div>
                                <div class="navbar-collapse collapse navbar-warning-collapse navbar-right">
                                  <ul class="nav navbar-nav">
                                    <li><a href="<?php echo base_url();?>index.php/notification/my_notification">Dashboard</a></li> 

                               


                                    <li class="dropdown">
                                      <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Profile
                                        <b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                      
                                        <li><a href="<?php echo base_url();?>index.php/profile/profile_view">My Profile</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/profile/admin_profile">Staff Profile</a></li>
                                      </ul>
                                    </li>   
                                                                   
                                     <li class="dropdown">
                                      <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Appraisals
                                        <b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                         <li><a href="<?php echo base_url();?>index.php/apraisal_form/sca_submit_form">Appraisal Form</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/apraisal_form/view_apraisal">My Appraisal</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/demo">Approved Appraisal</a></li>
                                         <li><a href="<?php echo base_url();?>index.php/demo_filed">Filed Appraisal</a></li>
                                       
                                       


                                      </ul>
                                    </li>

                                    <li class="active"><a href="<?php echo base_url();?>index.php/profile/logout">Logout</a></li> 
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <!-- end of : navigation -->

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>




       var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
       // downscroll code
       $('#nav-primary').addClass('navbar-fixed-top');
   } else {
      // upscroll code
       $('#nav-primary').removeClass('navbar-fixed-top');
   }
   lastScrollTop = st;
});

        </script>