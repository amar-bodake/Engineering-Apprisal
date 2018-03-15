<?php 
    $i = 1;
   if(!empty($posts)): foreach($posts as $post): ?>

          <?php    echo '<table class="table table-striped table-hover ">';
                                             echo  '<thead>';
                                             echo '<tr>';
                                             echo  '<th>Employee ID</th>';
                                             echo  '<th>Employee Name</th>';
                                             echo  '<th>Date Of PI </th>';
                                             echo '<th>Action View</th>';
                                             echo '<th>Action Filed</th>';
                                             echo '<th>Action Print</th>';
                                             echo '</tr>';
                                             echo '</thead>';
                                             echo "<tr class = 'tab'>";
                                             echo  '<td>'.$post["emp_code"].'</td>';
                                             echo  '<td>'.$post["name"].'</td>';
                                              echo  '<td>'.$post["date_of_pi_creation"].'</td>';

                                             echo  '<td><a href = '.base_url().'index.php/apraisal_form/view_apraisal/'.$post["emp_code"].'><button type="button" class="btn btn-raised btn-primary button1">View</button></a></td>';

                                             echo  '<td><a href = '.base_url().'index.php/apraisal_form/forward_apraisal/'.$post["emp_code"].'><button type="button" class="btn btn-raised btn-success  button1">Filed</button></a></td>';

                                             echo  '<td><a href = '.base_url().'index.php/apraisal_form/print_apraisal/'.$post["emp_code"].'/'.$post["pi_id"].'><button type="button" class="btn btn-raised btn-warning button1">Print</button></td>';
                                             echo "</tr>";

                                         


                            echo '</table>'
                  ?>
   

<?php endforeach; else: ?>
<p>Post(s) not available.</p>
<?php endif; ?>
<?php echo $this->ajax_pagination->create_links(); ?>