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
 //calcualtion of para111 
   
$lecasem1 = round($this->session->lecasem1);
$leccsem1 = round($this->session->leccsem1);
$lecasem2 = round($this->session->lecasem2);
$leccsem2 = round($this->session->leccsem2);




if($lecasem1 == 0)
{
 $x = 0; 
}

else
{

$x = ($leccsem1 * 8)/ $lecasem1;
}
if($x > 8)
{
  $x = 8; 
}

if($lecasem2 == 0)
{
 $y = 0; 
}

else
{
$y = ($leccsem2*8)/ $lecasem2;
}
if($y > 8)
{
  $y = 8; 
}


$para111 = round(($x + $y)/2);




 //calcualtion of para112     
$praasem1 = round($this->session->praasem1);
$pracsem1 = round($this->session->pracsem1);
$praasem2 = round($this->session->praasem2);
$pracsem2 = round($this->session->pracsem2);

if($praasem1 == 0)
{
 $a = 0; 
}

else
{
$a = ($pracsem1 * 8)/ $praasem1;
}

if($a > 8)
{
  $a = 8; 
}

if($praasem2 == 0)
{
 $b = 0; 
}

else
{

$b = ($pracsem2*8)/ $praasem2;
}
if($b > 8)
{
  $b = 8; 
}

$para112 = round(($a + $b)/2);

//calculation for feedback...



$tsem1f1 = round($this->session->tsem1f1);
$tsem1f2 = round($this->session->tsem1f2);
$psem1f1 = round($this->session->psem1f1);
$psem1f2 = round($this->session->psem1f2);


$tsem2f1 = round($this->session->tsem2f1);
$tsem2f2 = round($this->session->tsem2f2);
$psem2f1 = round($this->session->psem2f1);
$psem2f2 = round($this->session->psem2f2);

$fddsem1 = 0;
if($tsem1f1 == 0)
{
   $fddsem1++;
}

if($tsem1f2 == 0)
{
   $fddsem1++;
}

if($psem1f1 == 0)
{
   $fddsem1++;
}

if($psem1f2 == 0)
{
   $fddsem1++;
}

$fddsem1 = round(abs($fddsem1 - 4) * 4);

$fdtotalsem1 = round($tsem1f1 + $tsem1f2 + $psem1f1 +  $psem1f2);



if($fddsem1 == 0)
{
  $fdsem1 = 0;
}
else
{
$fdsem1 = round(($fdtotalsem1/$fddsem1)*15);
}


$fddsem2 = 0;
if($tsem2f1 == 0)
{
   $fddsem2++;
}

if($tsem2f2 == 0)
{
   $fddsem2++;
}

if($psem2f1 == 0)
{
   $fddsem2++;
}

if($psem2f2 == 0)
{
   $fddsem2++;
}


if($fddsem2 == 0)
{
  $fddsem2 == 0;
}

else
{
$fddsem2 = round(abs($fddsem2 - 4) * 4);
}

$fdtotalsem2 = round($tsem2f1 + $tsem2f2 + $psem2f1 +  $psem2f2);

if($fddsem2 == 0)
{
 $fdsem2 = 0;  
}

else
{
  $fdsem2 = round(($fdtotalsem2/$fddsem2)*15); 
}



$fd =round(($fdsem1 + $fdsem1)/2); 


//calculation for result

$tsem1r1 =  round($this->session->tsem1r1);
$tsem1ra1 = round($this->session->tsem1ra1);

$tsem1r2 = round($this->session->tsem1r2);
$tsem1ra2 = round($this->session->tsem1ra2);

$pr1sem1 = round($this->session->pr1sem1);
$pra1sem1 = round($this->session->pra1sem1);

$pr2sem1 = round($this->session->pr2sem1);
$pra2sem1 = round($this->session->pra2sem1);



//sem2

$tsem2r1 = round($this->session->tsem2r1);
$tsem2ra1 = round($this->session->tsem2ra1);

$tsem2r2 = round($this->session->tsem2r2);
$tsem2ra2 = round($this->session->tsem2ra2);

$pr1sem2 = round($this->session->pr1sem2);
$pra1sem2 = round($this->session->pra1sem2);

$pr2sem2 = round($this->session->pr2sem2);
$pra2sem2 = round($this->session->pra2sem2);

$resden = 0;



//calculation of result sem1
if($tsem1r1 == 0) 
{
  $resden++;
  $res1sem1 = 0;
}
else
{
if($tsem1r1 > $tsem1ra1)
{
  $res1sem1 = 10;
}

else
{
$res1sem1 = 5;  
}
}
/////////////////////////

if($tsem1r2 == 0) 
{
  $resden++;
 $res2sem1 = 0;
}
else
{
if($tsem1r2 > $tsem1ra2)
{
  $res2sem1 = 10;
}

else
{
$res2sem1 = 5;  
}
}
////////////////////////

if($pr1sem1 == 0) 
{
  $resden++;
  $respr1sem1 = 0;
}
else
{
if($pr1sem1 > $pra1sem1)
{
  $respr1sem1 = 10;
}

else
{
  $respr1sem1 = 5; 
}
}

//////////////////////

if($pr2sem1 == 0) 
{
  $resden++;
  $respr2sem1 = 0;
}

else
{
if($pr2sem1 > $pra2sem1)
{
  $respr2sem1 = 10;
}

else
{
  $respr2sem1 = 5; 
}
}
/////////////////////

if($tsem2r1 == 0) 
{
  $resden++;
  $res1sem2 = 0;
}

else
{
//calculation of result sem2
if($tsem2r1 > $tsem2ra1)
{
  $res1sem2 = 10;
}

else
{
$res1sem2 = 5;  
}
}
/////////////////////

if($tsem2r2 == 0) 
{
  $resden++;
  $res2sem2 = 0;
}
else
{
if($tsem2r2 > $tsem2ra2)
{
  $res2sem2 = 10;
}

else
{
$res2sem2 = 5;  
}
}
////////////////////
if($pr1sem2 == 0) 
{
  $resden++;
  $respr1sem2 = 0;
}

else
{
if($pr1sem2 > $pra1sem2)
{
  $respr1sem2 = 10;
}

else
{
  $respr1sem2 = 5; 
}
}
/////////////////////
if($pr2sem2 == 0) 
{
  $resden++;
  $respr2sem2 = 0;
}

else

{
if($pr2sem2 > $pra2sem2)
{
  $respr2sem2 = 10;
}

else
{
  $respr2sem2= 5; 
}
}
////////////////////////

$totalres = $res1sem1 + $res2sem1 + $respr1sem1 + $respr2sem1 + $res1sem2 + $res2sem2 + $respr1sem2 + $respr2sem2;



$resden = round(abs($resden - 8) * 10);

if($resden == 0)
{
  
  $finalres = 0;

}

else
{

$finalres = round((10 * $totalres)/$resden);  

}



//calculation for attendance.....

$th1aasem1 = round($this->session->th1aasem1);
$th2aasem1 = round($this->session->th2aasem1);

$pr1aasem1 = round($this->session->pr1aasem1);
$pr2aasem1 = round($this->session->pr2aasem1);

$th1aasem2 = round($this->session->th1aasem2);
$th2aasem2 = round($this->session->th2aasem2);
$pr1aasem2 = round($this->session->pr1aasem2);
$pr2aasem2 = round($this->session->pr2aasem2);

$denatt = 0;
if($th1aasem1 == 0)
{
  
  $denatt++;
  $th1aasem1 = 100;
}

if($th2aasem1 == 0)
{
  
  $denatt++;
  $th1aasem1 = 100;
}

if($pr1aasem1 == 0)
{
  
  $denatt++;
  $pr1aasem1 = 100;
}

if($pr2aasem1 == 0)
{
  
  $denatt++;
  $pr2aasem1 = 100;
}

if($th1aasem2 == 0)
{
  
  $denatt++;
  $th1aasem2 = 100;
}


