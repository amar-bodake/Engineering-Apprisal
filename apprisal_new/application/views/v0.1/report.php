
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
                <h3>Report Analysis (Graphical Presentation)</h3>
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
                          <label for="inst">Institutes: </label><?php echo form_dropdown('inst_id', $inst, '#', 'class="form-control" id="inst"'); ?>
                        </div>


                       <div class="col-md-3 col-sm-3 col-xs-3">

                         <?php $depts['#'] = 'Please Select'; ?>
                        <label for="dep">Department: </label><?php echo form_dropdown('dept_id', $depts, '#', 'class="form-control" id="depts1"'); ?>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3" style = "margin-top:2%">
                         <button type="button" id = "go" class="btn">GO</button>
                        
                         </div>

                       </div>
                      
                      <div class="row">

                       <div id="loading" style = "display:none">
                             <img id="loading-image" src="<?php echo base_url();?>assets/images/Eclipse.gif" alt="Loading..." />
                        </div>
                      <!-- chart -->
                       <p class = "para" style = "text-align: center"></p>
                      <div id = "example">
                            <div id="main" style="height:600px"></div>
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

                <!-- jQuery -->
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>



<script type="text/javascript">
 $(document).ready(function(){   

         var $loading = $('#loading').hide();
          $(document)
            .ajaxStart(function () {

              $loading.show();
            })
            .ajaxStop(function () {
         
              $loading.hide();
            }); 

       $('#inst').change(function(){
        //any select change on the dropdown with id inst trigger this code
         $("#depts1 > option").remove(); //first of all clear select items
         var inst_id = $('#inst').val(); // here we are taking inst id of the selected one.
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
         $('#depts1').append(opt); //here we will append these new select options to a dropdown with the id 'depts'
         });
         }
         
         });
       
       });


      //   For Generating Graph

          $('#go').click(function(){
         //any select change on the dropdown with id inst trigger this code
         
           
          
          var inst_id = $('#inst').val(); // here we are taking inst id of the selected one.
          var dept_id = $('#depts1').val(); // here we are taking inst id of the selected one.
           var year_id = $('#year').val();
          console.log(year_id);

           if(year_id == '#' || dept_id == '#' || inst_id == '#')
          {
            alert("Please Select Year/Institute/Department");
            location.reload();
          }


          console.log( inst_id, dept_id );

          $.ajax({
         type: "POST",
           url: "<?php echo base_url();?>index.php/Apraisal_form/report_analysis/"+inst_id+"/"+dept_id+"/"+year_id, //here we are calling our user controller and get_cities method with the country_id         
         success: function(data) //we're calling the response json array 'depts'
         {
         //console.log('hi');
         // var details = $.parseJSON(paraArray);
         // alert(details.institute);
         // alert(details.department);


         var yearGraph = ($.parseJSON(data)).year_graph;
        //console.log(yearGraph);

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


                    mstrArray.push([total, pi.toFixed(2),emp_code,name]);

                    // reset 
                    total = 0;
                    pi = 0;

          }); //  end of each


                        // Initialize after dom ready
                        var myChart = echarts.init(document.getElementById('main'));

                       
                       
                        
                var option = {
                    title : {
                        text: 'Performance Appraisal',
                        subtext: 'Year 2017'
                    },


                    tooltip : {
                        trigger: 'axis',
                        showDelay : 0,
                        formatter : function (params) {
                            if (params.value.length > 1) {
                                return params.seriesName + '<br/>'
                                    + 'Emp Code : ' + params.value[2] + ' <br/>'
                                     + 'Name : ' + params.value[3] + ' <br/>'
                                    + 'PI : ' + params.value[1]  + ' <br/>'
                                   + 'Total Score : ' +  params.value[0];
                            }
                            else {
                                return params.seriesName + '<br/>'
                                   + params.name + ''
                                   + params.value + '';
                            }
                        },  
                        axisPointer:{
                            show: true,
                            type : 'cross',
                            lineStyle: {
                                type : 'dashed',
                                width : 1
                            }
                        }
                    },
                   // legend: {
                  //      data:['SKNCOE','SITS','RMDSCOE']
                  //  },

                        //dataRange: {
                     //   min: 0,
                     //   max: 100,
                     //   y: 'center',
                     //   show: true,
                      //  text:['MAX','MIN'],           // 文本，默认为数值文本
                     //   color:['#006400','yellow','red'],
                     //   calculable : true
                   // },
                    toolbox: {
                        show : true,
                        feature : {
                            mark : {show: true},
                            dataZoom : {show: true},
                            dataView : {show: true, readOnly: false},
                            restore : {show: true},
                            saveAsImage : {show: true}
                        }
                    },
                    xAxis : [
                        {
                            type : 'value',
                            scale:true,
                            axisLabel : {
                                formatter: '{value} Total Score'
                            }
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            scale:true,
                            axisLabel : {
                                formatter: '{value} PI'
                            }
                        }
                    ],
                    series : [
                        {
                           // name:'SKNCOE',
                            type:'scatter',
                            data: mstrArray, 

                              itemStyle:{
                                          normal:{
                                              color:'#1ABB9C',
                                              borderColor:'rgba(100,149,237,1)',
                                              borderWidth:0.5,
                                              areaStyle:{
                                                  color: '#1ABB9C'
                                              }
                                          }
                                      },
                                                         
                              markPoint: {
                          data: [{
                            type: 'max',
                            name: 'Max PI '
                          }, {
                            type: 'min',
                            name: 'Min PI '
                          }]
                          },          
                            markLine : {
                                data : [
                                    {type : 'average', name: 'Average '}
                                ]
                            }
                        },



                        

                    ]


                };



               myChart.on('click', function (params) {
               //  console.log(params); // do whatever you want with another chart say chartTwo here
                // alert(params.value[2]);

               //window.location = "view_staff_apraisal/"+ Base64.encode(params.value[2]);

                 var targetURL = "view_report/"+ Base64.encode(params.value[2]);

                window.open(targetURL, '_blank');
              });

       
                                    

                        // Load data into the ECharts instance 
                        myChart.setOption(option);
          

          }
         
         });
         
       
         });

    //For Generating Data









});








   //Generating the graph

 // ]]>
</script>



    
<?php include 'footer.php';?>
        <!-- /footer content -->
 

                            
 