<?php  $role = $this->session->role_id;?>
<?php include 'header.php';?>
<?php 
   if($role == 4)
   {
    include 'nav_emp.php';
   }
   else if($role == 0)
   {
    include 'nav_hr.php';
   }
    else
   {
   include 'nav.php';
   }

   $emp_code = $this->session->emp_code;
   $code = $this->uri->segment(3);
?>
       <form  ng-app="" role="form" action="#" method="post" id = "frm_details">

       <div class="container-fluid module-title">
           <div class="container">
                <div class="row">
                    <div class="col-md-12"><h1>4 Assessment by HOD/Principal(AHP)</h1></div>
                </div>
           </div>
       </div>



        <div class="container content"> 


             <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                       <center> <h4>Sr.No.</h4> </center>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <center><h4>Parameter</h4></center>
                    
                     
              
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                 <center> <h4>Optimum Score </h4> </center>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                   <center> <h4>Self Evaluation</h4> </center>
                </div>
                 <div class="col-xs-2 col-md-2 right-border" style = "<?php if($code == $emp_code) echo "display: none";?>">
                   <center> <h4>Evaluation by HOD</h4> </center>
                </div>
                
            </div>

            
             <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">4.A</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                 <h4>Head of Department (HOD)</h4>
                 <p>1)  Punctuality -20<br>
                      I.  Attendance<br>
                      II. Leaves</p>

                  <p>2)  Integrity and Character -15<br>
                    3)  Reliability -15<br>
                    4)  Relation with stakeholders -10<br>
                    (Internal / External)<br>
                    Peer review assessment<br>
                    5)  Proficiency to shoulder department level Responsibility -10<br>
                    6)  Command over English grooming and Personality -10
                    </p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>80</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para4a" name = "para4a" class="form-control input-lg custom-input"  ng-model="para4a" ng-init="para4a ='<?php echo $data['para4a']; ?>'">
                    </div>
                </div>


                 <div class="col-xs-2 col-md-2 right-border" style = "<?php if($code == $emp_code) echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para44a" name = "para44a" class="form-control input-lg custom-input"  ng-model="para44a" ng-init="para44a ='<?php echo $data['para44a']; ?>'">
                    </div>
                </div>
                
            </div>


  <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">4.B</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                 <h4>Principal</h4>
                 <p>Proficiency to shoulder Institute level responsibility -20</p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>20</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para4b" name = "para4b" class="form-control input-lg custom-input"  ng-model="para4b"  ng-init="para4b ='<?php echo $data['para4b']; ?>'">
                    </div>
                </div>


                <div class="col-xs-2 col-md-2 right-border" style = "<?php if($code == $emp_code) echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para44b" name = "para44b" class="form-control input-lg custom-input"  ng-model="para44b"  ng-init="para44b ='<?php echo $data['para44b']; ?>'">
                    </div>
                </div>
                
            </div>
           




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
                        <input type="text"  id = "sca_total"  name = "sca_total" class="form-control input-lg custom-input" value = "{{para4a*1 + para4b*1 | number:0}}" disabled>
                    </div>
                </div>


                 <div class="col-xs-2 col-md-2 right-border" style = "<?php if($code == $emp_code) echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"  id = "sca_total"  name = "sca_total" class="form-control input-lg custom-input" value = "{{para44a*1 + para44b*1 | number:0}}" disabled>
                    </div>
                </div>
               
            </div>


            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                       
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                  
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
               
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                       
                    </div>
                </div>
               
            </div>


            

         





        </div>
    
         </form> 
         
          <div class="wrapper-footer container-fluid" style = "margin-bottom:2%; background:rgba(0, 0, 0, 0);">            
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-inline">
                               <a href = "<?php echo base_url();?>index.php/apraisal_form/view_rc/<?php echo $code ?>" class="w3-btn-floating-large w3-teal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>  
                            </ul>
                        </div>
                        <div class="col-md-6 text-right"> 
                                                   
                        </div>
                    </div>
                </div>
        </div> 

         <?php include 'footer.php';?> 
 <script>
    $("input").prop('disabled', true);  
</script>
       <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>