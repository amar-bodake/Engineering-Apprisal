    <table>
               <tbody>
               <?php
                    // $listemp = "sdc1";
                    if (count($ntfs)) {
                    
                    echo '<table class="table table-striped table-hover ">';
                    echo '<thead>';
                    echo '<th>Sr.No</th>';
                    echo  '<th>Message</th>';
                    echo  '</tr>';
                    $i = 1;
                    foreach ($ntfs as $key => $list) 
                    {

                      if($list->flag == '1')
                      {
                      echo '<tr style = "opacity: 0.5"  class = "tab">';
                      }

                      else
                      {
                         echo '<tr class = "tab">';
                      }
                     
                      echo "<td >".$i."</td>";
                     
                      echo "<td><b>".$list->emp_name. "</b> "  .$list->message." by <b>".$list->name." </b>, " .$list->comment. " </b> on ".$list->given_at."</td>";
                     // echo "</a>";

                      echo '<td><a href = '.base_url().'index.php/apraisal_form/staff_apraisal/'.$list->assign_of.'/'.$list->id.'>view</a></td>';
                     
                           $listemp = $list->emp_code;

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