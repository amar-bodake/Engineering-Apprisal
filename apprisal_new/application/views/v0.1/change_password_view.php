
<?php include 'header.php';?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';?> 
      <!-- /top navigation -->

        <!-- page content -->
 <div class="right_col" role="main">        
 
      

 <div class="container">
 <h3>Change Password</h3>
 <div class="x_panel">
<div class="row">
<div class="col-sm-12">

</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<p class="text-center">Use the form below to change your password.</p>
<form method="post" action = "<?php echo base_url();?>index.php/profile/chk_pass/" id="passwordForm" onsubmit="return confirm('Are you sure? To Change Password!');">
 
 <div class="form-group">
<input type="password" class="input-lg form-control" name="oldpassword" id="oldpassword" placeholder="Enter Old Password" autocomplete="off" required="required">
</div>

 <div class="form-group">
		<div class="row">
		<div class="col-sm-6">
		<span id="oldpass" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Enter Old Password
		
		</div>
	
		</div>
</div>

 <div class="form-group">
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off" required="required">
</div>

 <div class="form-group">
		<div class="row">
		<div class="col-sm-6">
		<span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
		<span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
		</div>
		<div class="col-sm-6">
		<span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
		<span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
		</div>
		</div>
</div>

 <div class="form-group">
<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off" required="required">
</div>

 <div class="form-group">
<div class="row">
<div class="col-sm-12">
<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
</div>
</div>
</div>

<input type="submit" id = "amar"  class="col-xs-12 btn btn-dark btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">

</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
</div>



   
 </div>
 <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/password.js"></script>
   
      
 <?php include 'footer.php';?>
        <!-- /footer content -->
 

