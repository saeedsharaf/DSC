<?php


      //error_reporting(0);
      
      
       include'dashboard_result.php';
       //include'chartjs-plugin-datalabels.js';
       $connect = mysqli_connect('localhost','root','','mtd');



       $day = "select * from dashboard where queue = 'pre' order by id desc limit 10";
        $day_result = $connect->query($day);
        
        if ($day_result->num_rows > 0 ){
          $days = 0;
          $x = 0 ;
          
            
            while($day_row = $day_result->fetch_assoc()){
              $date[] = date_create($day_row['date']);
              $days++;
              $x++;

            }
        }

        if($x < 10 ){
          $y = $x - 1 ;

          function saeed (){
  $connect = mysqli_connect('localhost','root','','mtd');
            $day = "select * from dashboard where queue = 'pre' ";
            $day_result = $connect->query($day);
            
            if ($day_result->num_rows > 0 ){
              $days = 0;

            while($day_row = $day_result->fetch_assoc()){
              $date = date_create($day_row['date']);
              echo date_format($date,"d") . ',';
              $days++;
             

            }
        }
            }
              
        }else{
              function saeed (){
          $x = 9;
          global $date ;
            while ($x >= 0){
              echo date_format($date[$x],"d") . ',';
              $x--;
            }
            }


        }


    


        ?>




<script>


type = ['primary', 'info', 'success', 'warning', 'danger'];

demo = {
  initPickColor: function() {
    $('.pick-class-label').click(function() {
      var new_class = $(this).attr('new-class');
      var old_class = $('#display-buttons').attr('data-class');
      var display_div = $('#display-buttons');
      if (display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
      }
    });
  },

  initDocChart: function() {
    chartColor = "#FFFFFF";

    // General configuration for the charts with Line gradientStroke
    gradientChartOptionsConfiguration = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10
      },
      responsive: true,
      scales: {
        yAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }],
        xAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }]
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 15,
          bottom: 15
        }
      }
    };

    ctx = document.getElementById('lineChartExample').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

    myChart = new Chart(ctx, {
      type: 'line',
      responsive: true,
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Active Users",
          borderColor: "#f96332",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#f96332",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 630]
        }]
      },
      options: gradientChartOptionsConfiguration
    });
  },

  initDashboardPageCharts: function() {

    gradientChartOptionsConfigurationWithTooltipBlue = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.0)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 60,
            suggestedMax: 125,
            padding: 20,
            fontColor: "#2380f7"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#2380f7"
          }
        }]
      }
    };

    gradientChartOptionsConfigurationWithTooltipPurple = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

     


      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 60,

            //suggestedMax: 105,
            padding: 10,
            fontColor: "#9a9a9a"
          },

          

      

        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9a9a9a"
          },

        }]
      },

      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 40,
          bottom: 15
        }
      },

    };

    gradientChartOptionsConfigurationWithTooltipOrange = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(198, 40, 40,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 50,
            suggestedMax: 110,
            padding: 20,
            fontColor: "#9a9a9a"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(198, 40, 40,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9a9a9a"
          }
        }]
      }
    };

    gradientChartOptionsConfigurationWithTooltipGreen = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 1,
            //suggestedMax: 125,
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(0,242,195,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,

            fontColor: "#9e9e9e"
          }
        }]
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 25,
          bottom: 15
        }
      },
    };


    gradientBarChartConfiguration = {
      maintainAspectRatio: false,
      legend: {
        display: false,
        
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{

          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 400,
            //suggestedMax: 300,
            beginAtZero:false,
            padding: 20,
            

            fontColor: "#9e9e9e"
          }
        }],

        xAxes: [{

          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }]
      },
      layout: {
        padding: {
          left: 0,
          right: 10,
          top: 25,
          bottom: 15
        }
      },
    };
