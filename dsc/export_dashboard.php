
<?php
session_start();
error_reporting(0);
include'../config/connect.php';



?>
<style type="text/css" >
table, th, td {
    border: 0.5pt solid gray;
    border-collapse: collapse;
    text-align:center;
}
.color{
  background-color:#24318e;
  color:white;
}
</style>


<?php

  
    $queue = $_GET['queue'];
    $month = $_GET['month'];
    $sql_export = "select * from dashboard where queue = '$queue' and month = '$month'";
    $export_result = $connect->query($sql_export);
    $output="";

    ////////////////////////////////////////////
    if($export_result->num_rows > 0){
  
$output .='
  <table>
  <thead>
    <tr>
      <th  class="color">Date</th>
      <th  class="color">Call Offerd</th>  
      <th  class="color"> Answer Call</th>    
      <th  class="color">ACD call to Thr5</th>
      <th  class="color">Aban Call To Thr5</th>
      <th  class="color">Total Aban Calls</th>
      <th  class="color">Abanded %</th>
      <th  class="color">Outbound Calls</th>
      <th  class="color">Outbound %</th>
      <th  class="color">ACD Time</th>
      <th  class="color">Hold Time</th>
      <th  class="color">ACW Time</th>
      <th  class="color">Held Calls</th>
      <th  class="color">Held %</th>
      <th  class="color">AHT</th>
      <th  class="color">AHT WL</th>
      <th  class="color">Hold %</th>
      <th  class="color">Avg Hold</th>
      <th  class="color">Acw %</th>
      <th  class="color">Avg Acw</th>
      
      <th  class="color">Sl</th>
      <th  class="color">NPS Survey </th>
      <th  class="color">NPS % </th>      
      <th  class="color" style="background-color:#8e2439;">FCR </th>
      <th  class="color" style="background-color:#8e2439;">Agent_TTB </th>
      <th  class="color" style="background-color:#8e2439;">Over All % </th>
      <th  class="color" style="background-color:#8e2439;">CTC </th>
      <th  class="color" style="background-color:#8e2439;">CTB </th>
      
      <th  class="color" style="background-color:#8e2439;">NC </th>
      <th  class="color">Monitor Sheet </th>  
      
      
    </tr></thead>'
    ; 
      while($row = $export_result->fetch_array()){

        


$aht = round((($row['acd_time'] + $row['acw_time'] + $row['hold_time'])/$row['acd_call']),0) ;
$aht_wl = round((($row['acd_time'] + $row['acw_time'] + $row['hold_time'] + $row['aux_out_of_time'] + $row['acw_out_of_time'])/$row['acd_call']),0) ;
$acd_thr5 = $row['acd_thr1'] + $row['acd_thr2']+$row['acd_thr3']+$row['acd_thr4']+$row['acd_thr5'];
$aban_thr5 = $row['abn_thr1'] + $row['abn_thr2']+$row['abn_thr3']+$row['abn_thr4']+$row['abn_thr5'];
$aban_percentage = round(($row['aban_calls']/$row['call_offered'])*100,0);
$outbound_call = $row['auxoutofcalls'] + $row['acwoutofcalls'];
$outbound_precentage = round(($outbound_call / $row['acd_call'])*100,0);
$held_precentage = round(($row['held_calls']/$row['acd_call']),0);
$hold = round(($row['hold_time']/($row['acd_time'] + $row['acw_time'] + $row['hold_time']))*100,0);
$avg_hold = round(($row['hold_time']/$row['acd_call']),0);
$acw = round(($row['acw_time']/($row['acd_time'] + $row['acw_time'] + $row['hold_time']))*100,0);
$avg_acw = round(($row['acw_time']/$row['acd_call']),0);
$sl = round(($acd_thr5/($row ['call_offered'] - $aban_thr5))*100,0) . ' %'  ;
$agent_ttb = round(($row['agent_ttb'] / $row['total'])*100,0);
$fcr = round(($row['fcr']/$row['total'])*100,0);
$over_all = round(($row['over_all_sats']/$row['total'])*100,0);

  

    

      $output .='
      <tbody>
      <tr>
        <td  >' .$row ['date'].'</td>
        <td>' .$row ['call_offered'].'</td>
        <td>' .$row ['acd_call'].'</td>
        <td>' .$acd_thr5.'</td>
        <td>' .$aban_thr5.'</td>
        <td style="background-color:'.$aht_color.'">' .  $row['aban_calls'] .'</td>
        <td style="background-color:'.$aht_color.'">' . $aban_percentage . ' %' .'</td>
        <td style="background-color:'.$acw_color.'">' . $outbound_call .'</td>

        <td style="background-color:'.$hold_color.'">' . $outbound_precentage .' %'.'</td>

        <td style="background-color:'.$outbound_color.'">' .$row['acd_time'].'</td>
        <td style="background-color:'.$sick_color.'">' .$row ['hold_time'].'</td>
        <td style="background-color:'.$emerg_color.'">' .$row ['acw_time'].'</td>

        <td style="background-color:'.$absent_color.'">' .$row ['held_calls'].'</td>
        <td style="background-color:'.$early_color.'">' .$held_precentage . ' %' .'</td>
        <td style="background-color:'.$adh_color.'">' . $aht.' </td>
       
        <td style="background-color:'.$nps_color.'">' . $aht_wl .'</td>
        <td style="background-color:'.$fcr_color.'">' . $hold.'</td>
        <td style="background-color:'.$agent_color.'">' . $avg_hold .' Sec'.'</td>

        <td style="background-color:'.$ctc_color.'">' .$acw . ' %'.'</td>
        <td style="background-color:'.$ctb_color.'">' .$avg_acw.' Sec'.'</td>
        <td style="background-color:'.$compl_color.'">' .$sl.'</td>

        <td style="background-color:'.$nc_color.'">' .$row ['total'].'</td>
        <td>' .  round($row['nps']*100,0) . ' %' . ' </td>
        
        <td style="background-color:'.$attiude_color.'">' .$fcr . ' %' .'</td>
        <td style="background-color:'.$over_color.'">' . $agent_ttb. ' %' .'</td>
        <td style="background-color:'.$wrong_color.'">' .$over_all . ' %' .'</td>
        <td style="background-color:'.$transaction_color.'">' .$row ['ctc'].'</td>
        <td style="background-color:'.$lack_color.'">' .$row ['ctb'].'</td>
        
        
        <td>' .$row ['nc'].'</td>
        <td>' .'</td>
        
        
        
      </tr>
      </tbody>
      ';
     
      }

      $output .='
      </table>';
      header("content-type: application/'xls");
      header("content-disposition:attachement; filename=DashBoard.xls") ; 
      
  }


  echo $output ;