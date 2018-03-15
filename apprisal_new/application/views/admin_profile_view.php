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
?>
   <!-- title message -->
        <div class="container wrapper-title">
            <div class="row">
                <div class="col-md-6"><h3>Profile</h3></div>
                <div class="col-md-6 text-right">
                  <?php

                  // I'm India so my timezone is Asia/Calcutta
                        date_default_timezone_set('Asia/Calcutta');

                        // 24-hour format of an hour without leading zeros (0 through 23)
                        $Hour = date('G');
                        $wtxt = "";
                        if ( $Hour >= 5 && $Hour < 12 ) {
                             $wtxt =  "Good Morning";
                             
                        } else if ( $Hour >= 12 && $Hour < 16 ) {
                           $wtxt = "Good Afternoon";
                        } else if ( $Hour >= 16 || $Hour <= 4 ) {
                           $wtxt = "Good Evening";
                        }

                  ?>

                    <h3><?php echo $wtxt; ?>, <span class="text-warning"><?php echo $this->session->name?></span></h3>
                </div>
            </div>
        </div>
        <!-- end of : title message -->

	<div class="container wrapper-dashboard-content">
  <div class="row">
    <div class="col-md-12">
    <div class="dashboard-content">
                        <!-- content goes here -->    
     <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr.No</th>
      <th>Employee ID</th>
      <th>Employee Name</th>
      <th>institute</th>
      <th>Designation</th>
      <th>Department</th>
      <th>Date Of Joining</th>
      <th>Date Of Leaving</th>
      <th>View Profile</th>
       <?php  if ($role == 2) echo "<th>Profile Rights</th>"?>
      
      

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

           // End  Foreign key result......


        echo "<tr class = 'tab' style = 'cursor:pointer';>"; 
       echo "<td>".$i."</td>";
       echo "<td style>".$row->emp_code."</td>";
       echo "<td>".$row->name."</td>";
       echo "<td style>".$inst."</td>";
       echo "<td style>".$des."</td>";
       echo "<td style>".$dep."</td>";
      
       echo "<td style>".$row->date_of_joining."</td>";
       echo "<td style>".$row->date_of_leaving."</td>";
       
       echo '<td><button type="button" class="btn btn-raised btn-success button1" data-toggle="modal" data-target="#myModal">View</button></td>';



       if($role == 2)
       {
       echo '<td id = "dec"><button type="button"  class="btn btn-raised btn-danger">Deactivate</button></td>';
       echo "</tr>";
     }
       $i++;
    }
    ?>
  
   
  </tbody>

</table>
</div>
</div>
</div>

  

    <data></data><div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title name" id = 'name'></h4>
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
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Employee Code</td>
              <td id = "eid"></td>
            
            </tr>


             <tr>
              <th scope="row">2</th>
              <td>Employee Name</td>
              <td class = 'name'></td>
            
            </tr>

        

             <tr>
              <th scope="row">4</th>
              <td>Institute</td>
              <td id = 'inst'></td>
            </tr>

            <tr>
              <th scope="row">5</th>
              <td>Department</td>
              <td  id = 'dep'></td>
            </tr>

             <tr>
              <th scope="row">6</th>
              <td>Designation</td>
              <td  id = 'des'></td>
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

          var eid = ($.trim(tableData[1]));
          var name = ($.trim(tableData[2]));
          var inst = ($.trim(tableData[3]));
          var des = ($.trim(tableData[4]));
          var dep = ($.trim(tableData[5]));
          var doj = ($.trim(tableData[6]));
          var dol = ($.trim(tableData[7]));
         
           $("#eid").html(eid);
           $(".name").html(name);
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



  
});
</script>