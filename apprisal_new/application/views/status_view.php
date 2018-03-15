 
   <div class="row">
                        <form id="wizard-1" novalidate="novalidate">
                            <div id="bootstrap-wizard-1" class="col-sm-12">

                                   <?php
                                    $myrole = $this->session->userdata('role_id');
                                    if (count($status)) {
                                    
                                     foreach ($status as $key => $list3) 
                                    {
                                      
                                      $my = $list3->status_my;
                                      $hod = $list3->status_hod;
                                      $principal = $list3->status_principal;
                                      $president = $list3->status_vice;
                                      $hr = $list3->status_hr;
                                      $pi = $list3->pi_id;
                                      
                                     
                                     } 

                                  } 

                                  else 
                                  { 
                                  // echo "no data"; 
                                  }

                                  // echo  $my;
                                  // echo  $hod;
                                  // echo  $principal;
                                  //echo  $president;
                                  // echo  $hr;
                                  // echo $pi;
                  
                                   ?>
                                
                                <?php if( $myrole == 4 ) : ?>   <!-- Not Display to President and HR-->
                                <div class="form-bootstrapWizard">
                                    <ul class="bootstrapWizard form-wizard">
                                        <li <?php echo ($my == '1') ? "class='active'" : ""; ?> >
                                            <a> <span class="step">1</span> <span class="title">Appraisal Submit</span> </a>
                                        </li>
                                        <li <?php echo ($hod == '1') ? "class='active'" : ""; ?>>
                                            <a> <span class="step">2</span> <span class="title">Forwarded By HOD</span> </a>
                                        </li>
                                        <li <?php echo ($principal == '1') ? "class='active'" : ""; ?>>
                                           <a> <span class="step">3</span> <span class="title">Forwarded By Principal</span> </a>
                                        </li>
                                        <li <?php echo ($president == '1') ? "class='active'" : ""; ?>>
                                            <a> <span class="step">4</span> <span class="title">Approved By Vice - President</span> </a>
                                        </li>
                                          <li <?php echo ($hr == '1') ? "class='active'" : ""; ?>>
                                            <a> <span class="step">5</span> <span class="title">Filed By HR</span> </a>
                                        </li>


                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <?php endif; ?>

                              <!--For HOD --> 

                                <?php if( $myrole == 3 ) : ?>
                                    
                                    <div class="form-bootstrapWizard" style= "margin-left:10%">
                                    <ul class="bootstrapWizard form-wizard" style = "">
                                        <li <?php echo ($my == '1') ? "class='active'" : ""; ?> >
                                            <a> <span class="step">1</span> <span class="title">Appraisal Submit</span> </a>
                                        </li>
                                     
                                        <li <?php echo ($principal == '1') ? "class='active'" : ""; ?>>
                                           <a> <span class="step">2</span> <span class="title">Forwarded By Principal</span> </a>
                                        </li>
                                        <li <?php echo ($president == '1') ? "class='active'" : ""; ?>>
                                            <a> <span class="step">3</span> <span class="title">Approved By Vice - President</span> </a>
                                        </li>
                                          <li <?php echo ($hr == '1') ? "class='active'" : ""; ?>>
                                            <a> <span class="step">4</span> <span class="title">Filed By HR</span> </a>
                                        </li>


                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <?php endif; ?>

                               <!--For Principle-->

                                <?php if( $myrole == 2 ) : ?>

                                      <div class="form-bootstrapWizard" style= "margin-left:25%">
                                    <ul class="bootstrapWizard form-wizard">
                                        <li <?php echo ($my == '1') ? "class='active'" : ""; ?> >
                                            <a> <span class="step">1</span> <span class="title">Appraisal Submit</span> </a>
                                        </li>
                                       
                                      
                                        <li <?php echo ($president == '1') ? "class='active'" : ""; ?>>
                                            <a> <span class="step">4</span> <span class="title">Approved By Vice - President</span> </a>
                                        </li>
                                          <li <?php echo ($hr == '1') ? "class='active'" : ""; ?>>
                                            <a> <span class="step">5</span> <span class="title">Filed By HR</span> </a>
                                        </li>


                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                 <?php endif; ?>

                               </div>
                        </form>
                    </div>