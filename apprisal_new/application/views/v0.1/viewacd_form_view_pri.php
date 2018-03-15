<?php
$emp_code = $this->session->emp_code; 
$role = $this->session->role_id; 
    
  

?>

<?php include 'header.php';?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';?> 
      <!-- /top navigation -->

        <!-- page content -->
         <div class="right_col" role="main">     
          <div class="page-title">
              <div class="title_left">
                <h3>Academic <small>Optimum 50 Marks</small></h3>
              </div>
           </div>
         <div class="clearfix" style="margin-bottom:20px;"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                   <form  ng-app="" role="form" name="">
    
               <div style="margin-top:30px;"></div>

              <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                       <center> <h4 class="text-colour">Sr.No.</h4> </center>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <center><h4 class="text-colour">Parameter</h4></center>
                    
                     
              
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                 <center> <h4 class="text-colour">Optimum Score </h4> </center>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                   <center> <h4 class="text-colour">Self Evaluation</h4> </center>
                </div>

                
            </div>

            <hr>
            <div style="margin-top:60px;"></div>
            
             
                    <!--1.1-->
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">2.1<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Guides and monitors the implementation of
                                      curricular activities</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para11" name = "para11" class="form-control input-lg custom-input"  ng-model="para11" ng-init="para11 ='<?php if(!isset($data['para11'])){}else{echo $data['para11'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"    data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                      
                
                            </div>
                           <hr>
                           
                           <!--1.2--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">2.2<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Designs and supports in implementation of
                                    strategies to analyze data and utilize
                                    results to ensure efficient curriculum
                                    delivery</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                     <div class="form-group">                        
                                        <input type="text" id = "para12" name = "para12" class="form-control input-lg custom-input"  ng-model="para12" ng-init="para12 ='<?php if(!isset($data['para12'])){}else{echo $data['para12'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number"  readonly>
                                     <div>
                                     </div>
                                    </div>
                                </div>
                
                       
                
                            </div>
                           <hr>
                           
                           <!--1.3--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">2.3<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">
                                <h4>Executes strategies to evaluate programme
                                    delivery e.g.<br>
                                    a. Continuous Assessment of students<br>
                                    b. Performance appraisal of staff done<br>
                                    c. Students reports and status reports
                                    d. Evidence of appropriate<br>
                                      actions/decisions taken for
                                      intervention/remediation

                                  </h4>      
                                                                   
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>20</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text"  id = "para13" name = "para13" class="form-control input-lg custom-input"  ng-model="para13" ng-init="para13 ='<?php if(!isset($data['para13'])){}else{echo $data['para13'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                       
                                    </div>
                                </div>
                
                         
                
                            </div>
                           <hr>
                           
                           <!--1.4--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">2.4<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                      <h4>Takes extra effort to monitor result and
                                      executes necessary steps for its
                                      improvement</h4>                                           
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para14" name = "para14" class="form-control input-lg custom-input"  ng-model="para14" ng-init="para14 ='<?php if(!isset($data['para14'])){}else{echo $data['para14'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                       
                
                            </div>
                           <hr>
                           
   
            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                       
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                  
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                <h1>Total</h1>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "dept_total"  name = "dept_total" class="form-control input-lg custom-input" value = "{{para11*1 + para12*1 +  para13*1 + para14*1  | number:0}}" disabled>
                    </div>
                </div>


                    
               
            </div>
                 <div class="row parent-question" style = "margin-bottom:3%">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        
                    </div>
                  </div>
                  <hr>

                  <div class="col-xs-5 col-md-5 right-border" >
                  <div class="form-group"> 
                   <button  onclick="location.href='<?php echo base_url();?>index.php/Apraisal_form/my_apprisal'" class="btn btn-success pull-right"></i>Back</button>


                    
                  
                 </div>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                    
                    </div>
                </div>
               
            </div>
            </form>
          </div>
                  </div>
             </div>
          </div>
      </div>
        <!-- /page content -->

        <!-- footer content -->
 
       
 
       <?php include 'footer.php';?>
        <!-- /footer content -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/3.13.3/math.min.js"></script>


     

 

    <script>

         
        $('#sub').click(function(){
            var total = $('#dept_total').attr('value'); 
            var total2 = $('#dept_total2').attr('value');
          
        $('#frm_details').attr('action', '<?php echo base_url();?>index.php/Acd_form/index/'+total);
        });

       $(function() {
            
                $("#frm_details").on("submit", function(event) {
                
                 // event.preventDefault();
                   
                   $.ajax({
                       
                        type: "POST",
                        data: $(this).serialize(),
                        success: function(d) {
                            
                        }

                    });
                });
            });   
       
   </script>
   
