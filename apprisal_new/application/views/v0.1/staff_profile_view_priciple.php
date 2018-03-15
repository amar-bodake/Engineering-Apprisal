<?php
$emp_code = $this->session->emp_code; 
$role = $this->session->role_id;
$year = trim($this->session->ayear);


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
    <!-- page content -->
  <div class="right_col" role="main">        
  <div class="">  

      <div class="page-title">
        <div class="title_left">
          <h3>Appraisals  </h3>
 <small></small></h3>
        </div>
      </div>  
      <div class="clearfix"></div>

             <div class="row" style="margin-top:25px;">
              <div class="col-md-12">
                <div class="x_panel">  

                  <div class="x_content">

                    <div class="btn-group" role="group" aria-label="First group">
                      <button type="button" class="btn btn-link">Choose Appraisal Category <i class="fa fa-angle-double-right"></i></button>
                    </div>
                    
                 <h4 style = "color:red"> Please choose Apprisal Status <b>"Available"</b> to Evaluate HOD and Faculty</h4>     

                <div class="ln_solid"></div>


                   
                  <div class="col-md-3">
                  <input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search for Emp Code.." title="Type in a Emp Code">
                  </div>


                   <div class="col-md-3">
                   <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for names.." title="Type in a name">
                   </div>
                 

                
                    

                    <table class="table table-striped projects" id="myTable">
                      <thead>
                        <tr>
                          <th>Emp Code</th>
                         
                          <th style="width:20%;">Employee</th>   
                          <th style="width:20%;">Appraisal Status</th>  

                          
                                              
                          <th>Department</th>
                           <th class = "skip-filter">Actions</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                       
                       

                          <?php
                              
                             
                            $i = 1;

                               // Displaying Foreign key result......
                               foreach($emp as $row)
                              {

                                  

                                  $inst = $row->institute_id;
                                  $query = $this->db->get_where('institutes', array('id' =>  $inst));
                                  foreach ($query->result() as $r)
                                  {
                                    $inst = $r->name;
                                  
                                  }


                                 $des =$row->designation_id;
                                  $query = $this->db->get_where('designations', array('id' =>  $des));
                                  foreach ($query->result() as $r)
                                  {
                                    $des = $r->name;
                                  
                                  }


                                  $dep = $row->department_id;
                                  $query = $this->db->get_where('department', array('id' =>  $dep));
                                  foreach ($query->result() as $r)
                                  {
                                    $dep = $r->title;
                                  
                                  }

                                  $emp = $row->emp_code;

                                 $query = $this->db->get_where('performance_indicater', array('emp_code' => $emp,'AY' => $year));
                                   if($query->num_rows())
                                  {
                                      foreach ($query->result() as $r)
                                      {
                                        $pi_id = $r->pi_id;
                                      
                                      }



                                     $query = $this->db->get_where('approvals', array('pi_id' => $pi_id));

                                      foreach ($query->result() as $r)
                                      {
                                        $status_my = $r->status_my;
                                       
                                        $status_hod = $r->status_hod;
                                        $status_hr = $r->status_hr;
                                        $status_principal = $r->status_principal;

                                        $status_vice = $r->status_vice;
                                        $status_hr = $r->status_hr;

                                      }

                                   }

                                   else
                                  {
                                      $status_my = -1;
                                      $status_vice = 0; 
                                      $status_hr = 0;
                                  }

                              


                                
                              // End  Foreign key result......

                             
                            
                              //Emp_Code
                              echo "<tr class = 'tab'>"; 
                             
                              echo  '<td>'.$row->emp_code.'</td>';

                              
                              ?>

                              
                            

                              


                              

                              <?php

                              //Employee
                              echo '<td><strong>'.$row->name.'</strong></a><br/>'.$des.'</td>';


                                 //Appraisal Status
                                 if($status_vice == -1)
                                {
                                  echo '<td><button type="button" class = "btn btn-danger btn-xs" disabled="disabled">Disapproved</button></td>';
                                 }

                                 else if($status_hr == 1)
                                {
                                  echo '<td><button type="button" class = "btn btn-success btn-xs">Filed</button></td>';
                                 }

                                else if($status_my == -1)
                                 {
                                    echo '<td><button type="button" class="btn btn-default btn-xs" disabled="disabled">Not Submitted</button></td>';
                                 }
                                 
                               else if($status_vice == -1)
                               {
                                 echo '<td><button type="button" class="btn btn-danger btn-xs">Disapproved</button></td>'; 
                               }
                               else if($status_my == 1 && $status_hod == 0)
                               {
                                 $ecodes = $row->emp_code;
                                 echo '<td><button type="button" class="btn btn-primary btn-xs" disabled>Submitted</button>';
                               } 



                              else if($status_my == 1 && $status_hod == 1 && $status_principal != 1)
                              {
                                 $ecodes = $row->emp_code;
                                echo '<td><button  type="button" class="btn btn-success btn-xs">Available</button></td>';
                              }


                    else if($status_my == 1 && $status_hod == 1 && $status_principal == 1)
                              {
                                 $ecodes = $row->emp_code;
                                echo '<td><button type="button" href='.base_url().'index.php/apraisal_form/view_staff_apraisal/'.base64_encode($ecodes).' class="btn btn-warning btn-xs">Principal Approved</button></td>';
                              }


                               //Institute
                               echo '<td>
                                <small>'.$dep.'</small>
                               </td>'; 

                                $ecodes = $row->emp_code;
                                if($status_my == 1 && $status_hod == 1 &&  $status_principal == 0)
                                {  



                                echo '<td><a href='.base_url().'index.php/apraisal_form/view_staff_apraisal/'.base64_encode($ecodes).' class="btn btn-dark btn-xs" ><i class="fa fa-globe"></i> Appraisal </a>';  
                                }

                                else  if($status_my == 1 && $status_hod == 1 &&  $status_principal == 1)
                                {  

                                echo '<td><a href='.base_url().'index.php/apraisal_form/view_staff_apraisal/'.base64_encode($ecodes).' class="btn btn-dark btn-xs" ><i class="fa fa-globe"></i> Appraisal </a>';  
                                }

                                else
                                {
                                    echo '<td><a href= "#" class="btn btn-dark btn-xs" disabled><i class="fa fa-globe"></i> Appraisal </a>';
                                }

                                if($status_my == -1)
                               {
                               echo '<a href='.base_url().'index.php/apraisal_form/view_report/'.base64_encode($ecodes).' class="btn btn-info btn-xs" style = "display:none"><i class="fa fa-file"></i> Report </a>';
                               }
                               else if($status_my == 1 && $status_hod == 1 &&  $status_principal == 0)
                               {
                                echo '<a href='.base_url().'index.php/apraisal_form/view_report/'.base64_encode($ecodes).' class="btn btn-info btn-xs"  style = "display:none"><i class="fa fa-file"></i> Report </a>'; 
                               }

                              else if($status_my == 1 && $status_hod == 1 && $status_principal == 1)
                               {
                                echo '<a href='.base_url().'index.php/apraisal_form/view_report/'.base64_encode($ecodes).' class="btn btn-info btn-xs"><i class="fa fa-file"></i> Report </a>'; 
                               }

                            

                              

                              echo '</td>';




                              

                               
                               $i++;

                             

                            
                          }
                            ?> 

                       
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
             </div>

 
</div>
</div>


  
      
    
   

<?php include 'footer.php';?>




<script src="<?php echo base_url();?>assets/js/ddtf.js"></script>
<script>
jQuery('#myTable').ddTableFilter();
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


  function myFunction1() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


function myFunction2() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

</script>