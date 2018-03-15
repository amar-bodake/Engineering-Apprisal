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
       <form  ng-app="" role="form" action='<?php $_SERVER['PHP_SELF']; ?>' method="post" id = "frm_details">

       <div class="container-fluid module-title">
           <div class="container">
                <div class="row">
                    <div class="col-md-12"><h1>3 Research Contribution(RC)</h1></div>
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
                        <label for="exampleInputEmail1">3.1</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                 <h4>Research Publication (Journals)</h4>
                 <p>Number of articles in referred International Journal <br>
                    Scopus 5 <br>
                    Web of Science 3 <br>
                    Google scholar 2 <br>
                    1st  Author / 2nd Author 70:30 <br>
                    1st  Author / 2nd Author/ 3rd Author 50:30:20 <br>
                    1st  Author / 2nd Author/ 3rd Author/ 4th Author 40:30:20:10 </p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>12</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para311" name = "para311" class="form-control input-lg custom-input"  ng-model="para311">
                        <div id="infoMessage"><?php echo form_error('para311'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para3311" name = "para3311" class="form-control input-lg custom-input"  ng-model="para3311">
                        <div id="infoMessage"><?php echo form_error('para3311'); ?></div>
                    </div>
                </div>
                
            </div>


  <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">3.2</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                 <h4>Number of articles National/International level research papers in non-referred / Journals but having ISSN numbers and the list of journals prepared by the university and hosted on its website.</h4>
                 <p>1st  Author / 2nd Author 70:30<br>
                    1st  Author / 2nd Author/ 3rd Author 50:30:20<br>
                    1st  Author / 2nd Author/ 3rd Author/ 4th Author 40:30:20:10
                    </p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>6</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para321" name = "para321" class="form-control input-lg custom-input"  ng-model="para321">
                         <div id="infoMessage"><?php echo form_error('para321'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para3321" name = "para3321" class="form-control input-lg custom-input"  ng-model="para3321">
                         <div id="infoMessage"><?php echo form_error('para3321'); ?></div>
                    </div>
                </div>
                
            </div>
           

            

            <div class="row parent-question">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.3</label>
                    </div>

                </div>


                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Number of full papers in Conference Proceedings , etc.</h4>
                    <p>International 2<br>
                    National 1<br>
                    1st  Author // 2nd Author 70:30<br>
                    1st  Author / 2nd Author/ 3rd Author 50:30:20<br>
                    1st  Author / 2nd Author/ 3rd Author/ 4th Author 40:30:20:10</p>
               </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>5</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para331" name = "para331" class="form-control input-lg custom-input"  ng-model="para331">
                         <div id="infoMessage"><?php echo form_error('para331'); ?></div>
                    </div>
                </div>


                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para3331" name = "para3331" class="form-control input-lg custom-input"  ng-model="para3331">
                         <div id="infoMessage"><?php echo form_error('para3331'); ?></div>
                    </div>
                </div>
               
            </div>

            <div class="row parent-question">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.4</label>
                    </div>
                </div>
                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Research Publications (books, in chapters in books , other than referred journal articles)</h4>
                    <p>Number of Text or reference Books Published by International Publishers with an established peer review system b) Number of chapters in edited books<br>
                    1st  Author / 2nd Author 70:30<br>
                    1st  Author / 2nd Author/ 3rd Author 50:30:20<br>
                    1st  Author / 2nd Author/ 3rd Author/ 4th Author 40:30:20:10</p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>6</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" id = "para341" name = "para341" class="form-control input-lg custom-input"  ng-model="para341">
                        <div id="infoMessage"><?php echo form_error('para341'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" id = "para3341" name = "para3341" class="form-control input-lg custom-input"  ng-model="para3341">
                        <div id="infoMessage"><?php echo form_error('para3341'); ?></div>
                    </div>
                </div>
                
            </div>

            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.5</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Number of Subjects Books by National level publishers/State and Central Govt.</h4>  
                    <p>a) Publications with ISBN / ISSN Number<br>
                       b) Number of chapters in edited books</p>

                       <p>1st  Author / 2nd Author 70:30<br>
                       1st  Author / 2nd Author/ 3rd Author 50:30:20<br>
                       1st  Author / 2nd Author/ 3rd Author/ 4th Author 40:30:20:10</p>
              </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>4</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para351"  name = "para351" class="form-control input-lg custom-input"  ng-model="para351">
                        <div id="infoMessage"><?php echo form_error('para351'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para3351"  name = "para3351" class="form-control input-lg custom-input"  ng-model="para3351">
                        <div id="infoMessage"><?php echo form_error('para3351'); ?></div>
                    </div>
                </div>
               
            </div>


            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.6</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Number of Subjects Books by other local publishers</h4>
                    <p>a) With ISBN/ISSN number<br>
                       b) Number of chapter in edited books </p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>2</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para361"  name = "para361" class="form-control input-lg custom-input"  ng-model="para361">
                         <div id="infoMessage"><?php echo form_error('para361'); ?></div>
                    </div>
                </div>
                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para3361"  name = "para3361" class="form-control input-lg custom-input"  ng-model="para3361">
                         <div id="infoMessage"><?php echo form_error('para3361'); ?></div>
                    </div>
                </div>
               
            </div>


             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.7</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Chapters in knowledge based volumes by Indian/ National level publishers.</h4>
                    <p>a) With ISBN/ISSN numbers<br>
                       b) With numbers of national & international directories.</p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>2</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para371"  name = "para371" class="form-control input-lg custom-input"  ng-model="para371" >
                          <div id="infoMessage"><?php echo form_error('para371'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para3371"  name = "para3371" class="form-control input-lg custom-input"  ng-model="para3371" >
                          <div id="infoMessage"><?php echo form_error('para3371'); ?></div>
                    </div>
                </div>
               
            </div>

             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.8</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>a)  National Level  – 5 <br>
                       b)  International Level – 10
                    </h4>
                    <p>Co-ordinator : Co-Coordinator : Member (60 : 30 : 10)</p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para381"  name = "para381" class="form-control input-lg custom-input"  ng-model="para381" >
                        <div id="infoMessage"><?php echo form_error('para381'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para3381"  name = "para3381" class="form-control input-lg custom-input"  ng-model="para3381" >
                        <div id="infoMessage"><?php echo form_error('para3381'); ?></div>
                    </div>
                </div>
               
            </div>


             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.9.a</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Sponsored / Funded Projects carried out / ongoing</h4>
                    <p>Number of Projects amount mobilized with grants above 3.00 lakhs</p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para39a"  name = "para39a" class="form-control input-lg custom-input"  ng-model="para39a" >
                         <div id="infoMessage"><?php echo form_error('para39a'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para339a"  name = "para339a" class="form-control input-lg custom-input"  ng-model="para339a" >
                         <div id="infoMessage"><?php echo form_error('para339a'); ?></div>
                    </div>
                </div>
               
            </div>


             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.9.b</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                 
                    <p>Number of Projects amount mobilized with grants from 0.5 lakhs to 3.00 lakhs </p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>6</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para39b"  name = "para39b" class="form-control input-lg custom-input"  ng-model="para39b">
                         <div id="infoMessage"><?php echo form_error('para39b'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para339b"  name = "para339b" class="form-control input-lg custom-input"  ng-model="para339b">
                         <div id="infoMessage"><?php echo form_error('para339b'); ?></div>
                    </div>
                </div>
               
            </div>


             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.9.c</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
               
                <p>Number of Minor Projects from central/state funding agencies with grants below Rs.0.5 lakhs</p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>2</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para39c"  name = "para39c" class="form-control input-lg custom-input"  ng-model="para39c">
                          <div id="infoMessage"><?php echo form_error('para39c'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para339c"  name = "para339c" class="form-control input-lg custom-input"  ng-model="para339c">
                          <div id="infoMessage"><?php echo form_error('para339c'); ?></div>
                    </div>
                </div>
               
            </div>




             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.10</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Consultancy Projects carried out / ongoing</h4>
                    <p>Amount mobilized with minimum of RS. 10,000 (3 points each)</p>


                    <div class="col-xs-8 col-md-8">
                            <p>Amount mobilized Rs</p> 
                   </div>

                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "val3101" name = "val3101" class="form-control input-lg custom-input" ng-model="val3101">
                              <div id="infoMessage"><?php echo form_error('val3101'); ?></div>
                        </div>
                </div>  

               <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para3101"  name = "para3101" class="form-control input-lg custom-input"  ng-model="para3101">
                         <div id="infoMessage"><?php echo form_error('para3101'); ?></div>
                    </div>
                </div>

                 <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para33101"  name = "para33101" class="form-control input-lg custom-input"  ng-model="para33101">
                         <div id="infoMessage"><?php echo form_error('para33101'); ?></div>
                    </div>
                </div>
               
                         
            </div>


         <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.11</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">

                     <h4>No, of parents / Technology transfer /Products / Copy right National / International </h4>

                    <p> a. Patents filed – 3 Awarded -10<br>
                        b. Copyright filed - 2  Awarded - 6 (+5 for International)
                    </p>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para3111"  name = "para3111" class="form-control input-lg custom-input"  ng-model="para3111">
                        
                       <div id="infoMessage"><?php echo form_error('para3111'); ?></div> 
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para33111"  name = "para33111" class="form-control input-lg custom-input"  ng-model="para33111">
                        
                       <div id="infoMessage"><?php echo form_error('para33111'); ?></div> 
                    </div>
                </div>
               
            </div>

           
             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.12</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Research Guidance</h4>
                    

                    <div class="col-xs-8 col-md-8">
                            <p> 1) M.E./B.E2/1 <br> Degree awarded Nos. : </p> 
                   </div>

                   <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "val3121" name = "val3121" class="form-control input-lg custom-input" ng-model="val3121">
                              <div id="infoMessage"><?php echo form_error('val3121'); ?></div> 
                  </div>

                   <div class="col-xs-8 col-md-8">
                            <p>2) Ph.D (Awarded / In process) 8/1. <br> Degree awarded Nos.<br> <br>Number of research scolars under guidance:</p> 
                   </div>

                   <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "val3122" name = "val3122" class="form-control input-lg custom-input" ng-model="val3122">
                              <div id="infoMessage"><?php echo form_error('val3122'); ?></div> 
                  </div>

                  <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "val3123" name = "val3123" class="form-control input-lg custom-input" ng-model="val3123">
                              <div id="infoMessage"><?php echo form_error('val3123'); ?></div> 
                  </div>

                

                   <div class="col-xs-4 col-md-4 form-group">
                             
                  </div>

                </div>  

               <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para3121"  name = "para3121" class="form-control input-lg custom-input"  ng-model="para3121">
                         <div id="infoMessage"><?php echo form_error('para3121'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para33121"  name = "para33121" class="form-control input-lg custom-input"  ng-model="para33121">
                         <div id="infoMessage"><?php echo form_error('para33121'); ?></div>
                    </div>
                </div>
               
                         
            </div>



         <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">3.13</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">

                     <h4>Involvement in student Research activities</h4>

                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>5</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para3131"  name = "para3131" class="form-control input-lg custom-input"  ng-model="para3131">
                         <div id="infoMessage"><?php echo form_error('para3131'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para33131"  name = "para33131" class="form-control input-lg custom-input"  ng-model="para33131">
                         <div id="infoMessage"><?php echo form_error('para33131'); ?></div>
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
                        <input type="text"  id = "rc_total"  name = "rc_total" class="form-control input-lg custom-input" value = "{{para311*1 + para321*1 + para331*1 + para341*1 +  para351*1 +  para331*1 +  para371*1 +  para381*1 +  para39a*1 +  para39b*1 +  para39c*1  +  para3101*1 + para3111*1 + para3121*1 + + para3131*1| number:0}}" disabled>
                    </div>
                </div>

                 <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"  id = "rc_total2"  name = "rc_total2" class="form-control input-lg custom-input" value = "{{para3311*1 + para3321*1 + para3331*1 + para3341*1 +  para3351*1 +  para3331*1 +  para3371*1 +  para3381*1 +  para339a*1 +  para339b*1 +  para339c*1  +  para33101*1 + para33111*1 + para33121*1 + + para33131*1| number:0}}" disabled>
                    </div>
                </div>
               
            </div>

         


                 <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
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



        </div>
    
         </form>  
         <?php include 'footer.php';?> 
   <script>

         $('#sub').click(function(){
           var total = $('#rc_total').attr('value'); 
            var total2 = $('#rc_total2').attr('value'); 
        
         $('#frm_details').attr('action', '<?php echo base_url();?>index.php/Rc_form/insertcategory/'+total);
        });
       $(function() {
            
                $("#frm_details").on("submit", function(event) {
                
                 // event.preventDefault();
                   
                   
                    $.ajax({
                       // url: "<?php //echo base_url();?>index.php/Serialize_form/insertcategory",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function(d) {
                            
                          

                        }

                    });
                });
            });
            
       
        </script>
       <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>