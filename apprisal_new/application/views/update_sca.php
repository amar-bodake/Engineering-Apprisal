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


      $emp_is = $this->uri->segment(3);  
     
      
      $newdata = array(
        'emp_is'  => $emp_is
        
      );

      $this->session->set_userdata($newdata);



     
?>
       <form  ng-app="" role="form" action='<?php echo base_url();?>index.php/Sca_form/updatecategory' method="post" id = "frm_details">

       <div class="container-fluid module-title">
           <div class="container">
                <div class="row">
                    <div class="col-md-12"><h1>1 Student Centric Activities(SCA)</h1></div>
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
                 <center> <h4>Maximum Score </h4> </center>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                   <center> <h4>Self Evaluation</h4> </center>
                </div>
                 <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                   <center> <h4>Evaluation by HOD</h4> </center>
                </div>
                
            </div>



            
             
            <div class="row">
                <div class="col-md-12"><h2 class="text-capitalize">1.1 teaching-learning &amp; evaluation related activities</h2></div>
            </div>

            <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">1.1.1</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>Lectures taken as percentage of lectures allocated as per academic calendar (100% compliance =8 points)</p>
                    
                       <p><b>SEMESTER-I</b></p>
                        <div class="col-xs-8 col-md-8">
                            <p>Total number of lectures allocated :</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "ftlecta" name = "ftlecta" class="form-control input-lg custom-input" ng-model="val1" ng-init="val1 ='<?php if(!isset($data['ftlecta'])){}else{echo $data['ftlecta'];} ?>'" <?php echo "disabled"; ?>>
                        </div>

                         <div class="col-xs-8 col-md-8">
                            <p>Total number of lectures taken :</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                              <input type="text" id = "ftlectt" name = "ftlectt" class="form-control input-lg custom-input" ng-model="val2" ng-init="val2 ='<?php if(!isset($data['ftlectt'])){}else{echo $data['ftlectt'];} ?>'" <?php echo "disabled"; ?>>
                        </div>

                         <p><b>SEMESTER-II</b></p>
                        <div class="col-xs-8 col-md-8">
                            <p>Total number of lectures allocated :</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "stlecta" name = "stlecta" class="form-control input-lg custom-input" ng-model="val3" ng-init="val3 ='<?php if(!isset($data['stlecta'])){}else{echo $data['stlecta'];} ?>'" <?php echo "disabled"; ?>>
                        </div>

                         <div class="col-xs-8 col-md-8">
                            <p>Total number of lectures taken :</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "stlectt" name = "stlectt" class="form-control input-lg custom-input" ng-model="val4"  ng-init="val4 ='<?php if(!isset($data['stlectt'])){}else{echo $data['stlectt'];} ?>'" <?php echo "disabled"; ?>>
                        </div>

                        <div class="col-xs-8 col-md-8">
                            <p>• Remedial lectures may be counted as against any leave</p> 
                        </div>
              
                </div>
                
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>8</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" id = "para111"  name = "para111" class="form-control input-lg custom-input"  value = "{{ ((val1*1 / val2*1)*8 +(val3*1 / val4*1)*8)/2 | number:0}}"  disabled>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para211" name = "para211" class="form-control input-lg custom-input"  value = "{{ ((val1*1 / val2*1)*8 +(val3*1 / val4*1)*8)/2 | number:0}}"  disabled>
                    </div>
                </div>

                
            </div>

            <div class="row parent-question">

                  <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                         <label for="">1.1.2</label>
                    </div>
                 </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>Seminars , tutorials , practical , contact hours undertaken as percentage of those actual allocated as per academic calendar (100% compliance = 8points)</p>
                    
                     <p><b>SEMESTER-I</b></p>
                        <div class="col-xs-8 col-md-8">
                            <p>No. of seminars, tutorials, practical allocated:</p> 
                        </div>
                       
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "val1121" name = "val1121" class="form-control input-lg custom-input" ng-model="val1121" ng-init="val1121 ='<?php if(!isset($data['val1121'])){}else{echo $data['val1121'];} ?>'" <?php echo "disabled"; ?>>
                        </div>

                         <div class="col-xs-8 col-md-8">
                           <p>No. of seminars, tutorials, practical taken:</p> 
                        </div>
                        
                        <div class="col-xs-4 col-md-4 form-group">
                              <input type="text" id = "val1122" name = "val1122" class="form-control input-lg custom-input" ng-model="val1122" ng-init="val1122 ='<?php if(!isset($data['val1122'])){}else{echo $data['val1122'];} ?>'" <?php echo "disabled"; ?>>
                        </div>

                         <p><b>SEMESTER-II</b></p>
                        <div class="col-xs-8 col-md-8">
                            <p>No. of seminars, tutorials, practical allocated:</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "val1123" name = "val1123" class="form-control input-lg custom-input" ng-model="val1123" ng-init="val1123 ='<?php if(!isset($data['val1123'])){}else{echo $data['val1123'];} ?>'" <?php echo "disabled"; ?>>
                        </div>

                         <div class="col-xs-8 col-md-8">
                           <p>No. of seminars, tutorials, practical taken:</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "val1124" name = "val1124" class="form-control input-lg custom-input" ng-model="val1124"  ng-init="val1124 ='<?php if(!isset($data['val1124'])){}else{echo $data['val1124'];} ?>'" <?php echo "disabled"; ?>>
                        </div>
              
                </div>
               
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>8</span></div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"  id = "para112" name = "para112" class="form-control input-lg custom-input"  value = "{{ ((val1121*1 / val1122*1)*8 +(val1123*1 / val1124*1)*8)/2 | number:0}}"  disabled>
                    </div>
                </div>



                 <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">

                 <div class="form-group">                        
                        <input type="text"   id = "para212" name = "para212" class="form-control input-lg custom-input"  value = "{{ ((val1121*1 / val1122*1)*8 +(val1123*1 / val1124*1)*8)/2 | number:0}}"  disabled>
                    </div>
                    
   
                </div>


                
            </div>

            <div class="row parent-question">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.3</label>
                    </div>

                </div>


                <div class="col-xs-5 col-md-5 right-border">
                    <p>Lectures or other teaching duties in excess of AICTE/SPPU norms per week for entire semester or proportional otherwise (2 hour excess per week = one point for each semester)</p>
                    
               </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>4</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para113" name = "para113" class="form-control input-lg custom-input"  ng-model="para113" ng-init="para113 ='<?php echo $data['para113']; ?>'">
                    </div>

                </div>


                 <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para213" name = "para213" class="form-control input-lg custom-input"  ng-model="para213" ng-init="para213 ='<?php echo $data['para213']; ?>'">
                    </div>

                </div>





               
            </div>

            <div class="row parent-question">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.4</label>
                    </div>
                </div>
                <div class="col-xs-5 col-md-5 right-border">
                    <p>University examination duties (Question paper setting and evaluation of answer scripts) as per duties allocated (100% compliance = 3 points) or more for additional duties allocated.</p>
                   
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>3</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" id = "para114" name = "para114" class="form-control input-lg custom-input"  ng-model="para114" ng-init="para114 ='<?php echo $data['para114']; ?>'">
                    </div>
                </div>

                  <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" id = "para214" name = "para214" class="form-control input-lg custom-input"  ng-model="para214" ng-init="para214 ='<?php echo $data['para214']; ?>'">
                    </div>
                </div>
                
            </div>

            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.5</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>University Online /In semester/Internal test Examination work such as coordination, invigilation, flying squad duties etc.(100% compliance = 3 points) or more for additional duties allocated.</p>
                   
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>3</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para115"  name = "para115" class="form-control input-lg custom-input"  ng-model="para115"  ng-init="para115 ='<?php echo $data['para115']; ?>'">
                    </div>
                </div>

                  <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para215"  name = "para215" class="form-control input-lg custom-input"  ng-model="para215"  ng-init="para215 ='<?php echo $data['para215']; ?>'">
                    </div>
                </div>
               
            </div>


            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.6</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>College /Internal examination/Evaluation duties for internal /continuous assessment work as allocated (100% compliance = 3 points) or more for additional duties allocated.</p>
                    
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>3</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para116"  name = "para116" class="form-control input-lg custom-input"  ng-model="para116" ng-init="para116 ='<?php echo $data['para116']; ?>'">
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para216"  name = "para216" class="form-control input-lg custom-input"  ng-model="para216" ng-init="para216 ='<?php echo $data['para216']; ?>'">
                    </div>
                </div>
               
            </div>


             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.7</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>Use of Innovative teaching – learning methodologies ; use of ICT; like K point or any animation software , Update subject content and course improvement alongwith subject material sharing with the students.</p>
                   
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>3</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para117"  name = "para117" class="form-control input-lg custom-input"  ng-model="para117"  ng-init="para117 ='<?php echo $data['para117']; ?>'">
                    </div>
                </div>

                 <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para217"  name = "para217" class="form-control input-lg custom-input"  ng-model="para217"  ng-init="para217 ='<?php echo $data['para217']; ?>'">
                    </div>
                </div>
               
            </div>

             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.8</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>Design and Development of Value Additional Program (VAP) for more than 10 Hrs
                      (3 Points per VAP)</p>
                    
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>3</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para118"  name = "para118" class="form-control input-lg custom-input"  ng-model="para118" ng-init="para118 ='<?php echo $data['para118']; ?>'">
                    </div>
                </div>

                 <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para218"  name = "para218" class="form-control input-lg custom-input"  ng-model="para218" ng-init="para218 ='<?php echo $data['para218']; ?>'">
                    </div>
                </div>
               
            </div>

            <div class="row">
             <div class="col-md-12"><h2 class="text-capitalize">1.2 Co-Curricular, Extra Curricular & Extension Activities </h2></div>
            </div>

             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.2.1</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                <h4>Coordination of student centric activities </h4>
                 <h4>As Coordination (Institute level-5/Dept level-2)</h4>
                 <h4> Or As Member (Institute level-2/Dept level-1)</h4>
                 <h4>Creation of industry exposure opportunities for students through <br> (5 points per activity)</h4>
                 <p>1. Internship<br>
                    2. Sandwich training<br> 
                    3. Industrial Visit<br> 
                    4. Memorandum of Understanding(MOU)<br>
                    5.  Sponsored projects<br>
                    6. Placement support</p>



                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>15</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para121"  name = "para121" class="form-control input-lg custom-input"  ng-model="para121" ng-init="para121 ='<?php echo $data['para121']; ?>'">
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para221"  name = "para221" class="form-control input-lg custom-input"  ng-model="para221" ng-init="para221 ='<?php echo $data['para221']; ?>'">
                    </div>
                </div>
               
            </div>



             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.2.2</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Coordination of activities mentioned in Sr.no. 1 to 21(5 points per activity)</h4>
                    <p>
                    1) Student training program(STP)<br>
                    2) Techtonic<br>
                    3) National level competition<br>
                    4) Sports activity<br>
                    5) Cultural activity<br>
                    6) Co curricular activity<br>
                    7) CSR activity like PRAYAS/NSS/other Governmental and non-Governmental channels.<br>
                    8) Entrepreneurship Cell<br>
                    9) Alumni<br>
                    10) Sinhgad Students Council (SSC)<br>
                    11) Spoken tutorials/Online course (MOOC)<br>
                    12) Educational Tour/Site visit<br>
                    13) Value Addition Program (VAP)<br>
                    14) Counselling / Admission work<br>
                    15) Magazine Committee<br>
                    16) Library Committee<br>
                    17) Result analysis Committee<br>
                    18) Time table Committee<br>
                    19) Training and Placement support<br>
                    20) Teacher Guardian / Class Teacher<br>
                    21) Any other need based activity assigned by Principal / HOD.
                    (Pl. Specify) 
  


                    </p>

                 
                        <div class="col-xs-12 col-md-12 form-group">
                             <input type="text" id = "val221" name = "val221" class="form-control input-lg custom-input" ng-model="val221" ng-init="val221 ='<?php echo $data['val221']; ?>'">
                        </div>
                </div>


                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para122"  name = "para122" class="form-control input-lg custom-input"  ng-model="para122" ng-init="para122 ='<?php echo $data['para122']; ?>'">
                    </div>
                </div>


                 <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para222"  name = "para222" class="form-control input-lg custom-input"  ng-model="para222" ng-init="para222 ='<?php echo $data['para222']; ?>'">
                    </div>
                </div>
               
            </div>


            

            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.3</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Student feedback (TH/PR)</h4>
                    <h4>SEMESTER-I</h4>

                    <p> 1) Theory 1<br>
                        2) Theory 2<br>
                        3) Practical 1<br>
                        4) Practical 2<br>
                    </p>


                    <h4>SEMESTER-II</h4>

                    <p> 1) Theory 1<br>
                        2) Theory 2<br>
                        3) Practical 1<br>
                        4) Practical 2<br>
                    </p>
                    <p>• Score proportional to average of No-problem feedback obtained for all theory and practical assigned Subjects.</p>

                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>20</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para130"  name = "para130" class="form-control input-lg custom-input"  ng-model="para130" ng-init="para130 ='<?php echo $data['para130']; ?>'">
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para230"  name = "para230" class="form-control input-lg custom-input"  ng-model="para230" ng-init="para230 ='<?php echo $data['para230']; ?>'">
                    </div>
                </div>
               
            </div>

                <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.4</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Results of students (TH/PR)</h4>
                    <h4>Student feedback (TH/PR)</h4>
                      <h4>SEMESTER-I</h4>
                       <p> 1) Theory 1<br>
                        2) Theory 2<br>
                        3) Practical 1<br>
                        4) Practical 2</p>

                        <h4>SEMESTER-II</h4>
                       <p> 1) Theory 1<br>
                        2) Theory 2<br>
                        3) Practical 1<br>
                        4) Practical 2</p>




                    <p>*More than average of previous three years results in the respective subject/practical-‘10’ Points otherwise ‘O’ points .(Final score is to be calculated based on average of points scored in all assigned theory and practical of both the semesters.)</p>


                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para140"  name = "para140" class="form-control input-lg custom-input"  ng-model="para140" ng-init="para140 ='<?php echo $data['para140']; ?>'">
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para240"  name = "para240" class="form-control input-lg custom-input"  ng-model="para240" ng-init="para240 ='<?php echo $data['para240']; ?>'">
                    </div>
                </div>
               
            </div>


             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.5</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Attendance of Students</h4>
                    <h4>SEMESTER-I</h4>

                        <p>1)  Theory 1<br>
                        2) Theory 2<br>
                        3) Practical 1<br>
                        4) Practical 2</p><p>

                     <h4>Attendance of Students</h4>
                    <h4>SEMESTER-II</h4>

                      <p>1) Theory 1<br>
                        2) Theory 2<br>
                        3) Practical 1<br>
                        4) Practical 2</p>

                    <p>*Average of student’s attendance in all the subjects/practicals assigned during the entire academic year. (Final score is to be calculated based on average of points scored in all assigned theory and practical of both the semesters.)</p>


                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para150"  name = "para150" class="form-control input-lg custom-input"  ng-model="para150" ng-init="para150 ='<?php echo $data['para150']; ?>'">
                    </div>
                </div>

                  <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para250"  name = "para250" class="form-control input-lg custom-input"  ng-model="para250" ng-init="para250 ='<?php echo $data['para250']; ?>'">
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
                        <input type="text" " id = "sca_total"  name = "sca_total" class="form-control input-lg custom-input" value = "{{para113*1 + para114*1 + para115*1 + para116*1 + para117*1 + para118*1 + para121*1 + para122*1 + para130*1 + para140*1 +  para150*1 | number:0}}" disabled>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php  echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "sca_total2"  name = "sca_total2" class="form-control input-lg custom-input" value = "{{  ((val1*1 / val2*1)*8 +(val3*1 / val4*1)*8)/2 +  ((val1121*1 / val1122*1)*8 +(val1123*1 / val1124*1)*8)/2 +  para213*1 + para214*1  + para215*1 + para216*1 + para217*1 + para218*1 + para221*1 + para222*1 + para230*1 + para240*1 + para250*1 | number:0}}" disabled>
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
                               
                            </ul>
                        </div>
                        <div class="col-md-6 text-right"> 
                           <a href = "<?php echo base_url();?>index.php/apraisal_form/update_pda" class="w3-btn-floating-large w3-teal"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>                         
                        </div>
                    </div>
                </div>
        </div>
          
         <?php include 'footer.php';?> 

        <script>
         
        $('#sub').click(function(){
            var total = $('#sca_total').attr('value'); 
            var total2 = $('#sca_total2').attr('value');
        
         $('#frm_details').attr('action', '<?php echo base_url();?>index.php/Sca_form/updatecategory/'+total+'/'+total2);

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