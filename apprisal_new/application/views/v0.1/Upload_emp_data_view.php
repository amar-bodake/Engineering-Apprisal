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
                <h3>Performance Appraisal <small>Year 2016-2017</small></h3>
              </div>
            </div>

             <div class="clearfix"></div>

             <div class="row" style="margin-top: 25px;">
              
             <div class="col-md-3">
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
                                              <a>Sed ut perspiciatis unde omnis iste natus error sit</a>
                                          </h2>                            
                            <p class="excerpt" style="padding-top: 10px;">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                            </p>
                          </div>
                        </div>
                      </li>
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>Sed ut perspiciatis unde omnis iste natus error sit</a>
                                          </h2>                            
                            <p class="excerpt" style="padding-top: 10px;">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                            </p>
                          </div>
                        </div>
                      </li>
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>Sed ut perspiciatis unde omnis iste natus error sit</a>
                                          </h2>                            
                            <p class="excerpt" style="padding-top: 10px;">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                            </p>
                          </div>
                        </div>
                      </li>
                  </ul>              
                  </div>
                 </div>
               </div>
             </div>
             


              <div class="col-md-9">
                         <div class="">
                <div class="x_panel">                  
                  <div class="x_title">
                    <h2><i class="fa fa-pie-chart"></i> Upload employee Data <small>Year 2016-2017</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
           
                    <form action="<?php echo base_url();?>index.php/ExcelDataInsert/excel_emp_function" method="post" enctype="multipart/form-data"> 
                     

                         <!--   <div class="col-md-4 col-sm-4 col-xs-12">
                              <select class="form-control" name = "year">
                                <option>Select Year</option>
                                <option>2016-17</option>
                                <option>2017-18</option>
                                
                              </select>
                            </div>-->
                          
                         
                          
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

                       <a class="btn btn-dark" href = "<?php echo base_url();?>index.php/Custumize/emp_data" target = "_blank"><i class="fa fa-edit m-right-xs"></i> Custumize Employee Data</a>

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
                       <h5><a style = "color:blue" href = "https://docs.google.com/spreadsheets/d/1UQTJlqldAGgEsypTAbw9O6kQV0TF9CfSWrgwhYixIx4/edit?usp=sharing" target = "_blank">Click Here for Sample CSV File Download</a></h5>

                      <?php } ?>



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
 