///////////////////////////////////////// SL //////////////////////////////////////////


   var sl_day = [

    <?php
       
       saeed();
        ?>
    ];


    var sl_data = [
    <?php
    
       $sl = "select * from dashboard where queue = 'pre' ";
            $sl_result = $connect->query($sl);
            if ($sl_result->num_rows > 0 ){
               $x = $sl_result->num_rows ;

                while($sl_row = $sl_result->fetch_assoc()){
                   $sl_score = (($sl_row['acd_thr1'] + $sl_row['acd_thr2'] + $sl_row['acd_thr3'] + $sl_row['acd_thr4']) / ($sl_row['call_offered'] - ($sl_row['abn_thr1'] + $sl_row['abn_thr2'] + $sl_row['abn_thr3'] + $sl_row['abn_thr4'] ))) * 100 ;
                  if($x > 10){
                    $x--;
                    continue ;
                    
                  }else{
                  echo round($sl_score,0) . ',';
                  
                  }
                }
            }
       ?>
    ];


var ctx = document.getElementById("chartLinePurple").getContext("2d");
    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);
    gradientStroke.addColorStop(1, 'rgba(198, 40, 40,0.2)');
    gradientStroke.addColorStop(0.2, 'rgba(198, 40, 40,0.0)');
    gradientStroke.addColorStop(0, 'rgba(198, 40, 40,0)'); //purple colors
  var config = {
      type: 'line',
      data: {
        labels: sl_day,
        datasets: [{
          label: "SL",
          fill: true,
          backgroundColor: gradientStroke,
          borderColor: '#C62828',
          borderWidth: 1,
          borderDash: [],
          borderDashOffset: 0.0,
          pointBackgroundColor: '#C62828',
          pointBorderColor: 'rgba(255,255,255,0)',
          pointHoverBackgroundColor: '#d346b1',
          pointBorderWidth: 20,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 15,
          pointRadius: 4,
          data: sl_data,
          datalabels:{
                
                color: '#9A9A9A',
                align: 'end',
                anchor: 'end',

            }

        }]
      },
      options: 
        gradientChartOptionsConfigurationWithTooltipOrange,


      
    };



  var myChartSL = new Chart(ctx, config);
    $("#0").click(function() {
      var data = myChartSL.config.data;
      data.datasets[0].data = sl_data;
      data.labels = sl_day;
      myChartSL.update();
    });
   $("#1").click(function() {
      var sl_data = [

          <?php
    
       $sl = "select * from dashboard where queue = 'post' ";
            $sl_result = $connect->query($sl);
            if ($sl_result->num_rows > 0 ){
               $x = $sl_result->num_rows ;


                while($sl_row = $sl_result->fetch_assoc()){

                   $sl_score = (($sl_row['acd_thr1'] + $sl_row['acd_thr2'] + $sl_row['acd_thr3'] + $sl_row['acd_thr4']) / ($sl_row['call_offered'] - ($sl_row['abn_thr1'] + $sl_row['abn_thr2'] + $sl_row['abn_thr3'] + $sl_row['abn_thr4'] ))) * 100 ;

                  if($x > 10){
                    $x--;
                    continue ;
                    
                  }else{
                  echo round($sl_score,0) . ',';
                  
                  }

                  
                }
            }


       ?>
      ];
      var data = myChartSL.config.data;
      data.datasets[0].data = sl_data;
      data.labels = sl_day;
      myChartSL.update();
    });

    $("#2").click(function() {
      var sl_data = [

          <?php
    
       $sl = "select * from dashboard where queue = 'activation'  ";
            $sl_result = $connect->query($sl);
            if ($sl_result->num_rows > 0 ){
               $x = $sl_result->num_rows ;


                while($sl_row = $sl_result->fetch_assoc()){

                   $sl_score = (($sl_row['acd_thr1'] + $sl_row['acd_thr2'] + $sl_row['acd_thr3'] + $sl_row['acd_thr4']) / ($sl_row['call_offered'] - ($sl_row['abn_thr1'] + $sl_row['abn_thr2'] + $sl_row['abn_thr3'] + $sl_row['abn_thr4'] ))) * 100 ;

                   if($x > 10){
                    $x--;
                    continue ;
                    
                  }else{
                  echo round($sl_score,0) . ',';
                  
                  }
                  
                }
            }


       ?>
      ];
      var data = myChartSL.config.data;
      data.datasets[0].data = sl_data;
      data.labels = sl_day;
      myChartSL.update();
    });  



