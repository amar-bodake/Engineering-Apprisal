<?php  $role = $this->session->role_id;
       $des =  $this->session->des_id;

?>
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
     $code = $this->uri->segment(3);
?>

             <!-- title message -->
        <div class="container wrapper-title">
            <div class="row">
               
     


                <div class="col-md-6"><h3>Appraisal/Assessment</h3></div>
                <div class="col-md-6 text-right">
                  <?php

                  // I'm India so my timezone is Asia/Calcutta
                        date_default_timezone_set('Asia/Calcutta');

                        // 24-hour format of an hour without leading zeros (0 through 23)
                        $Hour = date('G');
                        $wtxt = "";
                        if ( $Hour >= 5 && $Hour < 12 ) {
                             $wtxt =  "Good Morning";
                             
                        } else if ( $Hour >= 12 && $Hour <16 ) {
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
    
        
   
    
     <div class = "container wrapper-dashboard-content">
     
    <h6 style = "color:red"> <?php echo validation_errors(); ?> </h6>
       <?php
          echo '<script> $("#myModal").modal({backdrop: "static"}); </script>'; 
       ?>

  <div class="row">
    <div class="col-md-12">

    <a href = "<?php echo base_url();?>index.php/apraisal_form/view_sca/<?php  echo $code; ?>" target="_blank"><button class="btn btn-block btn-lg btn-danger"><span class="glyphicon glyphicon-import"></span> Explore</button></a>
   


   <div class="dashboard-content">
     <center> <h2><b>Calculation Of Assessment</b></h2></center>
      <table class="table table-bordered" id = "mytable2">
  <thead>
    <tr>
      <th>
        Assessment Head: Optimum Marks
      </th>
      <th>
        Self Evaluation Score (A)
      </th>
      <th>  
        Evaluation by  HoD/Principal (B)
      </th>
      <th>Scaled Score out of 100(c)</th>

    

      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>
       Student Centric Activities (SCA)
      </th>
      <td>
      <?php echo $ass['sca_total']; ?>
                                              
      </td>
      <td>
       <?php echo $ass['sca_total2']; ?>
      </td>
      <td>
         <?php echo($ass['scale_sca']) ; ?>
      </td>
    </tr>
    <tr>
      <th>
       Professional Development and Academic Contribution (PDAC)
      </th>
      <td>
        <?php echo $ass['pda_total']; ?>
      </td>
      <td>
         <?php echo $ass['pda_total2']; ?>
      </td>
      <td>
        <?php echo $ass['scale_pda']; ?>
      </td>
  


    </tr>
    <tr>
      <th>
        Research Contribution (RC)
      </th>
      <td>
          <?php echo $ass['rc_total']; ?>
      </td>
      <td>
          <?php echo $ass['rc_total2']; ?>
      </td>
      <td>
       <?php echo $ass['scale_rc']; ?>
      </td>

    </tr>


    <tr>
      <th>
        Assessment by HoD/Principal (AHP)
      </th>
      <td>
          <?php echo $ass['ahp_total']; ?>
      </td>
      <td>
        <?php echo $ass['ahp_total2']; ?>
      </td>
      <td>
        <?php echo $ass['scale_ahp']; ?>
      </td>



    </tr>


  </tbody>
</table>



    <center> <h2><b>Calculation Of Performance Indicater(PI)</b></h2></center>

 <table class="table table-bordered" id = "mytable">
  <thead>
    <tr>
      <th>
        Assessment Head: Optimum Marks
      </th>
      <th>
        Self Evaluation Score (A)
      </th>
      <th>  
        Evaluation by  HoD/Principal (B)
      </th>
      <th>Scaled Score out of 100(c)</th>
       <th>Scaled Score as per Designation(c)</th>

      <th>Grade</th>

      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>
       Student Centric Activities (SCA)
      </th>
      <td>
      <?php echo $ass['sca_total']; ?>
                                              
      </td>
      <td>
       <?php echo $ass['sca_total2']; ?>
      </td>
      <td>
         <?php echo($ass['scale_sca']) ; ?>
      </td>
       <td>
         <?php echo($ass['des_sca']) ; ?>
      </td>
       <td>
         <?php 

         if($ass['scale_sca'] >= 60) 
        {
          echo "Outstanding";

        } 
        else if($ass['scale_sca'] >= 50 && $ass['scale_sca'] <= 60) 
        {
           echo "Very Good"; 
        }

         else if($ass['scale_sca'] >= 45 && $ass['scale_sca'] <= 50) 
        {
           echo "Positively Good"; 
        }

        else if($ass['scale_sca'] >= 40 && $ass['scale_sca'] <= 45) 
        {
           echo "Good"; 
        }

         else if($ass['scale_sca'] >= 30 && $ass['scale_sca'] <= 40) 
        {
           echo "Good"; 
        }

        else if($ass['scale_sca'] <= 30) 
        {
           echo "Below Average"; 
        }
       ?>


      </td>
    </tr>
    <tr>
      <th>
       Professional Development and Academic Contribution (PDAC)
      </th>
      <td>
        <?php echo $ass['pda_total']; ?>
      </td>
      <td>
         <?php echo $ass['pda_total2']; ?>
      </td>
      <td>
        <?php echo $ass['scale_pda']; ?>
      </td>
       
       <td>
        <?php echo $ass['des_pda']; ?>
       </td>


     
          <td>
         <?php 

         if($ass['scale_pda'] >= 60) 
        {
          echo "Outstanding";

        } 
        else if($ass['scale_pda'] >= 50 && $ass['scale_pda'] <= 60) 
        {
           echo "Very Good"; 
        }

         else if($ass['scale_pda'] >= 45 && $ass['scale_pda'] <= 50) 
        {
           echo "Positively Good"; 
        }

        else if($ass['scale_pda'] >= 40 && $ass['scale_pda'] <= 45) 
        {
           echo "Good"; 
        }

         else if($ass['scale_pda'] >= 30 && $ass['scale_pda'] <= 40) 
        {
           echo "Good"; 
        }

        else if($ass['scale_pda'] <= 30) 
        {
           echo "Below Average"; 
        }
       ?>


      </td>


    </tr>
    <tr>
      <th>
        Research Contribution (RC)
      </th>
      <td>
          <?php echo $ass['rc_total']; ?>
      </td>
      <td>
          <?php echo $ass['rc_total2']; ?>
      </td>
      <td>
       <?php echo $ass['scale_rc']; ?>
      </td>

      <td>
       <?php echo $ass['des_rc']; ?>
      </td>

      
        <td>
         <?php 

         if($ass['scale_rc'] >= 60) 
        {
          echo "Outstanding";

        } 
        else if($ass['scale_rc'] >= 50 && $ass['scale_rc'] <= 60) 
        {
           echo "Very Good"; 
        }

         else if($ass['scale_rc'] >= 45 && $ass['scale_rc'] <= 50) 
        {
           echo "Positively Good"; 
        }

        else if($ass['scale_rc'] >= 40 && $ass['scale_rc'] <= 45) 
        {
           echo "Good"; 
        }

         else if($ass['scale_rc'] >= 30 && $ass['scale_rc'] <= 40) 
        {
           echo "Good"; 
        }

        else if($ass['scale_rc'] <= 30) 
        {
           echo "Below Average"; 
        }
       ?>


      </td>
    </tr>


    <tr>
      <th>
        Assessment by HoD/Principal (AHP)
      </th>
      <td>
          <?php echo $ass['ahp_total']; ?>
      </td>
      <td>
        <?php echo $ass['ahp_total2']; ?>
      </td>
      <td>
        <?php echo $ass['scale_ahp']; ?>
      </td>

       <td>
        <?php echo $ass['des_ahp']; ?>
      </td>


       <td>
         <?php 

         if($ass['scale_ahp'] >= 60) 
        {
          echo "Outstanding";

        } 
        else if($ass['scale_ahp'] >= 50 && $ass['scale_ahp'] <= 60) 
        {
           echo "Very Good"; 
        }

         else if($ass['scale_ahp'] >= 45 && $ass['scale_ahp'] <= 50) 
        {
           echo "Positively Good"; 
        }

        else if($ass['scale_ahp'] >= 40 && $ass['scale_ahp'] <= 45) 
        {
           echo "Good"; 
        }

         else if($ass['scale_ahp'] >= 30 && $ass['scale_ahp'] <= 40) 
        {
           echo "Good"; 
        }

        else if($ass['scale_ahp'] <= 30) 
        {
           echo "Below Average"; 
        }
       ?>


      </td>

    </tr>

     </tr>
    <tr style = "background:#CDDC39">
      <th>
        Performance Indicater(PI)
      </th>
      <td colspan ="4">
      <?php
          
          echo  $ass['pi'];
      ?>
      </td>
      <td>
           <?php 

         if($ass['pi'] >= 60) 
        {
          echo "Outstanding";

        } 
        else if($ass['pi'] >= 50 && $ass['pi'] <= 60) 
        {
           echo "Very Good"; 
        }

         else if($ass['pi'] >= 45 && $ass['pi'] <= 50) 
        {
           echo "Positively Good"; 
        }

        else if($ass['pi'] >= 40 &&$ass['pi'] <= 45) 
        {
           echo "Good"; 
        }

         else if($ass['pi'] >= 30 &&$ass['pi'] <= 40) 
        {
           echo "Good"; 
        }

        else if($ass['pi'] <= 30) 
        {
           echo "Below Average"; 
        }
       ?>

      </td>
 
      </tr>

  </tbody>
</table>


        <div id="chartContainer" style="height: 400px; width: 100%;"></div>

        <div id="chartContainer_pi" style="height: 400px; width: 100%;"></div>
        
     </div>
</div>
</div>





</div>



<?php include 'footer.php';?>

<script type="text/javascript">
    window.onload = function () {



        var table = document.getElementById('mytable'), 
        rows = table.getElementsByTagName('tr'),
        i, j, cells, sca;

      for (i = 0, j = rows.length; i < j; ++i) {
          cells = rows[1].getElementsByTagName('td');
          if (!cells.length) {
              continue;
          }
          sca = cells[2].innerHTML;
      }

       for (i = 0, j = rows.length; i < j; ++i) {
          cells = rows[2].getElementsByTagName('td');
          if (!cells.length) {
              continue;
          }
          pda = cells[2].innerHTML;
      }

       for (i = 0, j = rows.length; i < j; ++i) {
          cells = rows[3].getElementsByTagName('td');
          if (!cells.length) {
              continue;
          }
          rc = cells[2].innerHTML;
      }

       for (i = 0, j = rows.length; i < j; ++i) {
          cells = rows[4].getElementsByTagName('td');
          if (!cells.length) {
              continue;
          }
          ahp = cells[2].innerHTML;
      }

      for (i = 0, j = rows.length; i < j; ++i) {
          cells = rows[5].getElementsByTagName('td');
          if (!cells.length) {
              continue;
          }
         
          pi = cells[0].innerHTML;




      }

       other = 100 - pi;



      // column chart for assessment
      var chart = new CanvasJS.Chart("chartContainer", {
        title: {
          text: "Column Chart of Assessment"
        },
        data: [{
          type: "column",
          dataPoints: [
            { y: parseInt(sca), label: "SCA" },
            { y: parseInt(pda), label: "PDA" },
            { y: parseInt(rc), label: "RC" },
            { y: parseInt(ahp), label: "AHP" },
          ]
        }]
      });
      
     chart.render();   


    var chart_pi = new CanvasJS.Chart("chartContainer_pi",
    {
    theme: "theme2",
    title:{
      text: "Pie chart of PI"
    },
    data: [
    {
      type: "pie",
      showInLegend: true,
      toolTipContent: "#percent %",
      yValueFormatString: "#0.#,,. ",
      legendText: "{indexLabel}",
      dataPoints: [
        {  y: parseFloat(pi), indexLabel: "PI" },
        {  y:parseFloat(other), indexLabel: "Remain" }
       
      ]
    }
    ]
  });
  



      chart_pi.render();
    }
  </script>