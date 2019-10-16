<?php
error_reporting(0);
include'../../config/connect.php';

$sql_pre="select * from dashboard where queue = 'pre' ";

$daily_count = 0;

$result_pre = $connect->query($sql_pre);
if($result_pre->num_rows > 0){
	while($row = $result_pre->fetch_assoc()){
		$total_calls = $row['call_offered']; // calls offered
		$total_answer = $row['acd_call']; // ACD call
		$total_outbound = $row['outbound'];
		$acd_tr1 = $row['acd_thr1'];
		$acd_tr2 = $row['acd_thr2'];
		$acd_tr3 = $row['acd_thr3'];
		$acd_tr4 = $row['acd_thr4'];
		$aban_tr1 = $row['abn_thr1'];
		$aban_tr2 = $row['abn_thr2'];
		$aban_tr3 = $row['abn_thr3'];
		$aban_tr4 = $row['abn_thr4'];
		$acd_time = $row['acd_time']; //acd time
		$acw_time = $row['acw_time']; // acw time
		$hold_time = $row['hold_time']; // hold time
		$aban_calls = $row['aban_calls']; // aban calls
		$auxoutofcalls = $row['auxoutofcalls']; // auxoutofcalls
		$acwoutofcalls = $row['acwoutofcalls']; // auxoutofcalls
		$emerg = $row['emerg'];
		$absent = $row['absent'];
		$sick = $row['sick'];
		$ex_annual = $row['ex_annual'];
		$un_unpaid = $row['un_unpaid'];
		$attend = $row['attend'];
		$promoter = $row['promoter'];
		$detractor = $row['detractor'];
		$total = $row['total'];

		$daily_count ++;



	//////// daily result /////
	
		$sl_daliy[]  = (($acd_tr1 + $acd_tr2 + $acd_tr3 + $acd_tr4) / ($total_calls - ($aban_tr1 + $aban_tr2 + $aban_tr3 + $aban_tr4)) * 100) ;
    $aht_daliy[] = (($acd_time + $acw_time + $hold_time) / $total_answer)  ;
    $access_daliy[] = ($total_answer / $total_calls) * 100  ;
    $aban_percentage_daliy[] = ($aban_calls / $total_calls) * 100;
    $hold_percentage_daliy[] = (($hold_time) / ($acd_time + $acw_time + $hold_time)) * 100 ;
    $acw_percentage_daliy[] = (($acw_time) / ($acd_time + $acw_time + $hold_time)) * 100;
    $outbound_calls_daliy[] =  $auxoutofcalls + $acwoutofcalls;
    $outbound_percentage_daliy[] =  (($auxoutofcalls + $acwoutofcalls) / $total_calls) *100 ;
    $absenteeism_daliy[] = (($emerg + $absent + $sick + $ex_annual) / $attend ) * 100;
    $daliy_count++;
   
   

	}

	
	
}

////////////////// MTD result ////////////////////////////////////////

$sl = ($acd_tr1 + $acd_tr2 + $acd_tr3 + $acd_tr4) / ($total_calls - ($aban_tr1 + $aban_tr2 + $aban_tr3 + $aban_tr4)) * 100 ;
$aht = (($acd_time + $acw_time + $hold_time) / $total_answer)  ;
$access = ($total_answer / $total_calls) * 100  ;
$aban_percentage = ($aban_calls / $total_calls) * 100;
$hold_percentage = (($hold_time) / ($acd_time + $acw_time + $hold_time)) * 100 ;
$acw_percentage = (($acw_time) / ($acd_time + $acw_time + $hold_time)) * 100;
$outbound_calls =  $auxoutofcalls + $acwoutofcalls;
$outbound_percentage =  (($auxoutofcalls + $acwoutofcalls) / $total_calls) *100 ;
$absenteeism = (($emerg + $absent + $sick + $ex_annual) / $attend ) * 100;



?>