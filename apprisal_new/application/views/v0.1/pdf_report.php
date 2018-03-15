<?php
 $code = base64_decode($this->uri->segment(3));
 $role = $this->session->role_id;



 if (empty($code))
      { 

        $emp_code1 = $this->session->emp_code;  

      }

      else
      {
         $emp_code1 = $code; 
      }


      $this->db->select('*');
      $this->db->from('employee');
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
                $fac_role_id =   $row->role_id; 
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
       $this->db->from('approvals');
       $this->db->where('approval_id', $sca_id);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $status_hod = $row->status_hod;
                  $status_principal = $row->status_principal;
                  $status_vice = $row->status_vice;
 
             }
          } 

          else
          {

                  $status_principal = 0;  
          }    
  
         
  

      $this->db->select('*');
      $this->db->from('employee');
      $this->db->where('emp_code', $approval_officer);
      $query = $this->db->get();
     
       
        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {

                $hod = $row->name;
                $hod_inst = $row->institute_id;
                
             }

          }

          else
          {
            $hod = 'NA';
            $hod_inst = 'NA'; 
          }


      $this->db->select('*');
      $this->db->from('institutes');
      $this->db->where('id', $hod_inst);
      $query = $this->db->get();
     
       
        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {

                $principal_id = $row->principal_id;
               
                
             }

          }

           else
          {
            $principal_id = 'NA';
           
          }


      $this->db->select('*');
      $this->db->from('employee');
      $this->db->where('emp_code', $principal_id);
      $query = $this->db->get();
     
       
        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {

                $principal = $row->name;
                
                
             }

          }

          else
          {
            $principal = 'NA'; 
          }



         
?>


