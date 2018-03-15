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
          <h3>Employees <small></small></h3>
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
                    
                    <div class="btn-group" role="group" aria-label="First group">
                      <button type="button" class="btn btn-default active" value='' onclick='f0(this)'>All</button>
                      <button type="button" id = "Available" value='Available' class="btn btn-default" onclick='f1(this)'>Available</button>
                      <button type="button" class="btn btn-default" value='Approved' onclick='f2(this)'>Approved</button>
                      <button type="button" class="btn btn-default" value='Not Submitted' onclick='f3(this)'>Not Submitted</button>
                    </div>

                    <div class="ln_solid"></div>
                  <div class="col-md-3">
                  <input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search for Emp Code.." title="Type in a Emp Code">
                  </div>


                   <div class="col-md-3">
                   <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for names.." title="Type in a name">
                   </div>

                   <div class="col-md-3">
                    <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search for Institute.." title="Type in a Institute">
                    </div>

                    

                    <table class="table table-striped projects" id="myTable">
                      <thead>
                        <tr>
                          <th>Emp Code</th>
                          <th>Profile</th>
                          <th style="width:20%;">Employee</th>                          
                          <th>Institute</th>
                          <th style="width:20%;">Appraisal Status</th>
                          <th style ='display:none'>Date Of Joining</th>
                          <th style ='display:none'>Date Of Leaving</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                       

                          <?php
                              
                             
                            $i = 1;

                               // Displaying Foreign key result......
                               foreach($emp as $row)
                              {

                                  

                                  $inst = $row->institute_id;
                                  $profile_img1 = $row->profile_img;
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
                                        $status_hr = $r->status_hr;
                                        $status_vice = $r->status_vice;

                                      }

                                   }

                                   else
                                  {
                                      $status_my = -1; 
                                      $status_vice = 0;
                                      $status_hr = 0;

                                  }

                              


                                
                              // End  Foreign key result......

                             
                            
 
                              echo "<tr class = 'tab'>"; 
                             
                              echo  '<td><a>'.$row->emp_code.'</a></td>';

                              echo  '<td><a>';
                              ?>
                              <img src="<?php echo base_url();?>uploads/<?php echo $profile_img1; ?>" class="avatar" alt="Avatar"></a></td>
                              <?php
                              echo '<td><a href="#" data-toggle="modal" data-target="#myModal"><strong>'.$row->name.'</strong></a><br/>'.$des.'</td>';

                               echo '<td>'.$inst.
                                '<br />
                                <small>'.$dep.'</small>
                               </td>'; 
                              if($status_vice == -1)
                               {
                                  echo '<td><button type="button" class="btn btn-danger" disabled="disabled">Disapproved</button></td>';
                               }

                               else if($status_hr == 1)
                               {
                                  echo '<td><button type="button" class="btn btn-warning" disabled="disabled">Filed</button></td>';
                               }

                              else if($status_my == -1)
                               {
                                  echo '<td><button type="button" class="btn btn-default" disabled="disabled">Not Submitted</button></td>';
                               }
                               else if($status_my == 1 && $status_hod == 0)
                               {
                                $ecodes = $row->emp_code;
                               echo '<td><a href = '.base_url().'index.php/apraisal_form/view_staff_apraisal/'.base64_encode($ecodes).'><button type="button" class="btn btn-warning">Available <i class="fa fa-info-circle"></i></button></a></td>';
                               } 

                              else if($status_my == 1 && $status_hod == 1)
                              {
                                echo '<td><button type="button" class="btn btn-success">Approved <i class="fa fa-check-circle"></i></button></td>';
                              }

                              

                               echo "<td style ='display:none'>".$row->date_of_joining."</td>";
                               echo "<td style ='display:none'>".$row->date_of_leaving."</td>";
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


  

    <data></data><div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title name" id = 'name'>Details</h4>
        </div>
        <hr>
        <div class="modal-body">
          <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Fields</th>
            <th>Details</th>
          </tr>
       </thead>

          <tbody id="fbody">
            <tr>
              <th scope="row">1</th>
              <td>Employee Code</td>
              <td id = "eid"></td>
            </tr>


             <tr>
              <th scope="row">4</th>
              <td>Institute</td>
              <td id = 'inst'></td>
            </tr>


            <tr>
              <th scope="row">7</th>
              <td>Date of Joining</td>
              <td  id = 'doj'></td>
            </tr>

             <tr>
              <th scope="row">8</th>
              <td>Date of Leaving</td>
              <td id = 'dol'></td>
             </tr>
         </tbody>

     </table>
        </div>
        <hr>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    </div>

    
    <?php 
     if(isset($_GET['eid']) && $_GET['eid']!=""){
        $data = array(
          'is_active' => 0
           );

          $this->db->where('emp_code',  $_GET['eid']);
          $this->db->update('employee', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE)
          {
           echo "Error in Updation";
          }
          else
           { 
            echo  $_GET['eid'] . "Profile Deactivated";
            header("location:http://localhost/apraisal/index.php/profile/admin_profile");
            echo  $_GET['eid'] . "Profile Deactivated";
           }
      }

      
     ?>


  

	</div>

<?php include 'footer.php';?>



<script>
$(document).ready(function(){

    $("tr.tab").click(function() {
        var tableData = $(this).children("td").map(function() {
            return $(this).text();
        }).get();

          var eid = ($.trim(tableData[0]));
          var name = ((tableData[2]));
          var inst = ($.trim(tableData[3]));
          var des = ($.trim(tableData[4]));
          var dep = ($.trim(tableData[5]));
          var doj = ($.trim(tableData[5]));
          var dol = ($.trim(tableData[6]));
         
           $("#eid").html(eid);
           //$(".name").html(name);
           $("#inst").html(inst);
           $("#des").html(des);
           $("#dep").html(dep);
           $("#doj").html(doj);
           $("#dol").html(dol);
      
           
           //window.location.href = "http://localhost/apraisal/index.php/profile/admin_profile?eid=" +  eid;



    });


     $("td#dec").click(function() {
      
      

      var $td= $(this).closest('tr').children('td');


      var eid = $td.eq(1).text();

      

       var r = confirm("Are You shure to Deactivate!!!!");
          if (r == true) {
              window.location.href = "http://localhost/apraisal/index.php/profile/admin_profile?eid=" +  eid;
          } 
          else {
              
          }

     });


   // $("#available").click(function(){
       // alert("The paragraph was clicked.");
     // $("button").filter("tr button.btn-warning").css("background-color", "yellow");
       
  //  });

  
});

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
    td = tr[i].getElementsByTagName("td")[2];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function myFunction3() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


function f0(objButton) {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = objButton.value;
 // alert(input);
   filter = objButton.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}





function f1(objButton) {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = objButton.value;
 // alert(input);
   filter = objButton.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function f2(objButton) {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = objButton.value;
 // alert(input);
   filter = objButton.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function f3(objButton) {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = objButton.value;
 // alert(input);
   filter = objButton.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];

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