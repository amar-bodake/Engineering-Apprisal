<?php



        $emp_code1 = $this->session->emp_code;  

       

      $this->db->select('*');
      $this->db->from(' employee');
      $this->db->where('emp_code', $emp_code1);
      $query = $this->db->get();
     
       
        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {

                $name1 = $row->name;
                $institute_id1 = $row->institute_id;
                $designation_id1 = $row->designation_id;
                $department_id1 = $row->department_id;
                $email1 =  $row->email;
             }

          }


      $this->db->select('*');
      $this->db->from(' designations');
      $this->db->where('id', $designation_id1);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $des1 = $row->name;
             }
          }


       $this->db->select('*');
       $this->db->from('institutes');
       $this->db->where('id', $institute_id1);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $inst1 = $row->name;
             }
          }


        $this->db->select('*');
       $this->db->from('department');
       $this->db->where('id', $department_id1);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $dept1 = $row->title;
             }
          }


       $this->db->select('*');
      
       $this->db->from('academic_year');
       $this->db->where('status_show', '1');


       $query = $this->db->get();


        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $set_year = $row->year;
                  
             }
          }
       //echo $set_year; 
      // die;

        $this->db->select('*');
       $this->db->from('sca');
       $this->db->where('emp_code', $emp_code1);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $user_year = $row->AY;
                  $user_filed_status = $row->filed_status;
             }
          }

          else
          {
           $user_year = 0; 
           $user_filed_status = -1; 
          }


?>



<?php include 'header.php';?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';?> 
      <!-- /top navigation -->

        <!-- page content -->
    <!-- page content -->
        <div class="right_col" role="main">        
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>Performance Appraisal <small></small></h3>
              </div>
            </div>

             <div class="clearfix"></div>

             <div class="row" style="margin-top: 25px;">
              
                <div class="row" style="margin-top: 25px;">
              
             <div class="col-md-4">
               <div class="">
                 <div class="x_panel">
                   <div class="x_title">
                    <h2><i class="fa fa-info-circle"></i> Guidelines</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <ul class="list-unstyled timeline widget">
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>Faculty has to complete the appraisal under the mentioned 3 heads.</a>
                                          </h2>                            
                            <p class="excerpt" style="padding-top: 10px;"> </p>
                            
                              <p>Student Centric Activities (SCA)</p>
                              <p>Professional Developement & Academic Contribution (PDAC)</p>
                              <p>Research Contribution (RC)</p>
                            
                           
                           
                          </div>
                        </div>
                      </li>
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                               <a>The total scores for each will be automatically calculated and Performance Indicator will reflect depending on the grade/profile of the Faculty.</a>
                            </h2><br>                            
                            
                          </div>
                        </div>
                      </li>
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                              <a>Only after all segments are complete, the faculty can submit the form.</a>
                            </h2> <br>                        
                          
                          </div>
                        </div>
                      </li>
                  </ul>              
                  </div>
                 </div>
               </div>
             </div>


              <div class="col-md-8">
              <div class="">
                <div class="x_panel">                  
                  <div class="x_title">
                    <h2><i class="fa fa-pie-chart"></i> Performance Appraisal Assesment Year</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
           
                  <address>
                      <strong><?php echo $name1;?></strong>
                      <br><strong><?php echo $des1?></strong>
                      <br>Emp Code : <?php echo $emp_code1;?>
                      <br><?php echo $inst1?>
                      <br><?php echo $dept1?>
                      <br><?php echo $email1?>
                     <!-- <br><?php echo $approval_officer?>-->
                  </address>

                 
                 
                
                    <div class = "approval" ng-app="" style="padding-bottom:100px;">
                    <table id = "yearTable" class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width:10%;" class="text-center">Status</th>
                          <th>Assessment Year</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php if (($user_filed_status == 1 || $user_filed_status == -1)): ?>
                         <?php if (($set_year != $user_year)): ?>
                          <tr>
                          <td id = "row1"><a class="btn btn-dark btn-block btn-md">To Do <i class="fa fa-exclamation"></i></a></td>
                          <td id = "row2">
                            <h5>
                              <a href class="text-primary" data-toggle="tooltip" data-placement="top" title="Click To Visit" ><?php echo $set_year;?></a>
                            </h5>
                          </td>
                         
                        </tr>
                        <?php endif; ?>
                        <?php endif; ?>
                        
                         <?php
                           if($user_filed_status != -1)
                           {
                               foreach($year as $row)
                              {
                                echo "<tr>";
                                if($row['filed_status'] == 1)
                                {
                                echo '<td id = "row1"><a class="btn btn-success btn-block btn-md">Done <i class="fa fa-check-circle"></i></a></td>';
                                }

                                else
                                {
                                 echo '<td id = "row1"><a class="btn btn-warning btn-block btn-md">Pending <i class="fa fa-check-circle"></i></a></td>';

                                }

                                echo '<td id = "row2">
                                  <h5>
                                    <a href data-toggle="tooltip" data-placement="top" title="Click To Visit">'.$row['AY'].'</a>
                                  </h5>
                                </td>';
                               
                                echo "<tr>";  


                                

                              }

                            }
                          ?>

                  
                         
                   
                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
              </div>
              <!-- /.col-md-12 -->

             </div>
             <!-- /.row -->
          </div>
        </div>
        <!-- /page content -->
       
        <!-- /page content -->

        <!-- footer content -->
       <?php include 'footer.php';?>
        <!-- /footer content -->

       <script type="text/javascript">
         
        $(document).ready(function(){ 
        $("td").click(function(){
      
        var a = $(this).closest("tr").find('td:eq(1)').text();
       // alert(a);
              
              $.ajax({
                      type: "POST",
                      data: {data:a},
                      url: "<?php echo base_url();?>index.php/apraisal_form/set_year/",
                    
                    
                        success:function(){
                        console.log("ok");

                         window.location.href = "<?php echo site_url('apraisal_form/my_apprisal'); ?>";
                          //windows  
                      
                    }
                 });


        });
         });
       </script>>
 