//////////////////////////////////////////////////////   absent        /////////////////////////////
    


var absent_day = [
    <?php
       
        saeed();
    ?>
  ];

var absent_data = [

<?php
$connect = mysqli_connect('localhost','root','','mtd');
$absent = "select * from dashboard where queue = 'pre'  ";
      $absent_result = $connect->query($absent);
            if ($absent_result->num_rows > 0 ){

              $h = $absent_result->num_rows ;   // to count result number

                while($absent_row = $absent_result->fetch_assoc()){

                   $absent_score = (($absent_row['emerg'] + $absent_row['absent'] + $absent_row['sick'] + $absent_row['ex_annual'] +$absent_row['un_unpaid'] ) / $absent_row['attend'] ) * 100 ;
                   if(is_nan($absent_score)){
                    $absent_score = '';
                    
                   }else{
                    
                   

                  if($h > 10){ // to ignore  result if more than 10
                    $h--;
                    continue ;
                    
                  }else{
                   echo round($absent_score,0) . ',';
                  
                  }
                  } 
                }
            }

?>

];



    var ctxGreen = document.getElementById("chartLineGreen").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(66,134,121,0.3)');
    gradientStroke.addColorStop(0.4, 'rgba(66,134,121,0)'); //green colors
    gradientStroke.addColorStop(0, 'rgba(66,134,121,0)'); //green colors

    var config = {
      type: 'line',
      data :{
      labels: absent_day,
      datasets: [{
        label: "Absent",
        fill: true,
        backgroundColor: gradientStroke,
        borderColor: '#00d6b4',
        borderWidth: 1,
        borderDash: [],
        borderDashOffset: 0.0,
        pointBackgroundColor: '#00d6b4',
        pointBorderColor: 'rgba(255,255,255,0)',
        pointHoverBackgroundColor: '#00d6b4',
        pointBorderWidth: 20,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 15,
        pointRadius: 4,
        data: absent_data,

        datalabels:{
                //backgroundColor : '#ff008b',
                borderRadius: 9,
                color: '#9e9e9e',
                align: 'end',
                anchor: 'end',
            

            }
      }]

    },

      options: gradientChartOptionsConfigurationWithTooltipGreen,
    };



    var myChartAbsent = new Chart(ctxGreen, config);
    $("#0").click(function() {
      var data = myChartAbsent.config.data;
      data.datasets[0].data = absent_data;
      data.labels = absent_day;
      myChartAbsent.update();
    });


    
    $("#1").click(function() {
      var absent_data = [
      <?php
     
      $absent = "select * from dashboard where queue = 'post'  ";
      $absent_result = $connect->query($absent);
            if ($absent_result->num_rows > 0 ){

              $h = $absent_result->num_rows ;   // to count result number

                while($absent_row = $absent_result->fetch_assoc()){

                   $absent_score = (($absent_row['emerg'] + $absent_row['absent'] + $absent_row['sick'] + $absent_row['ex_annual'] +$absent_row['un_unpaid'] ) / $absent_row['attend'] ) * 100 ;
                   if(is_nan($absent_score)){
                    $absent_score = '';
                    
                   }else{
                    
                   

                  if($h > 10){ // to ignore get last 10 result 
                    $h--;
                    continue ;
                    
                  }else{
                   echo round($absent_score,0) . ',';
                  
                  }
                  } 
                }
            }
      ?>
      ]
      var data = myChartAbsent.config.data;
      data.datasets[0].data = absent_data;
      data.labels = absent_day;
      myChartAbsent.update();
    });

    $("#2").click(function() {
      var absent_data = [
      <?php
     
      $absent = "select * from dashboard where queue = 'activation'  ";
      $absent_result = $connect->query($absent);
            if ($absent_result->num_rows > 0 ){

              $h = $absent_result->num_rows ;   // to count result number

                while($absent_row = $absent_result->fetch_assoc()){

                   $absent_score = (($absent_row['emerg'] + $absent_row['absent'] + $absent_row['sick'] + $absent_row['ex_annual'] +$absent_row['un_unpaid'] ) / $absent_row['attend'] ) * 100 ;
                   if(is_nan($absent_score)){
                    $absent_score = '';
                    
                   }else{
                    
                   

                  if($h > 10){ // to ignore get last 10 result 
                    $h--;
                    continue ;
                    
                  }else{
                   echo round($absent_score,0) . ',';
                  
                  }
                  } 
                }
            }
      ?>
      ]
      var data = myChartAbsent.config.data;
      data.datasets[0].data = absent_data;
      data.labels = absent_day;
      myChartAbsent.update();
    });



    

   



