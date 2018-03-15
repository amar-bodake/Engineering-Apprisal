<?php include 'header.php';?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';?> 
      <!-- /top navigation -->

        <!-- page content -->
 <div class="right_col" role="main">        
   <h6 style = "color:red"> <?php echo validation_errors(); ?> </h6>
   

  <div class="row">
    <div class="col-md-8">

      <div class="dashboard-content">

        <div class="row">
      <!--<button id = "edit" type="" class="btn  btn-raised btn-dark">Edit Profile</button>-->
     </div>

     <br>
                        <!-- content goes here -->    
  <table class="table table-striped table-hover">


  <thead>
    <tr>
      <th class="table-text">Sr.No.</th>
      <th class="table-text">Fields</th>
      <th class="table-text">Details</th>
      
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Employee Code</td>
      <td> <?php echo $emp_code; ?></td>
     
    </tr>
     <tr>
      <th scope="row">2</th>
      <td>Employee Name</td>
      <td> <?php echo $name; ?></td>
       
    </tr>

    <tr>
      <th scope="row">3</th>
      <td>Email</td>
      <td><?php echo $email; ?></td>
      
    </tr>

     <tr>
      <th scope="row">3</th>
      <td>Mobile Number</td>
      <td><?php echo $mobile; ?></td>
      
    </tr>

     <tr>
      <th scope="row">4</th>
      <td>Institute</td>
      <?php
      $this->db->select('*');
       $this->db->from('institutes');
       $this->db->where('id', $institute_id);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $inst1 = $row->name;
             }
          }
        ?>
      <td><?php echo $inst1; ?></td>
      
    </tr>

    <tr>
      <th scope="row">5</th>
      <td>Department</td>

      <?php
       $this->db->select('*');
       $this->db->from('department');
       $this->db->where('id', $department_id);
       $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $dept1 = $row->title;
             }
          }
        ?>

      <td><?php echo $dept1; ?></td>


       
    </tr>


     <tr>
      <th scope="row">6</th>
      <td>Designation</td>
      <?php  
       $this->db->select('*');
      $this->db->from('designations');
      $this->db->where('id', $designation_id);
      $query = $this->db->get();
     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
                  $des1 = $row->name;
             }
          }
        ?>
      <td> <?php echo $des1; ?></td>
      
    </tr>

    <tr>
      <th scope="row">7</th>
      <td>Date of Joining</td>
      <td><?php echo $date_of_joining; ?></td>
     
    </tr>

   

 

</tbody>
</table>
</div>
</div>

 <div class="col-md-4">

      <div class="dashboard-content" style = "padding-top: 28%; padding-left: 20%">

      
       <img height="200" width="200" src="<?php echo base_url();?>uploads/<?php echo $profile_img; ?>" alt="..." class="img-thumnail emp-img profile_img" >

     </div>
</div>



</div>



   
 </div>
       
        <!-- /page content -->

        <!-- footer content -->
       <?php include 'footer.php';?>
        <!-- /footer content -->
 

<script>
$(document).ready(function(){
$("#edit").click(function(){

$("#myModal").modal({backdrop: "static"});
        });
});
</script>