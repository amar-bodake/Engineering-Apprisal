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
                <h3>PROFESSIONAL CONDUCT/ DEVELOPMENT AND CONTRIBUTION TO INSTITUTION/STES <small>Optimum 100 Marks</small></h3>
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

                <div class="col-xs-2 col-md-2 right-border">
                   <center> <h4 class="text-colour">Evaluation by Principal</h4> </center>
                </div>
                
            </div>

            <hr>
            <div style="margin-top:60px;"></div>
            
             
                    <!--1.1-->
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">6.1<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Develops and promotes standards governing punctuality and attendance in accordance with the STES Rules</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para11" name = "para11" class="form-control input-lg custom-input"  ng-model="para11" ng-init="para11 ='<?php if(!isset($data['para11'])){}else{echo $data['para11'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"    data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para21" name = "para21" class="form-control input-lg custom-input"  ng-model="para21" ng-init="para21 ='<?php if(!isset($data['para21'])){}else{echo $data['para21'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2"  data-toggle="tooltip" data-placement="top" title="Enter a number" <?php if(isset($data['para21'])){echo "readonly";} ?>>
                                     <div>
                                     </div>
                                    </div>
                                </div>
                
                            </div>
                           <hr>
                           
                           <!--1.2--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">6.2<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Exhibits appropriate deportment as per STES standards and observes code of confidentiality</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                     <div class="form-group">                        
                                        <input type="text" id = "para12" name = "para12" class="form-control input-lg custom-input"  ng-model="para12" ng-init="para12 ='<?php if(!isset($data['para12'])){}else{echo $data['para12'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                     <div>
                                     </div>
                                    </div>
                                </div>
                
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para22" name = "para22" class="form-control input-lg custom-input"  ng-model="para22" ng-init="para22 ='<?php if(!isset($data['para22'])){}else{echo $data['para22'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  maxlength="2"  data-toggle="tooltip" data-placement="top" title="Enter a number" <?php if(isset($data['para22'])){echo "readonly";} ?>>
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
                                <h4>Sets goals and implements plans for personal and professional development</h4>      
                                                                   
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text"  id = "para13" name = "para13" class="form-control input-lg custom-input"  ng-model="para13" ng-init="para13 ='<?php if(!isset($data['para13'])){}else{echo $data['para13'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                       
                                    </div>
                                </div>
                
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para23" name = "para23" class="form-control input-lg custom-input"  ng-model="para23" ng-init="para23 ='<?php if(!isset($data['para23'])){}else{echo $data['para23'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  maxlength="2"  data-toggle="tooltip" data-placement="top" title="Enter a number" <?php if(isset($data['para23'])){echo "readonly";} ?>> 
                                     <div>
                                     </div>
                                    </div>
                                </div>
                
                            </div>
                           <hr>
                           
                           <!--1.4--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">6.4<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                      <h4>Qualification Improvement/Certifications/ achievements /Award/Recognition of national/ international repute</h4>                                           
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para14" name = "para14" class="form-control input-lg custom-input"  ng-model="para14" ng-init="para14 ='<?php if(!isset($data['para14'])){}else{echo $data['para14'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text"  id = "para24" name = "para24" class="form-control input-lg custom-input"  ng-model="para24" ng-init="para24 ='<?php if(!isset($data['para24'])){}else{echo $data['para24'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  maxlength="2"  data-toggle="tooltip" data-placement="top" title="Enter a number" <?php if(isset($data['para24'])){echo "readonly";} ?>>
                                     <div>
                                     </div>
                                    </div>
                                </div>
                
                            </div>
                           <hr>
                           
                            <!--1.5--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">6.5<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Facilitates and imparts Consultancy/Training</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para15" name = "para15" class="form-control input-lg custom-input"  ng-model="para15" ng-init="para15 ='<?php if(!isset($data['para15'])){}else{echo $data['para15'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para25" name = "para25" class="form-control input-lg custom-input"  ng-model="para25" ng-init="para25 ='<?php if(!isset($data['para25'])){}else{echo $data['para25'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2"   data-toggle="tooltip" data-placement="top" title="Enter a number" <?php if(isset($data['para25'])){echo "readonly";} ?>>
                                     <div>
                                     </div>
                                    </div>
                                </div>
                
                            </div>
                           <hr>
                           
                            <!--1.6--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">6.6<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Institutional/STES level Governance responsibilities assigned like: appointment as a Member of BOS/Academic Council/University Level Committee etc</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para16" name = "para16" class="form-control input-lg custom-input"  ng-model="para16" ng-init="para16 ='<?php if(!isset($data['para16'])){}else{echo $data['para16'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para26" name = "para26" class="form-control input-lg custom-input"  ng-model="para26" ng-init="para26 ='<?php if(!isset($data['para26'])){}else{echo $data['para26'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2"   data-toggle="tooltip" data-placement="top" title="Enter a number" <?php if(isset($data['para26'])){echo "readonly";} ?>>
                                     <div>
                                     </div>
                                    </div>
                                </div>
                
                            </div>
                           <hr>
                           
                            <!--1.7--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">6.7<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Organization of Training Program at Institute/ STES level</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para17" name = "para17" class="form-control input-lg custom-input"  ng-model="para17" ng-init="para17 ='<?php if(!isset($data['para17'])){}else{echo $data['para17'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para27" name = "para27" class="form-control input-lg custom-input"  ng-model="para27" ng-init="para27 ='<?php if(!isset($data['para27'])){}else{echo $data['para27'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2"  data-toggle="tooltip" data-placement="top" title="Enter a number" <?php if(isset($data['para27'])){echo "readonly";} ?>>
                                     <div>
                                     </div>
                                    </div>
                                </div>
                
                            </div>
                           <hr>
                           
                           <!--1.8--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">6.8<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Facilitates in conducting activities of professional bodies for students/faculty at Institute/STES level</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para18" name = "para18" class="form-control input-lg custom-input"  ng-model="para18" ng-init="para18 ='<?php if(!isset($data['para18'])){}else{echo $data['para18'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para28" name = "para28" class="form-control input-lg custom-input"  ng-model="para28" ng-init="para28 ='<?php if(!isset($data['para28'])){}else{echo $data['para28'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2"  data-toggle="tooltip" data-placement="top" title="Enter a number" <?php if(isset($data['para28'])){echo "readonly";} ?>>
                                     <div>
                                     </div>
                                    </div>
                                </div>
                
                            </div>
                           <hr>
                           
                           <!--1.9--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">6.9<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Efficient Crisis and Contingency Management</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>20</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para19" name = "para19" class="form-control input-lg custom-input"  ng-model="para19" ng-init="para19 ='<?php if(!isset($data['para19'])){}else{echo $data['para19'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para29" name = "para29" class="form-control input-lg custom-input"  ng-model="para29" ng-init="para29 ='<?php if(!isset($data['para29'])){}else{echo $data['para29'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" maxlength="2"  data-toggle="tooltip" data-placement="top" title="Enter a number" <?php if(isset($data['para29'])){echo "readonly";} ?>>
                                     <div>
                                     </div>
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
                        <input type="text" " id = "pcd_total"  name = "insts_total" class="form-control input-lg custom-input" value = "{{para11*1 + para12*1 +  para13*1 + para14*1 + para15*1 + para16*1 + para17*1 + para18*1 + para19*1 | number:0}}" disabled>
                    </div>
                </div>


                   <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "pcd_total2"  name = "insts_total2" class="form-control input-lg custom-input" value = "{{para21*1 + para22*1 +  para23*1 + para24*1 + para25*1 + para26*1 + para27*1 + para28*1 + para29*1 | number:0}}" disabled>
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
            var total = $('#pcd_total').attr('value'); 
            var total2 = $('#pcd_total2').attr('value');
            //alert(total);
          
        $('#frm_details').attr('action', '<?php echo base_url();?>index.php/pcd_form/editcategory/'+total+'/'+total2);
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
   
