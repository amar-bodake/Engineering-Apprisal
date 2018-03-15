<?php
$emp_code = $this->session->emp_code; 


      $this->db->select('*');
      $this->db->from(' employee');
      $this->db->where('emp_code', $emp_code);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
               
                $name = $row->name;
                $institute_id = $row->institute_id;
                $designation_id = $row->designation_id;
                $department_id = $row->department_id;
                $email =  $row->email;
             }

          }


      $this->db->select('*');
      $this->db->from(' designations');
      $this->db->where('id', $designation_id);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $des = $row->name;
             }
          }


       $this->db->select('*');
       $this->db->from('institutes');
       $this->db->where('id', $institute_id);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $inst = $row->name;
             }
          }


        $this->db->select('*');
       $this->db->from('department');
       $this->db->where('id', $department_id);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $dept = $row->title;
             }
          }

        

?>

<?php include 'header.php';?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';?> 
      <!-- /top navigation -->

        
    <!-- page content -->
        <div class="right_col" role="main"> 
            <div class="page-title">
             <div style="margin-bottom:50px;"></div>
              <div>
                <h3>Professional Development and Academic Contribution (PDAC)</h3>
              </div>
           </div>
           <div style="margin-bottom:50px;"></div>
           <div class="row">


               <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="x_panel">
                       <div class="x_content">


        
                            <form  ng-app="" role="form"  method="post" id = "frm_details">
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

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                   <center> <h4 class="text-colour">Evaluation by HOD</h4> </center>
                </div>
                
            </div>

            <hr>
            <div style="margin-top:60px;"></div>
             <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">2.1</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                 
                 <p>Qualification improvement </p>
                     <div class="radio">
                           <div class="checkbox">
                           <label>
                           <input type="radio" name="opt21" value="opt21a" <?php if(!isset($data['opt21'])) { echo 'ng-model="isTrue" ng-change="isTrue ? (count=10) :(count=count-10)"';} else { if($data['opt21'] == "opt21a") echo "checked";} ?>>Post   Doctorate (10 Points)
                            </label>
                            </div>

                            <div class="checkbox">
                              <label>
                              <input type="radio" name="opt21" value="opt21b" <?php if(!isset($data['opt21'])) { echo 'ng-model="isTrue" ng-change="isTrue ? (count=10) :(count=count-10)"';} else { if($data['opt21'] == "opt21b") echo "checked";} ?>>Ph.D (10 Points)
                            </label>
                            </div>

                             <div class="checkbox">
                            <label>
                            <input type="radio" name="opt21" value="opt21c" <?php if(!isset($data['opt21'])) { echo 'ng-model="isTrue" ng-change="isTrue ? (count=6) :(count=count-6)"';} else {if($data['opt21'] == "opt21c") echo "checked";} ?>>Ph.D Pursuing (6 Points)
                            </label>
                            </div>

                             <div class="checkbox">
                             <label>
                             <input type="radio" name="opt21" value="opt21d" <?php if(!isset($data['opt21'])) { echo 'ng-model="isTrue" ng-change="isTrue ? (count=4) :(count=count-4)"';} else {if($data['opt21'] == "opt21d") echo "checked";} ?>>Ph. D Registered (4   Points)
                              </label>
                              </div>
                             
                               <div class="checkbox col-md-8 col-xs-8 row">
                               <label>
                              <input type="radio" name="opt21" value="opt21e" <?php if(!isset($data['opt21'])) { echo 'ng-model="isTrue" ng-change="isTrue ? (count=0) :(count=count-4)"';} else {if($data['opt21'] == "opt21e") echo "checked";} ?>>Enter Progress Report Submited <br>(2  Points Each, Maximum 2 alowed)
                              </label>
                              </div>


                              <div class="col-md-4 col-xs-4" >
                             <input type="text" placeholder="Please specify" class="form-control" name = "val21"  ng-model="val21" ng-init="val21 ='<?php if(!isset($data['val21'])){}else{echo $data['val21'];} ?>'">
                            </div>

                    </div>

                   

                </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para211" name = "para211" class="form-control input-lg custom-input"  ng-model="para211" <?php if(!isset($data['para211'])){echo 'ng-value="count + (val21*2) | number:0"';} ?>  ng-init="para211 ='<?php if(!isset($data['para211'])){}else{echo $data['para211'];} ?>'" data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                         <div id="infoMessage"><?php echo form_error('para211'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para2211" name = "para2211" class="form-control input-lg custom-input"  ng-model="para2211" ng-init="para2211 ='<?php if(!isset($data['para2211'])){}else{echo $data['para2211'];} ?>'">
                         <div id="infoMessage"><?php echo form_error('para2211'); ?></div>
                    </div>
                </div>
                
            </div>
            <hr>

                <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">2.2</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                 <p>Acquiring status of Certified trainer for skill development courses from reputed organization. <strong><i>( 8 Points)</i></strong> for every certification.</p>
                <div class="col-md-10 col-xs-12">
                    <input type="text" placeholder="Please specify" class="form-control" name = "val22"  ng-model="val22" ng-init="val22 ='<?php if(!isset($data['val22'])){}else{echo $data['val22'];} ?>'">
                </div><br><br><br>
                
                </div>
               
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>8</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para221" name = "para221" class="form-control input-lg custom-input"  ng-model="para221"  ng-init="para221 ='<?php if(!isset($data['para221'])){}else{echo $data['para221'];} ?>'" data-toggle="tooltip" data-placement="top" title="Enter a number" >
                         <div id="infoMessage"><?php echo form_error('para221'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para2221" name = "para2221" class="form-control input-lg custom-input"  ng-model="para2221"  ng-init="para2221 ='<?php if(!isset($data['para2221'])){}else{echo $data['para2221'];} ?>'">
                         <div id="infoMessage"><?php echo form_error('para2221'); ?></div>
                    </div>
                </div>
                
            </div>
           

            <hr>

            <div class="row parent-question">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.3</label>
                    </div>

                </div>


                <div class="col-xs-5 col-md-5 right-border">
                   
                     <p>Certification of International/National repute from reputed organization . <br>  <strong><i>( 5 Points for every certification.)</i></strong> </p>
                <div class="col-md-10 col-xs-12">
                    <input type="text" placeholder="Please specify" class="form-control" name = "val23"  ng-model="val23" ng-init="val23 ='<?php if(!isset($data['val23'])){}else{echo $data['val23'];} ?>'">
                </div><br><br><br>
               </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>5</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"   id = "para231" name = "para231" class="form-control input-lg custom-input"  ng-model="para231" ng-init="para231 ='<?php if(!isset($data['para231'])){}else{echo $data['para231'];} ?>'" data-toggle="tooltip" data-placement="top" title="Enter a number">
                         <div id="infoMessage"><?php echo form_error('para231'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para2231" name = "para2231" class="form-control input-lg custom-input"  ng-model="para2231" ng-init="para2231 ='<?php if(!isset($data['para2231'])){}else{echo $data['para2231'];} ?>'">
                         <div id="infoMessage"><?php echo form_error('para2231'); ?></div>
                    </div>
                </div>
               
            </div>

            <hr>
            <div class="row parent-question">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.4</label>
                    </div>
                </div>
                <div class="col-xs-5 col-md-5 right-border">
                    
                    <p>Awards/Recognition/Any other achievement through professional bodies of national/international repute <br> <strong><i>(7 Points per activity)</i></strong>.</p>
                 <div class="col-md-10 col-xs-12">
                    <input type="text" placeholder="Please specify" class="form-control" name = "val24"  ng-model="val24" ng-init="val24 ='<?php if(!isset($data['val24'])){}else{echo $data['val24'];} ?>'">
                </div><br><br><br>   
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>7</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" id = "para241" name = "para241" class="form-control input-lg custom-input" ng-model="para241" ng-model="para241" ng-init="para241 ='<?php if(!isset($data['para241'])){}else{echo $data['para241'];} ?>'" data-toggle="tooltip" data-placement="top" title="Enter a number">
                         <div id="infoMessage"><?php echo form_error('para241'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" id = "para2241" name = "para2241" class="form-control input-lg custom-input" ng-model="para2241" ng-model="para2241"  ng-init="para2241 ='<?php if(!isset($data['para2241'])){}else{echo $data['para2241'];} ?>'">
                         <div id="infoMessage"><?php echo form_error('para2241'); ?></div>
                    </div>
                </div>
                
            </div>
            <hr>

            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.5</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                    <p>Contribution in conducting activities of Professional bodies  to the students and / or faculty <br> 
                    <strong><i>(5 points for every activity)</i></strong></p>

                    <div class="col-md-10 col-xs-12">
                        <input type="text" placeholder="Please specify" class="form-control" name = "val25"  ng-model="val25" ng-init="val25 ='<?php if(!isset($data['val25'])){}else{echo $data['val25'];} ?>'">
                    </div><br><br><br>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>5</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para251"  name = "para251" class="form-control input-lg custom-input"  ng-model="para251" ng-init="para251 ='<?php if(!isset($data['para251'])){}else{echo $data['para251'];} ?>'" data-toggle="tooltip" data-placement="top" title="Enter a number">
                         <div id="infoMessage"><?php echo form_error('para251'); ?></div>
                    </div>
                </div>

                 <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para2251"  name = "para2251" class="form-control input-lg custom-input"  ng-model="para2251" ng-init="para2251 ='<?php if(!isset($data['para2251'])){}else{echo $data['para2251'];} ?>'">
                         <div id="infoMessage"><?php echo form_error('para2251'); ?></div>
                    </div>
                </div>
               
            </div>

            <hr>
            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.6</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                    <p>Interaction with outside world (Please specify)</p>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name = "opt26a" value = "opt26a" <?php if(!isset($data['opt26a'])){echo 'ng-model="opt26a" ng-change="opt26a ? (count1=count1+10) :(count1=count1-10)"';}else{echo "checked";} ?>>A) Externally Funded Project
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"   name = "opt26b" value = "opt26b" <?php if(!isset($data['opt26b'])){echo 'ng-model="opt26b" ng-change="opt26b ? (count1=count1+10) :(count1=count1-10)"';}else{echo "checked";} ?>>A) Invitation as a Keynote speaker
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"  name = "opt26c" value = "opt26c" <?php if(!isset($data['opt26c'])){echo 'ng-model="opt26c" ng-change="opt26c ? (count1=count1+10) :(count1=count1-10)"';}else{echo "checked";} ?>>A) Contribution in live industrial projects
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"   name = "opt26d" value = "opt26d" <?php if(!isset($data['opt26d'])){echo 'ng-model="opt26d" ng-change="opt26d ? (count1=count1+5) :(count1=count1-5)"';}else{echo "checked";} ?>>B) Subject Expert for Interview panel Member
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"   name = "opt26e" value = "opt26e" <?php if(!isset($data['opt26e'])){echo 'ng-model="opt26e" ng-change="opt26e ? (count1=count1+5) :(count1=count1-5)"';}else{echo "checked";} ?>>B) Judge for National Level Paper Presentation
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"   name = "opt26f" value = "opt26f"  <?php if(!isset($data['opt26f'])){echo 'ng-model="opt26f" ng-change="opt26f ? (count1=count1+5) :(count1=count1-5)"';}else{echo "checked";} ?>>B) Reviewer Person for International/National Journal
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"   name = "opt26g" value= "opt26g" <?php if(!isset($data['opt26g'])){echo 'ng-model="opt26g" ng-change="opt26g ? (count1=count1+5) :(count1=count1-5)"';}else{echo "checked";} ?>>B) Resource person for conferences/seminars/workshops/symposia etc.
                        </label>
                    </div>

                   <strong><i><p>A-10 points for each activity and B-5 points for each activity</p></i> </strong> 

                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>15</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para261"  name = "para261" class="form-control input-lg custom-input"  ng-model="para261" ng-value="count1 | number:0" ng-init="para261 ='<?php if(!isset($data['para261'])){}else{echo $data['para261'];} ?>'" data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                        <div id="infoMessage"><?php echo form_error('para261'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para2261"  name = "para2261" class="form-control input-lg custom-input"  ng-model="para2261"  ng-init="para2261 ='<?php if(!isset($data['para2261'])){}else{echo $data['para2261'];} ?>'">
                        <div id="infoMessage"><?php echo form_error('para2261'); ?></div>
                    </div>
                </div>
               
            </div>
            <hr>
             
            <div>
             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.7</label>
                    </div>
                 </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Organization of Training program </h4>
                   <!-- ##############################
                        dynamic controls 
                       ########################### -->

                 <?php if (!isset($data['opt27-cnt']) || ($data['opt27-cnt'] == 0) ) { ?>

                   <ng-form name="form_2_7">  
                        <!-- selection -->
                        <div class="form-group">
                          
                          <label  for="opt27-cnt">Organization of short term training courses,</label>

                          <p><small>Please select the number of Training Programs Organised
                          </small></p>



                          <select class="form-control"
                          name="opt27-cnt"
                          id="opt27-cnt"
                          ng-change="updateChildren()"
                          ng-model="tp.value">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                        </div>

                  

                  <div class="row" ng-repeat="extra in tp.children track by $index">                  
                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Duration</span>

                        <select  class="form-control"
                              name="opt27-duration-{{$index+1}}"
                              ng-model= "dynamic.children[$index].duration"
                               required>
                          <option value="twoweek">Two Week Duration (15 Points)</option>
                          <option value="oneweek">One Week Duration (10 Points)</option>
                          <option value="lessthanweek">less than one Week Duration (5 points)</option>
                        </select>

                            </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Position</span>                             
                              <select  class="form-control"
                              name="opt27-position-{{$index+1}}"
                              ng-model= "dynamic.children[$index].position"
                              required>
                                <option value="coordinator">Co-ordinator (60%)</option>
                                <option value="cocoordinator">Co-Coordinator (30%)</option>
                                <option value="member">Member (10%)</option>

                              </select>
                            </div>
                    </div>

                    <hr/>
                  </div><!-- /.row -->

                  <button class="btn btn-default"
                  onclick="event.preventDefault();"
                  ng-disabled="frm_details.form_2_7.$invalid"
                  ng-show="(tp.value > 0)" ng-click="calculate()">
                  Calculate Activity Score</button>
                         
                  </ng-form>

                  <!-- ##############################
                        end of dynamic controls 
                       ########################### -->

                   <?php  } else{ ?>


                    <ng-form name="form_2_7">  
                        <!-- selection -->
                        <div class="form-group">
                     
                         <input type="text" class="form-control"
                             
                          name="opt27-cnt" class="form-control input-lg custom-input"  value = " <?php echo $data['opt27-cnt'];?>" readonly="readonly">
                       
                        </div>
                   <?PHP
                   
                    for($i = 1; $i<=$data['opt27-cnt']; $i++ )
                     { 
                    ?>

                  <div class="row">                  
                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Duration</span><input type="text" class="form-control"
                             name="opt27-duration-<?php echo $i; ?>" value = "<?php if($i==1){echo $data['opt27-duration-1'];}
                              else if($i==2){echo $data['opt27-duration-2'];}

                              else if($i==3){echo $data['opt27-duration-3'];}
                              
                              ?>"
                               readonly="readonly"
                              >
                            </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Position</span>                             
                          
                             <input type="text" class="form-control"
                             name="opt27-position-<?php echo $i; ?>" value = "<?php if($i==1){echo $data['opt27-position-1'];}
                              else if($i==2){echo $data['opt27-position-2'];}

                              else if($i==3){echo $data['opt27-position-3'];}
                              
                              ?>"
                               readonly="readonly"
                              >

                            </div>
                    </div>

                    <hr/>
                  </div><!-- /.row -->

                    <?PHP
                    }
                    ?>

                
                         
                  </ng-form>
                 <?php  } ?>


                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>15</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para271"  name = "para271" class="form-control input-lg custom-input"  ng-model="para271" <?php if(!isset($data['para271'])){echo 'ng-value="count3*count4 | number:0"';} ?>  ng-init="para271 ='<?php if(!isset($data['para271'])){}else{echo $data['para271'];} ?>'" data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                         <div id="infoMessage"><?php echo form_error('para271'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para2271"  name = "para2271" class="form-control input-lg custom-input"  ng-model="para2271" ng-init="para2271 ='<?php if(!isset($data['para2271'])){}else{echo $data['para2271'];} ?>'">
                         <div id="infoMessage"><?php echo form_error('para2271'); ?></div>
                    </div>
                </div>
               
            </div>
            </div>
            <hr>
             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.8</label>
                    </div>
                </div>

                 <div class="col-xs-5 col-md-5 right-border">
                    <h4>Participation in Training Program</h4>
                    <strong><p>Participation in short term training courses not less than
                    </p></strong>
                   
                     <div class="radio">
                        <label>
                            <input type="checkbox" name="opt28a" value="opt28a"
                             ng-click="resetProgramCount('opt28a')"
                             <?php if(!isset($data['opt28a'])){echo 'ng-model="opt28a"';}else{echo "checked";} ?>
                            <?php if( isset($data)){ ?>
                            ng-disabled="true"
                            ng-show="false"
                            <?php } ?>
                            >
                            Two Week Duration  <strong><i>(10 Points)</i></strong>
                        </label>
                    </div>

                    <div class="form-group"  style="padding-left: 20px;"
                     <?php if(!isset($data['program-count-two-week'])) { ?>
                     ng-show="opt28a"
                     <?php } ?>
                    >
                      <label for="program-count-two-week">
                      <small>Enter the number of Programs</small></label>
                      <br/>
                      <input  type="number" id="program-count-two-week" name="program-count-two-week"  
                      <?php if(!isset($data['program-count-two-week'])) { ?>
                      ng-change="updateProgramScore()"
                      ng-model="programCountTwoWeek"
                      
                      <?php } else { ?>
                      ng-value = "<?php echo $data['program-count-two-week']; ?>"
                      readonly
                      <?php } ?>
                                           
                      >
                    </div>

                    <hr/>
                     
                     <div class="radio">
                         <label>
                            <input type="checkbox" name="opt28b" value="opt28b" 
                            ng-click="resetProgramCount('opt28b')"
                             <?php if(!isset($data['opt28b'])){echo 'ng-model="opt28b"';}else{echo "checked";} ?>
                            <?php if( isset($data)){ ?>
                            ng-disabled="true"
                            ng-show="false"
                            <?php } ?>
                            >
                            One Week Duration  <strong><i>(5 Points)</i></strong>
                        </label>
                    </div>

                     <div class="form-group" style="padding-left: 20px;"
                     <?php if(!isset($data['program-count-two-week'])) { ?>
                     ng-show="opt28b"
                     <?php } ?>

                     >
                      <label for="program-count-one-week"><small>Enter the number of Programs</small></label>
                      <br/>
                      <input type="number" id="program-count-one-week" name="program-count-one-week" 
                      <?php if(!isset($data['program-count-one-week'])) { ?>
                      ng-change="updateProgramScore()"
                      ng-model="programCountOneWeek"
                      
                      <?php } else { ?>
                      ng-value = "<?php echo $data['program-count-one-week']; ?>"
                      readonly
                      <?php } ?>

                      >
                    </div>

                     <hr/>

                     <div class="radio">
                         <label>
                            <input type="checkbox" name="opt28c" value="opt28c"
                            ng-click="resetProgramCount('opt28c')"
                            <?php if(!isset($data['opt28c'])){echo 'ng-model="opt28c"';}else{echo "checked"; } ?>
                            <?php if( isset($data)){ ?>
                            ng-disabled="true"
                            ng-show="false"
                            <?php } ?>
                            >                            
                            less than one Week Duration (3 points)
                        </label>
                    </div>

                    <div class="form-group"  style="padding-left: 20px;"
                    <?php if(!isset($data['program-count-two-week'])) { ?>
                     ng-show="opt28c"
                     <?php } ?>
                    >
                      <label for="program-count-less-week"><small>Enter the number of Programs</small></label>
                      <br/>
                      <input type="number" id="program-count-less-week" name="program-count-less-week" 
                      
                      <?php if(!isset($data['program-count-less-week'])) { ?>
                      ng-change="updateProgramScore()"
                      ng-model="programCountLessOneWeek"
                      
                      <?php } else { ?>
                      ng-value = "<?php echo $data['program-count-less-week']; ?>"
                      readonly
                      <?php } ?>

                      >
                    </div>

                   
                    
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para281"  name = "para281" class="form-control input-lg custom-input"  ng-model="para281"  ng-value="count5 | number:0" ng-init="para281 ='<?php if(!isset($data['para281'])){}else{echo $data['para281'];} ?>'" data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                         <div id="infoMessage"><?php echo form_error('para281'); ?></div>
                    </div>
                </div>
                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para2281"  name = "para2281" class="form-control input-lg custom-input"  ng-model="para2281" ng-init="para2281 ='<?php if(!isset($data['para2281'])){}else{echo $data['para2281'];} ?>'">
                         <div id="infoMessage"><?php echo form_error('para2281'); ?></div>
                    </div>
                </div>
               
            </div>
            <hr>

             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.9</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                    <p>Internal Revenue Generation (IRG) other grant other than research grant through Organization of FDP / SDP / STTP / Workshop / Seminar</p> 
                    <strong><p>5 points for each RS.  25000 Or Proportionate</p></strong>

                    

                      <div class="radio">
                        <label>
                            <input type="radio"  name="opt29" value="opt29a" <?php if(!isset($data['opt29'])) { echo 'ng-model="opt29" ng-change="opt29 ? (count6 = 0.6) :(count6 = count6 - 0.6)"';} else { if($data['opt29'] == "opt29a") echo "checked";} ?>>
                            Co-ordinator (60%)
                        </label>

                         <label style="position:relative;left:10px;">
                            <input type="radio"  name="opt29" value="opt29b" <?php if(!isset($data['opt29'])) { echo 'ng-model="opt29" ng-change="opt29 ? (count6 = 0.3) :(count6 = count6 - 0.3)"';} else { if($data['opt29'] == "opt29b") echo "checked";} ?>>
                            Co-Coordinator (30%)
                        </label>

                         <label style="position:relative;left:20px;">
                            <input type="radio"  name="opt29" value="opt29c" <?php if(!isset($data['opt29'])) { echo 'ng-model="opt29" ng-change="opt29 ? (count6 = 0.1) :(count6 = count6 - 0.1)"';} else { if($data['opt29'] == "opt29c") echo "checked";} ?>>
                            Member (10%)
                        </label>
                    </div>

                       <div class="col-xs-12 col-md-10 form-group">
                             <input type="text" id = "val29" name = "val29" class="form-control"
                             placeholder="Please specify Amount" custom-input" ng-model="val29" ng-init="val29 ='<?php if(!isset($data['val29'])){}else{echo $data['val29'];} ?>'">
                      </div>
                      
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                         <input type="text"  id = "para291"  name = "para291" class="form-control input-lg custom-input"  ng-model="para291" ng-init="para291 ='<?php if(!isset($data['para291'])){}else{echo $data['para291'];} ?>'">
                         <div id="infoMessage"><?php echo form_error('para291'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"  id = "para2291"  name = "para2291" class="form-control input-lg custom-input"  ng-model="para2291" ng-init="para291 ='<?php if(!isset($data['para291'])){}else{echo $data['para291'];} ?>'">
                         <div id="infoMessage"><?php echo form_error('para291'); ?></div>
                    </div>
                </div>
               
            </div>


             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for=""></label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                    <p>Sponsorship Amount</p> 
                    <strong><p>1 points for each RS.  5000</p></strong>

                    

               

                       <div class="col-xs-12 col-md-10 form-group">

                             <input type="text" id = "val29a" name = "val29a" class="form-control"
                             placeholder="Please specify Amount" custom-input" ng-model="val29a" ng-init="val29a ='<?php if(!isset($data['val29a'])){}else{echo $data['val29a'];} ?>'"
                             
                             >
                      </div>


                   
                      

                      
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span></span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para291a"  name = "para291a" class="form-control input-lg custom-input"  ng-model="para291a" <?php if(!isset($data['para291a'])){echo 'ng-value="[(val29a/5000)]*1 | number:1"';} ?>   ng-init="para291a ='<?php if(!isset($data['para291a'])){}else{echo $data['para291a'];} ?>'" data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                         <div id="infoMessage"><?php echo form_error('para291a'); ?></div>
                    </div>
                </div>

               
            </div>
             



            <hr>
          

             <div>
             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">2.10</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                   
                    <p>Institutional /STES level Governance responsibilities assigned like </p>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2101" value="opt2101" <?php if(!isset($data['opt2101'])) { echo 'ng-model="opt2101" ng-change="opt2101 ? (count7=count7+5) :(count7=count7-5)"';} else {echo "checked";} ?> >Principal/Director – <strong><i>(5 Points)</i></strong>
                        </label>
                    </div>

                     <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2102" value="opt2102" <?php if(!isset($data['opt2102'])) { echo 'ng-model="opt2102" ng-change="opt2102 ? (count7=count7+5) :(count7=count7-5)"';} else {echo "checked";} ?> >Vice Principal –  <strong><i>(5 Points)</i></strong>
                        </label>
                    </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2103" value="opt2103" <?php if(!isset($data['opt2103'])) { echo 'ng-model="opt2103" ng-change="opt2103 ? (count7=count7+4) :(count7=count7-4)"';} else {echo "checked";} ?> >HOD –  <strong><i>(4 Points)</i></strong>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2104" value="opt2104" <?php if(!isset($data['opt2104'])) { echo 'ng-model="opt2104" ng-change="opt2104 ? (count7=count7+3) :(count7=count7-3)"';} else {echo "checked";} ?> >NBA / NAAC / NIRF coordinator -  <strong><i>(3 Points)</i></strong>
                        </label>
                    </div>

                     <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2105" value="opt2105" <?php if(!isset($data['opt2105'])) { echo 'ng-model="opt2105" ng-change="opt2105 ? (count7=count7+2) :(count7=count7-2)"';} else {echo "checked";} ?> >NBA / NAAC / NIRF member -  <strong><i>(2 Points)</i></strong>
                        </label>
                    </div>

                     <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2106" value="opt2106" <?php if(!isset($data['opt2106'])) { echo 'ng-model="opt2106" ng-change="opt2106 ? (count7=count7+3) :(count7=count7-3)"';} else {echo "checked";} ?> >IQAC Coordinator -  <strong><i>(3)</i></strong>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2107" value="opt2107" <?php if(!isset($data['opt2107'])) { echo 'ng-model="opt2107" ng-change="opt2107 ? (count7=count7+2) :(count7=count7-2)"';} else {echo "checked";} ?> >IQAC Member -  <strong><i>(2)</i></strong>
                        </label>
                    </div>

                     <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2108" value="opt2108" <?php if(!isset($data['opt2108'])) { echo 'ng-model="opt2108" ng-change="opt2108 ? (count7=count7+3) :(count7=count7-3)"';} else {echo "checked";} ?> > SWO -  <strong><i>(3 Points)</i></strong>
                        </label>
                    </div>

                     <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2109" value="opt2109" <?php if(!isset($data['opt2109'])) { echo 'ng-model="opt2109" ng-change="opt2109 ? (count7=count7+3) :(count7=count7-3)"';} else {echo "checked";} ?> > College Examination Officer –  <strong><i>(3 Points) </i> </strong>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2110" value="opt2110" <?php if(!isset($data['opt2110'])) { echo 'ng-model="opt2110" ng-change="opt2110 ? (count7=count7+2) :(count7=count7-2)"';} else {echo "checked";} ?> > Member of BoS / Faculty / Academic Council / Senate:  <strong><i>(2 points each)</i></strong>
                        </label>
                    </div>


                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt21101" value="opt21101" <?php if(!isset($data['opt21101'])) { echo 'ng-model="opt21101" ng-change="opt21101 ? (count7=count7+2) :(count7=count7-2)"';} else {echo "checked";} ?> >  Member of other College / University level committees :  <strong><i>(2 points each)</i></strong>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt2111" value="opt2111" <?php if(!isset($data['opt2111'])) { echo 'ng-model="opt2111" ng-change="opt2111 ? (count7=count7+2) :(count7=count7-2)"';} else {echo "checked";} ?> >  Contribution in activities of Statutory bodies :  <strong><i>(2 points each)</i></strong> <br>
                        </label>
                    </div>

                
                   


                    <div class="col-xs-12 col-md-12">
                          
                   </div>

                      
                </div>

               <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>15</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para2101"  name = "para2101" class="form-control input-lg custom-input"  ng-model="para2101" ng-value="count7 + pdac.score | number:0" ng-init="para2101 ='<?php if(!isset($data['para2101'])){}else{echo $data['para2101'];} ?>'" data-toggle="tooltip" data-placement="top" title="Enter a number" readonly>
                         <div id="infoMessage"><?php echo form_error('para2101'); ?></div>
                    </div>
                </div>

                
            </div>



                      <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                       
                    </div>
                </div>
               
                <div class="col-xs-5 col-md-5 right-border">
                <h4></h4>
                
                  <div class="checkbox">
                        
                        
                   <label>
                    <input type = "checkbox" name = "checked1" ng-model = "checked1"
                     <?php if (isset($data['checked1'])) { ?> ng-init = "checked1 = true" <?php } ?>> 
                     Please Specify for any other option
                   </label>
                 
                  </div>

                <div class="col-md-12" ng-show = "checked1">      
              <?php if (!isset($data['opt210-cnt']) || ($data['opt210-cnt'] == 0) ) { ?>
              

                        <!--<input type="text" name = "val210a" class="form-control custom-input" ng-model="val210a" ng-init="val210a ='<?php //if(!isset($data['val210a'])){}else{echo $data['val210a'];} ?>'" placeholder="Please specify">-->

                 <ng-form name="form_2_10">  
                        <!-- selection -->
                        <div class="form-group">
                          <select class="form-control"
                          name="opt210-cnt"
                          ng-change="updateChildren()"
                          ng-model="pdac.value">
                            <option value="0" selected="selected">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                        </div>

                  

                  <div class="row" ng-repeat="extra in pdac.children track by $index">                  
                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Title</span>                                                
                              <input type="text" class="form-control"
                              placeholder="Please enter..." 
                              name="opt210-title-{{$index+1}}" required>
                            </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Score</span>                             
                              <select  class="form-control" name="opt210-value-{{$index+1}}"
                              ng-model= "dynamic.children[$index].score"
                               required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                              </select>
                            </div>
                    </div>

                    <hr/>
                  </div><!-- /.row -->

                  <button class="btn btn-default"
                  onclick="event.preventDefault();"
                  ng-show="pdac.value" ng-click="calculate()">Calculate Activity Score</button>
                         
                  </ng-form>


                </div>

                 <?php } else{ ?>

                      <div class="form-group">
                     
                         <input type="text" class="form-control"
                             
                          name="opt210-cnt" class="form-control input-lg custom-input"  value = " <?php echo $data['opt210-cnt'];?>" readonly="readonly">
                       
                        </div>

                  <?PHP
                   
                    for($i = 1; $i <= $data['opt210-cnt']; $i++ )
                     { 
                    ?>
                    <div class="row">   
                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Title</span>                                                
                              <input type="text" class="form-control"
                               
                              name="opt210-title-<?php echo $i; ?>" 
                              
                              value = "<?php if($i==1){echo $data['opt210-title-1'];}
                              else if($i==2){echo $data['opt210-title-2'];}

                              else if($i==3){echo $data['opt210-title-3'];}?>"
                              readonly="readonly"

                              >
                            </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Score</span>                             
                                 <input type="text" class="form-control"
                             name="opt210-value-<?php echo $i; ?>" value = "<?php if($i==1){echo $data['opt210-value-1'];}
                              else if($i==2){echo $data['opt210-value-2'];}

                              else if($i==3){echo $data['opt210-value-3'];}
                              
                              ?>"
                               readonly="readonly"
                              >
                            </div>
                    </div>

                  
                  </div><!-- /.row -->

                   <?PHP
                    }
                    ?>

                     <?PHP
                    }
                    ?>
               
                

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
                <div class="col-xs-2 col-md-2 right-border text-center" style = "display:none">
                <h1>Total</h1>
                </div>
                <div class="col-xs-2 col-md-2 right-border" style = "display:none">
                    <div class="form-group">                        
                        <input type="text"  id = "pda_total"  name = "pda_total" class="form-control input-lg custom-input" value = "{{para211*1 + para221*1 + para231*1 + para241*1 + para251*1 + para261*1 + para271*1 + para281*1 + para291*1 + para2101*1 + para2101a*1| number:0}}" disabled>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"  id = "pda_total"  name = "pda_total" class="form-control input-lg custom-input" value = "{{para2211*1 + para2221*1 + para2231*1 + para2241*1 + para2251*1 + para2261*1 + para2271*1 + para2281*1 + para2291*1 + para22101*1 | number:0}}" disabled>
                    </div>
                </div>
               
            </div>
                 <div class="row parent-question" style = "margin-bottom: 3%">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        
                    </div>
                </div>
                <hr>
                <div class="col-xs-5 col-md-5 right-border">
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
            </div>
        
             </form>  
                       </div>   
                   </div>
                </div>
           </div>
         </div>   
          
      <!-- page content -->
    
        <!-- footer content -->
       <?php include 'footer.php';?>
        <!-- /footer content -->
 

    <script>


      $('#sub').click(function(){
          
          //  var total = $('#pda_total').attr('value'); 
            para211 = $("#para211").val();
            para221 = $("#para221").val();
            para231 = $("#para231").val();
            para241 = $("#para241").val();
            para251 = $("#para251").val();
            para261 = $("#para261").val();
            para271 = $("#para271").val();
            para281 = $("#para281").val();

            para291 = $("#para291").val();
            para2101 = $("#para2101").val();

            if(para211 == "")
            {
             para211 = 0;
            }

            if(para221 == "")
            {
             para221 = 0;
            }

            if(para231 == "")
            {
             para231 = 0;
            }

            if(para241 == "")
            {
             para241 = 0;
            }
            if(para251 == "")
            {
             para251 = 0;
            }
            if(para261 == "")
            {
             para261 = 0;
            }
            if(para271 == "")
            {
             para271 = 0;
            }
            if(para281 == "")
            {
             para281 = 0;
            }
            if(para291 == "")
            {
             para291 = 0;
            }
            if(para2101 == "")
            {
             para2101 = 0;
            }
            
           

            total = parseFloat(para211) +  parseFloat(para221) +  parseFloat(para231) +  parseFloat(para241) +  parseFloat(para251) +  parseFloat(para261) +  parseFloat(para271) +  parseFloat(para281) +  parseFloat(para291) +  parseFloat(para2101); 
            
          
            
            var total2 = $('#pda_total2').attr('value');

            
            $('#pda_total').val(total);
             




        
          $('#frm_details').attr('action', '<?php echo base_url();?>index.php/Pda_form/insertcategory/'+total+'/'+total2);
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
            
          $("input[type=text]").prop("readonly", true); 
        </script>
       <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>