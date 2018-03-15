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
                <h3>Performance Appraisal</h3>
              </div>
            </div>

             <div class="clearfix"></div>

             <div class="row" style="margin-top: 25px;">
              
    


              <div class="col-md-12">
                         <div class="">
                <div class="x_panel">                  
                  <div class="x_title">
                    <h2><i class="fa fa-pie-chart"></i> Upload Department Data </h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
           
                    <form action="<?php echo base_url();?>index.php/ExcelDataInsert/excel_function" method="post" enctype="multipart/form-data"> 
                     

                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <select class="form-control" name = "year">
                                <option>Select Year</option>
                                <option>2016-2017</option>
                               
                                
                              </select>
                            </div>
                          
                         
                          
                          <div class="form-group">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                               <input type="file" id="upload" name="upload"/>
                              </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                          
                     </form>
                     
                     <br>
                     <hr>

                     <a class="btn btn-dark" href = "<?php echo base_url();?>index.php/Custumize/dept_data" target = "_blank"><i class="fa fa-edit m-right-xs"></i> Custumize Department Data</a>


                     <?php if($this->session->flashdata('success')){ ?>
                      <div class="alert alert-success">
                      <a href="#" class="close" data-dismiss="alert"></a>
                       <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                      </div>
                    
                   
                     <?php }else if($this->session->flashdata('warning')){  ?>
                     <div class="alert alert-warning">
                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
                     </div>

                      <?php }else if($this->session->flashdata('info')){  ?>
                      <div class="alert alert-info">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                          <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
                      </div>
                       <?php } else {  ?>
                       <h5>Please Upload a CSV File!</h5>
                       <h5><a style = "color:blue" href = "https://drive.google.com/file/d/0B-pxP9OGhSCocDh3b2poNi1PYzA/view?usp=sharing" target = "_blank">Click Here for Sample CSV File Download</a></h5>

                      <?php } ?>


                      <p><b>Note for Self-Appraisal CSV file</b></p>
                      <ol>
                          <li>For Lecture / Practical allocated field, strictly use formula specified.</li>
                          <ul>
                            <li>No. Div(s) x No. Hrs/week x No. of Weeks <b>(Column 4 &amp; 9). </b></li>
                          
                            <li>No. of Batches x No. of Hrs/week x No. of Weeks <b>(Column 6 &amp; 12).</b> </li>

                        </ul>
                           
                            <li>For Semester-II result, use results of previous academic year semester-II. For example, for assessment year 2016-17 Semester-II results, use 2015-16 semester-II results.</li>
                            
                            <li>For Theory-I / II &amp; Practical-I / II - Feedback, Avg. of Div.-wise &amp; Avg. of Batch-wise feedback is to be specified respectively on 4-point scale.</li>

                            <li>HoD&#39;s need to prepare certified semester wise summary report of Lecture/practical allocated and conducted, Theory/practical subject feedback, Theory/practical % Result and average of previous three years’ percentage result, Theory/practical Attendance for all the staff members &amp; subjects/practical in the specified format.</li>

                            <li>Enter ONLY NUMERICAL values in all the cells.</li>

                            <li>For not applicable cell, fill with zero (0) value. Don’t keep any cell blank/empty. (e.g. if only one theory subject is taken by faculty members, add zero in Theory-II cell).</li>

                            <li>For theory lectures, only prominent Theory-I and Theory-II (preferably UG subjects) should to be considered (if more than two theory subjects are taken by faculty).</li>

                            <li>Consider 7 Lectures/Credit for ME, in Lecture Allocated Sem-I / Sem-II Column.</li>



                           
                      </ol>



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
 

