
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
                <h3>Report Analysis</h3>
              </div>
           </div>
           
           <div style="margin-bottom:50px;"></div>
           
           <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_content">
                      
                  
                      
                      <!-- chart -->
                      <div id="main" style="height:600px"></div>


                      </div>
                    </div>
               </div>
           </div>
           
        </div>
        <!-- /page content -->
       
       

        <!-- footer content -->
                <script src="https://colorlib.com/polygon/vendors/echarts/dist/echarts.min.js"></script>

                <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    

    <script>
  (function() {

        var arrayOfPHPData = <?php echo json_encode($year_graph) ?>;
        console.log(arrayOfPHPData);      

        var mstrArray = [];
        var total, pi;

        arrayOfDataJS = new Array();
        $.each(arrayOfPHPData, function (i, elem) {

                  total = Number( arrayOfPHPData[i]['scale_ahp'] )
                  + Number( arrayOfPHPData[i]['scale_pdac'] )
                  + Number( arrayOfPHPData[i]['scale_rc'] )
                  + Number( arrayOfPHPData[i]['scale_sca'] ) ;

                  pi = Number( arrayOfPHPData[i]['pi'] );

                  mstrArray.push([total, pi]);

                  // reset 
                  total = 0;
                  pi = 0;

        });

        console.log(mstrArray);

         //console.log(arrayOfDataJS);


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
                   + 'Total Score : ' +  params.value[0] + ' <br/> '
                   + 'PI : ' + params.value[1] ;
            }
            else {
                return params.seriesName + '<br/>'
                   + params.name + ''
                   + params.value + 'Score ';
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
    legend: {
        data:['SKNCOE','SITS','RMDSCOE']
    },
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
            name:'SKNCOE',
            type:'scatter',
            data: mstrArray, 
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
                    {type : 'average', name: 'Average'}
                ]
            }
        },
        

    ]
};
                    

        // Load data into the ECharts instance 
        myChart.setOption(option); 


 })();
        </script>
       <?php include 'footer.php';?>
        <!-- /footer content -->
 

                            
 