if($th2aasem2 == 0)
{
  $denatt++;
  $th2aasem2 = 100;
}

if($pr1aasem2 == 0)
{
  $denatt++;
  $pr1aasem2 = 100;
}

if($pr2aasem2 == 0)
{
  $denatt++;
  $pr2aasem2 = 100;
}

$thtotal = $th1aasem1 + $th2aasem1 + $th1aasem2 + $th2aasem2;
$prtotal = $pr1aasem1 + $pr2aasem1 + $pr1aasem2 + $pr2aasem2;

if($thtotal > 300)
{
  $att1 = 7;
}
else
{
  $att1 = 3; 
}

if($prtotal > 300)
{
  $att2 = 7;
}

else
{
   $att2 = 3;
}

$att = ($att1 + $att2)/2;




?>

<?php include 'header.php';?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';?> 
      <!-- /top navigation -->

        <!-- page content -->
         <div class="right_col" role="main">     
          <div class="page-title">
              <div class="title_left">
                <h3>Student Centric Activities (SCA)</h3>
              </div>
           </div>
         <div class="clearfix" style="margin-bottom:20px;"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                   <form  ng-app="modSCA" role="form" name="formModSCA"  id = "frm_details">
    
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
                 <center> <h4 class="text-colour">Maximum Score </h4> </center>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                   <center> <h4 class="text-colour">Self Evaluation</h4> </center>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                   <center> <h4 class="text-colour">Evaluation by HOD</h4> </center>
                </div>
                
            </div>

            <hr>
            <div style="margin-top:60px;"></div>
            
             
            <div class="row">
                <div class="col-md-12">
                  <h4 class="text-capitalize">1.1  teaching-learning &amp; evaluation related activities</h4>
                </div>
            </div>

            <div class="row parent-question">
                   <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="exampleInputEmail1">1.1.1</label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>Lectures taken as percentage of lectures allocated as per academic calendar 
                    <strong><i>(100% compliance = 8 Points)</i></strong>
                    </p>
                    
                       <p><b>SEMESTER-I</b></p>
                        <div class="col-xs-8 col-md-8">
                            <p>Total number of lectures allocated :</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "ftlecta" name = "ftlecta" class="form-control input-lg custom-input" ng-model="val1" ng-init="val1 ='<?php if(!isset($data['ftlecta'])){ echo $lecasem1; }else{echo $data['ftlecta'];} ?>'" readonly="readonly" />
                             <div id="infoMessage"><?php echo form_error('ftlecta'); ?></div>
                        </div>

                         <div class="col-xs-8 col-md-8">
                            <p>Total number of lectures taken :</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                              <input type="text" id = "ftlectt" name = "ftlectt" class="form-control input-lg custom-input" ng-model="val2" ng-init="val2 ='<?php if(!isset($data['ftlectt'])){echo $leccsem1;}else{echo $data['ftlectt'];} ?>'" readonly="readonly"/>
                               <div id="infoMessage"><?php echo form_error('ftlectt'); ?></div>
                        </div>

                         <p><b>SEMESTER-II</b></p>
                        <div class="col-xs-8 col-md-8">
                            <p>Total number of lectures allocated :</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "stlecta" name = "stlecta" class="form-control input-lg custom-input" ng-model="val3" ng-init="val3 ='<?php if(!isset($data['stlecta'])){echo $lecasem2;}else{echo $data['stlecta'];} ?>'" readonly="readonly"/>
                             <div id="infoMessage"><?php echo form_error('stlecta'); ?></div>
                        </div>

                         <div class="col-xs-8 col-md-8">
                            <p>Total number of lectures taken :</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "stlectt" name = "stlectt" class="form-control input-lg custom-input" ng-model="val4"  ng-init="val4 ='<?php if(!isset($data['stlectt'])){echo $leccsem2;} else{echo $data['stlectt'];} ?>'" readonly="readonly"/>
                            <div id="infoMessage"><?php echo form_error('stlectt'); ?></div>
                        </div>

                        <div class="col-xs-8 col-md-8">
                            <p>• Remedial lectures may be counted as against any leave</p> 
                        </div>
              
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>8</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" id = "para111"  name = "para111" class="form-control input-lg custom-input"   ng-model = "para111" ng-init="para111 ='<?php if(!isset($data['para111'])){echo $para111; }else{echo $data['para111'];} ?>'" readonly="readonly"/>
                    </div>
                </div>

                 <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text"   id = "para211" name = "para211" class="form-control input-lg custom-input"  ng-model = "para211" ng-init="para211 ='<?php if(!isset($data['para211'])){echo $para111; }else{echo $data['para211'];} ?>' "  readonly="readonly"/>
                         <div id="infoMessage"><?php echo form_error('para211'); ?>
                    </div>
                </div>
               </div>
                
            </div>
            <hr>

            <div class="row parent-question">

                  <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                         <label for="">1.1.2</label>
                    </div>
                 </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>Seminars , tutorials , practical , contact hours undertaken as percentage of those actual allocated as per academic calendar <br><strong><i>(100% compliance = 8 Points)</i></strong></p>
                    
                     <p><b>SEMESTER-I</b></p>
                        <div class="col-xs-8 col-md-8">
                            <p>No. of seminars, tutorials, practical allocated:</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "val1121" name = "val1121" class="form-control input-lg custom-input" ng-model="val1121" ng-init="val1121 ='<?php if(!isset($data['val1121'])){echo $praasem1;}else{echo $data['val1121'];} ?>'"  readonly="readonly">

                             <div id="infoMessage"><?php echo form_error('val1121'); ?></div>
                        </div>

                         <div class="col-xs-8 col-md-8">
                           <p>No. of seminars, tutorials, practical taken:</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                              <input type="text" id = "val1122" name = "val1122" class="form-control input-lg custom-input"  ng-model="val1122" ng-init="val1122 ='<?php if(!isset($data['val1122'])){echo $pracsem1;}else{echo $data['val1122'];} ?>'"  readonly="readonly">
                              <div id="infoMessage"><?php echo form_error('val1122'); ?></div>
                        </div>

                         <p><b>SEMESTER-II</b></p>
                        <div class="col-xs-8 col-md-8">
                            <p>No. of seminars, tutorials, practical allocated:</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "val1123" name = "val1123" class="form-control input-lg custom-input" ng-model="val1123" ng-init="val1123 ='<?php if(!isset($data['val1123'])){echo $praasem2;}else{echo $data['val1123'];} ?>'"  readonly="readonly">
                              <div id="infoMessage"><?php echo form_error('val1123'); ?></div>
                        </div>

                         <div class="col-xs-8 col-md-8">
                           <p>No. of seminars, tutorials, practical taken:</p> 
                        </div>
                        <div class="col-xs-4 col-md-4 form-group">
                             <input type="text" id = "val1124" name = "val1124" class="form-control input-lg custom-input" ng-model="val1124"  ng-init="val1124 ='<?php if(!isset($data['val1124'])){echo $pracsem2;} else{echo $data['val1124'];} ?>'"  readonly="readonly">
                              <div id="infoMessage"><?php echo form_error('val1124'); ?></div>
                        </div>
              
                </div>
               
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>8</span></div>
                </div>

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text"  id = "para112" name = "para112" class="form-control input-lg custom-input"  ng-model = "para112" ng-init="para112 ='<?php if(!isset($data['para112'])){echo $para112; }else{echo $data['para112'];} ?>'" readonly="readonly">
                    </div>
                </div>


                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                         <input type="text"   id = "para212" name = "para212" class="form-control input-lg custom-input"   ng-model = "para212" ng-init="para212 ='<?php if(!isset($data['para212'])){echo $para112; }else{echo $data['para212'];} ?>'" readonly="readonly">
                    </div>
                         <div id="infoMessage"><?php echo form_error('para212'); ?> </div>
                   
                </div>
                
            </div>
            <hr>
            <div class="row parent-question">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.3 <span style = "color:red">*</span></label>
                    </div>

                </div>


                <div class="col-xs-5 col-md-5 right-border">
                    <p>Lectures or other teaching duties in excess of AICTE/SPPU norms per week for entire semester or proportional otherwise <br><strong><i>(2 hour excess per week = 1 Point for each semester)</i></strong></p>
                    
               </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>4</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type = "text"   id = "para113" name = "para113" class="form-control input-lg custom-input"  ng-model="para113" min="0" max="4" ng-init="para113 ='<?php if(!isset($data['para113'])){}else{echo $data['para113'];} ?>'"  pattern="[0-4]" required="required" data-toggle="tooltip" data-placement="top" readonly="readonly">
                         <div id="infoMessage"><?php echo form_error('para113'); ?></div>
                    </div>
                </div>

               
            </div>
            <hr>
            <div class="row parent-question">

                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.4 <span style = "color:red">*</span></label>
                    </div>
                </div>
                <div class="col-xs-5 col-md-5 right-border">
                    <p>University examination duties (Question paper setting and evaluation of answer scripts) as per duties allocated <strong><i>(100% compliance = 3 Points)</i></strong> or more for additional duties allocated.</p>
                   
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>3</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" id = "para114"  name = "para114" class="form-control input-lg custom-input"  min="0" max="3"  ng-model="para114" ng-init="para114 ='<?php if(!isset($data['para114'])){}else{echo $data['para114'];} ?>'" pattern="[0-3]"  required="required" data-toggle="tooltip" data-placement="top" readonly="readonly">
                        <div id="infoMessage"><?php echo form_error('para114'); ?></div>
                    </div>
                </div>

             
            </div>
            <hr>

            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.5 <span style = "color:red">*</span></label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>University Online /In semester/Internal test Examination work such as coordination, invigilation, flying squad duties etc.<br> <strong><i>(100% compliance = 3 Points)</i></strong> or more for additional duties allocated.</p>
                   
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>3</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input  type="text"   min="0" max="3" id = "para115"  name = "para115" class="form-control input-lg custom-input"  ng-model="para115" ng-init="para115 ='<?php if(!isset($data['para115'])){}else{echo $data['para115'];} ?>'"  pattern="[0-3]"  required="required" data-toggle="tooltip" data-placement="top" readonly="readonly">
                         <div id="infoMessage"><?php echo form_error('para115'); ?></div>
                    </div>
                </div>

            
               
            </div>

            <hr>

            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.6 <span style = "color:red">*</span></label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>College /Internal examination/Evaluation duties for internal /continuous assessment work as allocated 

                      <strong><i>(100% compliance = 3 Points)</i></strong> or more for additional duties allocated.</p>
                    
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>3</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border" readonly="readonly">
                    <div class="form-group">                        
                        <input  type="text"   min="0" max="3" id = "para116"  name = "para116" class="form-control input-lg custom-input"  ng-model="para116" ng-init="para116 ='<?php if(!isset($data['para116'])){}else{echo $data['para116'];} ?>'" pattern="[0-3]"  required="required" data-toggle="tooltip" data-placement="top" readonly="readonly">
                        <div id="infoMessage"><?php echo form_error('para116'); ?></div>
                    </div>
                </div>

               
               
            </div>

            <hr>

             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.7 <span style = "color:red">*</span></label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>Use of Innovative teaching – learning methodologies ; use of ICT; like K point or any animation software , Update subject content and course improvement alongwith subject material sharing with the students.</p>
                   
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>3</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border" readonly="readonly">
                    <div class="form-group">                        
                        <input  type="text"   min="0" max="3" id = "para117"  name = "para117" class="form-control input-lg custom-input"  ng-model="para117" ng-init="para117 ='<?php if(!isset($data['para117'])){}else{echo $data['para117'];} ?>'"  pattern="[0-3]"  required="required" data-toggle="tooltip" data-placement="top" readonly="readonly">
                        <div id="infoMessage"><?php echo form_error('para117'); ?></div>
                    </div>
                </div>

              
               
            </div>
            <hr>

             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <label for="">1.1.8 <span style = "color:red">*</span></label>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <p>Design and Development of Value Additional Program (VAP) for more than 10 Hrs
                      <strong><i>(3 Points per VAP)</i></strong></p>
                     <div>
                        <textarea name = "val118" class="form-control custom-input" ng-model="val118" ng-init="val118 ='<?php if(!isset($data['val118'])){}else{echo $data['val118'];} ?>'" class="form-control" placeholder="Please Specify Google Drive Link" readonly="readonly"></textarea>
                      </div><br>   
                    
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>3</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input  type="text"   min="0" max="3"  id = "para118"  name = "para118" class="form-control input-lg custom-input"  ng-model="para118" ng-init="para118 ='<?php if(!isset($data['para118'])){}else{echo $data['para118'];} ?>'"  pattern="[0-3]"  required="required" data-toggle="tooltip" data-placement="top" 
                        readonly="readonly">
                        <div id="infoMessage"><?php echo form_error('para118'); ?></div>
                    </div>
                </div>


              
               
            </div>
            <hr>

            <div class="row">
             <div class="col-md-6"><h4 class="text-capitalize">1.2  Co-Curricular, Extra Curricular & Extension Activities(25 marks) </h4>
            
             </div>

              <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span><b>25</b></span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" id = "para12"  name = "para12" class="form-control input-lg custom-input"  ng-model="para12"  ng-init="para12 ='<?php if(!isset($data['para12'])){}else{echo $data['para12'];} ?>'"  <?php if(!isset($data['para12'])){echo 'ng-value = "(model - 0 + (model1 - 0)*1 + (model3 - 0)*1 + (model4 - 0)*1 + (model5 - 0)*1 + (model6 - 0)*1 + (model7 - 0)*1 + (model8 - 0)*1 + (model9 - 0)*1 + (model10 - 0)*1 + (model11 - 0)*1 + (model12 - 0)*1 + (model13 - 0)*1 + (model14 - 0)*1 +  (model15 - 0)*1 + (model16 - 0)*1 + (model17 - 0)*1 + (model18 - 0)*1 + (model19 - 0)*1 + (model20 - 0)*1 + (model21 - 0)*1 + (model22 - 0)*1 + (count*5)-0) | number : 0"';} ?>  readonly="readonly" />  
                      
                    </div>
                </div>

            </div>


            <div ng-controller="Ctrl_1_2_1">
             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">1.2.1 <span style = "color:red">*</span></h4>
                    </div>
                </div>
               
                <div class="col-xs-5 col-md-5 right-border">
                <h4>Creation of industry exposure opportunities for students through <strong><i>(5 points per activity)</i></strong></h4>
                <div class="checkbox">
                          <label>
                          <input type="checkbox" name = "opt1211" value="opt1211" <?php if(!isset($data['opt1211'])) { echo 'ng-model="isTrue" ng-change="isTrue ? (count=count+1) :(count=count-1)"';} else {echo "checked";} ?> >Internship
                        </label>
                       

                </div>

                 <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt1212" value="opt1212" <?php if(!isset($data['opt1212'])){echo 'ng-model="isTrue1" ng-change="isTrue1 ? (count=count+1) :(count=count-1)"';}else{echo "checked";} ?> >Sandwich training
                        </label>
                </div>

                 <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt1213" value="opt1213" <?php if(!isset($data['opt1213'])){echo 'ng-model="isTrue2" ng-change="isTrue2 ? (count=count+1) :(count=count-1) "';}else{echo "checked";} ?>  >Industrial Visit
                        </label>
                </div>

                 <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt1214" value="opt1214" <?php if(!isset($data['opt1214'])){echo 'ng-model="isTrue3" ng-change="isTrue3 ? (count=count+1) :(count=count-1)"';}else{echo "checked";} ?> >Memorandum of Understanding(MOU)
                        </label>
                </div>

                 <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt1215" value="opt1215" <?php if(!isset($data['opt1215'])){echo 'ng-model="isTrue4" ng-change="isTrue4 ? (count=count+1) :(count=count-1) "';}else{echo "checked";} ?>>Sponsored projects
                        </label>
                </div>

                  <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt1216" value="opt1216" <?php if(!isset($data['opt1216'])){echo 'ng-model="isTrue5" ng-change="isTrue5 ? (count=count+1) :(count=count-1)"';}else{echo "checked";} ?>>Placement support
                        </label>
                  </div>

                
                   

            
               
                </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>15</span></div>
                </div>

              
              

              

                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para121"  name = "para121" class="form-control input-lg custom-input"  ng-model="para121"   data-toggle="tooltip" data-placement="top" title="Please Select Rightside  Options" <?php if(!isset($data['para121'])){echo 'ng-value="(count*5) + (sca.score) | number:0"';} ?>   readonly="readonly"  ng-init="para121 ='<?php if(!isset($data['para121'])){}else{echo $data['para121'];} ?>'"/>  
                         <div id="infoMessage"></div>
                    </div>
                </div>




               

            <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para221"  name = "para221" class="form-control input-lg custom-input"  ng-model="para221" ng-init="para221 ='<?php if(!isset($data['para221'])){}else{echo $data['para221'];} ?>'" 
                         

                        >
                         <div id="infoMessage"><?php echo form_error('para221'); ?></div>
                    </div>
            </div>
               
            </div> 

            
             <div class="row parent-question"> 
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                       
                    </div>
                </div>
               
                <div class="col-xs-5 col-md-5 right-border">
                <h4></h4>
                
                  <div class="checkbox">
                    <label>
                        

                    <input type = "checkbox" name = "checked1" ng-model = "checked1"
                     <?php if (isset($data['checked1'])) { ?> ng-init = "checked1 = true" <?php } ?>> 
                     Please Specify for any other option
                  </label>
                  </div>
                  


               <div class="col-md-12" ng-show = "checked1">
                  

                 <?php if (!isset($data['opt121-cnt']) || ($data['opt121-cnt'] == 0) ) { ?>


                  <ng-form name="form_1_2_1">  
                        <!-- selection -->
                        <div class="form-group">
                          <select class="form-control"
                          name="opt121-cnt"
                          ng-change="updateChildren()"
                          ng-model="sca.value">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                        </div>

                  

                  <div class="row" ng-repeat="extra in sca.children track by $index">                  
                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Title</span>                                                
                              <input type="text" class="form-control"
                              placeholder="Please enter..." 
                              name="opt121-title-{{$index+1}}" required>
                            </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Score</span>                             
                              <select  class="form-control" name="opt121-value-{{$index+1}}"
                              ng-model= "dynamic.children[$index].score"
                               required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                              </select>
                            </div>
                    </div>

                    <hr/>
                  </div><!-- /.row -->




                  <button class="btn btn-default"
                  onclick="event.preventDefault();"
                  ng-show="sca.value" ng-click="calculate()">Calculate Activity Score</button>
                         
                  </ng-form>

                  <?php  } else{ ?>

                 

                      <ng-form name="form_1_2_1">  
                        <!-- selection -->
                        <div class="form-group">
                     
                         <input type="text" class="form-control"
                             
                          name="opt121-cnt" class="form-control input-lg custom-input"  value = " <?php echo $data['opt121-cnt'];?>" readonly="readonly">
                       
                        </div>
                   <?PHP
                   
                    for($i = 1; $i<=$data['opt121-cnt']; $i++ )
                     { 
                    ?>

                  <div class="row">                  
                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Title</span>                                                
                              <input type="text" class="form-control"
                              name="opt121-title-<?php echo $i; ?>"

                              value = "<?php if($i==1){echo $data['opt121-title-1'];}
                              else if($i==2){echo $data['opt121-title-2'];}

                              else if($i==3){echo $data['opt121-title-3'];}?>"
                              readonly="readonly"
                             >
                            </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Score</span>                             
                          
                             <input type="text" class="form-control"
                             name="opt121-value-<?php echo $i; ?>" value = "<?php if($i==1){echo $data['opt121-value-1'];}
                              else if($i==2){echo $data['opt121-value-2'];}

                              else if($i==3){echo $data['opt121-value-3'];}
                              
                              ?>"
                               readonly="readonly"
                              >

                            </div>
                    </div>

                    <hr/>
                  </div><!-- /.row -->

                    <?PHP
                    }
                    ?>

                
                         
                  </ng-form>
                 <?php  } ?>



                 
                </div>
               
                </div>

             

            

               
            </div> <!-- end of ctrl : Ctrl_1_2_2 -->

            </div>



            <hr>
            <div ng-controller="Ctrl_1_2_2">
             <div class="row parent-question" >
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">1.2.2 <span style = "color:red">*</span></h4>
                    </div>
                 </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Coordination of activities mentioned in Sr.no. 1 to 21<br>  <strong><i>(5 points per activity)</i></strong></h4>
                    <P style="padding-left: 10px;">  As Coordinator :-  <strong><i>(Institute level- 5 Points / Dept level- 2 Points)</i></strong></P>
                    <P style="padding-left: 10px;">   As Members :-   <strong><i>(Institute level- 2 Points / Dept level- 1 Points)</i></strong></P>
               

                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt1221"  value="opt1221" <?php if(!isset($data['opt1221'])){echo ' ng-model="select1"';}else{echo "checked";} ?> >Student training program(STP)
                        </label>
                     </div>

                      <div class="checkbox">
                        <label>
                        <select  name = "sl1"  <?php if(!isset($data['opt1221'])){echo 'ng-show="select1" ng-model="model"';}else{} ?>>
                        <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl1'])){}else{ if($data['sl1'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl1'])){}else{ if($data['sl1'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl1'])){}else{ if($data['sl1'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl1'])){}else{ if($data['sl1'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>

                        </select>
                         </label>
                     </div>
                    
                     <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt1222" value="opt1222" <?php if(!isset($data['opt1222'])){echo 'ng-model="select2"';}else{echo "checked";} ?>>Techtonic
                        </label>
                     </div>

                      <div class="checkbox">
                        <label>
                        <select  name = "sl2"  <?php if(!isset($data['opt1222'])){echo 'ng-show="select2" ng-model="model3"';}else{} ?>>
                          <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl2'])){}else{ if($data['sl2'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl2'])){}else{ if($data['sl2'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl2'])){}else{ if($data['sl2'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl2'])){}else{ if($data['sl2'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                     <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt1223" value="opt1223" <?php if(!isset($data['opt1223'])){echo 'ng-model="select3"';}else{echo "checked";} ?> >National level competition
                        </label>
                     </div>

                      <div class="checkbox">
                        <label>
                        <select  name = "sl3"  <?php if(!isset($data['opt1223'])){echo 'ng-show="select3" ng-model="model3"';}else{} ?>>
                          
                        <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl3'])){}else{ if($data['sl3'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl3'])){}else{ if($data['sl3'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl3'])){}else{ if($data['sl3'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl3'])){}else{ if($data['sl3'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                          </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt1224" value="opt1224" <?php if(!isset($data['opt1224'])){echo 'ng-model="select4"';}else{echo "checked";} ?> >Sports activity
                        </label>
                     </div>

                      <div class="checkbox">
                        <label>
                        <select  name = "sl4"  <?php if(!isset($data['opt1224'])){echo 'ng-show="select4" ng-model="model4"';}else{} ?>>
                         <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl4'])){}else{ if($data['sl4'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl4'])){}else{ if($data['sl4'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl4'])){}else{ if($data['sl4'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl4'])){}else{ if($data['sl4'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>


                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt1225" value="opt1225" <?php if(!isset($data['opt1225'])){echo 'ng-model="select5"';}else{echo "checked";} ?>>Cultural activity
                        </label>
                     </div>

                      <div class="checkbox">
                        <label>
                        <select  name = "sl5"  <?php if(!isset($data['opt1225'])){echo 'ng-show="select5" ng-model="model5"';}else{} ?>>
                        <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl5'])){}else{ if($data['sl5'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl5'])){}else{ if($data['sl5'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl5'])){}else{ if($data['sl5'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl5'])){}else{ if($data['sl5'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>  
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt1226" value="opt1226" <?php if(!isset($data['opt1226'])){echo 'ng-model="select6"';}else{echo "checked";} ?> >Co curricular activity
                        </label>
                     </div>

                      
                      <div class="checkbox">
                        <label>
                        <select  name = "sl6"  <?php if(!isset($data['opt1226'])){echo 'ng-show="select6" ng-model="model6"';}else{} ?>>
                          <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl6'])){}else{ if($data['sl6'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl6'])){}else{ if($data['sl6'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl6'])){}else{ if($data['sl6'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl6'])){}else{ if($data['sl6'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt1227" value="opt1227" <?php if(!isset($data['opt1227'])){echo 'ng-model="select7"';}else{echo "checked";} ?> >CSR activity like PRAYAS/NSS/other Governmental and non-Governmental channels.
                        </label>
                     </div>

                       <div class="checkbox">
                        <label>
                        <select  name = "sl7"  <?php if(!isset($data['opt1227'])){echo 'ng-show="select7" ng-model="model7"';}else{} ?>>
                        <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl7'])){}else{ if($data['sl7'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl7'])){}else{ if($data['sl7'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl7'])){}else{ if($data['sl7'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl7'])){}else{ if($data['sl7'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt1228" value="opt1228" <?php if(!isset($data['opt1228'])){echo 'ng-model="select8"';}else{echo "checked";} ?>>Entrepreneurship Cell
                        </label>
                     </div>

                       <div class="checkbox">
                        <label>
                        <select  name = "sl8"  <?php if(!isset($data['opt1228'])){echo 'ng-show="select8" ng-model="model8"';}else{} ?>>
                          <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl8'])){}else{ if($data['sl8'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl8'])){}else{ if($data['sl8'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl8'])){}else{ if($data['sl8'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl8'])){}else{ if($data['sl8'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt1229" value="opt1229" <?php if(!isset($data['opt1229'])){echo 'ng-model="select9"';}else{echo "checked";} ?>>Alumni
                        </label>
                     </div>

                     <div class="checkbox">
                        <label>
                        <select  name = "sl9"  <?php if(!isset($data['opt1229'])){echo 'ng-show="select9" ng-model="model9"';}else{} ?>>
                         <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl9'])){}else{ if($data['sl9'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl9'])){}else{ if($data['sl9'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl9'])){}else{ if($data['sl9'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl9'])){}else{ if($data['sl9'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt12210" value="opt12210" <?php if(!isset($data['opt12210'])){echo 'ng-model="select10"';}else{echo "checked";} ?>>Sinhgad Students Council (SSC)
                        </label>
                     </div>

                        <div class="checkbox">
                        <label>
                        <select  name = "sl10"  <?php if(!isset($data['opt12210'])){echo 'ng-show="select10" ng-model="model10"';}else{} ?>>

                        <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl10'])){}else{ if($data['sl10'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl10'])){}else{ if($data['sl10'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl10'])){}else{ if($data['sl10'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl10'])){}else{ if($data['sl10'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                         
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt12211" value="opt12211" <?php if(!isset($data['opt12211'])){echo 'ng-model="select11"';}else{echo "checked";} ?>>Spoken tutorials/Online course (MOOC)
                        </label>
                     </div>

                         <div class="checkbox">
                        <label>
                        <select  name = "sl11"  <?php if(!isset($data['opt12211'])){echo 'ng-show="select11" ng-model="model11"';}else{} ?>>
                          <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl11'])){}else{ if($data['sl11'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl11'])){}else{ if($data['sl11'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl11'])){}else{ if($data['sl11'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl11'])){}else{ if($data['sl11'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt12212" value="opt12212" <?php if(!isset($data['opt12212'])){echo 'ng-model="select12"';}else{echo "checked";} ?>>Educational Tour/Site visit
                        </label>
                     </div>

                        <div class="checkbox">
                        <label>
                        <select  name = "sl12"  <?php if(!isset($data['opt12212'])){echo 'ng-show="select12" ng-model="model12"';}else{} ?>>
                          <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl12'])){}else{ if($data['sl12'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl12'])){}else{ if($data['sl12'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl12'])){}else{ if($data['sl12'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl12'])){}else{ if($data['sl12'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt12213" <?php if(!isset($data['opt12213'])){echo 'ng-model="select13"';}else{echo "checked";} ?> >Value Addition Program (VAP)
                        </label>
                     </div>

                    <div class="checkbox">
                        <label>
                        <select  name = "sl13"  <?php if(!isset($data['opt12213'])){echo 'ng-show="select13" ng-model="model13"';}else{} ?>>
                        <option value = "">-----Please Select-------</option>
                         <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl13'])){}else{ if($data['sl13'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl13'])){}else{ if($data['sl13'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl13'])){}else{ if($data['sl13'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl13'])){}else{ if($data['sl13'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt12214" value="opt12214" <?php if(!isset($data['opt12214'])){echo 'ng-model="select14"';}else{echo "checked";} ?> >Counselling / Admission work
                        </label>
                     </div>

                        <div class="checkbox">
                        <label>
                        <select  name = "sl14"  <?php if(!isset($data['opt12214'])){echo 'ng-show="select14" ng-model="model14"';}else{} ?>>
                          <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl14'])){}else{ if($data['sl14'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl14'])){}else{ if($data['sl14'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl14'])){}else{ if($data['sl14'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl14'])){}else{ if($data['sl14'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt12215" value="opt12215" <?php if(!isset($data['opt12215'])){echo 'ng-model="select15"';}else{echo "checked";} ?>>Magazine Committee
                        </label>
                     </div>

                       <div class="checkbox">
                        <label>
                        <select  name = "sl15"  <?php if(!isset($data['opt12215'])){echo 'ng-show="select15" ng-model="model15"';}else{} ?>>
                         <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl15'])){}else{ if($data['sl15'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl15'])){}else{ if($data['sl15'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl15'])){}else{ if($data['sl15'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl15'])){}else{ if($data['sl15'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt12216" value="opt12216" <?php if(!isset($data['opt12216'])){echo 'ng-model="select16"';}else{echo "checked";} ?> >Library Committee
                        </label>
                     </div>
                     <div class="checkbox">
                        <label>
                        <select  name = "sl16"  <?php if(!isset($data['opt12216'])){echo 'ng-show="select16" ng-model="model16"';}else{} ?>>

                        <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl16'])){}else{ if($data['sl16'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl16'])){}else{ if($data['sl16'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl16'])){}else{ if($data['sl16'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl16'])){}else{ if($data['sl16'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  name = "opt12217" value="opt12217" <?php if(!isset($data['opt12217'])){echo 'ng-model="select17"';}else{echo "checked";} ?>>Result analysis Committee
                        </label>
                     </div>
                   <div class="checkbox">
                        <label>
                        <select  name = "sl17"  <?php if(!isset($data['opt12217'])){echo 'ng-show="select17" ng-model="model17"';}else{} ?>>
                          <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl17'])){}else{ if($data['sl17'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl17'])){}else{ if($data['sl17'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl17'])){}else{ if($data['sl17'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl17'])){}else{ if($data['sl17'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt12218" value="opt12218" <?php if(!isset($data['opt12218'])){echo 'ng-model = "select18"';}else{echo "checked";} ?>>Time table Committee
                        </label>
                     </div>

                      <div class="checkbox">
                        <label>
                        <select  name = "sl18"  <?php if(!isset($data['opt12218'])){echo 'ng-show="select18" ng-model="model18"';}else{} ?>>
                          <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl18'])){}else{ if($data['sl18'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl18'])){}else{ if($data['sl18'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl18'])){}else{ if($data['sl18'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl18'])){}else{ if($data['sl18'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt12219" value="opt12219" <?php if(!isset($data['opt12219'])){echo 'ng-model="select19"';}else{echo "checked";} ?>>Training and Placement support
                        </label>
                     </div>

                      <div class="checkbox">
                        <label>
                        <select  name = "sl19"  <?php if(!isset($data['opt12219'])){echo 'ng-show="select19" ng-model="model19"';}else{} ?>>
                          <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl19'])){}else{ if($data['sl19'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl19'])){}else{ if($data['sl19'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl19'])){}else{ if($data['sl19'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl19'])){}else{ if($data['sl19'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>


                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt12220" value="opt12220" <?php if(!isset($data['opt12220'])){echo 'ng-model="select20"';}else{echo "checked";} ?>>Teacher Guardian / Class Teacher
                        </label>
                     </div>

                        <div class="checkbox">
                        <label>
                        <select  name = "sl20"  <?php if(!isset($data['opt12220'])){echo 'ng-show="select20" ng-model="model20"';}else{} ?>>
                          <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl20'])){}else{ if($data['sl20'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl20'])){}else{ if($data['sl20'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl20'])){}else{ if($data['sl20'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl20'])){}else{ if($data['sl20'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                        </select>
                         </label>
                     </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name = "opt12221" value="opt12221" <?php if(!isset($data['opt12221'])){echo 'ng-model="select21"';}else{echo "checked";} ?>>Training and Placement support
                        </label>
                     </div>

                      <div class="checkbox">
                        <label>
                        <select  name = "sl21"  <?php if(!isset($data['opt12221'])){echo 'ng-show="select21" ng-model="model21"';}else{} ?>>
                        <option value = "">-----Please Select-------</option>
                         <option value = "5"  <?php if(!isset($data['sl21'])){}else{ if($data['sl21'] == 5 ) echo 'selected';} ?>>As Coordinator Institute level</option>

                          <option value="2.0000" <?php if(!isset($data['sl21'])){}else{ if($data['sl21'] == 2.0000 ) echo 'selected';} ?>>As Coordinator Dept level</option>

                          <option value="2.0001" <?php if(!isset($data['sl21'])){}else{ if($data['sl21'] == 2.0001 ) echo 'selected';} ?>>As Members Institute level</option>

                          <option value="1" <?php if(!isset($data['sl21'])){}else{ if($data['sl21'] == 1 ) echo 'selected';} ?>>As Members Dept level</option>
                          
                        </select>
                         </label>
                     </div>

                      



                     
                </div>


                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para122"  name = "para122" class="form-control input-lg custom-input"  ng-model="para122" ng-init="para122 ='<?php if(!isset($data['para122'])){}else{echo $data['para122'];} ?>'" required="required" data-toggle="tooltip" data-placement="top" title="Enter a number" <?php if(!isset($data['para122'])) {echo 'ng-value = "model - 0 + (model1 - 0)*1 + (model3 - 0)*1 + (model4 - 0)*1 + (model5 - 0)*1 + (model6 - 0)*1 + (model7 - 0)*1 + (model8 - 0)*1 + (model9 - 0)*1 + (model10 - 0)*1 + (model11 - 0)*1 + (model12 - 0)*1 + (model13 - 0)*1 + (model14 - 0)*1 +  (model15 - 0)*1 + (model16 - 0)*1 + (model17 - 0)*1 + (model18 - 0)*1 + (model19 - 0)*1 + (model20 - 0)*1 + (model21 - 0)*1 + (model22 - 0)*1 + (sca.score) | number:2"';}; ?>  readonly="readonly"/>
                          <div id="infoMessage"><?php echo form_error('para122'); ?></div>
                    </div>
                </div>

                  <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para222"  name = "para222" class="form-control input-lg custom-input"  ng-model="para222" ng-init="para222 ='<?php if(!isset($data['para222'])){}else{echo $data['para222'];} ?>'" >
                          <div id="infoMessage"><?php echo form_error('para222'); ?></div>
                    </div>
                </div>
               
            </div>

          
            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                     
                    </div>
                </div>
               
                <div class="col-xs-5 col-md-5 right-border">                
                
                  <div class="checkbox">
                    <label>
                    <input type = "checkbox" name = "checked2" ng-model = "checked2"
                     <?php if (isset($data['checked2'])) { ?> ng-init = "checked2 = true" <?php } ?>> 
                     Please Specify for any other option
                     </label>
                  </div>

              <div class="col-md-12" ng-show = "checked2">
               <?php if (!isset($data['opt122-cnt']) || ($data['opt122-cnt'] == 0) ) { ?>
               <div class="col-md-12">

                     

                  <div class="form-group">
                          <select class="form-control"
                          name="opt122-cnt"
                          ng-change="updateChildren()"
                          ng-model="sca.value">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                  </div>

                  <div class="row" ng-repeat="extra in sca.children track by $index">                  
                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Title</span>                                                
                              <input type="text" class="form-control"
                              placeholder="Please enter..." 
                              name="opt122-title-{{$index+1}}" required>
                            </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Score</span>                             
                              <select  class="form-control" name="opt122-value-{{$index+1}}"
                              ng-model= "dynamic.children[$index].score"
                              required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                              </select>

                            </div>
                    </div>

                    <hr/>
                
                  </div><!-- /.row -->


                    <button class="btn btn-default"
                  onclick="event.preventDefault();"
                  ng-show="sca.value" ng-click="calculate()">Calculate Activity Score</button>
                </div>
                <?php } else{ ?>

                   <?PHP
                   
                    for($i = 1; $i<=$data['opt122-cnt']; $i++ )
                     { 
                    ?>
                  <div class="row">                  
                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Title</span>                                                
                              <input type="text" class="form-control"
                              name="opt122-title-<?php echo $i; ?>"

                              value = "<?php if($i==1){echo $data['opt122-title-1'];}
                              else if($i==2){echo $data['opt122-title-2'];}

                              else if($i==3){echo $data['opt122-title-3'];}?>"
                              readonly="readonly"
                             >
                            </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">  
                              <span>Score</span>                             
                          
                             <input type="text" class="form-control"
                             name="opt122-value-<?php echo $i; ?>" value = "<?php if($i==1){echo $data['opt122-value-1'];}
                              else if($i==2){echo $data['opt122-value-2'];}

                              else if($i==3){echo $data['opt122-value-3'];}
                              
                              ?>"
                               readonly="readonly"
                              >

                            </div>
                    </div>

                    <hr/>
                  </div><!-- /.row -->

                   <?php
                   }
                   ?>

                     <?php
                   }
                   ?>









               </div>
               
                </div>

              


               
            </div> 

            </div><!-- end of _1_2_2" -->


            <hr>


            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">1.3 <span style = "color:red">*</span></h4>
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                    <h4>Student feedback (TH/PR)</h4>
                    <h4>SEMESTER-I</h4>

                    <div class="col-xs-8 col-md-8"><p> 1) Theory 1</p></div>
                  
                     <div class="col-xs-4 col-md-4">
                      <input type="text" id = "tsem1f1" name = "tsem1f1" class="form-control input-lg custom-input"  ng-model = "tsem1f1" ng-init="tsem1f1 ='<?php if(!isset($data['tsem1f1'])){echo $tsem1f1; }else{echo $data['tsem1f1'];} ?>'" readonly="readonly" />
                     </div>

                      <div class="col-xs-8 col-md-8"> <p>2) Theory 2</p></div>
                      
                      
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "tsem1f2" name = "tsem1f2" class="form-control input-lg custom-input"  ng-model = "tsem1f2" ng-init="tsem1f2 ='<?php if(!isset($data['tsem1f2'])){echo $tsem1f2; }else{echo $data['tsem1f2'];} ?>'" readonly="readonly"/>
                      </div>


                      <div class="col-xs-8 col-md-8"><p>3) Practical 1</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "psem1f1" name = "psem1f1" class="form-control input-lg custom-input" ng-model = "psem1f1" ng-init = "psem1f1 ='<?php if(!isset($data['psem1f1'])){echo $psem1f1; }else{echo $data['psem1f1'];} ?>'" readonly="readonly"/>
                      </div>

                      <div class="col-xs-8 col-md-8"> <p>4) Practical 2</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "psem1f2" name = "psem1f2" class="form-control input-lg custom-input" ng-model = "psem1f2" ng-init = "psem1f2 ='<?php if(!isset($data['psem1f2'])){echo $psem1f2; }else{echo $data['psem1f2'];} ?>'" readonly="readonly"/>
                      </div>
                   
                   


                  
                    <h4>Student feedback (TH/PR)</h4>
                    <h4>SEMESTER-II</h4>

                    <div class="col-xs-8 col-md-8"><p> 1) Theory 1</p></div>
                  
                     <div class="col-xs-4 col-md-4">
                     <input type="text" id = "tsem2f1" name = "tsem2f1" class="form-control input-lg custom-input" ng-model = "tsem2f1" ng-init="tsem2f1 ='<?php if(!isset($data['tsem2f1'])){echo $tsem2f1; }else{echo $data['tsem2f1'];} ?>'" readonly="readonly"/>
                     </div>

                      <div class="col-xs-8 col-md-8"> <p>2) Theory 2</p></div>
                      
                      
                      <div class="col-xs-4 col-md-4">
                          <input type="text" id = "tsem2f2" name = "tsem2f2" class="form-control input-lg custom-input" ng-model = "tsem2f2" ng-init="tsem2f2 ='<?php if(!isset($data['tsem2f2'])){echo $tsem2f2; }else{echo $data['tsem2f2'];} ?>'" readonly="readonly"/>
                      </div>


                      <div class="col-xs-8 col-md-8"><p>3) Practical 1</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "psem2f1" name = "psem2f1" class="form-control input-lg custom-input" ng-model = "psem2f1" ng-init = "psem2f1 ='<?php if(!isset($data['psem2f1'])){echo $psem2f1; }else{echo $data['psem2f1'];} ?>'" readonly="readonly"/>
                      </div>

                      <div class="col-xs-8 col-md-8"> <p>4) Practical 2</p></div>
                      <div class="col-xs-4 col-md-4">
                       <input type="text" id = "psem2f2" name = "psem2f2" class="form-control input-lg custom-input" ng-model = "psem2f2" ng-init = "psem2f2 ='<?php if(!isset($data['psem2f2'])){echo $psem2f2; }else{echo $data['psem2f2'];} ?>'" readonly="readonly"/>
                      </div>
                     <p class="col-xs-12 col-md-12">• Score proportional to average of No-problem feedback obtained for all theory and practical assigned Subjects.</p>
                    </div>


                 

                
                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>20</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para130"  name = "para130" class="form-control input-lg custom-input"  ng-model="para130" ng-init="para130 ='<?php if(!isset($data['para130'])){echo $fd; }else{echo $data['para130'];} ?>'" readonly="readonly"/>
                        <div id="infoMessage"><?php echo form_error('para130'); ?></div>
                    </div>
                </div>

                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para230"  name = "para230" class="form-control input-lg custom-input"  ng-model="para230" ng-init="para230 ='<?php if(!isset($data['para230'])){echo $fd;}else{echo $data['para230'];} ?>'">
                        <div id="infoMessage"><?php echo form_error('para230'); ?></div>
                    </div>
                </div>
               
            </div>
            <hr>

                <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">1.4 <span style = "color:red">*</span></h4>
                    </div>
                </div>

                  <div class="col-xs-5 col-md-5 right-border">
                    <h4>Results Of students(TH/PR)</h4>
                    <h4>SEMESTER-I</h4>

                    <div class="col-xs-8 col-md-8"><p> 1) Theory 1</p></div>
                  
                     <div class="col-xs-4 col-md-4">
                     <input type="text" id = "tsem1r1" name = "tsem1r1" class="form-control input-lg custom-input" ng-model = "tsem1r1" ng-init="tsem1r1 ='<?php if(!isset($data['tsem1r1'])){echo $tsem1r1; }else{echo $data['tsem1r1'];} ?>'" readonly="readonly"/>
                     </div>

                      <div class="col-xs-8 col-md-8"> <p>2) Theory 2</p></div>
                      
                      
                      <div class="col-xs-4 col-md-4">
                   <input type="text" id = "tsem1r2" name = "tsem1r2" class="form-control input-lg custom-input" ng-model = "tsem1r2" ng-init="tsem1r2 ='<?php if(!isset($data['tsem1r2'])){echo $tsem1r2; }else{echo $data['tsem1r2'];} ?>'" readonly="readonly"/>
                      </div>


                      <div class="col-xs-8 col-md-8"><p>3) Practical 1</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "pr1sem1" name = "pr1sem1" class="form-control input-lg custom-input" ng-model = "pr1sem1" ng-init = "pr1sem1 ='<?php if(!isset($data['pr1sem1'])){echo $pr1sem1; }else{echo $data['pr1sem1'];} ?>'" readonly="readonly"/>
                      </div>

                      <div class="col-xs-8 col-md-8"> <p>4) Practical 2</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "pr2sem1" name = "pr2sem1" class="form-control input-lg custom-input" ng-model = "pr2sem1" ng-init = "pr2sem1 ='<?php if(!isset($data['pr2sem1'])){echo $pr2sem1; }else{echo $data['pr2sem1'];} ?>'" readonly="readonly"/>
                      </div>
                   
                   


                  
                   
                    <h4>SEMESTER-II</h4>

                    <div class="col-xs-8 col-md-8"><p> 1) Theory 1</p></div>
                  
                     <div class="col-xs-4 col-md-4">
                     <input type="text" id = "tsem2r1" name = "tsem2r1" class="form-control input-lg custom-input" ng-model = "tsem2r1" ng-init="tsem2r1 ='<?php if(!isset($data['tsem2r1'])){echo $tsem2r1; }else{echo $data['tsem2r1'];} ?>'" readonly="readonly"/>
                     </div>

                      <div class="col-xs-8 col-md-8"> <p>2) Theory 2</p></div>
                      
                      
                      <div class="col-xs-4 col-md-4">
                   <input type="text" id = "tsem2r2" name = "tsem2r2" class="form-control input-lg custom-input" ng-model = "tsem2r2" ng-init="tsem2r2 ='<?php if(!isset($data['tsem2r2'])){echo $tsem2r2; }else{echo $data['tsem2r2'];} ?>'" readonly="readonly"/>
                      </div>


                      <div class="col-xs-8 col-md-8"><p>3) Practical 1</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "pr1sem2" name = "pr1sem2" class="form-control input-lg custom-input" ng-model = "pr1sem2" ng-init = "pr1sem2 ='<?php if(!isset($data['pr1sem2'])){echo $pr1sem2; }else{echo $data['pr1sem2'];} ?>'" readonly="readonly"/>
                      </div>

                      <div class="col-xs-8 col-md-8"> <p>4) Practical 2</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "pr2sem2" name = "pr2sem2" class="form-control input-lg custom-input" ng-model = "pr2sem2" ng-init = "pr2sem2 ='<?php if(!isset($data['pr2sem2'])){echo $pr2sem2; }else{echo $data['pr2sem2'];} ?>'" readonly="readonly"/>
                      </div>
                   
                     <p class="col-xs-12 col-md-12">*More than average of previous three years results in the respective subject/practical-‘10’ Points otherwise ‘5’ points .(Final score is to be calculated based on average of points scored in all assigned theory and practical of both the semesters.)</p>
                    </div>

                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para140"  name = "para140" class="form-control input-lg custom-input"  ng-model="para140" ng-init="para140 ='<?php if(!isset($data['para140'])){echo $finalres;}else{echo $data['para140'];} ?>'" readonly="readonly"/>
                         <div id="infoMessage"><?php echo form_error('para140'); ?></div>
                    </div>
                </div>

                   <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para240"  name = "para240" class="form-control input-lg custom-input"  ng-model="para240" ng-init="para240 ='<?php if(!isset($data['para240'])){echo $finalres;}else{echo $data['para240'];} ?>'">
                         <div id="infoMessage"><?php echo form_error('para240'); ?></div>
                    </div>
                </div>
               
            </div>

            <hr>

             <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        <h4 for="">1.5 <span style = "color:red">*</span></h4>
                    </div>
                </div>

                 <div class="col-xs-5 col-md-5 right-border">
                    <h4>Attendance Of students(TH/PR)</h4>
                    <h4>SEMESTER-I</h4>

                    <div class="col-xs-8 col-md-8"><p> 1) Theory 1</p></div>
                  
                     <div class="col-xs-4 col-md-4">
                     <input type="text" id = "th1aasem1" name = "th1aasem1" class="form-control input-lg custom-input" ng-model = "th1aasem1" ng-init="th1aasem1 ='<?php if(!isset($data['th1aasem1'])){echo $th1aasem1; }else{echo $data['th1aasem1'];} ?>'" readonly="readonly"/>
                     </div>

                      <div class="col-xs-8 col-md-8"> <p>2) Theory 2</p></div>
                      
                      
                  <div class="col-xs-4 col-md-4">
                   <input type="text" id = "th2aasem1" name = "th2aasem1" class="form-control input-lg custom-input" ng-model = "th2aasem1" ng-init="th2aasem1 ='<?php if(!isset($data['th2aasem1'])){echo $th2aasem1; }else{echo $data['th2aasem1'];} ?>'" readonly="readonly"/>
                      </div>


                      <div class="col-xs-8 col-md-8"><p>3) Practical 1</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "pr1aasem1" name = "pr1aasem1" class="form-control input-lg custom-input" ng-model = "pr1aasem1" ng-init = "pr1aasem1 ='<?php if(!isset($data['pr1aasem1'])){echo $pr1aasem1; }else{echo $data['pr1aasem1'];} ?>'" readonly="readonly"/>
                      </div>

                      <div class="col-xs-8 col-md-8"> <p>4) Practical 2</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "pr2aasem1" name = "pr2aasem1" class="form-control input-lg custom-input" ng-model = "pr2aasem1" ng-init = "pr2aasem1 ='<?php if(!isset($data['pr2aasem1'])){echo $pr2aasem1; }else{echo $data['pr2aasem1'];} ?>'" readonly="readonly"/>
                      </div>
                   
                   
                  <h4>SEMESTER-II</h4>

                    <div class="col-xs-8 col-md-8"><p> 1) Theory 1</p></div>
                  
                     <div class="col-xs-4 col-md-4">
                     <input type="text" id = "tsem2r1" name = "th1aasem2" class="form-control input-lg custom-input" ng-model = "th1aasem2" ng-init="th1aasem2 ='<?php if(!isset($data['th1aasem2'])){echo $th1aasem2; }else{echo $data['th1aasem2'];} ?>'" readonly="readonly"/>
                     </div>

                      <div class="col-xs-8 col-md-8"> <p>2) Theory 2</p></div>
                      
                      
                      <div class="col-xs-4 col-md-4">
                   <input type="text" id = "th2aasem2" name = "th2aasem2" class="form-control input-lg custom-input" ng-model = "th2aasem2" ng-init="th2aasem2 ='<?php if(!isset($data['th2aasem2'])){echo $th2aasem2; }else{echo $data['th2aasem2'];} ?>'" readonly="readonly"/>
                      </div>


                      <div class="col-xs-8 col-md-8"><p>3) Practical 1</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "pr1aasem2" name = "pr1aasem2" class="form-control input-lg custom-input" ng-model = "pr1aasem2" ng-init = "pr1aasem2 ='<?php if(!isset($data['pr1aasem2'])){echo $pr1aasem2; }else{echo $data['pr1aasem2'];} ?>'" readonly="readonly"/>
                      </div>

                      <div class="col-xs-8 col-md-8"> <p>4) Practical 2</p></div>
                      <div class="col-xs-4 col-md-4">
                      <input type="text" id = "pr2aasem2" name = "pr2aasem2" class="form-control input-lg custom-input" ng-model = "pr2aasem2" ng-init = "pr2aasem2 ='<?php if(!isset($data['pr2aasem2'])){echo $pr2aasem2; }else{echo $data['pr2aasem2'];} ?>'" readonly="readonly"/>
                      </div>
                   
                     <p class="col-xs-12 col-md-12">*Average of student’s attendance in all the subjects/practicals assigned during the entire academic year. (Final score is to be calculated based on average of points scored in all assigned theory and practical of both the semesters.)</p>
                </div>


                <div class="col-xs-2 col-md-2 right-border text-center">
                   <div class="optimum-score"><span>10</span></div>
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                        <input type="text" " id = "para150"  name = "para150" class="form-control input-lg custom-input"  ng-model="para150" ng-init="para150 ='<?php if(!isset($data['para150'])){echo $att;}else{echo $data['para150'];} ?>'" readonly="readonly">
                          <div id="infoMessage"><?php echo form_error('para150'); ?></div>
                    </div>
                </div>


                <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "para250"  name = "para250" class="form-control input-lg custom-input"  ng-model="para250" ng-init="para250 ='<?php if(!isset($data['para250'])){echo $att;}else{echo $data['para250'];} ?>'">
                          <div id="infoMessage"><?php echo form_error('para250'); ?></div>
                    </div>
                </div>
               
            </div>


            <hr>
            <div class="row parent-question">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                       
                    </div>
                </div>

                <div class="col-xs-5 col-md-5 right-border">
                  
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center" style = "display:none">
                <h1>Total</h1>
                </div>
                <div class="col-xs-2 col-md-2 right-border" style = "display:none">
                    <div class="form-group">                        
                        <input type="text" " id = "sca_total"  name = "sca_total" class="form-control input-lg custom-input" value = "{{para111*1 + para112*1 +  para113*1 + para114*1 + para115*1 + para116*1 + para117*1 + para118*1 + para12*1 + para130*1 + para140*1 +  para150*1 | number:0}}" disabled>
                    </div>
                </div>


                   <div class="col-xs-2 col-md-2 right-border" style = "<?php echo "display: none";?>">
                    <div class="form-group">                        
                        <input type="text" " id = "sca_total2"  name = "sca_total2" class="form-control input-lg custom-input" value = "{{para213*1 + para214*1  + para215*1 + para216*1 + para217*1 + para218*1 + para221*1 + para222*1 + para230*1 + para240*1 + para250*1 | number:0}}" disabled>
                    </div>
                  </div>         
               
            </div>
                 <div class="row parent-question" style = "margin-bottom: 3%">
                 <div class="col-xs-1 col-md-1 right-border text-center">
                    <div class="form-group">                        
                        
                    </div>
                  </div>
                  <hr>

                  <div class="col-xs-5 col-md-5 right-border" >
                  <div class="form-group"> 
                    
                     

                      <button  onclick="location.href='<?php echo base_url();?>index.php/Apraisal_form/my_apprisal'" class="btn btn-success pull-right"></i>Back</button>


                    
                  
                  </div>
                </div>
                <div class="col-xs-2 col-md-2 right-border text-center">
                   
                </div>
                <div class="col-xs-2 col-md-2 right-border">
                    <div class="form-group">                        
                    
                    </div>
                </div>
               
            </div>
            </form>
          </div>
                  </div>
             </div>
          </div>
      </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php include 'footer.php';?>
        <!-- /footer content -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/3.13.3/math.min.js"></script>
 
     <script  src="<?php echo base_url();?>assets/js/sca.js"></script>

 

   
