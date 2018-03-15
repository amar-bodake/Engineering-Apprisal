<table>
          <tbody>
                  <?php
              // $listemp = "sdc1";
              if (count($myntfs)) {
              
              echo '<table class="table table-striped table-hover ">';
              echo '<thead>';
              echo '<th>Sr.No</th>';
              echo  '<th>Message</th>';
              echo  '</tr>';
              $i = 1;
              foreach ($myntfs as $key => $list1) 
              {      

                             
                              if($list1->flag == '1')
                              {
                              echo '<tr style = "opacity: 0.5"  class = "tab">';
                              }

                              else
                              {
                                 echo '<tr class = "tab">';
                              }
               
                echo "<td >".$i."</td>";
               
                echo "<td><b></b> "  .$list1->message." by <b>".$list1->name ." </b>".$list1->comment.",  </b> on ".$list1->given_at."</td>";
               // echo "</a>";

                echo '<td ><a href = '.base_url().'index.php/apraisal_form/view_apraisal/'.$list1->emp_code.'/'.$list1->id.'>view</a></td>';
               
               

                echo "</tr>";
                 $i++;
              } 
            } 
            else 
            { 
             echo "<h4>No New Notification</h4>"; 
            }
            
         ?>  
     </tbody>

    </table> 
      