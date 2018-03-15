<style>
.row{position: relative;}
.post-list{ 
    margin-bottom:20px;
}
div.list-item {
    border-left: 4px solid #7ad03a;
    margin: 5px 15px 2px;
    padding: 1px 12px;
    background-color:#F1F1F1;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    height: 60px;
}
div.list-item p {
    margin: .5em 0;
    padding: 2px;
    font-size: 13px;
    line-height: 1.5;
}
.list-item a {
    text-decoration: none;
    padding-bottom: 2px;
    color: #0074a2;
    -webkit-transition-property: border,background,color;
    transition-property: border,background,color;-webkit-transition-duration: .05s;
    transition-duration: .05s;
    -webkit-transition-timing-function: ease-in-out;
    transition-timing-function: ease-in-out;
}
.list-item a:hover{text-decoration:underline;}
.list-item h2{font-size:25px; font-weight:bold;text-align: left;}

/* Pagination */
div.pagination {
	font-family: "Lucida Sans Unicode", "Lucida Grande", LucidaGrande, "Lucida Sans", Geneva, Verdana, sans-serif;
	padding:2px;
	margin: 20px 10px;
    float: right;
}

div.pagination a {
	margin: 2px;
	padding: 0.5em 0.64em 0.43em 0.64em;
	background-color: #ff5722;
	text-decoration: none; /* no underline */
	color: #fff;
}
div.pagination a:hover, div.pagination a:active {
	padding: 0.5em 0.64em 0.43em 0.64em;
	margin: 2px;
	background-color: gba(255,255,255,.1);;
	color: #fff;
}
div.pagination span.current {
		padding: 0.5em 0.64em 0.43em 0.64em;
		margin: 2px;
		background-color: #f6efcc;
		color: #6d643c;
	}
div.pagination span.disabled {
		display:none;
	}
.pagination ul li{display: inline-block;}
.pagination ul li a.active{opacity: .5;}

/* loading */
.loading{position: absolute;left: 0; top: 0; right: 0; bottom: 0;z-index: 2;background: rgba(255,255,255,0.7);}
.loading .content {
    position: absolute;
    transform: translateY(-50%);
     -webkit-transform: translateY(-50%);
     -ms-transform: translateY(-50%);
    top: 50%;
    left: 0;
    right: 0;
    text-align: center;
    color: #555;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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
                <div class="col-md-6"><h3>Staff Appraisal</h3></div>
                <div class="col-md-6 text-right">
                  <?php

                  // I'm India so my timezone is Asia/Calcutta
                        date_default_timezone_set('Asia/Calcutta');

                        // 24-hour format of an hour without leading zeros (0 through 23)
                        $Hour = date('G');
                        $wtxt = "";
                        if ( $Hour >= 5 && $Hour <12 ) {
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

<div class="container">
    <h1>Approved Appraisals</h1>

             <form class="form-inline" action="<?php echo base_url();?>index.php/demo" method="post">
             <select class="form-control" name="field">
             <option selected="selected" disabled="disabled" value="">Filter By</option>
             <option value="id">ID</option>
             <option value="name">Name</option>
                                       
            </select>
                                    <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                                    <input class="btn btn-primary" type="submit" name="filter" value="Go">
                                  </form>
    <div class="">
        <div class="post-list" id="postList">


            <?php 
              $i = 1;
              if(!empty($posts)): foreach($posts as $post):
                    echo '<table class="table table-striped table-hover ">';
                                             echo  '<thead>';
                                             echo '<tr>';
                                             echo  '<th>Employee ID</th>';
                                             echo  '<th>Employee Name</th>';
                                             echo  '<th>Date Of PI </th>';
                                             echo '<th>Action View</th>';
                                             echo '<th>Action Filed</th>';
                                             //echo '<th>Action Print</th>';
                                             echo '</tr>';
                                             echo '</thead>';
                                             
                                             echo "<tr class = 'tab'>";
                                             echo  '<td>'.$post["emp_code"].'</td>';
                                              echo  '<td>'.$post["name"].'</td>';
                                               echo  '<td>'.$post["date_of_pi_creation"].'</td>';
                                            echo  '<td><a href = '.base_url().'index.php/apraisal_form/view_apraisal/'.$post["emp_code"].'><button type="button" class="btn btn-raised btn-primary button1">View</button></a></td>';

                                             echo  '<td><a href = '.base_url().'index.php/apraisal_form/forward_apraisal/'.$post["emp_code"].'><button type="button" class="btn btn-raised btn-success  button1">Filed</button></a></td>';

                                            // echo  '<td><a href = '.base_url().'index.php/apraisal_form/print_apraisal/'.$post["emp_code"].'/'.$post["pi_id"].'><button type="button" class="btn btn-raised btn-warning button1">Print</button></td>';

                                             echo "</tr>";

                                         


                            echo '</table>'
                  ?>                           
          
                <?php endforeach; else: ?>
            <p>Post(s) not available.</p>
            <?php endif; ?>
            <?php echo $this->ajax_pagination->create_links(); ?>
        </div>
        <div class="loading" style="display: none;"><div class="content"><img src="<?php echo base_url().'assets/img/loading.gif'; ?>"/></div></div>
    </div>
</div>
</div>
</div>
</div>