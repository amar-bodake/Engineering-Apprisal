<?php
$emp_code = $this->session->emp_code; 
    
  

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
                <h3>INDUSTRY/ OTHER INSTITUTES <small>Optimum 100 Marks</small></h3>
              </div>
           </div>
         <div class="clearfix" style="margin-bottom:20px;"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                   <form  ng-app="" role="form" name="" action = "<?php $_SERVER['PHP_SELF']; ?>"  method="post" id = "frm_details" onsubmit="return confirm('Are you sure? Once submitted you can not change');">
    
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
                                        <h4 for="exampleInputEmail1">3.1<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Networking with other STES institutions</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para11" name = "para11" class="form-control input-lg custom-input"  ng-model="para11" ng-init="para11 ='<?php if(!isset($data['para11'])){}else{echo $data['para11'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  maxlength="2"  data-toggle="tooltip" data-placement="top" title="Enter a number">
                                        
                                    </div>
                                </div>
                
                               
                
                            </div>
                           <hr>
                           
                           <!--1.2--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">3.2<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Regular MDP/FDP/Training/ Workshop/Seminar/ Conference/Expert lectures delivered</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                     <div class="form-group">                        
                                        <input type="text" id = "para12" name = "para12" class="form-control input-lg custom-input"  ng-model="para12" ng-init="para12 ='<?php if(!isset($data['para12'])){}else{echo $data['para12'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2" data-toggle="tooltip" data-placement="top" title="Enter a number">
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
                                <h4>Initiating consultancy, revenue generating Industry Projects and others</h4>      
                                                                   
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text"  id = "para13" name = "para13" class="form-control input-lg custom-input"  ng-model="para13" ng-init="para13 ='<?php if(!isset($data['para13'])){}else{echo $data['para13'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2" data-toggle="tooltip" data-placement="top" title="Enter a number">
                                       
                                    </div>
                                </div>
                
                               
                
                            </div>
                           <hr>
                           
                           <!--1.4--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">3.4<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                      <h4>Initiates Value added certification programs in collaboration with Industry/ agencies</h4>                                           
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para14" name = "para14" class="form-control input-lg custom-input"  ng-model="para14" ng-init="para14 ='<?php if(!isset($data['para14'])){}else{echo $data['para14'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2" data-toggle="tooltip" data-placement="top" title="Enter a number">
                                        
                                    </div>
                                </div>
                
                
                            </div>
                           <hr>
                           
                            <!--1.5--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">3.5<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Association/Membership with professional/Industrial Bodies (IEEE, ASME, CSI, ASM, Industry MOUs etc.)</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para15" name = "para15" class="form-control input-lg custom-input"  ng-model="para15" ng-init="para15 ='<?php if(!isset($data['para15'])){}else{echo $data['para15'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2" data-toggle="tooltip" data-placement="top" title="Enter a number">
                                        
                                    </div>
                                </div>
                
                
                            </div>
                           <hr>
                           
                            <!--1.6--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">3.6<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Explores and support Internship for students and faculty Members</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para16" name = "para16" class="form-control input-lg custom-input"  ng-model="para16" ng-init="para16 ='<?php if(!isset($data['para16'])){}else{echo $data['para16'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2" data-toggle="tooltip" data-placement="top" title="Enter a number">
                                        
                                    </div>
                                </div>
                
                
                            </div>
                           <hr>
                           
                            <!--1.7--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">3.7<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Effective Networking with other Institutes outside STES</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para17" name = "para17" class="form-control input-lg custom-input"  ng-model="para17" ng-init="para17 ='<?php if(!isset($data['para17'])){}else{echo $data['para17'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2" data-toggle="tooltip" data-placement="top" title="Enter a number">
                                        
                                    </div>
                                </div>
                
                              
                
                            </div>
                           <hr>
                           
                           <!--1.8--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">3.8<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Ensures proper and innovative Corporate Social Responsibility activities at Institute/STES</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para18" name = "para18" class="form-control input-lg custom-input"  ng-model="para18" ng-init="para18 ='<?php if(!isset($data['para18'])){}else{echo $data['para18'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2" data-toggle="tooltip" data-placement="top" title="Enter a number">
                                        
                                    </div>
                                </div>
                
                               
                
                            </div>
                           <hr>
                           
                           <!--1.9--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">3.9<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Liasioning with industry to promote the STES brand for placements</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>20</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para19" name = "para19" class="form-control input-lg custom-input"  ng-model="para19" ng-init="para19 ='<?php if(!isset($data['para19'])){}else{echo $data['para19'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2" data-toggle="tooltip" data-placement="top" title="Enter a number">
                                        
                                    </div>
                                </div>
                
                                
                
                            </div>
                           <hr>
                           
                  
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
                        <input type="text" " id = "insts_total"  name = "insts_total" class="form-control input-lg custom-input" value = "{{para11*1 + para12*1 +  para13*1 + para14*1 + para15*1 + para16*1 + para17*1 + para18*1 + para19*1 | number:0}}" disabled>
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
                    <button type="submit" id = "sub" class="btn btn-raised btn-success">Save</button>


                    
                  
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
            var total = $('#insts_total').attr('value'); 
            var total2 = $('#insts_total2').attr('value');
          
        $('#frm_details').attr('action', '<?php echo base_url();?>index.php/insts_form/index/'+total);
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
   
