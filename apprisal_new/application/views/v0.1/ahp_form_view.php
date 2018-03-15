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
                <h3>Assessment by HOD / Principal (AHP)</h3>
              </div>
           </div>
           
           <div style="margin-bottom:50px;"></div>
           
           <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_content">
                          <form  ng-app="" role="form" action='<?php $_SERVER['PHP_SELF']; ?>' method="post" id = "frm_details">

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
                        <h4 for="exampleInputEmail1">4.A <span style = "color:red">*</span></h4>
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
                        <input type="text" min="1" max="80"   id = "para4a" name = "para4a" class="form-control input-lg custom-input"  ng-model="para4a" ng-init="para4a ='<?php if(!isset($data['para4a'])){}else{ echo $data['para4a'];} ?>'" pattern="[1-80]" title="can not exceed max limit" required="required" data-toggle="tooltip" data-placement="top" >
                          <div id="infoMessage"><?php echo form_error('para4a'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para44a" name = "para44a" class="form-control input-lg custom-input"  ng-model="para44a" ng-init="para44a ='<?php if(!isset($data['para44a'])){}else{echo $data['para44a'];} ?>'" >
                          <div id="infoMessage"><?php echo form_error('para44a'); ?></div>
                    </div>
                </div>
                
            </div>
            <hr>

  <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="exampleInputEmail1">4.B <span style = "color:red">*</span></h4>
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
                        <input type="text"  min="1" max="20"   id = "para4b" name = "para4b" class="form-control input-lg custom-input"  ng-model="para4b" ng-init="para4b ='<?php if(!isset($data['para4b'])){}else{echo $data['para4b'];} ?>'" pattern="[1-20]" title="can not exceed max limit" required="required" data-toggle="tooltip" data-placement="top" >
                          <div id="infoMessage"><?php echo form_error('para4b'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para44b" name = "para44b" class="form-control input-lg custom-input"  ng-model="para44b" ng-init="para44b ='<?php if(!isset($data['para44b'])){}else{echo $data['para44b'];} ?>'">
                          <div id="infoMessage"><?php echo form_error('para44b'); ?></div>
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
                        <input type="text"  id = "ahp_total"  name = "ahp_total" class="form-control input-lg custom-input" value = "{{para4a*1 + para4b*1 | number:0}}" disabled>
                    </div>
                </div>


                 <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"  id = "ahp_total2"  name = "ahp_total2" class="form-control input-lg custom-input" value = "{{para44a*1 + para44b*1 | number:0}}" disabled>
                    </div>
                </div>


               
            </div>

         <hr>


                 <div class="row parent-question" style = "margin-bottom: 3%">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        
                    </div>
                </div>

                <div class="col-xs-7 col-md-7 right-border">
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
        <!-- /page content -->
       
       

        <!-- footer content -->
       <?php include 'footer.php';?>
        <!-- /footer content -->
 

                            
 <script>
      $('#sub').click(function(){
           var total = $('#ahp_total').attr('value'); 
           var total2 = $('#ahp_total2').attr('value');
        
         $('#frm_details').attr('action', '<?php echo base_url();?>index.php/Ahp_form/index/'+total+'/'+total2);
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

       <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>