
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

  
    $sv_id = $_GET['sv_id'];
    $month = $_GET['month'];
    $sql_export = "select * from agent where sv_id = '$sv_id' and month = '$month'";
    $export_result = $connect->query($sql_export);
    $output="";

    ////////////////////////////////////////////
    if($export_result->num_rows > 0){
  
$output .='
  <table>
  <thead>
    <tr>
      <th  class="color">Avaya</th>
      <th  class="color">Name</th>  
      <th  class="color"> SPV</th>    
      <th  class="color">Manger</th>
      <th  class="color">No of Calls</th>
      <th  class="color">AHT</th>
      <th  class="color">AHT WL</th>
      <th  class="color">ACW</th>
      <th  class="color">Hold</th>
      <th  class="color">Outbound AHT</th>
      <th  class="color">Sick</th>
      <th  class="color">Emerg</th>
      <th  class="color">Absent</th>
      <th  class="color">Leave early</th>
      <th  class="color">Adherence </th>
      <th  class="color">NPS Calls </th>
      <th  class="color">NPS </th>      
      <th  class="color" style="background-color:#8e2439;">FCR </th>
      <th  class="color" style="background-color:#8e2439;">Agent_TTB </th>
      <th  class="color" style="background-color:#8e2439;">CTC </th>
      <th  class="color" style="background-color:#8e2439;">CTB </th>
      <th  class="color" style="background-color:#8e2439;">Compliance </th>
      <th  class="color" style="background-color:#8e2439;">NC </th>
      <th  class="color" style="background-color:#8e2439;">Quilty Score </th>
      
      <th  class="color" style="background-color:#8e2439;">Attiude </th>
      <th  class="color" style="background-color:#8e2439;">Over Promising </th>
      <th  class="color" style="background-color:#8e2439;">Wrong Info </th>
      <th  class="color" style="background-color:#8e2439;">Wrong Transaction </th>
      <th  class="color" style="background-color:#8e2439;">Lack Follow </th>
      
      <th  class="color" style="background-color:#8e2439;">Complaint Score </th>
      <th  class="color" style="background-color:#8e2439;">Final score </th>
      
      
    </tr></thead>'
    ; 
      while($row_export = $export_result->fetch_array()){

        if($row_export ['final_score'] != $saeed ){
              $x++;
            }

        if ($row_export ['queue'] == 'post') {

          $hold_t = " Sec";

            if($row_export ['aht'] > 430){
              $aht_color = '#ffc7ce';
            }else{
              $aht_color = '#ffffff63';
            }
            
            if($row_export ['acw'] > 5 ){
              $acw_color = '#ffc7ce';
            }else{
              $acw_color = '#ffffff63';
            }

            if($row_export ['hold'] > 5){
              $hold_color = '#ffc7ce';
            }else{
              $hold_color = '#ffffff63';
            }

            if($row_export ['outbound'] > 480){
              $outbound_color = '#ffc7ce';
            }else{
              $outbound_color = '#ffffff63';
            }

            if($row_export ['nps'] < 25 and $row_export ['nps'] !== ''){
              $nps_color = '#ffc7ce';
            }else{
              $nps_color = '#ffffff63';
            }

            if($row_export ['fcr'] < 60 and $row_export ['fcr'] !== ''){
              $fcr_color = '#ffc7ce';
            }else{
              $fcr_color = '#ffffff63';
            }

            if($row_export ['agent_ttb'] < 85 and $row_export ['agent_ttb'] !== ''){
              $agent_color = '#ffc7ce';
            }else{
              $agent_color = '#ffffff63';
            }

          } else{   
            

            $hold_t = " %";

            if($row_export ['aht'] > 235){
              $aht_color = '#ffc7ce';
            }else{
              $aht_color = '#ffffff63';
            }
            

            if($row_export ['acw'] > 5 ){
              $acw_color = '#ffc7ce';
            }else{
              $acw_color = '#ffffff63';
            }

            if($row_export ['hold'] > 2){
              $hold_color = '#ffc7ce';
            }else{
              $hold_color = '#ffffff63';
            }

            if($row_export ['outbound'] > 300){
              $outbound_color = '#ffc7ce';
            }else{
              $outbound_color = '#ffffff63';
            }

            if($row_export ['nps'] < 50 and $row_export ['nps'] !== ''){
              $nps_color = '#ffc7ce';
            }else{
              $nps_color = '#ffffff63';
            }

            if($row_export ['fcr'] < 60 and $row_export ['fcr'] !== ''){
              $fcr_color = '#ffc7ce';
            }else{
              $fcr_color = '#ffffff63';
            }

            if($row_export ['agent_ttb'] < 90 and $row_export ['agent_ttb'] !== ''){
              $agent_color = '#ffc7ce';
            }else{
              $agent_color = '#ffffff63';
            }
        }



        if($row_export ['sick'] > 0){
              $sick_color = '#ffc7ce';
            }else{
              $sick_color = '#ffffff63';
            }

            if($row_export ['emerg'] > 0){
              $emerg_color = '#ffc7ce';
            }else{
              $emerg_color = '#ffffff63';
            }

            if($row_export ['absent'] > 0){
              $absent_color = '#ffc7ce';

            }else{
              $absent_color = '#ffffff63';
            }

            if($row_export ['leave_early'] > 0){
              $early_color = '#ffc7ce';
            }else{
              $early_color = '#ffffff63';
            }

            if(($row_export ['adherance'] *100) < 95 and ($row_export ['adherance']*100) !== ''){
              $adh_color = '#ffc7ce';
            }else {
              $adh_color = '#ffffff63';
            }


            if($row_export ['ctc'] > 0){
              $ctc_color = '#ffc7ce';
            }else{
              $ctc_color = '#ffffff63';
            }

            if($row_export ['ctb'] > 0){
              $ctb_color = '#ffc7ce';
            }else{
              $ctb_color = '#ffffff63';
            }

            if($row_export ['compliance'] > 0){
              $compl_color = '#ffc7ce';
            }else{
              $compl_color = '#ffffff63';
            }

            if($row_export ['nc'] > 0){
              $nc_color = '#ffc7ce';
            }else{
              $nc_color = '#ffffff63';
            }

            if($row_export ['rejection'] > 0){
              $rejection_color = '#ffc7ce';
            }else{
              $rejection_color = '#ffffff63';
            }

            if($row_export ['attiude'] > 0){
              $attiude_color = '#ffc7ce';
            }else{
              $attiude_color = '#ffffff63';
            }

            if($row_export ['over_promising'] > 0){
              $over_color = '#ffc7ce'; 
            }else{
              $over_color = '#ffffff63'; 
            }

            if($row_export ['wrong_info'] > 0){
              $wrong_color = '#ffc7ce';
            }else{
              $wrong_color = '#ffffff63';
            }

            if($row_export ['wron_transaction'] > 0){
              $transaction_color = '#ffc7ce';
            }else{
              $transaction_color = '#ffffff63';
            }

            if($row_export ['lack_follow'] > 0){
              $follow_color = '#ffc7ce';
            }else{
              $follow_color = '#ffffff63';
            }


            if($row_export ['lack_follow'] > 0){
              $lack_color = '#ffc7ce';
            } else{
              $lack_color = '#ffffff63';
            }


$aht = round($row_export ['aht'],0) ;
$aht_wl = round($row_export ['aht_wl'],0) ;
$acw = $row_export ['acw'];
$hold = $row_export ['hold'];
$outbound_aht = $row_export ['outbound'];
$absent = $row_export ['absent'];
$adherence = $row_export ['adherance'] *100;
$nps = $row_export ['nps'] ;
$fcr = $row_export ['fcr'];
$agent_ttb = $row_export ['agent_ttb'];
$ctc = $row_export ['ctc'] ;
$ctb = $row_export ['ctb'];
$nc = $row_export ['nc'];
$quality_score = $row_export ['quality_score'];
$complaint_score = $row_export ['complaint_score'];

$final_score = round($row_export ['final_score'],2);      



  // below code to remove % and validate value
    if($aht == ''){
      $aht = '';
    }


    if($acw == ''){
      $acw = '';
    }else{
      $acw = round($row_export ['acw'],1) . ' %';
    }


    if($hold == ''){
      $hold = '';
    }else{
      $hold = round($row_export ['hold'],0) . $hold_t;
    }

    if($quality_score == ''){
      $quality_score = '';
    }else{
    $quality_score = $row_export ['quality_score']  . ' %';
    }

    $final_score = $row_export ['final_score'];

    if($final_score == 0){
      $final_score = '';
    }else{
      $final_score = $row_export ['final_score'] . ' %';
    }


    if($nps == ''){
      $nps = '';
    }else {
      $nps = $row_export ['nps'] . ' %';
    }

    if($adherence == ''){
      $adherence == '';
    }else{
      $adherence = $row_export ['adherance'] *100 . ' %';
    }

    if($fcr == ''){
      $fcr = '';
    } else{
      $fcr = $row_export ['fcr'] . ' %';
    }

    if($agent_ttb == ''){
      $agent_ttb = '';
    }else{
      $agent_ttb = $row_export ['agent_ttb'] . ' %';
    }

    if($complaint_score == ''){
      $complaint_score = '';
    }else{
      $complaint_score = $row_export ['complaint_score'] . ' %';
    }




        


      $output .='
      <tbody>
      <tr>
        <td  >' .$row_export ['login_id'].'</td>
        <td>' .$row_export ['name'].'</td>
        <td>' .$row_export ['sv'].'</td>
        <td>' .$row_export ['manger'].'</td>
        <td>' .$row_export ['no_calls'].'</td>
        <td style="background-color:'.$aht_color.'">' .  $aht .'</td>
        <td style="background-color:'.$aht_color.'">' .  $aht_wl .'</td>
        <td style="background-color:'.$acw_color.'">' . $acw .'</td>
        <td style="background-color:'.$hold_color.'">' . $hold .'</td>
        <td style="background-color:'.$outbound_color.'">' .round($row_export ['outbound'],0).'</td>
        <td style="background-color:'.$sick_color.'">' .$row_export ['sick'].'</td>
        <td style="background-color:'.$emerg_color.'">' .$row_export ['emerg'].'</td>
        <td style="background-color:'.$absent_color.'">' .$row_export ['absent'].'</td>
        <td style="background-color:'.$early_color.'">' .$row_export ['leave_early'] /24/3600 .'</td>
        <td style="background-color:'.$adh_color.'">' . $adherence.' </td>
        <td >' .$row_export ['nps_calls'].'</td>
        <td style="background-color:'.$nps_color.'">' . $nps .'</td>
        <td style="background-color:'.$fcr_color.'">' . $fcr.'</td>
        <td style="background-color:'.$agent_color.'">' . $agent_ttb .' </td>
        <td style="background-color:'.$ctc_color.'">' .$row_export ['ctc'].'</td>
        <td style="background-color:'.$ctb_color.'">' .$row_export ['ctb'].'</td>
        <td style="background-color:'.$compl_color.'">' .$row_export ['compliance'].'</td>
        <td style="background-color:'.$nc_color.'">' .$row_export ['nc'].'</td>
        <td>' .  $quality_score . ' </td>
        
        <td style="background-color:'.$attiude_color.'">' .$row_export ['attiude'].'</td>
        <td style="background-color:'.$over_color.'">' .$row_export ['over_promising'].'</td>
        <td style="background-color:'.$wrong_color.'">' .$row_export ['wrong_info'].'</td>
        <td style="background-color:'.$transaction_color.'">' .$row_export ['wron_transaction'].'</td>
        <td style="background-color:'.$lack_color.'">' .$row_export ['lack_follow'].'</td>
        
        <td >' . $complaint_score .' </td>
        <td>' .$row_export ['final_score'].'%</td>
        
        
        
      </tr>
      </tbody>
      ';
      $saeed = $row_export ['final_score'];
      }

      $output .='
      </table>';
      header("content-type: application/'xls");
      header("content-disposition:attachement; filename=KPI.xls") ; 
      
  }


  echo $output ;