///////////////////////////////////////////////  nps   ////////////////////////////////////

  

    var chart_labels = [

    <?php
       
       saeed();
        ?>
    ];

    var chart_data = [
    <?php
    $nps = "select * from dashboard where queue = 'pre'";
            $nps_result = $connect->query($nps);
            if ($nps_result->num_rows > 0 ){
               $n = $nps_result->num_rows ;

                while($nps_row = $nps_result->fetch_assoc()){


                  if($n > 10){ // to ignore get last 10 result 
                    $n--;
                    continue ;
                    
                  }else{
                    echo round($nps_row['nps']) . ',';
                  
                  }
                 
                }
            }
    ?>
    ];

    var ctx = document.getElementById("chartBig1").getContext('2d');
    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(72,72,176,0.4)');
    gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
    gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
    var config = {
      type: 'line',
      data: {
        labels: chart_labels,
        datasets: [{
          label: "NPS",
          fill: true,
          backgroundColor: gradientStroke,
          borderColor: '#d346b1',
          borderWidth: 1,
          borderDash: [],
          borderDashOffset: 0.0,
          pointBackgroundColor: '#d346b1',
          pointBorderColor: 'rgba(255,255,255,0)',
          pointHoverBackgroundColor: '#d346b1',
          pointBorderWidth: 20,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 15,
          pointRadius: 4,
          data: chart_data,

          datalabels:{
                
                color: '#9A9A9A',
                align: 'end',
                anchor: 'end',
            

            }

        }]
      },
      options: 
        gradientChartOptionsConfigurationWithTooltipPurple,


      
    };



     var myChartData = new Chart(ctx, config);
    $("#0").click(function() {
      var data = myChartData.config.data;
      data.datasets[0].data = chart_data;
      data.labels = chart_labels;
      myChartData.update();
    });

    $("#1").click(function() {
      var chart_data = [

          <?php
            $nps = "select * from dashboard where queue = 'post'";
            $nps_result = $connect->query($nps);
            if ($nps_result->num_rows > 0 ){
              $n = $nps_result->num_rows ;

                while($nps_row = $nps_result->fetch_assoc()){
                  if($n > 10){ // to ignore get last 10 result 
                    $n--;
                    continue ;
                    
                  }else{
                    echo round($nps_row['nps']) . ',';
                  
                  }
                }
            }
    ?>
      ];
      var data = myChartData.config.data;
      data.datasets[0].data = chart_data;
      data.labels = chart_labels;
      myChartData.update();
    });

    $("#2").click(function() {
      var chart_data = [
            <?php
            $nps = "select * from dashboard where queue = 'activation'";
            $nps_result = $connect->query($nps);
            if ($nps_result->num_rows > 0 ){
              $n = $nps_result->num_rows ;

                while($nps_row = $nps_result->fetch_assoc()){
                 if($n > 10){ // to ignore get last 10 result 
                    $n--;
                    continue ;
                    
                  }else{
                    echo round($nps_row['nps']) . ',';
                  
                  }
                }
            }
    ?>

      ];
      var data = myChartData.config.data;
      data.datasets[0].data = chart_data;
      data.labels = chart_labels;
      myChartData.update();
    });

