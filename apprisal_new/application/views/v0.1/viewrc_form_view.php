    <?php
$emp_code = $this->session->emp_code; 


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
      <div class="right_col" role="main" style = "margin-bottom: 20px">
        <div class="page-title">
              <div class="title_left">
                <h3>Research Contribution (RC)</h3>
              </div>
        </div>
        <div class="clearfix" style="margin-bottom:20px;"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel" ng-app="moduleRC">
                   
                    <div class="x_content">

            <div class="row" ng-hide="true">
              <div class="col-md-12">
                <img src="http://sim.sinhgad.edu/appraisals/engineering/assets/images/ripple.gif" alt="Loading">
                <p class="lead">Loading Form....</p>
              </div>
            </div> 

             <form novalidate ng-app="" role="form" method="post" id = "frm_details" name="formRC" ng-cloak>

            <div class=""> 
            <div style="margin-top:30px;"></div>
        
              <div class="row parent-question">
                <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                       <center> <h4 class="text-colour">Sr.No.</h4> </center>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <center><h4 class="text-colour">Parameter</h4></center>             
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                 <center> <h4 class="text-colour">Optimum Score </h4> </center>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                   <center> <h4 class="text-colour">Self Evaluation</h4> </center>
                </div>
                 <div class="col-xs-2 col-md-2 right-border"  style = "<?php echo "display: none";?>">
                   <center> <h4 class="text-colour">Evaluation by HOD</h4> </center>
                </div>
                
            </div>
            <hr>
            <div style="margin-top:60px;"></div>
             
             <div class="row parent-question" ng-controller="Ctrl_3_1 as _3_1">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="exampleInputEmail1">3.1</h4>
                    </div>
                   </div>

               
                <div class="col-xs-5 col-md-5 right-border">  

                <h4>Research Publication (Journals)</h4>
                <p>Number of articles in referred International Journal</p>

                <!--  ############################################################
                      ############################################################
                      section : scopus 
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formScopus">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">Scopus Articles ( {{ _3_1.articles.scopus.score }} )
                          </span>
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc311-cnt" 
                          name="rc311-cnt"                          
                          ng-model="_3_1.articles.scopus.count"
                          ng-change="_3_1.articleCount( 'scopus' )"      
                          ng-options="v for v in _3_1.articleCountOptions">            
                          </select> 
                          <?php } ?> 

                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" id="rc311-cnt" name="rc311-cnt"
                          ng-model="_3_1.articles.scopus.count" readonly>
                          <?php } ?>                                         
                        </div>

                        <div ng-repeat="article in _3_1.articles.scopus.articles track by $index">
                          
                          <p><small>Article : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Total Authors</span>
                          <select class="form-control"
                          name="rc311-{{$index + 1}}-ta"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_1.dynamicArticles.scopus.articles[$index].totalAuthors"
                          ng-options="v for v in _3_1.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          > 
                          <?php if(isset($data)) { ?>
                          <option value="{{ _3_1.articles.scopus.articles[$index].totalAuthors }}">
                            {{ _3_1.articles.scopus.articles[$index].totalAuthors }}
                          </option>
                          <?php } ?>                        
                          </select><!-- /total authors -->
                          </div>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Author Position</span>
                          <select class="form-control"
                          name="rc311-{{$index + 1}}-ap"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_1.dynamicArticles.scopus.articles[$index].authorPosition"
                          ng-options="v for v in _3_1.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                          <?php if(isset($data)) { ?>
                          <option value="{{ _3_1.articles.scopus.articles[$index].authorPosition }}">
                            {{ _3_1.articles.scopus.articles[$index].authorPosition }}
                          </option>
                          <?php } ?>                           
                          </select><!-- /authors position -->
                          </div>                         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_1.calculate('scopus')"
                        ng-show="( formRC.formScopus.$valid && ( _3_1.articles.scopus.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disabled
                        <?php } ?>
                        >
                        Calculate Scopus Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : scopus 
                      ############################################################
                      ########################################################## --> 
                      <hr/>
                <!--  ############################################################
                      ############################################################
                      section : web of science 
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formWOS">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">Web of Science Articles ( {{ _3_1.articles.wos.score }} )</span>
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-wos--count" 
                          name="rc312-cnt"                         
                          ng-model="_3_1.articles.wos.count"                         
                          ng-change="_3_1.articleCount( 'wos' )"
                          ng-options="v for v in _3_1.articleCountOptions">                          
                          </select>
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" id="rc312-cnt" name="rc312-cnt"
                          ng-model="_3_1.articles.wos.count" readonly>
                          <?php } ?>
                        </div>

                        <div ng-repeat="article in _3_1.articles.wos.articles track by $index">
                          
                          <p><small>Article : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Total Authors</span>
                          <select class="form-control"
                          name="rc312-{{$index + 1}}-ta"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_1.dynamicArticles.wos.articles[$index].totalAuthors"
                          ng-options="v for v in _3_1.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >   
                          <?php if(isset($data)) { ?>
                          <option value="{{ _3_1.articles.wos.articles[$index].totalAuthors }}">
                            {{ _3_1.articles.wos.articles[$index].totalAuthors }}
                          </option>
                          <?php } ?>                 
                          </select><!-- /total authors -->
                          </div>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Author Position</span>
                          <select class="form-control"
                          name="rc312-{{$index + 1}}-ap"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_1.dynamicArticles.wos.articles[$index].authorPosition"
                          ng-options="v for v in _3_1.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          > 
                          <?php if(isset($data)) { ?>
                          <option value="{{ _3_1.articles.wos.articles[$index].authorPosition }}">
                            {{ _3_1.articles.wos.articles[$index].authorPosition }}
                          </option>
                          <?php } ?>                       
                          </select><!-- /authors position -->
                          </div>                         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_1.calculate('wos')"
                        ng-show="( formRC.formWOS.$valid && ( _3_1.articles.wos.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disabled
                        <?php } ?>
                        >
                        Calculate Web of Science Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : web of science 
                      ############################################################
                      ########################################################## -->
                      <hr/>
                <!--  ############################################################
                      ############################################################
                      section : google scholar 
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formGS">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">Google Scholar Articles ( {{ _3_1.articles.gs.score }} )</span>
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-gs--count" 
                          name="rc313-cnt"                         
                          ng-model="_3_1.articles.gs.count"                          
                          ng-change="_3_1.articleCount( 'gs' )"
                          ng-options="v for v in _3_1.articleCountOptions">                          
                          </select>
                          <?php } ?>

                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" id="rc313-cnt" name="rc313-cnt"
                          ng-model="_3_1.articles.gs.count" readonly>
                          <?php } ?>

                        </div>

                        <div ng-repeat="article in _3_1.articles.gs.articles track by $index">
                          
                          <p><small>Article : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Total Authors</span>
                          <select class="form-control"
                          name="rc313-{{$index + 1}}-ta"
                          <?php if(!isset($data)) { ?> 
                          ng-model="_3_1.dynamicArticles.gs.articles[$index].totalAuthors"
                          ng-options="v for v in _3_1.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly 
                          <?php } ?>
                          >       
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_1.articles.gs.articles[$index].totalAuthors}}">
                            {{_3_1.articles.gs.articles[$index].totalAuthors}}
                          </option>
                          <?php } ?>                    
                          </select><!-- /total authors -->
                          </div>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Author Position</span>
                          <select class="form-control"
                          name="rc313-{{$index + 1}}-ap"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_1.dynamicArticles.gs.articles[$index].authorPosition"
                          ng-options="v for v in _3_1.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >   
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_1.articles.gs.articles[$index].authorPosition}}">
                            {{_3_1.articles.gs.articles[$index].authorPosition}}
                          </option>
                          <?php } ?>                         
                          </select><!-- /authors position -->
                          </div>                         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_1.calculate('gs')"
                        ng-show="( formRC.formGS.$valid && ( _3_1.articles.gs.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disabled
                        <?php } ?>
                        >
                        Calculate Google Scholar Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : google scholar
                      ############################################################
                      ########################################################## -->                   
                </div> <!-- end if 3.1 calculations -->


                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>12</span></div>                     
                </div>
                
                <div class="col-xs-2 col-md-2 right-border">
                        <input type="text"                       
                        name = "rc-threeOne"
                        class="form-control"
                        ng-model="_3_1.articles[3.1].score" readonly>  
                </div>

                
                
            </div>

          <hr>

          <div class="row parent-question" ng-controller="Ctrl_3_2 as _3_2">
                
                <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="exampleInputEmail1">3.2</h4>
                    </div>
                </div>

                
              <div class="col-xs-5 col-md-5 right-border">
              <h4>Number of articles National/International level research papers in non-referred /Journals but having ISSN numbers and the list of journals prepared by the
