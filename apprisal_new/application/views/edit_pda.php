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
?>
       <form  ng-app="" role="form" action='<?php echo base_url();?>index.php/Pda_form/editcategory' method="post" id = "frm_details">

       <div class="container-fluid module-title">
           <div class="container">
                <div class="row">
                    <div class="col-md-12"><h1>2 Proffesional Developement and Academic Contribution(PDAC)</h1></div>
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

                <div class="col-xs-2 col-md-2 right-border">
                   <center> <h4>Evaluation by HOD</h4> </center>
                </div>
                
            </div>

            
             <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">2.1</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                 
                 <p>Qualification improvement (Ph.D-10/Post Doctorate - 10)</p>
                 <p>(Ph. D registered - 4) -- for every progress report submission -2 points</p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para211" name = "para211" class="form-control input-lg custom-input"  ng-model="para211" ng-init="para211 ='<?php echo $data['para211']; ?>'">
                    </div>
                </div>

                 <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para2211" name = "para2211" class="form-control input-lg custom-input"  ng-model="para2211" ng-init="para2211 ='<?php echo $data['para2211']; ?>'">
                    </div>
                </div>
                
            </div>


  <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">2.2</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                 <p>Acquiring status of Certified trainer for skill development courses from reputed organization. 8 points for every certification.</p>
                
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>8</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para221" name = "para221" class="form-control input-lg custom-input"  ng-model="para221" ng-init="para221 ='<?php echo $data['para221']; ?>'">
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para2221" name = "para2221" class="form-control input-lg custom-input"  ng-model="para2221" ng-init="para2221 ='<?php echo $data['para2221']; ?>'">
                    </div>
                </div>
                
            </div>
           

            

            <div class="row parent-question">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.3</label>
                    </div>

                </div>


                <div class="col-xs-5 col-md-5 right-border">
                   
                    <p>Certification of International/National repute from reputed organization . 5 points for every certification.</p>
               </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>5</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para231" name = "para231" class="form-control input-lg custom-input"  ng-model="para231" ng-init="para231 ='<?php echo $data['para231']; ?>'">
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para2231" name = "para2231" class="form-control input-lg custom-input"  ng-model="para2231" ng-init="para2231 ='<?php echo $data['para2231']; ?>'">
                    </div>
                </div>
               
            </div>

            <div class="row parent-question">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.4</label>
                    </div>
                </div>
                <div class="col-xs-5 col-md-5 right-border">
                    
                    <p>Awards/Recognition/Any other achievement through professional bodies of national/international repute (7).</p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>7</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" id = "para241" name = "para241" class="form-control input-lg custom-input"  ng-model="para241" ng-model="para241" ng-init="para241 ='<?php echo $data['para241']; ?>'">
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" id = "para2241" name = "para2241" class="form-control input-lg custom-input"  ng-model="para2241" ng-model="para2241" ng-init="para2241 ='<?php echo $data['para2241']; ?>'">
                    </div>
                </div>
                
            </div>

            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.5</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                    <p>Contribution in conduction activities of Professional bodies for either to the students or faculty – (5 points for every activity)</p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>5</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para251"  name = "para251" class="form-control input-lg custom-input"  ng-model="para251"  ng-init="para251 ='<?php echo $data['para251']; ?>'">
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para2251"  name = "para2251" class="form-control input-lg custom-input"  ng-model="para2251"  ng-init="para2251 ='<?php echo $data['para2251']; ?>'">
                    </div>
                </div>
               
            </div>


            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.6</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                    <p>Interaction with outside world (Please specify)</p>

                    <p>A. Externally Funded Project<br> 
                    A. Invitation as a Keynote speaker<br>
                    A. Contribution in live industrial projects<br>
                    B. Subject Expert for Interview panel Member<br> 
                    B. Judge for National Level Paper Presentation<br> 
                    B. Reviewer Person for International/National Journal<br> 
                    B. Resource person for conferences/seminars/workshops/symposia etc.</p>
                   
                   <h4>A-10 points for each activity <br> B-5 points for each activity</h4>  

                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>15</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para261"  name = "para261" class="form-control input-lg custom-input"  ng-model="para261" ng-init="para261 ='<?php echo $data['para261']; ?>'">
                    </div>
                </div>

                 <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para2261"  name = "para2261" class="form-control input-lg custom-input"  ng-model="para2261" ng-init="para2261 ='<?php echo $data['para2261']; ?>'">
                    </div>
                </div>
               
            </div>


             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.7</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Organization of Training program </h4>
                    <h4>(FDP/SDP/STTP/Workshop/Seminar etc.)</h4>

                    <p>Organization of short term training courses not less than</p>
                    <p>Co-ordinator:  Co-Coordinator: Member = (60:30:10) %</p>


                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>15</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para271"  name = "para271" class="form-control input-lg custom-input"  ng-model="para271" ng-init="para271 ='<?php echo $data['para271']; ?>'">
                    </div>
                </div>
                 <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para2271"  name = "para2271" class="form-control input-lg custom-input"  ng-model="para2271" ng-init="para2271 ='<?php echo $data['para2271']; ?>'">
                    </div>
                </div>
               
            </div>

             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.8</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Participation in Training Program</h4>
                    <p>Participation in short term training courses not less than two week duration (10)points/One week (5 points) / for less than one week (proportional) </p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para281"  name = "para281" class="form-control input-lg custom-input"  ng-model="para281" ng-init="para281 ='<?php echo $data['para281']; ?>'">
                    </div>
                </div>


                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para281"  name = "para2281" class="form-control input-lg custom-input"  ng-model="para2281" ng-init="para2281 ='<?php echo $data['para2281']; ?>'">
                    </div>
                </div>
               
            </div>


             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.9</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                    <p>Internal Revenue Generation (IRG) other grant other than research grant through Organization of FDP/SDP/STTP/Workshop/Seminar</p> 
                    <p>5 points for each RS.  25000 Or Proportionate</p>
                    <p>Co-ordinator :  Co-Coordinator : Member = (60:30:10)%</p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para291"  name = "para291" class="form-control input-lg custom-input"  ng-model="para291" ng-init="para291 ='<?php echo $data['para291']; ?>'">
                    </div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para2291"  name = "para2291" class="form-control input-lg custom-input"  ng-model="para2291" ng-init="para2291 ='<?php echo $data['para2291']; ?>'">
                    </div>
                </div>
               
            </div>



             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.10</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                   
                    <p>Institutional /STES level Governance responsibilities assigned like </p>
                    <p>Principal/Director – 5<br>
                    Vice Principal – 5<br>
                    HOD – 4<br>
                    NBA/NAAC/NIRF coordinator/Member-3/2<br>
                    IQAC Coordinator/Member -3/2<br>
                    SWO -3<br>
                    College Examination Officer – 3<br>
                    Member of BoS/Faculty /Academic council /Senate: 2 each<br> 
                    Member of other college/university level committees : 2 each<br>
                    Contribution in activities of statutory bodies : 2 each <br>
                    Any other need based activity assign by principle/Hod (Please Specify)
                    </p>


                    <div class="col-xs-12 col-md-12">
                          
                   </div>

                        <div class="col-xs-12 col-md-12 form-group">
                             <input type="text" id = "val2101" name = "val2101" class="form-control input-lg custom-input" ng-model="val2101" ng-init="val2101 ='<?php echo $data['val2101']; ?>'">
                        </div>

                        
                </div>

               <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>15</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para2101"  name = "para2101" class="form-control input-lg custom-input"  ng-model="para2101" ng-init="para2101 ='<?php echo $data['para2101']; ?>'">
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para22101"  name = "para22101" class="form-control input-lg custom-input"  ng-model="para22101" ng-init="para22101 ='<?php echo $data['para22101']; ?>'">
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
                        <input type="text"  id = "pda_total"  name = "sca_total" class="form-control input-lg custom-input" value = "{{para211*1 + para221*1 + para231*1 + para241*1 + para251*1 + para261*1 + para271*1 + para281*1 + para291*1 + para2101*1 | number:0}}" disabled>
                    </div>
                </div>

                 <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"  id = "pda_total2"  name = "pda_total" class="form-control input-lg custom-input" value = "{{para2211*1 + para2221*1 + para2231*1 + para2241*1 + para2251*1 + para2261*1 + para2271*1 + para2281*1 + para2291*1 + para22101*1 | number:0}}" disabled>
                    </div>
                </div>
               
            </div>

         


                 
             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        
                    </div>
                </div>

                <div class="col-xs-7 col-md-7 right-border">
                  <div class="form-group"> 
                    <button type="submit" id = "sub" class="btn btn-raised btn-success">Save</button>
                    <button type="reset"  class="btn btn-raised btn-warning">Reset</button>
                 </div>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                    
                    </div>
                </div>
               
            </div>

         


                 <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        
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
        <div class="wrapper-footer container-fluid" style = "margin-bottom:3%; background:rgba(0, 0, 0, 0);">            
                <div>
                           <div class="row">
                        <div class="col-md-6">
                            <ul class="list-inline">
                               <a href = "<?php echo base_url();?>index.php/apraisal_form/edit_sca" class="w3-btn-floating-large w3-teal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>  
                            </ul>
                        </div>
                        <div class="col-md-6 text-right"> 
                           <a href = "<?php echo base_url();?>index.php/apraisal_form/edit_rc" class="w3-btn-floating-large w3-teal"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>                         
                        </div>
                    </div>
                </div>
        </div>
          
         <?php include 'footer.php';?> 

        <script>
         
        $('#sub').click(function(){
            var total = $('#pda_total').attr('value'); 
            var total2 = $('#pda_total2').attr('value');
        
         $('#frm_details').attr('action', '<?php echo base_url();?>index.php/Pda_form/editcategory/'+total+'/'+total2);
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