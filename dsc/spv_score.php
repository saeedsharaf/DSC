<?php
session_start();
//error_reporting(0);


$access = $_SESSION['access'];
include'../config/connect.php';

  $access = $_SESSION['access'];
  $queue = $_SESSION['queue'];
  if(!isset($access)){
    ?>
      <script>
        window.location.href='../index.php';
      </script>
    <?php
  }


//////////////////////////////// below code to get last month inserted ///////////////////////////////
$sql_month ="select * from dashboard where queue = 'pre' order by id desc";
    $result_month = $connect->query($sql_month);
    $row_month = $result_month->fetch_assoc();
   
    $create_month = date_create($row_month['date']);
    $month = number_format(date_format($create_month,'m')); //// last month inserted in dashbaord
    $year = date_format($create_month,'Y'); /// last year inserted in dashboard
    $_SESSION['month'] = $month;

/////////////////////////////////////////////////////


      include'month.php';
      

if ($access == 'super'){
      $login_id = $_SESSION['id'];
      $queue = $_SESSION['queue'];
       $sql_current = "select * from sv where month = '$month' and year = '$year' and sv_id = '$login_id' and queue = '$queue' ";


      }else if($access == 'manger'){
        $login_id = $_SESSION['id'];
        $queue = $_SESSION['queue'];
        $sql_current = "select * from sv where month = '$month' and year = '$year' and manger_id = '$login_id' and queue = '$queue' ";

      }

  

$_SESSION['month'] = $month; 

  //$current_month =  number_format(date('m'));  /////// defined current month 
  //$current_year = date('Y'); /////// defined current year
  //$current_month = 9;
  //$current_year = 2019;

  //$queue = 'pre';






   

   

  




?>

<!DOCTYPE html>
<html lang="en">
<style>
  .s{
    margin: 5px;
    padding: 5px;
    height: 25px;
    width: 90px;
    text-align: center;
    line-height: 10px;
    border-radius: 5px;
  }
</style>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Digital Score Card
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>


<style>
  .font{
    font-size: 12px;
    text-align: center;
  }
</style>

