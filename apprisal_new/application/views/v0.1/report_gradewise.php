
<?php include 'header.php';?>
   
<?php include 'left_nav.php';?>
       
        
      <!-- top navigation -->
<?php include 'top_nav.php';


?> 

      <!-- /top navigation -->

       <!-- page content -->
        <div class="right_col" role="main">   
        
           <div class="page-title">
             <div style="margin-bottom:50px;"></div>
              <div>
                <h3>Report Analysis (Gradewise)</h3>
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

                        
                        <div class="col-md-3 col-sm-3 col-xs-3" style = "margin-top:2%">
                         <button type="button" id = "go" class="btn">GO</button>
                        
                        </div>

                       </div>

                       <div class="row">

                        <div id="loading" style = "display:none">
                             <img id="loading-image" src="<?php echo base_url();?>assets/images/Eclipse.gif" alt="Loading..." />
                        </div>

                    
                       <p class = "para" style = "text-align: center"></p>
                        <div id="echart_pie1" style="height:350px;"></div>
                      </div>

                      </div>



                      </div>
                    </div>
               </div>
           </div>
           
        </div>
        <!-- /page content -->
       
       

        <!-- footer content -->
      <script src="<?php echo base_url();?>assets/js/echarts.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
      <script type="text/javascript">
 $(document).ready(function(){
    

        $('#go').click(function(){
         //any select change on the dropdown with id inst trigger this code

         var $loading = $('#loading').hide();
          $(document)
            .ajaxStart(function () {
              $loading.show();
            })
            .ajaxStop(function () {
              $loading.hide();
            });
        

       
        var year_id = $('#year').val();
        

           if(year_id == '#')
          {
            alert("Please Select Year/Institute/Department");
            location.reload();
          }


         $.ajax({
         type: "POST",
         url: "<?php echo base_url();?>index.php/Apraisal_form/report_analysis_gradewise/"+year_id, //here we are calling our user controller and get_cities method with the country_id
         
         success: function(data) //we're calling the response json array 'depts'
         {
         //console.log('hi');
         // var details = $.parseJSON(paraArray);
         // alert(details.institute);
         // alert(details.department);
         var yearGraph = ($.parseJSON(data)).year_graph;
        console.log(yearGraph);


         if(yearGraph != null)
            {
           $("#echart_pie1").css("display", "block");
           $(".para").html("<h2 style = 'color:red;'></h2>"); 
          var mstrArray = [];
          var total, pi,o = 0,vg=0,pg=0,g=0,a=0,ba=0;

          arrayOfDataJS = new Array();
          $.each(yearGraph, function (i, elem) {

                

                pi = Number( yearGraph[i]['pi'] );
                

                if(pi >= 65 )
                {
                  //outstanding
                  o++;
                }

                else if(pi >= 50 && pi < 65) 
                {
                   //grade =  "Very Good"; 
                   vg++;
                }

                 else if(pi >= 45 && pi < 50) 
                {
                 //grade =  "Positively Good"; 
                  pg++;
                }

                else if(pi >= 40 && pi < 45) 
                {
                 //grade =  "Good"; 
                 g++;
                }

                else if(pi >= 30 && pi < 40) 
                {
                 //grade =  "Average"; 
                 a++;
                }

                else if(pi < 30) 
                {
                  //grade =  "Below Average"; 
                  ba++;
                 }

            }); //  end of each
           
                    if ($('#echart_pie1').length ){  
                        
                        var echartPie = echarts.init(document.getElementById('echart_pie1'));

                        echartPie.setOption({
                        tooltip: {
                          trigger: 'item',
                          formatter: "{a} <br/>{b} : {c} ({d}%)"
                        },
                        legend: {
                          x: 'center',
                          y: 'bottom',
                          data: ['Outstanding', 'Very Good', 'Positively Good', 'Good', 'Average','Below Average']
                        },
                        toolbox: {
                          show: true,
                          feature: {
                          magicType: {
                            show: true,
                            type: ['pie', 'funnel'],
                            option: {
                            funnel: {
                              x: '25%',
                              width: '50%',
                              funnelAlign: 'left',
                              max: 1548
                            }
                            }
                          },
                          restore: {
                            show: true,
                            title: "Restore"
                          },
                          saveAsImage: {
                            show: true,
                            title: "Save Image"
                          }
                          }
                        },
                        calculable: true,
                        series: [{
                         name: 'Grade',
                          type: 'pie',
                          radius: '55%',
                          center: ['50%', '48%'],
                          data: [{
                          value: o,
                          name: 'Outstanding'
                          }, {
                          value: vg,
                          name: 'Very Good'
                          }, {
                          value: pg,
                          name: 'Positively Good'
                          }, {
                          value: g,
                          name: 'Good'
                          }, {
                          value: a,
                          name: 'Average'
                          },{
                          value: ba,
                          name: 'Below Average'
                          },

                          ]
                        }]
                        });

                        var dataStyle = {
                        normal: {
                          label: {
                          show: false
                          },
                          labelLine: {
                          show: false
                          }
                        }
                        };

                        var placeHolderStyle = {
                        normal: {
                          color: 'rgba(0,0,0,0)',
                          label: {
                          show: false
                          },
                          labelLine: {
                          show: false
                          }
                        },
                        emphasis: {
                          color: 'rgba(0,0,0,0)'
                        }
                        };

                      } 
                                
      }
      else
        {
          $(".para").html("<h2 style = 'color:red;'>No Data Available!</h2>"); 
          $("#echart_pie1").css("display", "none");
        }
        

         }// end of success
         
        }); // end of ajax
     

 
    });

      });


</script>
      <?php include 'footer.php';?>
        <!-- /footer content -->
 

                            
 