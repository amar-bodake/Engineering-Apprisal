
<?php include 'header.php';

?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';


?> 
<style>
tr
{
  cursor:pointer;
}
</style>
      <!-- /top navigation -->

       <!-- page content -->
        <div class="right_col" role="main">   
        
           <div class="page-title">
             <div style="margin-bottom:50px;"></div>
              <div>
                <h3>Report Analysis (Tabular Presentation)</h3>
              </div>
           </div>
           
           <div style="margin-bottom:50px;"></div>
           
           <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_content">

                        <div class="row">

                         <div class="col-md-3 col-sm-3 col-xs-3">  
                         <?php $year['#'] = 'Please Select'; ?>                    
                         <label for="inst">Select Year: </label>
                         <?php echo form_dropdown('year_id', $year,  '#', 'class="form-control" id="year"' ); ?>
                         </div>
                        
                         <div class="col-md-3 col-sm-3 col-xs-3">  
                         <?php $inst['#'] = 'Please Select'; ?>                    
                         <label for="inst">Select Institutes: </label>
                         <?php echo form_dropdown('inst_id', $inst, '#', 'class="form-control" id="inst"'); ?>
                         </div>


                         <div class="col-md-3 col-sm-3 col-xs-3">

                           <?php $depts['#'] = 'Please Select'; ?>
                          <label for="dep">Select Department: </label><?php echo form_dropdown('dept_id', $depts, '#', 'class="form-control" id="depts"'); ?>
                          </div>

                          <div class="col-md-3 col-sm-3 col-xs-3" style = "margin-top:2%">
                           <button type="button" id = "go" class="btn">GO</button>
                          
                           </div>

                       </div>
                      
                    

                        <div class="row">
                      <!-- chart -->
                           <div id="main1" style = "margin-bottom : 3%">
                                <p class = "para" style = "text-align: center"></p>
                                <table class="table table-striped projects" id="example" style = "margin-top: 3%">
                                    <div id="loading" style = "display:none">
                                   <img id="loading-image" src="<?php echo base_url();?>assets/images/Eclipse.gif" alt="Loading..." />
                                    </div>
                                  <thead>
                                  <tr class='someClass' ><th>Emp Code</th><th>Employee Name</th><th>Date Of Joining</th><th>Scaled SCA</th><th>Scaled PDA</th><th>Scaled RC</th><th>Scaled AHP</th><th>Total Score</th><th>PI</th><th class="select-filter">Grade</th></tr>
                                 
                                  </thead>
                                  <tbody>
                                  </tbody>
                                  </table>


                           </div>


                           </div>


                      </div>
                    </div>
               </div>
           </div>
           
        </div>
      








            <script type="text/javascript">



            

            $(document).ready(function() {

              

              $(document).ajaxStart(function () {
           $("#loading").show();           
       });
       $(document).ajaxComplete(function () {
           $("#loading").hide();
       });

             
              
              if($.cookie('msg') != null && $.cookie('msg') != "")
              {
                  $("div#myModal121.modal, .modal-backdrop").hide();
              }
              else
              {
                  $('#myModal121').modal('show');
                  $.cookie('msg', 'str');
              }


         $("#example").css("display", "none");

         $('#inst').change(function(){
        //any select change on the dropdown with id inst trigger this code
         $("#depts > option").remove(); //first of all clear select items
         var inst_id = $('#inst').val(); // here we are taking inst id of the selected one.
         //console.log(inst_id);
         $.ajax({
         type: "POST",
         url: "<?php echo base_url();?>index.php/Apraisal_form/get_depts/"+inst_id, //here we are calling our user controller and get_cities method with the country_id
         
         success: function(depts) //we're calling the response json array 'depts'
         {
         $.each(depts,function(id,dep) //here we're doing a foeach loop round each dep with id as the key and dep as the value
         {
         var opt = $('<option />'); // here we're creating a new select option with for each dep
         opt.val(id);
         opt.text(dep);
         $('#depts').append(opt); //here we will append these new select options to a dropdown with the id 'depts'
         });
         }
         
         });
       
       });


      //   For Generating Graph

          $('#go').click(function(){

          $("table select").remove();
          $('#example tbody').empty();
          $(".para").empty();
         //any select change on the dropdown with id inst trigger this code
        

          var inst_id = $('#inst').val(); // here we are taking inst id of the selected one.
          var dept_id = $('#depts').val(); // here we are taking inst id of the selected one.
           var year_id = $('#year').val();
          console.log(year_id);

          if(year_id == '#' || dept_id == '#' || inst_id == '#')
          {
            alert("Please Select Year/Institute/Department");
            location.reload();
          }
          

          $.ajax({
         type: "POST",
         url: "<?php echo base_url();?>index.php/Apraisal_form/report_analysis/"+inst_id+"/"+dept_id+"/"+year_id, //here we are calling our user controller and get_cities method with the country_id
         
         success: function(data) //we're calling the response json array 'depts'
         {
         //console.log('hi');
         // var details = $.parseJSON(paraArray);
         // alert(details.institute);
         // alert(details.department);

         $("#example tbody").remove();

        var yearGraph = ($.parseJSON(data)).year_graph;
         console.log(yearGraph);

          if(yearGraph != null)
            {
           // var someRow= ""; // add resources
            //$("table").append(someRow);

        $("#example").css("display", "block");




         var mstrArray = [];
          var total, pi;

          arrayOfDataJS = new Array();
          $.each(yearGraph, function (i, elem) {

                    total = Number( yearGraph[i]['ahp_total2'] )
                    + Number( yearGraph[i]['scale_pdac'] )
                    + Number( yearGraph[i]['scale_rc'] )
                    + Number( yearGraph[i]['scale_sca'] ) ;

                    //pi = Number( yearGraph[i]['pi'] );
                    emp_code = ( yearGraph[i]['emp_code']);
                    name = ( yearGraph[i]['name']);
                    des = ( yearGraph[i]['designation_id'])

                    if(des == 1)
                    {
                       des_sca = yearGraph[i]['scale_sca']*0.4;  
                       des_pda = yearGraph[i]['scale_pdac']*0.2; 
                       des_rc =  yearGraph[i]['scale_rc']*0.3; 
                       des_ahp = yearGraph[i]['ahp_total2']*0.1;
                       pi = des_sca + des_pda + des_rc + des_ahp;
                    }

                     else if(des == 2)
                    {
                       des_sca = yearGraph[i]['scale_sca']*0.5;  
                       des_pda = yearGraph[i]['scale_pdac']*0.2; 
                       des_rc =  yearGraph[i]['scale_rc']*0.2; 
                       des_ahp = yearGraph[i]['ahp_total2']*0.1;
                       pi = des_sca + des_pda + des_rc + des_ahp;
                    }

                    else if(des == 3)
                    {
                       des_sca = yearGraph[i]['scale_sca']*0.6;  
                       des_pda = yearGraph[i]['scale_pdac']*0.15; 
                       des_rc =  yearGraph[i]['scale_rc']*0.15; 
                       des_ahp = yearGraph[i]['ahp_total2']*0.1;
                       pi = des_sca + des_pda + des_rc + des_ahp;
                    }

                    else  
                    {
                     alert("Designation ID not assign");
                    }

                    //grading
                         if(pi >= 65) 
                                  {
                                    grade =  "Outstanding";

                                  } 
                                  else if(pi >= 50 && pi < 65) 
                                  {
                                    grade =  "Very Good"; 
                                  }

                                   else if(pi >= 45 && pi < 50) 
                                  {
                                     grade =  "Positively Good"; 
                                  }

                                  else if(pi >= 40 && pi < 45) 
                                  {
                                     grade =  "Good"; 
                                  }

                                   else if(pi >= 30 && pi < 40) 
                                  {
                                    grade =  "Average"; 
                                  }

                                  else if(pi < 30) 
                                  {
                                     grade =  "Below Average"; 
                                  }
                  
                  




                    mstrArray.push([total, pi,emp_code,name]);


                    tr = $('<tr id= "filters"/>');

                    tr.append("<td>" + yearGraph[i]['emp_code'] + "</td>");
                    tr.append("<td>" + yearGraph[i]['name'] + "</td>");
                    tr.append("<td>" + yearGraph[i]['date_of_joining'] + "</td>");
                    tr.append("<td>" + yearGraph[i]['scale_sca'] + "</td>");
                    tr.append("<td>" + yearGraph[i]['scale_pdac'] + "</td>");
                    tr.append("<td>" + yearGraph[i]['scale_rc'] + "</td>");
                     tr.append("<td>" + yearGraph[i]['ahp_total2'] + "</td>");
                    tr.append("<td>" + total + "</td>");
                   
                     tr.append("<td>" + pi.toFixed(2) + "</td>");
                     tr.append("<td>" + grade + "</td>")





                    $('table').append(tr);
                      
                   

                    // reset 
                    total = 0;
                    pi = 0;

          }); //  end of each

                $('#example').DataTable( {


                    dom: 'Bfrtip',
                    "bDestroy": true,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                     language: {
                  processing: "<img src='<?php echo base_url();?>assets/images/Eclipse.gif'> Loading...",
                  },

                  initComplete: function () {
            this.api().columns('.select-filter').every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()) )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
                } );

            
            }

            else
            {
                $(".para").html("<h2 style = 'color:red;'>No Data Available!</h2>");
                $("#example").css("display", "none");
                $(".dt-buttons").css("display", "none");
                $(".dataTables_info").css("display", "none");
                $(".dataTables_paginate").css("display", "none");
                 $("#example_filter").css("display", "none");
                
               
                

            }

              var table = $('#example').DataTable();
              $('#example tbody').on('click', 'tr', function () {
             var data = table.row( this ).data();
              //alert( 'You clicked on '++'\'s row' );

              var targetURL = "view_report/"+ Base64.encode(data[0]);

                window.open(targetURL, '_blank');
            } );


          

          }
         
         });
         
       
         });

         


            
          });


        </script>






    
<?php include 'footer.php';?>
        <!-- /footer content -->
 

                            
 