<body class="">
  <div class="wrapper">
    <div class="sidebar" style="width:180px;">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            DSC
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Digital Score card
          </a>
        </div>
        <ul class="nav">
          <li >
            <a href="./dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active ">
            <a href="./spv_score.php">
              <i class="tim-icons icon-atom"></i>
              <p>SPV Score</p>
            </a>
          </li>
          <li>
            <a href="agent_score.php">
              <i class="tim-icons icon-pin"></i>
              <p>Agent Score</p>
            </a>
          </li>
          <li>
            <a href="./notifications.php">
              <i class="tim-icons icon-bell-55"></i>
              <p>One To One</p>
            </a>
          </li>
         
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
           
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="notification d-none d-lg-block d-xl-block"></div>
                  <i class="tim-icons icon-sound-wave"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>
                <!---
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <li class="nav-link">
                    <a href="#" class="nav-item dropdown-item">Mike John responded to your email</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more tasks</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is in town</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a>
                  </li>
                </ul>
              -->
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="../assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link">
                    <a href="../config/logout.php" class="nav-item dropdown-item">Log out</a>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">

        <?php
          if($access == 'super'){


            ?>

            <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    
                    <h4 class="card-title">NPS Performance</h2>
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                      
                      
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartBig1"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-category">Hold</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> <span id="sl_target"> 2 % <span></h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLinePurple"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header" >
                <h5 class="card-category">AHT</h5>
                <h3 class="card-title" ><i class="tim-icons icon-delivery-fast text-info"  ></i> <span id="aht_target">235 Sec</span>

               
               

                </script> </h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="CountryChart"></canvas>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">ACW </h5>
                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 5%</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLineGreen"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script>
          document.getElementById('spv_name').innerHTML = '<?php echo $row['name'] ?>'
        </script>


            <?php
             include'../assets/demo/sv_demo.php';
          }




        ?>
       
          <div class="col-lg-6 col-md-12">
            <div class="card" style="width: 215%;margin-left: -15px;">
              <div class="card-header">
                <h4 class="card-title" id="svp_name"> SPV Score</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " style="    font-size: 11px;" id="">
                    <thead class=" text-primary">
                      <tr class="text-center">
                        <th class="text-center" rowspan="2">
                          Name
                        </th>
                        
                        <th rowspan="2">
                          ACD Calls
                        </th>
                        <th rowspan="2">
                          AHT
                        </th>
                        <th rowspan="2">
                        AHT WL
                        </th>
                        <th rowspan="2">
                        ACW
                        </th>
                        
                        <th rowspan="2">
                         Hold
                        </th>
                        <th rowspan="2">
                         Held %
                        </th>
                        
                        
                        <th>
                          Adherence
                        </th>
                        <th rowspan="2">
                          NPS Survey
                        </th>
                        <th rowspan="2">
                          NPS
                        </th>
                        <th rowspan="2">
                          FCR
                        </th>
                        <th rowspan="2">
                          Agent_TTB
                        </th>
                        <th rowspan="2">
                          Over All Satisfactions
                        </th>
                        <th rowspan="2">
                          Absent
                        </th>
                         <th rowspan="2">
                          Sick
                        </th>
                        <th rowspan="2">
                          Emerge
                        </th>
                        <th rowspan="2">
                          Absenteeism %
                        </th>

                         <th rowspan="2">
                          CTC
                        </th>
                        <th rowspan="2">
                          CTB
                        </th>
                        <th rowspan="2">
                          NC
                        </th>
                      
                       
                      </tr>
                    
                      
                    </thead>
                    <tbody>
                      

            <?php
              $result_current = $connect->query($sql_current);
               while($row_current = $result_current->fetch_assoc()){
              

                ?>
                <tr class="text-center">
                  <?php
                  if($access == 'super'){
                    ?>
                    <td><?php echo $row_current['name']; ?> </td>

                    <?php
                  }else{
                    ?>
                    <td><a href="spv_details.php?id=<?php echo $row_current['sv_id'] ; ?>"><?php echo $row_current['name']; ?> </a> </td>

                    <?php
                  }

                  ?>
                  
                  <td><?php echo number_format($row_current['no_calls']); ?>   </td>
                  <td><?php echo round($row_current['aht'],0) ; ?>                  </td>  
                  <td><?php echo round($row_current['aht_wl'],0) ; ?>               </td>  
                  <td><?php echo round($row_current['acw'],1) . ' %'; ?>            </td>  
                 
                  <td><?php echo round($row_current['hold'],1) . ' %'; ?>           </td>
                  <td><?php echo round($row_current['held_percentage'],1) . ' %'; ?>           </td>    
                  
                  <td><?php echo round($row_current['adhe'],1) . ' %'; ?>           </td> 
                  <td><?php echo $row_current['nps_calls']; ?>            </td>  
                  <td><?php echo round($row_current['nps'],1) . ' %'; ?>            </td>  
                  <td><?php echo round($row_current['fcr'],1) . ' %'; ?>            </td>   
                  <td><?php echo round($row_current['agent_ttb'],1) . ' %'  ?>      </td>
                  <td> <?php echo round($row_current['over_all_sats'],0) . ' %' ;?>    </td>
                  <td><?php echo $row_current['absent'] ;?>                         </td>
                  <td><?php echo $row_current['sick']; ?>                           </td>
                  <td><?php echo $row_current['emerge']; ?>                         </td>
                  <td><?php echo round($row_current['absent_percentage']*100,1) . ' %' ; ?>                        </td>
                  <td><?php echo $row_current['ctc']; ?>                            </td> 
                  <td><?php echo $row_current['ctb']; ?>                            </td>
                  <td><?php echo $row_current['nc']; ?>                             </td>
                 
                      
                </tr>
                <?php
              }

              ?>
            
          </tbody>
        </table>
        </div>
      </div>
     </div>
     </div>



