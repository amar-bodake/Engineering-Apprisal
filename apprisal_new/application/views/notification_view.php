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
                <div class="col-md-6"><h3>Dashboard</h3></div>
                <div class="col-md-6 text-right"> 
                   <?php

                  // I'm India so my timezone is Asia/Calcutta
                        date_default_timezone_set('Asia/Calcutta');

                        // 24-hour format of an hour without leading zeros (0 through 23)
                        $Hour = date('G');
                        $wtxt = "";
                        if ( $Hour >= 5 && $Hour < 12 ) {
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
    
  <script type="text/javascript">
  $(document).ready(function(){
    $('button[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('button[href="' + activeTab + '"]').tab('show');
    }
  });
  </script>





  <div class="container wrapper-dashboard-content">
  <div class="row">
   <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
        <div id="wid-id-0">
            <header role="heading">
                <h2></h2>
            </header>
            <!-- widget div-->
            <div role="content">
                <!-- widget content -->
                <div class="widget-body" id = "status">

                <!-- Status GUI-->


                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->

    </article>
    </div>

 <script type="text/javascript">
  $(document).ready(function(){
    $('button[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('button[href="' + activeTab + '"]').tab('show');
    }
  });
  </script>

    <div class="col-md-12" style = "margin-top:2%">
      <div class="col-sm-12">
         <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
      
            <div class="btn-group" role="group">
                <button type="button" id="favorites" class="btn btn-default" href="#my" data-toggle="tab"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                    <div class="hidden-xs">MY NOTIFICATION</div>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="following" class="btn btn-default" href="#staff" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <div class="hidden-xs">STAFF NOTIFICATION</div>
                </button>
            </div>
        </div>

        <div class="well">
        <div class="tab-content">

        <!--My Notification-->
        <div class="tab-pane fade in active" id="my">
          
        </div>
        




        <!--Staff Notification-->
          <div class="tab-pane fade in" id="staff">
      
          </div>


     </div>
    
    </div>
    
    </div>
            

</div>

</div>

<?php include 'footer.php';?>
        <!-- end of : title message -->
    
<script>
var timer, delay = 2000; //2 minutes counted in milliseconds.

timer = setInterval(function(){
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url().'index.php/status/my_status';?>',
      success: function(html){
        $('#status').empty().append(html);
      }
    });
    
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url().'index.php/ntfs/my_ntfs';?>',
      success: function(html){
        $('#my').empty().append(html);
      }
    });


      $.ajax({
      type: 'POST',
      url: '<?php echo base_url().'index.php/ntfs/staff_ntfs';?>',
      success: function(html){
        $('#staff').empty().append(html);
      }
    });

}, delay)

</script>
