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
                <h3>FACULTY AND STAFF <small>Optimum 100 Marks</small></h3>
              </div>
           </div>
         <div class="clearfix" style="margin-bottom:20px;"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                   <form  ng-app="" role="form" name="" >
    
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
                                        <h4 for="exampleInputEmail1">5.1<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Organizes periodic scheduled faculty meeting and keeps a proper record of the minutes of the same</h4>                                     
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
                                        <h4 for="exampleInputEmail1">5.2<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Supports professional development among faculty members</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>20</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                     <div class="form-group">                        
                                        <input type="text" id = "para12" name = "para12" class="form-control input-lg custom-input"  ng-model="para12" ng-init="para12 ='<?php if(!isset($data['para12'])){}else{echo $data['para12'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
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
                                        <h4 for="exampleInputEmail1">5.3<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">
                                <h4>Deploys faculty based on competencies and Institute’s goals</h4>      
                                                                   
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
                                        <h4 for="exampleInputEmail1">5.4<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                      <h4>Implements and monitors the performance
                                       improvement procedures for faculty in accordance with the guidelines and policies of STES</h4>                                           
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>20</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para14" name = "para14" class="form-control input-lg custom-input"  ng-model="para14" ng-init="para14 ='<?php if(!isset($data['para14'])){}else{echo $data['para14'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                                
                
                            </div>
                           <hr>
                           
                            <!--1.5--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">5.5<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Utilizes performance improvement data to make decisions/recommendations for faculty development, promotion, deployment and separation</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>20</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para15" name = "para15" class="form-control input-lg custom-input"  ng-model="para15" ng-init="para15 ='<?php if(!isset($data['para15'])){}else{echo $data['para15'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}" data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
                                    </div>
                                </div>
                
                         
                
                            </div>
                           <hr>
                           
                            <!--1.6--> 
                           <div class="row parent-question">
                                <div class="col-xs-1 col-md-1 right-border text-center">
                                    <div class="form-group">                        
                                        <h4 for="exampleInputEmail1">5.6<span style = "color:red">*</span></h4>
                                    </div>
                                </div>
            
                                <div class="col-xs-5 col-md-5 right-border">      
                                     <h4>Creates learning pathways to challenge and support the functioning of senior faculty (succession planning)</h4>                                     
                                </div>

                                <div class="col-xs-2 col-md-2 right-border text-center">
                                   <div class="optimum-score"><span>10</span></div>
                                </div>
                                <div class="col-xs-2 col-md-2 right-border">
                                    <div class="form-group">                        
                                        <input type="text" id = "para16" name = "para16" class="form-control input-lg custom-input"  ng-model="para16" ng-init="para16 ='<?php if(!isset($data['para16'])){}else{echo $data['para16'];} ?>'" required="required" pattern = "[0-9][0-9]{0,4}"  data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                                        
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
                        <input type="text" " id = "studs_total"  name = "studs_total" class="form-control input-lg custom-input" value = "{{para11*1 + para12*1 +  para13*1 + para14*1 + para15*1 + para16*1  | number:0}}" disabled>
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

  


     

 

   