<!-------------------------------------------------------------------------------------------------------------------------------->
<?php 
  

  if($access == 'super'){

  ?>
      <div class="col-lg-6 col-md-12">

           </div>
          
          <div class="col-lg-6 col-md-12">


            <div class="card" style="width: 215%;margin-left: -15px;">
              <div class="card-header">
                <h4 class="card-title"> DashBoard</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " style="    font-size: 11px;" id="">
                    <thead class=" text-primary">
                      <tr class="text-center">
                        <th class="text-center" rowspan="2">
                          Date
                        </th>
                        <th rowspan="2">
                          ACD Calls
                        </th>

                        <th rowspan="2">
                          AHT
                        </th>

                        <th rowspan="2">
                          AHT WL
                        </th>

                        <th rowspan="2">
                          Hold
                        </th>

                         <th rowspan="2">
                          Avg Hold
                        </th>

                        <th rowspan="2">
                          ACW
                        </th>

                        <th rowspan="2">
                          avg ACW
                        </th>

                        <th rowspan="2">
                         NPS Survey
                        </th>
                        <th rowspan="2">
                          NPS
                        </th>
                        <th rowspan="2">
                          FCR
                        </th>

                        <th rowspan="2">
                          Agent_TTB
                        </th>
                      </tr>
  
                      
                    </thead>
                    <tbody>
                      

                      <?php
                       //include'../config/connect.php';
                      $sql ="select * from sv_daily where sv_id = '$login_id' and month = '$month'";
                      $result = $connect->query($sql);
                      if($result->num_rows > 0){

                        while($row = $result->fetch_assoc()){
                        

                          ?>
                          <tr class="text-center">
                            <td><?php echo $row['day']; ?> </td>
                            <td><?php echo $row['no_calls']; ?> </td>
                            <td><?php echo $row['aht']; ?> </td>
                            <td><?php echo $row['aht_wl']; ?> </td>
                            <td><?php echo $row['hold'] . ' %'; ?> </td>
                            <td><?php echo $row['avg_hold']; ?> </td>
                            <td><?php echo $row['acw'] . ' %';?> </td>
                            <td><?php echo $row['avg_acw'];?> </td>
                            <td><?php echo $row['nps_calls']; ?> </td>
                            <td><?php echo round($row['nps'],1) . ' %'; ?></td>
                            <td><?php echo $row['fcr'] . ' %' ; ?> </td> 
                            <td><?php echo $row['agent_ttb'] . ' %'; ?> </td>
                                
                          </tr>
                          <?php
                        }

                      }
                       

                     
                        ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <script>
            document.getElementById("f1").innerHTML = '<?php echo number_format($call_offer_mtd) ;?>';
            document.getElementById("f2").innerHTML = '<?php echo number_format($acd_calls_mtd) ;?>';
            document.getElementById("f3").innerHTML = '<?php echo number_format($aban_within_thr_mtd) ;?>';
            document.getElementById("f4").innerHTML = '<?php echo number_format($aban_calls_mtd) ;?>';
            document.getElementById("f5").innerHTML = '<?php echo $aban_percentage_mtd . ' %' ;?>';
            document.getElementById("f6").innerHTML = '<?php echo number_format($outbound_calls_mtd) ;?>';
            document.getElementById("f7").innerHTML = '<?php echo number_format($held_calls_mtd) ;?>';
            document.getElementById("f8").innerHTML = '<?php echo number_format($total_survey_mtd) ;?>';
            document.getElementById("f9").innerHTML = '<?php echo $nps_mtd . ' %' ;?>';
            document.getElementById("f10").innerHTML = '<?php echo $fcr_percentage_mtd . ' %' ;?>';
            document.getElementById("f11").innerHTML = '<?php echo $sl_mtd ;?>';
            document.getElementById("f12").innerHTML = '<?php echo $absent_per_mtd  ;?>';
            document.getElementById("f13").innerHTML = '<?php echo $aht_mtd ;?>';
            document.getElementById("f14").innerHTML = '<?php echo $hold_mtd . ' %' ;?>';
            document.getElementById("f15").innerHTML = '<?php echo $avg_hold_mtd ;?>';
            document.getElementById("f16").innerHTML = '<?php echo $acw_mtd . ' %' ;?>';
            document.getElementById("f17").innerHTML = '<?php echo $avg_acw_mtd ;?>';
            document.getElementById("f18").innerHTML = '<?php echo number_format($support_calls_mtd) ;?>';
            
          </script>
         
        </div>
      </footer>
    </div>
  </div>

  <?php

}

?>

 <!------------------------------------------------------------------------------------------------------------->

  <div class="fixed-plugin">
    <div class="dropdown show-dropdown" >
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
        
        
      
      </ul>
    </div>
  </div>



 <div class="fixed-plugin" style="top:109px;width:90px;line-height: 40px;">
    <div class="dropdown show-dropdown" >
      <a href="#" data-toggle="dropdown">
        <i > <?php echo $month . ' '.$year; ?></i>
      </a>
      <ul class="dropdown-menu" style="width: 320px;display: flex;flex-wrap: wrap;">
       <form action="#" method="get"> 
        <button value="1" name="jan"><div class="s">Jan 2019</div></button>
        <button value="2" name="feb"><div class="s">Feb 2019</div></button>
        <button value="3" name="mar"><div class="s">Mar 2019</div></button>
        <button value="4" name="april"><div class="s">April 2019</div></button>
        <button value="5" name="may"><div class="s">May 2019</div></button>
        <button value="6" name="jun"><div class="s">Jun 2019</div></button>
        <button value="7" name="july"><div class="s">July 2019</div></button>
        <button value="8" name="aug"><div class="s">Aug 2019</div></button>
        <button value="9" name="sep"><div class="s">Sep 2019</div></button>
        <button value="10" name="oct"><div class="s">Oct 2019</div></button>
        <button value="11" name="nov"><div class="s">Nov 2019</div></button>
        <button value="12" name="dec"><div class="s">Dec 2019</div></button>
        </form> 
      </ul>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/chartjs-plugin-datalabels.js"></script>

  
  
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });


    


  </script>
  <form action="export_spv.php" method="get">
  <input type="text" name="sv_id" hidden="" value="<?php echo $sv_id ; ?>">
  <input type="text" name="month" hidden="" value="<?php echo $month ; ?>">
  <input type="text" name="queue" hidden="" value="<?php echo $queue ; ?>">

  <input type="submit" name="export" accesskey="s" hidden="">
</form>
</body>


</html>