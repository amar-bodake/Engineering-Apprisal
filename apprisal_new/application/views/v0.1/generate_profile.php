
<?php include 'header.php';?>
<!-- top navigation -->
<?php include 'top_nav.php';


?> 

      <!-- /top navigation -->

       <!-- page content -->
        <div class="right_col" role="main">   
        
           <div class="page-title">
             <div style="margin-bottom:50px;"></div>
              <div>
                <h3>Generate Profile</h3>
              </div>
           </div>
           
           <div style="margin-bottom:50px;"></div>
           
           <div class="row" style="margin-bottom:2%;">
               <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_content">
                       

                    <form class="form-horizontal form-label-left"  action = "<?php echo base_url();?>index.php/apraisal_form/do_upload/" method="post" enctype='multipart/form-data' onsubmit="return confirm('Are you sure to submit?');" novalidate>

                      <p>Please fill below details Carefully</p>
                      <span class="section">Personal Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="10" data-validate-words="3" name="name" placeholder="Full name(s) e.g  Doe Jon Robert" required="required" type="text">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emp_code">Employee Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="emp_code" class="form-control col-md-7 col-xs-12"  name="emp_code" placeholder="Full Employee Code like 27/L/955/4003" required="required" type="text" value = "<?php echo $this->session->emp_code;?>" readonly
                          >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inst_id">Institute <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label>
                          <?php $inst['#'] = '--- Please Select ---'; ?>  
                          <?php echo form_dropdown('inst_id', $inst, '#', 'required="required" class="form-control" id="inst"'); ?>
                        </label>
                          
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Deparatment">Department <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label>
                        <?php $depts['#'] = '--- Please Select ---'; ?>
                       <?php echo form_dropdown('dept_id', $depts, '#', 'class="form-control" id="depts1"'); ?>
                       </label>
                         
                        </div>
                      </div>

              

                      
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Designation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <label>
                          <?php $des['#'] = '--- Please Select ---'; ?>  
                          <?php echo form_dropdown('des', $des, '#', 'class="form-control" id="des"'); ?>

                          </label>

                          
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Role <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <label>
                          <select required name="role" class="form-control">
                            <option value="">-- please select --</option>
                            <option value="1">Vice-President</option>
                            <option value="2">Principal</option>
                            <option value="3">HOD</option>
                            <option value="4">Faculty</option>
                             <option value="5">HR</option>
                          </select>
                          </label>

                          
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Register Sinhgad Email" value = "<?php echo $this->session->username;?>" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Mobile Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="mobile" required="required" data-validate-length-range="10,12" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Date Of Joining <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class='input-group date' id='myDatepicker2'>
                            <input type='text' class="form-control" name = "doj"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                           </div>
                        </div>
                         </div>

                  

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Upload Photo<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                          <label>Select Your Passport Size Photo</label><br>
                        
                          <input type="file" name="userfile" size="20" required="required"/>
                          
                           
                          
                        </div>
                        </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="I agree">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input required="required" type="checkbox" />
                          <span>I agree all above mension information is correct at my end</span>  
                        </div>
                        </div>

                  
                 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                      
                       

                      </div>
                    </div>
               </div>
           </div>
           
        </div>
        <!-- /page content -->
       
       
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/validator.js"></script>
<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>



<script type="text/javascript">
  $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
 $(document).ready(function(){

       $('#inst').change(function(){
        //any select change on the dropdown with id inst trigger this code
         $("#depts1 > option").remove(); //first of all clear select items
         var inst_id = $('#inst').val(); // here we are taking inst id of the selected one.
         $.ajax({
         type: "POST",
         url: "<?php echo base_url();?>index.php/Apraisal_form/get_depts_gp/"+inst_id, //here we are calling our user controller and get_cities method with the country_id
         
         success: function(depts) //we're calling the response json array 'depts'
         {
        //console.log(depts);
         $.each(depts,function(id,dep) //here we're doing a foeach loop round each dep with id as the key and dep as the value
         {
         var opt = $('<option />'); // here we're creating a new select option with for each dep
         opt.val(id);
         opt.text(dep);
         $('#depts1').append(opt); //here we will append these new select options to a dropdown with the id 'depts'
         });
         }
         
         });
       
       });









});








   //Generating the graph

 // ]]>
</script>



    
<?php include 'footer.php';?>
        <!-- /footer content -->
 

                            
 