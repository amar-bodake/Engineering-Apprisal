<?php  $role = $this->session->role_id;?>
<?php include 'header.php';?>

 <div class="right_col" role="main">        
          <div class="">
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
   


 <div class = "container wrapper-dashboard-content">
   <div class="col-lg-10">

 
   <fieldset>
      <legend>Oops! Profile not created. Please generate.</legend>
    <form class="form-horizontal" role="form" action='<?= base_url();?>index.php/profile/pre_init' method="post">
      <div class="form-group row">
        <label for="emp_code" class="col-lg-3 control-label">Employee Code</label>
        <div class="col-lg-6">
          <input type="text" value= "<?php echo $this->session->userdata('emp_code')?>" class="form-control" name="emp_code" id="emp_code" placeholder="Employee Code" disabled> 
        </div>
      </div> 

     <div class="form-group row">
        <label for="email" class="col-lg-3 control-label">Email</label>
        <div class="col-lg-6">
          <input type="text"  value= "<?php echo $this->session->userdata('username')?>" class="form-control" name="email" id="email" placeholder="Email" disabled>
        </div>
      </div>

     <div class="form-group row">
        <label for="name" class="col-lg-3 control-label">Name</label>
        <div class="col-lg-6">
          <input  type="text" class="form-control" name="name" id="name" placeholder="Name">
            <div  id="infoMessage"><?php echo form_error('name'); ?></div>
        </div>
       
      </div>
       
     
      <div class="form-group row">
        <label for="institute_id" class="col-lg-3 control-label">Institute</label>
        <div class="col-lg-6">
          <?php echo form_dropdown('inst', $inst, set_value('inst'), 'class="form-control"') ?>
          <div id="infoMessage"><?php echo form_error('inst'); ?></div>
        </div> 

        
   
        </div>

          <div class="form-group row">
        <label for="email" class="col-lg-3 control-label">Department</label>
        <div class="col-lg-6">
         <?php echo form_dropdown('dep', $dep, set_value('dep'), 'class="form-control"') ?>
           <div id="infoMessage"><?php echo form_error('dep'); ?></div>
        </div>
      
   
      </div>
      

       <div class="form-group row">
        <label for="designation_id" class="col-lg-3 control-label">Designation</label>
        <div class="col-lg-6">
          <?php echo form_dropdown('des', $des, set_value('des'), 'class="form-control"') ?>
           <div id="infoMessage"><?php echo form_error('des'); ?></div>
        </div>
       </div>

         <div class="form-group row">
          <label for="doj" class="col-lg-3 control-label">Date of Joining</label>
          <div class="col-lg-6">
          <div class="input-group date form_date"  data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value=""  id = "doj" name = "doj"readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
               <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
              <div id="infoMessage"><?php echo form_error('doj'); ?></div>
          </div> 
       </div>

        <div class="form-group row">
        <label for="dol" class="col-lg-3 control-label">Date of Leaving</label>
        <div class="col-lg-6">
            <div class="input-group date form_date"  data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="" id = "dol" name = "dol" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
               <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
              <div id="infoMessage"><?php echo form_error('dol'); ?></div>
        </div>
     
   
      </div>
      
  


   







      <div class="form-group row">
        <div class="col-lg-offset-3 col-lg-10">
          <button type="submit" class="btn btn-raised btn-warning">Save</button>
           <button type="reset" class="btn btn-raised btn-warning">Reset</button>
        </div>
      </div>
    
   </fieldset>
        </div>
  </div>

  <?php include 'footer.php';?>

 <script type="text/javascript">
    
  $('.form_date').datetimepicker({
        language:  '',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
 
</script>
