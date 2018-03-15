<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Performance Appraisal </title>

    <!-- Bootstrap -->
 <!-- Bootstrap -->
      <!-- Bootstrap -->
   <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
   <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/css/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/css/custom.min.css" rel="stylesheet">
    <!-- confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Parisienne" rel="stylesheet">
  <style>
  
  html, body{
    background: url(http://sim.sinhgad.edu/appraisals/engineering/assets/images/pa-bg.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
     #mask {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 9000;
  background-color: #000;
  display: none;
}

#boxes .window {
  position: absolute;
  left: 0;
  top: 10px;
  width: 440px;
  height: auto;
  display: none;
  z-index: 9999;
  padding: 20px;
  border-radius: 15px;
  text-align: left;
}

#boxes #dialog {
  width: 90%;
  height: auto;
  padding: 20px;
  background-color: #ffffff;
  font-family: 'Segoe UI Light', sans-serif;
  font-size: 15pt;
  overflow: auto;
}

#popupfoot {
  font-size: 16pt;
  position: absolute;
  bottom: 0px;
  width: 250px;
  left: 500px;
}

.login_content{
  text-shadow: none;
}

#login{
  background-image: linear-gradient( 135deg, #f0f0f0 0%, #eeeeee 100%);
}

</style>
  </head>

  <body class="login">

    
  



    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">

        <div class="animate form login_form">
          <section class="login_content">
           <form action='<?= base_url();?>index.php/login/valid_creadentail' method="post">
              <h2 style="font-family: 'Parisienne', cursive; font-size: 48px;">Performance Appraisal</h2>
              <div style="margin-top:25px;">
                <input type="text" class="form-control" placeholder="Employee Code" name="emp_code" id="emp_code" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Email Address" name="username" id="name" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password"   name="password" id="password"/>
              </div>
              <div>
                <button class="btn btn-lg btn-block btn-raised btn-default" id="login">Login</button>
              </div>

              <div class="clearfix"></div>
             
              <div style="padding-top: 20px; padding-bottom: 20px;">                
                <img src="<?php echo base_url();?>assets/images/sinhgad-logo.png" style="height:80px;width:120px;"> 
                <br><br>
                  <img class = "img-responsive" src="<?php echo base_url();?>assets/images/Logo_Celebrating-25-Years.png" >
                <br>
                <p><small>©2017 All Rights Reserved. Sinhgad Institutes, <a href="javascript:;" id="btnTerms"><strong>Privacy and Terms</strong></a></small></p>              
              </div>
             

            </form>

          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>

      
    </div>


    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <!-- Confirm -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <script type="text/javascript">

      jQuery.noConflict();

        (function($) { 

          //$('#btnTerms').on( 'click', function (){

              $.alert({

                title: 'Privacy &amp; Terms',
                content: '<p>PLEASE CAREFULLY READ THIS <a href="http://sim.sinhgad.edu/appraisals/engineering/"><strong>AGREEMENT</strong></a>.  BY ACCESSING OR USING THE SITE, YOU AGREE THAT YOU HAVE READ AND AGREE TO BE BOUND BY THE TERMS AND CONDITIONS OF THIS <a href="http://sim.sinhgad.edu/appraisals/engineering/"><strong>AGREEMENT.</strong></a></p><p>Self-evaluation scores and supporting documents (if any) provided are true and genuine to the best of my knowledge.</p><p>Any additional documents, if required, shall be provided on demand.</p><p>My Performance Appraisal is a matter of Confidentiality between my Reporting Head and myself and the same shall always be abided by.</p>',
                buttons: {
                  accept: {
                    text: 'I Accept',
                    btnClass: 'btn-green',
                  }
                },

              });

          //});

          


        })(jQuery);

      
    </script>

  </body>
</html>
