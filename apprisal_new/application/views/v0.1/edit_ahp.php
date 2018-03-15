<?php  $role = $this->session->role_id;?>
<?php include 'header.php';?>

   
<?php include 'left_nav.php';?>
       
<?php include 'top_nav.php';?> 
    
      <div class="right_col" role="main"> 
            <div class="page-title">
             <div style="margin-bottom:50px;"></div>
              <div>
                <h3>Assessment by HOD / Principal (AHP)</h3>
              </div>
           </div>
           
           <div style="margin-bottom:50px;"></div>
           
           <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_content"> 
                            <form  ng-app="" role="form" action="<?php echo base_url();?>index.php/Ahp_form/editcategory" method="post" id = "frm_details">

                         <div style="margin-top:30px;"></div>



        <div class="container content"> 


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
                   <center> <h4 class="text-colour">Evaluation by HOD</h4> </center>
                </div>
                
            </div>

             <hr>
            <div style="margin-top:60px;"></div>
             <div class="row parent-question" >
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">4.A</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                 <h4>Head of Department (HOD)</h4>
                <p>1)  Punctuality - <strong><i>(20 Points)</i></strong></p>
                    <p> <span style="padding-left:15px;">I.  Attendance </span> <br> 
                     <span style="padding-left:15px;">II. Leaves</span></p>

                  <p>2)  Integrity and Character -  <strong><i>(15 Points)</i></strong></p>

                    <p>3)  Reliability -  <strong><i>(15 Points)</i></strong></p>
                    <p>4)  Relation with stakeholders -  <strong><i>(10 Points)</i></strong>
                    (Internal / External)<br>
                    <span style="padding-left:15px;">Peer review assessment</span></p>
                    <p> 5)  Proficiency to shoulder department level Responsibility -  <strong><i>(10 Points)</i></strong></p>
                     <p>6)  Command over English grooming and Personality -  <strong><i>(10 Points)</i></strong></p>
                    
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>80</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para4a" name = "para4a" class="form-control input-lg custom-input"  value = "{{para44a*1 | number:0}}" readonly="readonly"/>
                    </div>
                </div>


                 <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" pattern = "[0-9][0-9]{0,4}"   id = "para44a" name = "para44a" class="form-control input-lg custom-input"  ng-model="para44a" ng-init="para44a ='<?php echo $data['para44a']; ?>'" required="required"  <?php if ($role  != 3 ){ echo 'readonly="readonly"'; } ?>>
                    </div>
                </div>
                
            </div>
            <hr>

       <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">4.B</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                 <h4>Principal</h4>
                 <p>Proficiency to shoulder Institute level responsibility - <strong><i>(20 Points)</i></strong></p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>20</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para4b" name = "para4b" class="form-control input-lg custom-input"  value = "{{para44b*1 | number:0}}" readonly="readonly"/>
                    </div>
                </div>


                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" pattern = "[0-9][0-9]{0,4}"   id = "para44b" name = "para44b" class="form-control input-lg custom-input"  ng-model="para44b"  ng-init="para44b ='<?php echo $data['para44b']; ?>'" <?php if ($role  != 2 ){ echo 'readonly="readonly"'; } ?>>
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
                        <input type="text"  id = "ahp_total"  name = "ahp_total" class="form-control input-lg custom-input" value = "{{para44a*1 + para44b*1 | number:0}}" disabled>
                    </div>
                </div>


                 <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"  id = "ahp_total2"  name = "ahp_total2" class="form-control input-lg custom-input" value = "{{para44a*1 + para44b*1 | number:0}}" disabled>
                    </div>
                </div>
               
            </div>
            <hr>

             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        
                    </div>
                </div>

                <div class="col-xs-7 col-md-7 right-border" style = "margin-bottom: 3%">
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

        </div>
    
         </form>
                      </div>
                    </div>
                </div>
            </div>
         </div>
          
         <?php include 'footer.php';?> 

        <script>
         
        $('#sub').click(function(){
            var total = $('#ahp_total').attr('value'); 
            var total2 = $('#ahp_total2').attr('value');
            
        
         $('#frm_details').attr('action', '<?php echo base_url();?>index.php/Ahp_form/editcategory/'+total+'/'+total2);
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
       <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js">
           
       </script>