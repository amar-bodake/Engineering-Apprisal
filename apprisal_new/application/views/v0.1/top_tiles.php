  <?php

      $role = $this->session->userdata('role_id');
      $inst = $this->session->userdata('inst');
      $dept = $this->session->userdata('dept');
     
    
      
      $this->db->where('status_principal', 1);
      $principal_approved = $this->db->count_all_results('approvals');


      $this->db->where('status_hod', 1);
      $hod_approved = $this->db->count_all_results('approvals');

      $this->db->where('status_hr', 1);
      $hr_filed = $this->db->count_all_results('approvals');


      $this->db->where('role_id', 4);
      $this->db->distinct('emp_code');
      $total = $this->db->count_all_results('employee');

      $this->db->where('forward_status', 1);
      $total_submit = $this->db->count_all_results('sca');  




    


      //SCOE

      $this->db->where('role_id', 4);
      $this->db->where('institute_id', 1);
      $this->db->where('is_active', 1);
      $this->db->distinct('emp_code');
      $total_scoe = $this->db->count_all_results('employee');


      $this->db->select('*');
      $this->db->from('sca');
      $this->db->join('employee', 'employee.emp_code = sca.emp_code', 'inner');
      $this->db->where('forward_status', 1);
      $this->db->where('institute_id', 1);
      $total_scoe_submit =  $this->db->count_all_results();

   
      $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_hod', 1);
      $this->db->where('institute_id', 1);
      $total_scoe_hod_app =  $this->db->count_all_results();


       $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_principal', 1);
      $this->db->where('institute_id', 1);
      $total_scoe_pri_app =  $this->db->count_all_results();




    


      

             
      







     //SKNCOE
      $this->db->where('role_id', 4);
       $this->db->where('institute_id', 2);
      $this->db->distinct('emp_code');
      $total_skncoe = $this->db->count_all_results('employee');



      $this->db->select('*');
      $this->db->from('sca');
      $this->db->join('employee', 'employee.emp_code = sca.emp_code', 'inner');
      $this->db->where('forward_status', 1);
      $this->db->where('institute_id', 2);
      $total_skncoe_submit =  $this->db->count_all_results();

   
      $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_hod', 1);
      $this->db->where('institute_id', 2);
      $total_skncoe_hod_app =  $this->db->count_all_results();


       $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_principal', 1);
      $this->db->where('institute_id', 2);
      $total_skncoe_pri_app =  $this->db->count_all_results();


    //SAE
      $this->db->where('role_id', 4);
       $this->db->where('institute_id', 3);
      $this->db->distinct('emp_code');
      $total_sae = $this->db->count_all_results('employee');


      $this->db->select('*');
      $this->db->from('sca');
      $this->db->join('employee', 'employee.emp_code = sca.emp_code', 'inner');
      $this->db->where('forward_status', 1);
      $this->db->where('institute_id', 3);
      $total_sae_submit =  $this->db->count_all_results();

   
      $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_hod', 1);
      $this->db->where('institute_id', 3);
      $total_sae_hod_app =  $this->db->count_all_results();


       $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_principal', 1);
      $this->db->where('institute_id', 3);
      $total_sae_pri_app =  $this->db->count_all_results();





      //SITS
      $this->db->where('role_id', 4);
      $this->db->where('institute_id', 4);
      $this->db->distinct('emp_code');
      $total_sits = $this->db->count_all_results('employee');


       $this->db->select('*');
      $this->db->from('sca');
      $this->db->join('employee', 'employee.emp_code = sca.emp_code', 'inner');
      $this->db->where('forward_status', 1);
      $this->db->where('institute_id', 4);
      $total_sits_submit =  $this->db->count_all_results();

   
      $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_hod', 1);
      $this->db->where('institute_id', 4);
      $total_sits_hod_app =  $this->db->count_all_results();


       $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_principal', 1);
      $this->db->where('institute_id', 4);
      $total_sits_pri_app =  $this->db->count_all_results();


      //NBNSSOE
      $this->db->where('role_id', 4);
      $this->db->where('institute_id', 5);
      $this->db->distinct('emp_code');
      $total_nbnssoe = $this->db->count_all_results('employee');


      $this->db->select('*');
      $this->db->from('sca');
      $this->db->join('employee', 'employee.emp_code = sca.emp_code', 'inner');
      $this->db->where('forward_status', 1);
      $this->db->where('institute_id', 5);
      $total_nbnssoe_submit =  $this->db->count_all_results();

   
      $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_hod', 1);
      $this->db->where('institute_id', 5);
      $total_nbnssoe_hod_app =  $this->db->count_all_results();


       $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_principal', 1);
      $this->db->where('institute_id', 5);
      $total_nbnssoe_pri_app =  $this->db->count_all_results();


        //SIT
      $this->db->where('role_id', 4);
      $this->db->where('institute_id', 6);
      $this->db->distinct('emp_code');
      $total_sit = $this->db->count_all_results('employee');

      $this->db->select('*');
      $this->db->from('sca');
      $this->db->join('employee', 'employee.emp_code = sca.emp_code', 'inner');
      $this->db->where('forward_status', 1);
      $this->db->where('institute_id', 6);
      $total_sit_submit =  $this->db->count_all_results();

   
      $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_hod', 1);
      $this->db->where('institute_id', 6);
      $total_sit_hod_app =  $this->db->count_all_results();


       $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_principal', 1);
      $this->db->where('institute_id', 6);
      $total_sit_pri_app =  $this->db->count_all_results();



        //SKNSITS
      $this->db->where('role_id', 4);
      $this->db->where('institute_id', 7);
      $this->db->distinct('emp_code');
      $total_sknsits = $this->db->count_all_results('employee');

      $this->db->select('*');
      $this->db->from('sca');
      $this->db->join('employee', 'employee.emp_code = sca.emp_code', 'inner');
      $this->db->where('forward_status', 1);
      $this->db->where('institute_id', 7);
      $total_sknsits_submit =  $this->db->count_all_results();

   
      $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_hod', 1);
      $this->db->where('institute_id', 7);
      $total_sknsits_hod_app =  $this->db->count_all_results();


       $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_principal', 1);
      $this->db->where('institute_id', 7);
      $total_sknsits_pri_app =  $this->db->count_all_results();



        //RMDSSOE
      $this->db->where('role_id', 4);
      $this->db->where('institute_id', 8);
      $this->db->distinct('emp_code');
      $total_rmdssoe = $this->db->count_all_results('employee');


      $this->db->select('*');
      $this->db->from('sca');
      $this->db->join('employee', 'employee.emp_code = sca.emp_code', 'inner');
      
      $this->db->where('forward_status', 1);
      $this->db->where('institute_id', 8);
      //$this->db->distinct('emp_code');
      $total_rmdssoe_submit =  $this->db->count_all_results();

   
      $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_hod', 1);
      $this->db->where('institute_id', 8);
      $total_rmdssoe_hod_app =  $this->db->count_all_results();


       $this->db->select('*');
      $this->db->from('approvals');
      $this->db->join('employee', 'employee.emp_code = approvals.approval_emp_code', 'inner');
      $this->db->where('status_principal', 1);
      $this->db->where('institute_id', 8);
      $total_rmdssoe_pri_app =  $this->db->count_all_results();





      



  ?>



  <div class="row tile_count">
           
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-rocket"></i> Total faculty</span>
              <div class="count"><?php echo $total;?></div>   
        
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-rocket"></i> Academic Year</span>
              <div class="count">2017</div>   
                     
            </div>

            
           
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-rocket"></i> Total Submitted</span>
              <div class="count"><?php echo $total_submit;?></div> 
            
                 
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-space-shuttle"></i> Approved(HOD)</span>
              <div class="count"><?php echo $hod_approved;?></div>
                   
               
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-check-circle"></i> Approved(Principal)</span>
             <div class="count green"><?php echo $principal_approved;?></div>          
         

            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-star"></i> HR Filed</span>
              <div class="count red"><?php echo $hr_filed;?></div>             
              
            </div>                    
          
          </div>




  <div class="row tile_count">
   
      <div class="x_panel">

                    <div class="x_title">
                    <h2></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                      </li>
                 
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
         <div class="x_content" style = "display:none">
           
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
             
             
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SCOE - <?php echo $total_scoe; ?></span>
              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SKNCOE - <?php echo $total_skncoe; ?></span> 

               <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SAE  - <?php echo $total_sae; ?></span>

             <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SITS  - <?php echo $total_sits; ?></span>
              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>NBNSSOE - <?php echo $total_nbnssoe; ?></span>
              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SIT  - <?php echo $total_sit; ?></span>
              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SKNSITS- <?php echo $total_sknsits; ?></span>
              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>RMDSSOE- <?php echo $total_rmdssoe; ?></span>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-rocket"></i> Academic Year</span>
              <div class="count">2017</div>   
              <span class="count_bottom green"><i class="green"><i class="fa fa-sort-asc"></i></i>25 <sup>th</sup> year</span>           
            </div>

            
           
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              
               <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SCOE - <?php echo $total_scoe_submit; ?></span>  

               <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SKNCOE - <?php echo $total_skncoe_submit; ?></span>  

              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SAE - <?php echo $total_sae_submit; ?></span> 

              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SITS - <?php echo $total_sits_submit; ?></span>

              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>NBNSSOE - <?php echo $total_nbnssoe_submit; ?></span>

               <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SIT - <?php echo $total_sit_submit; ?></span>

               <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SKNSITS - <?php echo $total_sknsits_submit; ?></span>

              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>RMDSSOE - <?php echo $total_rmdssoe_submit; ?></span>
                 
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
             
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SCOE - <?php echo $total_scoe_hod_app; ?></span> 

                <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SKNCOE - <?php echo $total_skncoe_hod_app; ?></span> 

                <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SAE - <?php echo $total_sae_hod_app; ?></span>   

                 <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SITS - <?php echo $total_sits_hod_app; ?></span>    

                <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>NBNSSCOE - <?php echo $total_nbnssoe_hod_app; ?></span> 

                 <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SIT - <?php echo $total_sit_hod_app; ?></span>    

                 <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SKNSITS - <?php echo $total_sknsits_hod_app; ?></span>

                 <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>RMDSSOE - <?php echo $total_rmdssoe_hod_app; ?></span>       
               
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                      
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SCOE - <?php echo $total_scoe_pri_app; ?></span> 

              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SKNCOE - <?php echo $total_skncoe_pri_app; ?></span>

              <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SAE - <?php echo $total_sae_pri_app; ?></span>

               <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SITS - <?php echo $total_sits_pri_app; ?></span>

                <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>NBNSSOE - <?php echo $total_nbnssoe_pri_app; ?></span>

                 <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SIT - <?php echo $total_sit_pri_app; ?></span>

                 <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>SKNSITS - <?php echo $total_sknsits_pri_app; ?></span>

                   <br><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i>RMDSSOE - <?php echo $total_rmdssoe_pri_app; ?></span>

            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-star"></i> HR Filed</span>
              <div class="count red"><?php echo $hr_filed;?></div>             
               <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> </i>Of Year 2017</span> 
            </div>                    
          
          </div>

    </div>

      </div>



