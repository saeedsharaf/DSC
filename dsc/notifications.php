<?php


error_reporting(0);


session_start();

include'../config/connect.php';
$access = $_SESSION['access'];
$month = $_SESSION['month'];
$id = $_SESSION['id'];

  
  if(!isset($access)){
    ?>
      <script>
        window.location.href='../index.php';
      </script>
    <?php
  }


if($access == 'agent'){
  $login_id = $_SESSION['id']; /////// login id
  $queue = $_SESSION['queue'];

}else if ($access == 'super'){

  $login_id = $_GET['submit'];
  $queue = $_GET['queue1'];
  $month = $_GET['month'];
  $year = $_GET['year'];

  if (isset($login_id)) {
    $login_id = $_GET['submit'];
    $queue = $_GET['queue1'];
    $month = $_GET['month'];
    $year = $_GET['year'];
  }else{
    ?>
    <script>
      window.location.href="agent_details.php";
    </script>

    <?php
  }


}else{
    $login_id = $_GET['id'];
    $queue = $_SESSION['queue'];
    $month = $_SESSION['month'];
    $year = $_GET['year'];

}





//////////////////////////////// below code to get last month inserted ///////////////////////////////


$sql_month ="select * from dashboard where queue = 'pre' order by id desc";
    $result_month = $connect->query($sql_month);
    $row_month = $result_month->fetch_assoc();
   
    //$create_month = date_create($row_month['date']);
    //$month = number_format(date_format($create_month,'m'));
    $year = date_format($create_month,'Y');



/////////////////////////////////////////////////////
  //include'month.php';
    

    $sql_current = "select * from agent where month = '$month' and login_id = '$login_id'   ";




?>

<!DOCTYPE html>
<html lang="en">

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
            Digital Score
          </a>
        </div>
        <ul class="nav">
          <?php 
          if($access == 'super' or $access == 'manger'){
            ?>
            <li >
            <a href="./dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./spv_score.php">
              <i class="tim-icons icon-atom"></i>
              <p>SPV Score</p>
            </a>
          </li>

            <?php
          }
          ?>
          <li>
            <a href="agent_score.php">
              <i class="tim-icons icon-pin"></i>
              <p>Agent Score</p>
            </a>
          </li>
          <li class="active ">
            <a href="./notifications.php">
              <i class="tim-icons icon-bell-55"></i>
              <p>One To one</p>
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
            <a class="navbar-brand" href="javascript:void(0)">One To One</a>
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
                <!-----
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
                --->
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
      <!-- End Navbar --><!----------------------------------------------------------------------------------------------------->