<!DOCTYPE html>
<html lang="en">
<title>Sinhgad Institutes | Performance Appraisal</title>

 <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
  <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->

  </head>

  <body class="nav-md footer_fixed">
   <div class="container body">
      <div class="main_container">
   

       
        
     
  <div class="right_col" role="main">        
  <div class="">  

      <div class="page-title">
        <div class="title_left">
          <h3>Report <small>Analysis</small></h3>
 <small></small></h3>
        </div>
      </div>  
      <div class="clearfix"></div>

         
             <div class="row">
              <div class="col-md-12">
                <div class="x_panel">                  
                  <div class="x_content">
                    <section class="content invoice">

                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-globe"></i> Performance Appraisal
                                          <small class="pull-right">Appraisal ID <a href="javascript:;"><strong>#<?php echo $sca_id?></strong></a></small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>

                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-8 invoice-col">
                          of
                          <address>
                                          <b><?php echo $name1;?></b>
                                          <br/><strong><?php echo $des1?></strong>
                                          <br>Emp Code : <?php echo $emp_code1;?>
                                          <br><?php echo $inst1?>
                                          <br><?php echo $dept1?>
                                          <br><?php echo $email1?>
                                      </address>
                        </div> 
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->


                      <div class="row">
                        <div class="col-md-12">
                          <p>Congratulations ! </p>

                           <p>Your Performance Appraisal for Academic Year <?php echo $ayear?> has been submitted and evaluated as per Self evaluation, 
                            <?php if ($fac_role_id == 4): ?>HOD and Principal  <?php endif; ?>
                           <?php if ($fac_role_id == 3): ?>Principal  <?php endif; ?>
                          <?php if ($fac_role_id == 2): ?>Vice President  <?php endif; ?>


                            review. </p>

                          <p>The performance has been marked as <b> "<?php if(isset($grade)) { echo $grade; } ?> " </b></p>
                        </div>
                      </div>
                      <!-- /.row -->

                       <?php if ($fac_role_id == 4): ?>
                      <div class="row">                        
                        <div class="col-xs-12 table">
                          <table class="table table-bordered" style = "text-align:center;border-spacing:5px;border:border: 4px solid black">
                            <thead>
                              <tr>
                                <th style = "text-align:center;padding: 4px;">Assessment Head</th>
                                <th style = "text-align:center;padding: 4px">Self Evaluation</th>
                                <th style = "text-align:center;padding: 4px">HOD Evaluation</th>
                                <th style = "text-align:center;padding: 4px">Scaled Score</th>
                                
                              </tr>                               
                            </thead>
                            <tbody>
                              <tr>
                                <th style = "padding: 4px;text-align: center;">Student Centric Activities (SCA)</td>
                                <td style = "padding: 4px"><?php if(!isset($sca) || $sca == 0 ) { echo '0'; } else { echo $sca; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($sca2) || $sca2 == 0 ) { echo '0'; } else { echo $sca2; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($sca2) || $sca2 == 0 ) { echo '0'; } else { echo $scale_sca; } ?></td>
                               
                              </tr>
                              <tr>
                                <th style = "padding: 4px">Professional Developement &amp; Academic Contribution (PDAC)</td>
                                <td style = "padding: 4px"><?php if(!isset($pdac) || $pdac == 0) { echo '0'; } else { echo $pdac; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($pdac2) || $pdac2 == 0) { echo '0'; } else { echo $pdac2; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($pdac2) || $pdac2 == 0) { echo 'To Do'; } else { echo $scale_pda; } ?></td>
                               
                              </tr>
                              <tr>
                                <th style = "padding: 4px">Research Contribution (RC)</td>
                                <td style = "padding: 4px"><?php if(!isset($rc) || $rc == 0) { echo '0'; } else { echo $rc; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($rc2) || $rc2 == 0) { echo '0'; } else { echo $rc2; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($rc2) || $rc2 == 0) { echo '0'; } else { echo $scale_rc; } ?></td>
                               
                              </tr>
                              <tr>
                                <th style = "padding: 4px">Assessment by HOD/Princiapl (AHP)</td>
                                <td style = "padding: 4px"><?php if(!isset($ahp) || $ahp == 0) { echo '0'; } else { echo $ahp; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($ahp2) || $ahp2 == 0) { echo '0'; } else { echo $ahp2; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($ahp2) || $ahp2 == 0) { echo '0'; } else { echo $scale_ahp; } ?></td>
                               
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div><!-- .row -->
                       <?php endif; ?>



                       <?php if ($fac_role_id == 3 || $fac_role_id == 2): ?>
                      <div class="row">                        
                        <div class="col-xs-12 table">
                          <table class="table table-bordered" style = "text-align:center;border-spacing:5px;border:border: 4px solid black">
                            <thead>
                              <tr>
                                <th style = "text-align:center;padding: 4px;">Assessment Head</th>
                                <th style = "text-align:center;padding: 4px">Self Evaluation</th>
                                <th style = "text-align:center;padding: 4px"><?php if ($fac_role_id == 3): ?> Principal Evaluation   
                                <?php endif; ?>
                                <?php if ($fac_role_id == 2): ?>VP Evaluation   
                                <?php endif; ?></th>
                                <th style = "text-align:center;padding: 4px">Scaled Score</th>
                                
                              </tr>                               
                            </thead>
                            <tbody>
                              <tr>
                                <th style = "padding: 4px;text-align: center;">Department</td>
                                <td style = "padding: 4px"><?php if(!isset($dept) || $dept == 0 ) { echo '0'; } else { echo $dept; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($dept2) || $dept2 == 0 ) { echo '0'; } else { echo $dept2; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($scale_dept) || $scale_dept == 0 ) { echo '0'; } else { echo $scale_dept; } ?></td>
                               
                              </tr>
                              <tr>
                                <th style = "padding: 4px">Academics</td>
                                <td style = "padding: 4px"><?php if(!isset($acd) || $acd == 0) { echo '0'; } else { echo $acd; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($acd2) || $acd2 == 0) { echo '0'; } else { echo $acd2; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($scale_acd) || $scale_acd == 0) { echo '0'; } else { echo $scale_acd; } ?></td>
                               
                              </tr>
                              <tr>
                                <th style = "padding: 4px">Industry / Other Institutes</td>
                                <td style = "padding: 4px"><?php if(!isset($insts) || $insts == 0) { echo '0'; } else { echo $insts; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($insts2) || $insts2 == 0) { echo '0'; } else { echo $insts2; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($scale_insts) || $scale_insts == 0) { echo '0'; } else { echo $scale_insts; } ?></td>
                               
                              </tr>
                              <tr>
                                <th style = "padding: 4px">Students</td>
                                <td style = "padding: 4px"><?php if(!isset($stds) || $ahp == 0) { echo '0'; } else { echo $stds; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($stds2) || $stds2 == 0) { echo '0'; } else { echo $stds2; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($scale_stds) || $scale_stds == 0) { echo '0'; } else { echo $scale_stds; } ?></td>
                               
                              </tr>

                              <tr>
                                <th style = "padding: 4px">Faculty and Staff</td>
                                <td style = "padding: 4px"><?php if(!isset($fas) || $fas == 0) { echo '0'; } else { echo $fas; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($fas2) || $fas2 == 0) { echo '0'; } else { echo $fas2; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($scale_fas) || $scale_fas == 0) { echo '0'; } else { echo $scale_fas; } ?></td>
                               
                              </tr>


                              <tr>
                                <th style = "padding: 4px">Professional Conduct/ Development and Contribution to Institution/STES</td>
                                <td style = "padding: 4px"><?php if(!isset($pcd) || $pcd == 0) { echo '0'; } else { echo $pcd; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($pcd2) || $pcd2 == 0) { echo '0'; } else { echo $pcd2; } ?></td>
                                <td style = "padding: 4px"><?php if(!isset($scale_pcd) || $scale_pcd == 0) { echo '0'; } else { echo $scale_pcd; } ?></td>
                               
                              </tr>


                            </tbody>
                          </table>
                        </div>
                      </div><!-- .row -->
                       <?php endif; ?>




                      <div class="row">                        
                        <div class="col-md-8">
                          <p class="lead">Performace Indicator</p>
                          <table class="table table-bordered" style = "text-align:center;border-spacing:5px;border:border: 4px solid black">
                            <thead>
                              <tr>
                                <th style = "text-align:center;padding: 4px;">Academic Year</th>
                                <th style = "text-align:center;padding: 4px">PI Score</th>
                                <th style = "text-align:center;padding: 4px">Grade</th>
                              </tr>                               
                            </thead>
                            <tbody>
                            
                              <tr>
                                <td style= "padding: 4px;width:2px"><?php echo $ayear?></td>
                                <td style= "padding: 4px;width:2px"><?php if((!isset($fpi) || $fpi == 0)) { echo '0'; } else { echo $fpi; } ?></td>
                                <td style= "padding: 4px;width:20%"><?php if(isset($grade)) { echo $grade; } ?></td>
                              </tr>                             
                            </tbody>
                          </table>
                        </div>

                  

                  



                      </div><!-- .row -->


                     



                    </section>
                  </div>
                </div>
              </div>
             </div>


                  <div class="row">
               <div class="col-md-12">
                <div class="x_panel">                  
                  <div class="x_content">
                 
                  <h4>Comments</h4>
                  
                  <ul class="messages">


                            <?php if ($vp_comment != NULL) { ?>

                          <li>
                           

                          
                         
                            <div class="message_wrapper">
                              <h4 class="heading">Rachana Navale-Ashtekar <small> Vice-President</small></h4>
                               <blockquote class="message"><?php echo $vp_comment ?>
                              </blockquote>
                              
                                                        
                            </div>
                          </li>
                          <?php } ?>

                          <?php if ($pricipal_comment != NULL) { ?>

                          <li>
                           
                          
                            <div class="message_wrapper">
                              <h4 class="heading"><?php echo $principal?><small>Principal</small></h4>
                              <blockquote class="message"><?php echo $pricipal_comment ?>
                              </blockquote>
                              
                                                        
                            </div>
                          </li>
                          <?php } ?>

                          <?php if ($hod_comment != NULL) { ?>
                          <li>

                            
                       
                            <div class="message_wrapper">
                              <h4 class="heading"><?php echo $hod?> <small>Head of Department</small></h4>
                              <blockquote class="message"><?php echo $hod_comment?>
                              </blockquote>
                                                            
                            </div>
                          </li>
                           <?php } ?>
                          
                  </ul>

                  </div>
                 </div> 
               </div>
             </div>


       


    



        </div>
    </div>


  </body>
</html>