university and hosted on its website.</h4>
              <!--  ############################################################
                      ############################################################
                      section : issn
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formISSN">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">Articles ( {{ _3_2.articles.issn.score }} )</span>
                          
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-issn--count" 
                          name="rc321-cnt"                         
                          ng-model="_3_2.articles.issn.count"                          
                          ng-change="_3_2.articleCount( 'issn' )"
                          ng-options="v for v in _3_2.articleCountOptions">                          
                          </select>
                          <?php } ?>

                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" name="rc321-cnt"
                          ng-model="_3_2.articles.issn.count" readonly>
                          <?php } ?>

                        </div>

                        <div ng-repeat="article in _3_2.articles.issn.articles track by $index">
                          
                          <p><small>Article : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Total Authors</span>
                          <select class="form-control"
                          name="rc321-{{$index + 1}}-ta"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_2.dynamicArticles.issn.articles[$index].totalAuthors"
                          ng-options="v for v in _3_2.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          > 
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_2.articles.issn.articles[$index].totalAuthors}}">
                            {{_3_2.articles.issn.articles[$index].totalAuthors}}
                          </option>
                          <?php } ?>                          
                          </select><!-- /total authors -->
                          </div>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Author Position</span>
                          <select class="form-control"
                          name="rc321-{{$index + 1}}-ap"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_2.dynamicArticles.issn.articles[$index].authorPosition"
                          ng-options="v for v in _3_2.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          > 
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_2.articles.issn.articles[$index].authorPosition}}">
                            {{_3_2.articles.issn.articles[$index].authorPosition}}
                          </option> 
                          <?php } ?>                         
                          </select><!-- /authors position -->
                          </div>                         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_2.calculate('issn')"
                        ng-show="( formRC.formISSN.$valid && ( _3_2.articles.issn.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disabled
                        <?php } ?>
                        >
                        Calculate Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : issn
                      ############################################################
                      ########################################################## --> 
                </div>


                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>6</span></div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">                    
                   <input type="text"                        
                        name="rc-threeTwo"
                        class="form-control"
                        ng-model="_3_2.articles[3.2].score" readonly>  
                </div>
                
            </div> <!-- end of 3.2 calculation -->    
            
            <hr>

            <div class="row parent-question" ng-controller="Ctrl_3_3 as _3_3">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.3</h4>
                    </div>
                 </div>


                <div class="col-xs-5 col-md-5 right-border">                    
                    
                    <h4>Number of full papers in Conference Proceedings , etc.</h4>
                    
                <!--  ############################################################
                      ############################################################
                      section : international
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formInternational">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">
                          International ( {{ _3_3.articles.international.score }} )</span>
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-international--count" 
                          name="rc331-cnt"                        
                          ng-model="_3_3.articles.international.count"
                          ng-change="_3_3.articleCount( 'international' )"
                          ng-options="v for v in _3_3.articleCountOptions">                          
                          </select>
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" name="rc331-cnt"
                          ng-model="_3_3.articles.international.count" readonly>
                          <?php } ?>
                        </div>

                        <div ng-repeat="article in _3_3.articles.international.articles track by $index">
                          
                          <p><small>Article : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Total Authors</span>
                          <select class="form-control"
                          name="rc331-{{$index + 1}}-ta"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_3.dynamicArticles.international.articles[$index].totalAuthors"
                          ng-options="v for v in _3_3.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          > 
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_3.articles.international.articles[$index].totalAuthors}}">
                            {{_3_3.articles.international.articles[$index].totalAuthors}}
                          </option> 
                          <?php } ?>                           
                          </select><!-- /total authors -->
                          </div>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Author Position</span>
                          <select class="form-control"
                          name="rc331-{{$index + 1}}-ap"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_3.dynamicArticles.international.articles[$index].authorPosition"
                          ng-options="v for v in _3_3.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >   
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_3.articles.international.articles[$index].authorPosition}}">
                            {{_3_3.articles.international.articles[$index].authorPosition}}
                          </option> 
                          <?php } ?>                        
                          </select><!-- /authors position -->
                          </div>                         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_3.calculate('international')"
                        ng-show="( formRC.formInternational.$valid && ( _3_3.articles.international.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disabled
                        <?php } ?>  
                        >
                        Calculate Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : international
                      ############################################################
                      ########################################################## -->
                      <hr/>
                <!--  ############################################################
                      ############################################################
                      section : national
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formNational">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">National ( {{ _3_3.articles.national.score }} )</span>
                          
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-national--count" 
                          name="rc332-cnt"                         
                          ng-model="_3_3.articles.national.count"
                          ng-change="_3_3.articleCount( 'national' )"
                          ng-options="v for v in _3_3.articleCountOptions">                          
                          </select>
                          <?php } ?>

                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" name="rc332-cnt"
                          ng-model="_3_3.articles.national.count" readonly>
                          <?php } ?>

                        </div>

                        <div ng-repeat="article in _3_3.articles.national.articles track by $index">
                          
                          <p><small>Article : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Total Authors</span>
                          <select class="form-control"
                          name="rc332-{{$index + 1}}-ta"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_3.dynamicArticles.national.articles[$index].totalAuthors"
                          ng-options="v for v in _3_3.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >  
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_3.articles.national.articles[$index].totalAuthors}}">
                            {{_3_3.articles.national.articles[$index].totalAuthors}}
                          </option> 
                          <?php } ?>                        
                          </select><!-- /total authors -->
                          </div>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Author Position</span>
                          <select class="form-control"
                          name="rc332-{{$index + 1}}-ap"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_3.dynamicArticles.national.articles[$index].authorPosition"
                          ng-options="v for v in _3_3.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          > 
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_3.articles.national.articles[$index].authorPosition}}">
                            {{_3_3.articles.national.articles[$index].authorPosition}}
                          </option> 
                          <?php } ?>                         
                          </select><!-- /authors position -->
                          </div>                         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_3.calculate('national')"
                        ng-show="( formRC.formNational.$valid && ( _3_3.articles.national.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disabled
                        <?php } ?> 
                        >
                        Calculate Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : national
                      ############################################################
                      ########################################################## -->                      
                                  

                </div> <!-- end of wrapper -->

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>5</span></div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <input type="text"                                            
                        class="form-control"
                        name="rc-threeThree"
                        ng-model="_3_3.articles[3.3].score" readonly>                   
                </div>

            </div> <!-- end of : 3.3 calculations -->


            <hr>

            <div class="row parent-question" ng-controller="Ctrl_3_4 as _3_4">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.4</h4>
                    </div>
                </div>
                
                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Research Publications (books, in chapters in books , other than referred journal articles)</h4>
                      <p>
                      Number of Text or reference Books Published by International
                      Publishers with an established peer review system
                      </p>
                <!--  ############################################################
                      ############################################################
                      section : books
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formBooks">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">Books ( {{ _3_4.articles.books.score }} )</span>
                          
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-books--count" 
                          name="rc341-cnt"                         
                          ng-model="_3_4.articles.books.count"
                          ng-change="_3_4.articleCount( 'books' )"
                          ng-options="v for v in _3_4.articleCountOptions">                          
                          </select>
                          <?php } ?>

                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" name="rc341-cnt"
                          ng-model="_3_4.articles.books.count" readonly>
                          <?php } ?>

                        </div>

                        <div ng-repeat="article in _3_4.articles.books.articles track by $index">
                          
                          <p><small>Article : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Total Authors</span>
                          <select class="form-control"
                          name="rc341-{{$index + 1}}-ta"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_4.dynamicArticles.books.articles[$index].totalAuthors"
                          ng-options="v for v in _3_4.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          > 
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_4.articles.books.articles[$index].totalAuthors}}">
                            {{_3_4.articles.books.articles[$index].totalAuthors}}
                          </option> 
                          <?php } ?>                          
                          </select><!-- /total authors -->
                          </div>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Author Position</span>
                          <select class="form-control"
                          name="rc341-{{$index + 1}}-ap"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_4.dynamicArticles.books.articles[$index].authorPosition"
                          ng-options="v for v in _3_4.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly  
                          <?php } ?>
                          >
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_4.articles.books.articles[$index].authorPosition}}">
                            {{_3_4.articles.books.articles[$index].authorPosition}}
                          </option> 
                          <?php } ?>                           
                          </select><!-- /authors position -->
                          </div>                         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_4.calculate('books')"
                        ng-show="( formRC.formBooks.$valid && ( _3_4.articles.books.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disbaled
                        <?php } ?>
                        >
                        Calculate Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : books
                      ############################################################
                      ########################################################## -->
                      <hr/>
                      <p>
                      Number of chapters in edited books
                      </p>
                <!--  ############################################################
                      ############################################################
                      section : chapters
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formChapters">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">Chapters ( {{ _3_4.articles.chapters.score }} )</span>
                          
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-chapters--count" 
                          name="rc342-cnt"                         
                          ng-model="_3_4.articles.chapters.count"
                          ng-change="_3_4.articleCount( 'chapters' )"
                          ng-options="v for v in _3_4.articleCountOptions">                          
                          </select>
                          <?php } ?>

                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" name="rc342-cnt"
                          ng-model="_3_4.articles.chapters.count" readonly>
                          <?php } ?>

                        </div>

                        <div ng-repeat="article in _3_4.articles.chapters.articles track by $index">
                          
                          <p><small>Article : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Total Authors</span>
                          <select class="form-control"
                          name="rc342-{{$index + 1}}-ta"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_4.dynamicArticles.chapters.articles[$index].totalAuthors"
                          ng-options="v for v in _3_4.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_4.articles.chapters.articles[$index].totalAuthors}}">
                            {{_3_4.articles.chapters.articles[$index].totalAuthors}}
                          </option> 
                          <?php } ?>                             
                          </select><!-- /total authors -->
                          </div>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Author Position</span>
                          <select class="form-control"
                          name="rc342-{{$index + 1}}-ap"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_4.dynamicArticles.chapters.articles[$index].authorPosition"
                          ng-options="v for v in _3_4.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_4.articles.chapters.articles[$index].authorPosition}}">
                            {{_3_4.articles.chapters.articles[$index].authorPosition}}
                          </option> 
                          <?php } ?>                      
                          </select><!-- /authors position -->
                          </div>                         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_4.calculate('chapters')"
                        ng-show="( formRC.formChapters.$valid && ( _3_4.articles.chapters.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disabled
                        <?php } ?>
                        >
                        Calculate Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : chapters
                      ############################################################
                      ########################################################## -->


                </div> <!-- end of wrapper -->


                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>6</span></div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <input type="text"                                            
                        class="form-control"
                        name="rc-threeFour"
                        ng-model="_3_4.articles[3.4].score" readonly>  
                </div>
                
            </div><!-- end of : 3.4 calculations -->
           
            <hr>

            <div class="row parent-question" ng-controller="Ctrl_3_5 as _3_5">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.5</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Number of Subjects Books by National level publishers/State and Central Govt.</h4>                    
                    <p>Number of publications with ISBN/ISSN number</p>
                <!--  ############################################################
                      ############################################################
                      section : publication
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formPublication">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">Publications ( {{ _3_5.articles.publication.score }} )
                          </span>
                          
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-publication--count" 
                          name="rc351-cnt"                         
                          ng-model="_3_5.articles.publication.count"
                          ng-change="_3_5.articleCount( 'publication' )"
                          ng-options="v for v in _3_5.articleCountOptions">                          
                          </select>
                          <?php } ?>

                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" name="rc351-cnt"
                          ng-model="_3_5.articles.publication.count" readonly>
                          <?php } ?>

                        </div>

                        <div ng-repeat="article in _3_5.articles.publication.articles track by $index">
                          
                          <p><small>Article : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Total Authors</span>
                          <select class="form-control"
                          name="rc351-{{$index + 1}}-ta"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_5.dynamicArticles.publication.articles[$index].totalAuthors"
                          ng-options="v for v in _3_5.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >   
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_5.articles.publication.articles[$index].totalAuthors}}">
                            {{_3_5.articles.publication.articles[$index].totalAuthors}}
                          </option> 
                          <?php } ?>                         
                          </select><!-- /total authors -->
                          </div>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Author Position</span>
                          <select class="form-control"
                          name="rc351-{{$index + 1}}-ap"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_5.dynamicArticles.publication.articles[$index].authorPosition"
                          ng-options="v for v in _3_5.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_5.articles.publication.articles[$index].authorPosition}}">
                            {{_3_5.articles.publication.articles[$index].authorPosition}}
                          </option> 
                          <?php } ?>                          
                          </select><!-- /authors position -->
                          </div>                         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_5.calculate('publication')"
                        ng-show="( formRC.formPublication.$valid && ( _3_5.articles.publication.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disabled
                        <?php } ?>
                        >
                        Calculate Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : publications
                      ############################################################
                      ########################################################## -->
                      <hr/>
                      <p>Number of chapters in edited books</p>  
                <!--  ############################################################
                      ############################################################
                      section : chapters
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formBookChapters">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">Chapters ( {{ _3_5.articles.chapters.score }} )</span>
                          
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-chapters--count" 
                          name="rc352-cnt"                         
                          ng-model="_3_5.articles.chapters.count"
                          ng-change="_3_5.articleCount( 'chapters' )"
                          ng-options="v for v in _3_5.articleCountOptions">                          
                          </select>
                          <?php } ?>

                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" name="rc352-cnt"
                          ng-model="_3_5.articles.chapters.count" readonly>
                          <?php } ?>

                        </div>

                        <div ng-repeat="article in _3_5.articles.chapters.articles track by $index">
                          
                          <p><small>Article : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Total Authors</span>
                          <select class="form-control"
                          name="rc352-{{$index + 1}}-ta"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_5.dynamicArticles.chapters.articles[$index].totalAuthors"
                          ng-options="v for v in _3_5.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_5.articles.chapters.articles[$index].totalAuthors}}">
                            {{_3_5.articles.chapters.articles[$index].totalAuthors}}
                          </option> 
                          <?php } ?>                          
                          </select><!-- /total authors -->
                          </div>
     
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Author Position</span>
                          <select class="form-control"
                          name="rc352-{{$index + 1}}-ap"
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_5.dynamicArticles.chapters.articles[$index].authorPosition"
                          ng-options="v for v in _3_5.articleOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >    
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_5.articles.chapters.articles[$index].authorPosition}}">
                            {{_3_5.articles.chapters.articles[$index].authorPosition}}
                          </option> 
                          <?php } ?>                       
                          </select><!-- /authors position -->
                          </div>                         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_5.calculate('chapters')"
                        ng-show="( formRC.formBookChapters.$valid && ( _3_5.articles.chapters.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disbaled
                        <?php } ?>    
                        >
                        Calculate Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : chapters
                      ############################################################
                      ########################################################## -->
                 
                </div><!-- end of wrappers -->

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>6</span></div>
                </div>
                
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"                                            
                        class="form-control"
                        name="rc-threeFive"
                        ng-model="_3_5.articles[3.5].score" readonly>  
                    </div>
                </div>
                
            </div> <!-- end of : 3.5 calculations -->
            
            <hr>

            <div class="row parent-question" ng-controller="Ctrl_3_6 as _3_6">
                <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.6</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Number of Subjects Books by other local publishers</h4>
                    <div class="form-group">
                    <input type="text" placeholder="Please specify with ISBN / ISSN number"
                    class="form-control input-sm"                  
                    name="rc36-a"
                    ng-model="_3_6.rc36A"
                    <?php if(isset($data)) { ?>
                      readonly
                      <?php } ?>
                    >
                    </div> 
                    <div class="form-group">
                    <input type="text" placeholder="Please specify  number of chapter in edited books"
                    class="form-control input-sm"                    
                    name="rc36-b"
                    ng-model="_3_6.rc36B"
                    <?php if(isset($data)) { ?>
                      readonly
                      <?php } ?>
                    >
                    </div>                  
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>2</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                       <input type="text"
                       name="rc-threeSix"                                           
                        class="form-control"
                        ng-model="_3_6.rcThreeSix"
                        <?php if(isset($data)) { ?>
                        readonly
                        <?php } ?>
                        >                         
                    </div>
                </div>               
                </div><!-- end of : 3.6 calculations -->               
         

            <hr>
             <div class="row parent-question" ng-controller="Ctrl_3_7 as _3_7">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.7</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Chapters in knowledge based volumes by Indian/ National level publishers.</h4>
                    <div class="form-group">
                    <input type="text" placeholder="Please specify with ISBN / ISSN number"
                    class="form-control input-sm"                    
                    name="rc37-a"
                    ng-model="_3_7.rc37A"
                    <?php if(isset($data)) { ?>
                        readonly
                        <?php } ?>
                    >
                    </div> 
                    <div class="form-group">
                    <input type="text" placeholder="Please specify  number of chapter in edited books"
                    class="form-control input-sm"                    
                    name="rc37-b"
                    ng-model="_3_7.rc37B"
                    <?php if(isset($data)) { ?>
                        readonly
                        <?php } ?>
                    >
                    </div> 
                </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>2</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                   <div class="form-group">                        
                       <input type="text"
                        name="rc-threeSeven"
                        ng-model="_3_7.rcThreeSeven"                                          
                        class="form-control"
                        <?php if(isset($data)) { ?>
                        readonly
                        <?php } ?>
                        >                         
                    </div>
                </div>
            </div><!-- end of : 3.7 calculations -->
            
            <hr>

            <div class="row parent-question" ng-controller="Ctrl_3_8 as _3_8">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.8</h4>
                    </div>
                </div>
                
                <div class="col-xs-5 col-md-5 right-border">
                      <h4>Organization of conference</h4>
                <!--  ############################################################
                      ############################################################
                      section : conference - international
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formConfInternational">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">International Level ( {{ _3_8.conf.lvlInternational.score }} )</span>
                          
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-lvlInternational--count" 
                          name="rc381-cnt"                         
                          ng-model="_3_8.conf.lvlInternational.count"
                          ng-change="_3_8.confCount( 'lvlInternational' )"
                          ng-options="v for v in _3_8.confCountOptions">                          
                          </select>
                          <?php } ?>

                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" name="rc381-cnt"
                          ng-model="_3_8.conf.lvlInternational.count" readonly>
                          <?php } ?>

                        </div>

                        <div ng-repeat="conf in _3_8.conf.lvlInternational.confs track by $index">
                          
                          <p><small>Conference : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Position</span>
                          <select class="form-control"
                          name="rc381-{{$index + 1}}"                       
                          <?php if(!isset($data)) { ?>
                          ng-model="_3_8.dynamicConf.lvlInternational.confs[$index].position"
                          ng-options="v for v in _3_8.confOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?> 
                          >
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_8.conf.lvlInternational.confs[$index].position}}">
                            {{_3_8.conf.lvlInternational.confs[$index].position}}
                          </option>
                          <?php } ?>                                                     
                          </select><!-- /position -->
                          </div>
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_8.calculate('lvlInternational')"
                        ng-show="( formRC.formConfInternational.$valid && ( _3_8.conf.lvlInternational.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disabled
                        <?php } ?>  
                        >
                        Calculate Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : conference - international
                      ############################################################
                      ########################################################## -->
                      <hr/>
                      <!--  ############################################################
                      ############################################################
                      section : conference - national
                      ############################################################
                      ########################################################## -->
                      <ng-form name="formConfNational">
                        
                        <div class="input-group input-group-sm">                         
                          <span class="input-group-addon">National Level ( {{ _3_8.conf.lvlNational.score }} )</span>
                          <?php if(!isset($data)) { ?>
                          <select class="form-control" 
                          id="rc-lvlNational--count" 
                          name="rc382-cnt"                         
                          ng-model="_3_8.conf.lvlNational.count"
                          ng-change="_3_8.confCount( 'lvlNational' )"
                          ng-options="v for v in _3_8.confCountOptions">                          
                          </select>
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          <input class="form-control" type="text" name="rc382-cnt"
                          ng-model="_3_8.conf.lvlNational.count" readonly>
                          <?php } ?>
                        </div>

                        <div ng-repeat="conf in _3_8.conf.lvlNational.confs track by $index">
                          
                          <p><small>Conference : {{ ($index + 1) }}</small></p>
                          <div class="input-group input-group-sm">
                          <span class="input-group-addon">Position</span>
                          <select class="form-control"  
                          name="rc382-{{$index + 1}}"
                          <?php if(!isset($data)) { ?>                     
                          ng-model="_3_8.dynamicConf.lvlNational.confs[$index].position"
                          ng-options="v for v in _3_8.confOptions" required
                          <?php } ?>
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          > 
                          <?php if(isset($data)) { ?>
                          <option value="{{_3_8.conf.lvlNational.confs[$index].position}}">
                            {{_3_8.conf.lvlNational.confs[$index].position}}
                          </option>
                          <?php } ?>                        
                          </select><!-- /position -->
                          </div>         
                          
                        </div>

                        <a href="javascript:;" class="btn btn-primary btn-sm btn-block animated zoomIn"
                        ng-click="_3_8.calculate('lvlNational')"
                        ng-show="( formRC.formConfNational.$valid && ( _3_8.conf.lvlNational.count > 0 ) )"
                        <?php if(isset($data)) { ?>
                        disabled
                        <?php } ?>  
                        >
                        Calculate Score
                        </a>

                      </ng-form>
                <!--  ############################################################
                      ############################################################
                      end of : conference - national
                      ############################################################
                      ########################################################## -->


                </div><!-- end of wrapper -->

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"                                            
                        class="form-control"
                        name="rc-threeEight"
                        ng-model="_3_8.conf[3.8].score" readonly> 
                    </div>
                </div>
               
            </div> <!-- end of : 3.8 calculations -->

            <hr>

             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.9</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Sponsored / Funded Projects carried out / ongoing</h4>
                </div>

            </div>



           <div class="row parent-question" ng-controller="Ctrl_3_9 as _3_9">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">a</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">                  
                     <p><small>
                      Number of Projects amount mobilized with grants above 3.00 lakhs
                    </small></p>
                    <div class="form-group">                   
                      <input type="text" class="form-control input-sm"
                      id="a" name="rc39a"
                      ng-model="_3_9.proj.a.score"
                      <?php if(isset($data)) { ?>
                      readonly
                      <?php } ?>
                      >
                    </div>                      
                    
                </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>                

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                       <input type="text"                                            
                        class="form-control"
                        name="rc-threeNine_a"
                        ng-value="_3_9.proj.a.score * _3_9.proj.a.scale" readonly> 
                    </div>
                </div>
               
            </div><!-- end of 3.9-a calculation -->


            
             <div class="row parent-question" ng-controller="Ctrl_3_9 as _3_9">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">b</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">

                    <p><small>
                      Number of Projects amount mobilized with grants from 0.5 lakhs to 3.00 lakhs
                    </small></p>
                   <div class="form-group">                     
                      <input type="text" class="form-control input-sm"
                      id="b" name="rc39b"
                      ng-model="_3_9.proj.b.score"
                      <?php if(isset($data)) { ?>
                      readonly
                      <?php } ?>
                      >
                    </div> 
                </div>
                
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>6</span></div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                       <input type="text"  
                          name="rc-threeNine_b"                                          
                        class="form-control"
                        ng-value="_3_9.proj.b.score * _3_9.proj.b.scale" readonly> 
                    </div>
                </div>
               
            </div><!-- end of 3.9-b calculation -->

            
             <div class="row parent-question" ng-controller="Ctrl_3_9 as _3_9">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">c</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                   <p><small>
                      Number of Minor Projects from central/state funding agencies with grants below Rs.0.5 lakhs
                    </small></p>
                   <div class="form-group">                     
                      <input type="text" class="form-control input-sm"
                      id="c" name="rc39c"
                      ng-model="_3_9.proj.c.score"
                      <?php if(isset($data)) { ?>
                      readonly
                      <?php } ?>
                      >
                    </div> 

                </div>
                
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>2</span></div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                       <input type="text" 
                        name="rc-threeNine_c"                                           
                        class="form-control"
                        ng-value="_3_9.proj.c.score * _3_9.proj.c.scale" readonly> 
                    </div>
                </div>
               
            </div><!-- end of 3.9-c calculation -->

            <hr>

            <div class="row parent-question"  ng-controller="Ctrl_3_10 as _3_10">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.10</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    
                    <h4>Consultancy Projects carried out / ongoing</h4>                   
                    <p><small>
                    Amount mobilized with minimum of RS. 10,000 <strong><i>(3 points each)</i></strong>
                    </small></p>
                    <p><small>Amount mobilized Rs</small></p> 
                    <div class="form-group">                     
                      <input type="text" class="form-control input-sm"
                      name="rc310"
                      ng-model="_3_10.consultancy.amount.total"
                      ng-change="_3_10.calPoints()"
                      <?php if(isset($data)) { ?>
                      readonly
                      <?php } ?>
                      >
                    </div>
                      
                </div>  

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                       <input type="text" 
                        name="rc-threeTen"                                           
                        class="form-control"
                        ng-model="_3_10.consultancy.amount.points" readonly> 
                    </div>
                </div>
                         
            </div><!-- end of 3.10 calculation -->

            <hr>
         <div class="row parent-question" ng-controller="Ctrl_3_11 as _3_11">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.11</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">                  
                    
                    <h4>No, of patents / Technology transfer /Products / Copy right National / International</h4>

                    <div class="row">                      
                      <p><small>International</small></p>
                      <div class="col-md-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-addon">Filed</span>
                          <input type="text" class="form-control"
                          name="rc311a"
                          ng-change="_3_11.calPatent()"
                          ng-model="_3_11.pc.patent.international.filed.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div> 
                      </div>

                      <div class="col-md-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-addon">Awarded</span>
                          <input type="text" class="form-control"
                          name="rc311b"
                          ng-change="_3_11.calPatent()"
                          ng-model="_3_11.pc.patent.international.awarded.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div> 
                      </div>
                    </div><!-- /.row -->                    
                    <div class="row">                      
                      <p><small>National</small></p>
                      <div class="col-md-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-addon">Filed</span>
                          <input type="text" class="form-control"
                          name="rc311c"
                          ng-change="_3_11.calPatent()"
                          ng-model="_3_11.pc.patent.national.filed.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div> 
                      </div>

                      <div class="col-md-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-addon">Awarded</span>
                          <input type="text" class="form-control"
                          name="rc311d"
                          ng-change="_3_11.calPatent()"
                          ng-model="_3_11.pc.patent.national.awarded.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div> 
                      </div>
                    </div><!-- /.row -->                   

                    <h4>Copyrights</h4>

                    <div class="row">                      
                      <p><small>International</small></p>
                      <div class="col-md-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-addon">Filed</span>
                          <input type="text" class="form-control"
                          name="rc311e"
                          ng-change="_3_11.calCopyright()"
                          ng-model="_3_11.pc.copyright.international.filed.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div> 
                      </div>

                      <div class="col-md-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-addon">Awarded</span>
                          <input type="text" class="form-control"
                          name="rc311f"
                          ng-change="_3_11.calCopyright()"
                          ng-model="_3_11.pc.copyright.international.awarded.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div> 
                      </div>
                    </div><!-- /.row -->                    
                    <div class="row">                      
                      <p><small>National</small></p>
                      <div class="col-md-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-addon">Filed</span>
                          <input type="text" class="form-control"
                          name="rc311g"
                          ng-change="_3_11.calCopyright()"
                          ng-model="_3_11.pc.copyright.national.filed.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div> 
                      </div>

                      <div class="col-md-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-addon">Awarded</span>
                          <input type="text" class="form-control"
                          name="rc311h"
                          ng-change="_3_11.calCopyright()"
                          ng-model="_3_11.pc.copyright.national.awarded.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div> 
                      </div>
                    </div><!-- /.row -->


                   
                </div> <!-- end of wrapper -->
                
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
               
                <div class="col-xs-2 col-md-2 right-border">                  
                    <div class="form-group">                        
                       <input type="text"                                            
                        class="form-control"
                        name="rc-threeEleven" 
                        ng-model="_3_11.pc[3.11].score" readonly> 
                    </div>
                </div>
          
            </div><!-- end of calculations : 3.11 -->

            <hr/>

            <div class="row parent-question" ng-controller="Ctrl_3_12 as _3_12">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.12</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">

                   <h4>Research Guidance</h4>
                   
                   <div class="row">
                     <div class="col-md-8">
                       <div class="input-group input-group-sm">
                          <span class="input-group-addon">Degree Awarded (ME)</span>
                          <input type="text" class="form-control"
                          name="rc312a"
                          ng-change="_3_12.calRG()"
                          ng-model="_3_12.rg.degreeAwardedME.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div>
                     </div>
                     <div class="col-md-8">
                       <div class="input-group input-group-sm">
                          <span class="input-group-addon">No. of Project Groups(BE)</span>
                          <input type="text" class="form-control"
                          name="rc312b"
                          ng-change="_3_12.calRG()"
                          ng-model="_3_12.rg.degreeAwardedBE.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div>
                     </div>
                   </div><!-- /.row -->

                   <div class="row">
                     <div class="col-md-8">
                       <div class="input-group input-group-sm">
                          <span class="input-group-addon">PhD Awarded</span>
                          <input type="text" class="form-control"
                          name="rc312c"
                          ng-change="_3_12.calRG()"
                          ng-model="_3_12.rg.degreeAwardedPhD.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div>
                     </div>
                     <div class="col-md-8">
                       <div class="input-group input-group-sm">
                          <span class="input-group-addon">PhD in progress</span>
                          <input type="text" class="form-control"
                          name="rc312d"
                          ng-change="_3_12.calRG()"
                          ng-model="_3_12.rg.degreeInProgressPhD.count"
                          <?php if(isset($data)) { ?>
                          readonly
                          <?php } ?>
                          >
                        </div>
                     </div>
                   </div><!-- /.row -->
                      
                </div>  

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                       <input type="text" 
                        name="rc-threeTwelve"                                          
                        class="form-control"
                        ng-model="_3_12.rg[3.12].score" readonly> 
                    </div>
                </div>
                         
            </div><!-- end of 3.12 calculation -->

            <hr/>

              <div class="row parent-question" ng-controller="Ctrl_3_13 as _3_13">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">3.13</h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">

                   <h4>Involvement in student research activity</h4>
                      
                </div>  

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>5</span></div>
                </div>
                
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                       <input type="text" 
                        class="form-control"
                        name="rc-threeThirteen"
                        ng-model="_3_13.rcThreeThirteen"
                        <?php if(isset($data)) { ?>                          
                          readonly
                        <?php } ?>
                        > 
                    </div>
                </div>
                         
            </div><!-- end of 3.13 calculation -->

            <hr/>
            
                       
     
            <hr>

                 <div class="row parent-question" style = "margin-bottom: 1%">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                  <div class="form-group"> 
                    
                    

                        <button  onclick="location.href='<?php echo base_url();?>index.php/Apraisal_form/my_apprisal'" class="btn btn-success pull-right"></i>Back</button>
                  
                 </div>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   
                </div>
                <div class="col-xs-2 col-md-2 right-border">                   
                </div>
               
            </div>



         </form>  

        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
       
        <!-- /page content -->

        <!-- footer content -->
       <?php include 'footer.php';?>

       <!-- /footer content -->  

    <script type="text/javascript">
        var protoRC = <?php 
          if( isset($data)){
            echo json_encode($data);
          } else{
            echo '{}';
          }
        ?>;        
    </script>

    <!-- rc.js -->
    <script  src="<?php echo base_url();?>assets/js/rc.js"></script>
    <!-- math.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/3.13.3/math.min.js"></script>

   <script>

    $(document).ready(function() {
      $('#sub').click(function(){

        var mstrValues = {
          threeOne : $("input[name=rc-threeOne]").val(),
          threeTwo : $("input[name=rc-threeTwo]").val(),
          threeThree : $("input[name=rc-threeThree]").val(),
          threeFour : $("input[name=rc-threeFour]").val(),
          threeFive : $("input[name=rc-threeFive]").val(),
          threeSix : $("input[name=rc-threeSix]").val(),
          threeSeven : $("input[name=rc-threeSeven]").val(),
          threeEight : $("input[name=rc-threeEight]").val(),
          threeNineA : $("input[name=rc-threeNine_a]").val(),
          threeNineB : $("input[name=rc-threeNine_b]").val(),
          threeNineC : $("input[name=rc-threeNine_c]").val(),
          threeTen : $("input[name=rc-threeTen]").val(),
          threeEleven : $("input[name=rc-threeEleven]").val(),
          threeTwelve : $("input[name=rc-threeTwelve]").val(),
          threeThirteen: $("input[name=rc-threeThirteen]").val(),
      };
      

      var mstrScore = math.eval('threeOne + threeTwo + threeThree + threeFour + threeFive + threeSix + threeSeven + threeEight + threeNineA + threeNineB + threeNineC + threeTen + threeEleven + threeTwelve + threeThirteen', mstrValues); 

      var rcTotal = $('#rcTotal'); 

      ( mstrScore > 100 ) ? rcTotal.val(100) : rcTotal.val( mstrScore );

      var total = mstrScore; 
      var total2 = 0;

      $('#frm_details').attr('action', '<?php echo base_url();?>index.php/Rc_form/index/'+total+'/'+total2);
      
      });

        $(function() {
            
                $("#frm_details").on("submit", function(event) { 
                   
                    $.ajax({
                       // url: "<?php //echo base_url();?>index.php/Serialize_form/insertcategory",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function(d) {
                        }

                    });
                });
            });


    }); // end of document.ready()

   </script>
      
         