/////////////////////////////////////////////////////////////////// AHT /////////////////////////////////
   var aht_days = [

 <?php
       
       saeed();
        ?>



        ];


var aht_data = [
<?php

    
            $aht = "select * from dashboard where queue = 'pre'";
            $aht_result = $connect->query($aht);
            if ($aht_result->num_rows > 0 ){
              $a = $aht_result->num_rows ;


                while($aht_row = $aht_result->fetch_assoc()){

                   $aht_score = ($aht_row['acd_time'] + $aht_row['acw_time'] + $aht_row['hold_time'])/$aht_row['acd_call'] ;

                  if($a > 10){ // to ignore get last 10 result 
                    $a--;
                    continue ;
                    
                  }else{
                    echo round($aht_score,0) . ',';
                  
                  }

                  
                }
            }
        ?>



]        






var ctx = document.getElementById("CountryChart").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(29,140,248,0.2)');
    gradientStroke.addColorStop(0.4, 'rgba(29,140,248,0.0)');
    gradientStroke.addColorStop(0, 'rgba(29,140,248,0)'); //blue colors





    var config = {
      type: 'line',
      data: {
        labels: aht_days,
        datasets: [{
          label: "AHT",
          fill: true,
          backgroundColor: gradientStroke,
          borderColor: '#1f8ef1',
          borderWidth: 1,
          borderDash: [],
          borderDashOffset: 0.0,
          pointBackgroundColor: '#1f8ef1',
          pointBorderColor: 'rgba(255,255,255,0)',
          pointHoverBackgroundColor: '#d346b1',
          pointBorderWidth: 20,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 15,
          pointRadius: 4,
          data: aht_data,

          datalabels:{
                
                color: '#9A9A9A',
                align: 'end',
                anchor: 'end',
            

            }

        }]
      },
      options: 
        gradientBarChartConfiguration,


      
    };


     var myChart = new Chart(ctx, config);
    $("#0").click(function() {
     
      var data = myChart.config.data;
      data.datasets[0].data = aht_data;
      data.labels = aht_days;
      myChart.update();
    });

     $("#1").click(function() {
      
      var aht_data = [
      <?php


            $aht = "select * from dashboard where queue = 'post'";
            $aht_result = $connect->query($aht);
            if ($aht_result->num_rows > 0 ){
              $a = $aht_result->num_rows ;


                while($aht_row = $aht_result->fetch_assoc()){

                  $aht_score = ($aht_row['acd_time'] + $aht_row['acw_time'] + $aht_row['hold_time'])/$aht_row['acd_call'] ;

                  if($a > 10){ // to ignore get last 10 result 
                    $a--;
                    continue ;
                    
                  }else{
                    echo round($aht_score,0) . ',';
                  
                  }
                 
                }
            }
      ?>

      ];
      var data = myChart.config.data;
      data.datasets[0].data = aht_data;
      data.labels = aht_days;
      myChart.update();
    });



     $("#2").click(function() {
      
      var aht_data = [
      <?php

            $aht = "select * from dashboard where queue = 'activation'";
            $aht_result = $connect->query($aht);
            if ($aht_result->num_rows > 0 ){
              $a = $aht_result->num_rows ;


                while($aht_row = $aht_result->fetch_assoc()){

                   $aht_score = ($aht_row['acd_time'] + $aht_row['acw_time'] + $aht_row['hold_time'])/$aht_row['acd_call'] ;

                  if($a > 10){ // to ignore get last 10 result 
                    $a--;
                    continue ;
                    
                  }else{
                    echo round($aht_score,0) . ',';
                  
                  } 
                  
                }
            }
      ?>

      ];
      var data = myChart.config.data;
      data.datasets[0].data = aht_data;
      data.labels = aht_days;
      myChart.update();
    });






  },


////////////////////////////////////////////////////////////////////////////////////////////////////////


};


</script>

<?php

?>