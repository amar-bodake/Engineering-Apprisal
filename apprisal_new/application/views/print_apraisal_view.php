<html>
 


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
       </head>  


    <body> 

  <div class="container">
  <div class="row">
    <div class="col-md-12">
  <h1 class = "text-center">Appraisal</h1> 
    <div class="" style = "margin-top:4%">

     
 <?php
      if (count($stafs)) {

     echo '<div class="row">';                   
     echo '<table class="table">';
   
    foreach ($stafs as $key => $list) 
        {
       echo "<tr class = 'tab'>";
       echo "<td>Name</td>";
       echo "<td>".$list['name']."</td>";
       echo "</tr>";

       echo "<tr class = 'tab'>";
       echo "<td>PI ID </td>";
       echo "<td>".$list['pi_id']."</td>";
       echo "</tr>";

       echo "<tr class = 'tab'>";
       echo "<td>Emp Id</td>";
       echo "<td>".$list['emp_code']."</td>";
       echo "</tr>";

       echo "<tr class = 'tab'>";
       echo "<td>Email</td>";
       echo "<td>".$list['email']."</td>";
       echo "</tr>";

       echo "<tr class = 'tab'>";
        echo "<td>Institute</td>";
       echo "<td>".$list['campus']."</td>";
        
       echo "</tr>";

        echo "<tr class = 'tab'>";
        echo "<td>Year</td>";
       echo "<td>".$list['year_of_pi']."</td>";
        
       echo "</tr>";

       echo "</table>";

        echo "</div>";
          
      } 
    } 

      if (count($stafs)) {

    echo '<div class="row">';                   
     echo '<table class="table">';
   
    foreach ($stafs as $key => $list) 
        {
    
      echo "<thead>";
     echo "<tr class = 'tab'>";
      echo "<th class = 'text-center'>Score SCA</th>";
      echo "<th class = 'text-center'>Sore PDAC</th>";
      echo "<th class = 'text-center'>Score RC</th>";
      echo "<th class = 'text-center'>Score AHP</th>";
      echo "<th class = 'text-center'>Score PI</th>";
      echo "</tr>";
       echo "</thead>";  


      $pi = (0.4* $list['score_sca']) + (0.2 * $list['score_pdac']) + (0.3 * $list['score_rc']) + (0.1 * $list['score_ahp'] );

       echo "<tr class = 'tab'>";
       echo "<td  class = 'text-center'>".$list['score_sca']."</td>";
       echo "<td class = 'text-center'>".$list['score_pdac']."</td>";
       echo "<td class = 'text-center'>".$list['score_rc']."</td>";
       echo "<td class = 'text-center'>".$list['score_ahp']."</td>";
       echo "<td class = 'text-center'>".$pi."</td>";
       
       echo "</tr>";
       echo "</table>";
       echo "</div>";
       }
     }

      
    
  
    
 ?>  
<div class = "row">
 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 </div>

 <div class = "row">
 <div class = "text-right">
 <p><b>Rachana Navale-Ashtekar</b>
 <p>Vice President (Admin)</p>
 </p>
 </div>
 </div>


</div>
</div>
</div>
</div>
</body>
</html>  

  