<div class="content">
    <?php

    if($access == 'manger'){
      ?>
      <div class="col-lg-6 col-md-12">
            <div class="card" style="width: 215%;margin-left: -15px;">
              <div class="card-header">
                <h4 class="card-title" id="svp_name"> SPV One To One</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " style="    font-size: 11px;" id="">
                    <thead class=" text-primary">
                      <tr class="text-center">
                        <th class="text-center" rowspan="2">
                          SPV Name
                        </th>
                        <th rowspan="2">
                          Total Agent
                        </th>
                        <th rowspan="2">
                          One To One
                        </th>
                        <th rowspan="2">
                        Remaining 
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

       $spv ="select * from member where access = 'super' and queue = '$queue'";
       $spv_result = $connect->query($spv);
     
       while($row_spv = $spv_result->fetch_assoc()){
        $sv_id = $row_spv['login_id'];


      
          $sql_spv = "select * from agent where sv_id = '$sv_id' and month = '$month'";
          //$sql_spv = "select * from agent where sv_id = '31' and month = '$month'";
         
          $sql_spv_result = $connect->query($sql_spv);


              $total = 0;
              $spv_o2o = 0;
              $spv_o2o_not = 0;
              $agent_o2o_not = 0;

               while($row = $sql_spv_result->fetch_assoc()){

                $spv_name =$row['sv'];
                if($row['spv_des'] !== ""){
                  $spv_o2o++;
                }else{
                  $spv_o2o_not++;
                }

                if($row['agent_des'] !==""){
                  $agent_o2o++;
                }else{
                  $agent_o2o_not++;
                }

                $total++;

              }


              ?>
                <tr class="text-center">
                
                  <td><?php echo $spv_name; ?>  </td>
                  <td><?php echo $total; ?>  </td>
                  <td><?php echo $spv_o2o; ?>  </td>
                  <td><?php echo $spv_o2o_not; ?>  </td>
                 
                
                      
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


      <?php
    }else{
      ?>
  
      
        <div class="row">
          <div class="col-md-6">
            <div class="card" >
              <div class="card-header">
                <h4 class="card-title"><?php echo $month ; ?> KPI</h4>
              </div>
              <div class="table-responsive">
                  <table class="table tablesorter " style="    font-size: 11px;" id="">
                    <thead class=" text-primary">
                      <tr class="text-center">
                        <th rowspan="2">
                          Login ID
                        </th>
                        <th rowspan="2">
                          AHT
                        </th>
                        <th rowspan="2">
                        AHT WL
                        </th>
                        <th rowspan="2">
                        AHT score
                        </th>
                        <th rowspan="2">
                        ACW
                        </th>
                        <th rowspan="2">
                          ACW Score
                        </th>
                        <th rowspan="2">
                         Hold
                        </th>
                        <th rowspan="2">
                        Hold Score
                        </th>
                        <th>
                          Adherence
                        </th>
                        <th>
                          Adherence Score
                        </th>
                        <th rowspan="2">
                          NPS
                        </th>
                        <th rowspan="2">
                          NPS Score
                        </th>
                        <th rowspan="2">
                          FCR
                        </th>
                        <th rowspan="2">
                          FCR Score
                        </th>
                        <th rowspan="2">
                          Agent_TTB
                        </th>
                        <th rowspan="2">
                          Agent_TTB Score
                        </th>
                        <th rowspan="2">
                          Absent Score
                        </th>
                        <th rowspan="2">
                          Quality Score
                        </th>
                        <th rowspan="2">
                          Complaint Score
                        </th>
                         
                        <th rowspan="2">
                          Final Score
                        </th>
                       
                      </tr>
                    
                      
                    </thead>
                    <tbody>
                      <?php
                        $result_current = $connect->query($sql_current);
                         while($row_current = $result_current->fetch_assoc()){
                        

                          ?>
                          <tr class="text-center">
                            
                                              
                            <td><?php echo $row_current['login_id'] ; ?>                  </td> 
                            <td><?php echo round($row_current['aht'],0) ; ?>                  </td>  
                            <td><?php echo round($row_current['aht_wl'],0) ; ?>               </td>
                            <td><?php echo round($row_current['aht_score'],1) . ' %' ; ?>               </td>   
                            <td><?php echo round($row_current['acw'],1) . ' %'; ?>            </td>  
                            <td><?php echo $row_current['acw_score'] . ' %' ; ?>                       </td>  
                            <td><?php echo round($row_current['hold'],1) . ' %'; ?>           </td>  
                            <td><?php echo round($row_current['hold_score'],1) . ' %'; ?>              </td>  
                            <td><?php echo round($row_current['adherance'] *100,1)  . ' %'; ?>           </td>
                            <td><?php echo round($row_current['adher_score'],1) . ' %'; ?>           </td>
                            <td><?php echo round($row_current['nps'],1) . ' %';  ?>            </td>   
                            <td><?php echo round($row_current['nps_score'],1) . ' %'; ?>            </td>  
                            <td><?php echo round($row_current['fcr'],1) . ' %'; ?>            </td>
                            <td><?php echo round($row_current['fcr_score'],1) . ' %'; ?>            </td>   
                            <td><?php echo round($row_current['agent_ttb'],1) . ' %'  ?>      </td>
                            <td><?php echo round($row_current['agent_ttb_score'],1) . ' %'  ?>      </td>
                            <td><?php echo round($row_current['absent_score'],1) . ' %' ;?>  </td>
                            <td><?php echo round($row_current['quality_score'],1) . ' %' ;?>  </td>
                            <td><?php echo round($row_current['complaint_score'],1) . ' %' ;?>  </td>
                            <td><?php echo round($row_current['final_score'],1) . ' %' ;?>  </td>
                            
                                
                          </tr>
                          <?php
                          $sv = $row_current['sv'];
                          $manger = $row_current['manger'];
                          //$queue = $row_current['queu'];
                          $agent_name = $row_current['name'];
                          $attr_1 = $row_current['attr_1'];
                          $attr_2 = $row_current['attr_2'];
                          $attr_3 = $row_current['attr_3'];
                          $attr_4 = $row_current['attr_4'];
                          $attr_5 = $row_current['attr_5'];
                          $attr_6 = $row_current['attr_6'];
                          $spv_des = $row_current['spv_des'];
                          $agent_des = $row_current['agent_des'];
                          $select_month = $row_current['month'];
                          $select_year = $row_current['year'];
                        }

                        ?>
                      
                    </tbody>
                  </table>


              </div>
            </div>
          </div>






        <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">One to One </h5>
              </div>
              <div class="card-body">
                <form action="../config/o2o.php" method="post">
                  <input type="hidden" name="login_id" value="<?php echo $login_id;  ?>">
                  <input type="hidden" name="month" value="<?php echo $select_month;  ?>">
                  <input type="hidden" name="year" value="<?php echo $select_year;  ?>">

                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>SPV Name</label>
                        <input type="text" class="form-control" disabled="" placeholder="<?php echo $sv;  ?>" value="" name="spv_name">
                      </div>
                    </div>
                    <div class="col-md-3 px-md-1">
                      <div class="form-group">
                        <label>Manger</label>
                        <input type="text" class="form-control" disabled="" placeholder="<?php echo $manger;  ?>" value="" name="manger_name">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Area</label>
                        <input type="email" class="form-control" disabled="" placeholder="<?php echo $queue;  ?>" name="area">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Agent Name</label>
                        <input type="text" class="form-control" disabled="" placeholder="<?php echo $agent_name;  ?>" value="" name="agent_name">
                      </div>
                    </div>
                    
                  </div>
                
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Attribute 1</label>

                        <select class="form-control" style="background-color: #1d253b" name="att_1"  >
                          <option><?php echo $attr_1 ; ?></option>
                          <?php
                          if($access == 'super' and $agent_des == ''){
                          ?>
                          <option>Aht</option>
                          <option>Acw</option>
                          <option>Hold</option>
                          <option>Adherence</option>
                          <option>Nps</option>
                          <option>Fcr</option>
                          <option>Agent_TTB</option>
                          <option>Absent</option>
                          <option>Quality</option>
                          <option>Complaint</option>
                          <?php
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group">
                        <label>Attribute 2</label>
                       
                        <select class="form-control" style="background-color: #1d253b" name="att_2">
                          <option><?php echo $attr_2 ; ?></option>
                           <?php
                          if($access == 'super' and $agent_des == ''){
                          ?>
                          <option>Aht</option>
                          <option>Acw</option>
                          <option>Hold</option>
                          <option>Adherence</option>
                          <option>Nps</option>
                          <option>Fcr</option>
                          <option>Agent_TTB</option>
                          <option>Absent</option>
                          <option>Quality</option>
                          <option>Complaint</option>
                          <?php
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Attribute 3</label>
                        <select class="form-control" style="background-color: #1d253b" name="att_3">
                          <option><?php echo $attr_3 ; ?></option>
                           <?php
                          if($access == 'super' and $agent_des == ''){
                          ?>
                          <option>Aht</option>
                          <option>Acw</option>
                          <option>Hold</option>
                          <option>Adherence</option>
                          <option>Nps</option>
                          <option>Fcr</option>
                          <option>Agent_TTB</option>
                          <option>Absent</option>
                          <option>Quality</option>
                          <option>Complaint</option>
                          <?php
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Attribute 4</label>
                        <select class="form-control" style="background-color: #1d253b" name="att_4">
                          <option><?php echo $attr_4 ; ?></option>
                           <?php
                          if($access == 'super' and $agent_des == ''){
                          ?>
                          <option>Aht</option>
                          <option>Acw</option>
                          <option>Hold</option>
                          <option>Adherence</option>
                          <option>Nps</option>
                          <option>Fcr</option>
                          <option>Agent_TTB</option>
                          <option>Absent</option>
                          <option>Quality</option>
                          <option>Complaint</option>
                          <?php
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group">
                        <label>Attribute 5</label>
                        <select class="form-control" style="background-color: #1d253b" name="att_5">
                          <option><?php echo $attr_5 ; ?></option>
                           <?php
                          if($access == 'super' and $agent_des == ''){
                          ?>
                          <option>Aht</option>
                          <option>Acw</option>
                          <option>Hold</option>
                          <option>Adherence</option>
                          <option>Nps</option>
                          <option>Fcr</option>
                          <option>Agent_TTB</option>
                          <option>Absent</option>
                          <option>Quality</option>
                          <option>Complaint</option>
                          <?php
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Attribute 6</label>
                        <select class="form-control" style="background-color: #1d253b" name="att_6">
                          <option><?php echo $attr_6 ; ?></option>
                          <?php
                          if($access == 'super' and $agent_des == ''){
                          ?>
                          <option>Aht</option>
                          <option>Acw</option>
                          <option>Hold</option>
                          <option>Adherence</option>
                          <option>Nps</option>
                          <option>Fcr</option>
                          <option>Agent_TTB</option>
                          <option>Absent</option>
                          <option>Quality</option>
                          <option>Complaint</option>
                          <?php
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  
             <?php 
                  if($access == 'super'){
                    ?>
                    <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Description</label>
                        <?php
                        if($agent_des == ''){
                          ?>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" name="spv_des"><?php echo $spv_des; ?></textarea>
                        <?php
                      }else{
                        ?>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" name="spv_des" readonly="" style="color: silver"><?php echo $spv_des; ?></textarea>
                        <?php
                    }
                    ?>
                      </div>
                    </div>
                  </div>
                
                 </div>

                    <div class="card-footer" style="text-align: center;">
                      <button type="submit" class="btn btn-fill btn-primary">Save</button>
                    </div>

                 </div>
                   </div>



                  <div class="col-md-4">
                    <div class="card card-user">
                      <div class="card-body">
                        <p class="card-text">
                          <div class="author">
                    



                    <p class="description">
                     Agent FeedBack
                    </p>
                  </div>
                    </p>


                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description"  readonly="" name="agent_des" style="color: silver;"><?php echo $agent_des ; ?></textarea>
                      </div>
                      </div>
                    <?php  
                  }else if($access == 'agent' or $access == 'manger'){
                    ?>
                    

                    <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" readonly name="spv_des" style="color: silver;"><?php echo $spv_des; ?></textarea>
                      </div>
                    </div>
                  </div>
                
              </div>
                    </div>
                   </div>

                    <div class="col-md-4">
                    <div class="card card-user">
                      <div class="card-body">
                        <p class="card-text">
                          <div class="author">
                    



                    <p class="description">
                     Agent FeedBack
                    </p>
                  </div>
                    </p>
                    <div class="form-group">
                        <label>Description</label>
                        <?php
                        if($agent_des =='' and $access != 'manger'  and $spv_des != '' ){
                          ?>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description"  name="agent_des" style="color: silver;"><?php echo $agent_des ; ?></textarea>
                         </div>
                      </div>
                      <div class="card-footer" style="text-align: center;">
                        <button type="submit" class="btn btn-fill btn-primary">Save</button>
                      </div>
                        <?php
                      }else if($agent_des !== '' or $access == 'manger'){
                      ?>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" readonly="" name="agent_des" style="color: silver;"><?php echo $agent_des ; ?></textarea>
                      <?php
                    }
                    ?>
                     
                    <?php
                  }
                    }  
                ?>
            
              </form>
              
            </div>
          </div>
        </div>
        </div>



        <!----------------------------------------------------------------------------------------------------------------------------------->
      </div>
      
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
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


  <div class="fixed-plugin" style="top:140px;width:90px;line-height: 40px;">
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
 
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
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
</body>

</html>