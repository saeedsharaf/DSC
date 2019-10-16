
<?php

$call_offer = $row['call_offered'];
$answer_call = $row['acd_call'];
$answer_within_thr =  $row['acd_thr1'] + $row['acd_thr2'] + $row['acd_thr3'] + $row['acd_thr4'] + $row['acd_thr5'] ;
$aban_within_thr =  $row['abn_thr1'] + $row['abn_thr2'] + $row['abn_thr3'] + $row['abn_thr4'] + $row['abn_thr5'] ;
$aban_calls = $row['aban_calls'];
$aban_percentage = round(($aban_calls / $call_offer )*100,0);
$promoter = $row['promoter'];
$detractor = $row['detractor'] ;
$total_survey = $row['total'];
$absent = $row['absent'];
$sick = $row['sick'];
$emerg = $row['emerg'];
$ex_annual = $row['ex_annual'];
$un_unpaid = $row['un_unpaid'];
$attend = $row['attend'];
$aux_out_of_time =$row['aux_out_of_time'];
$acw_out_of_time = $row['acw_out_of_time'];
$tht = $row['tht'];




$nps = round((($promoter - $detractor)/$total_survey)*100,1) ;
$sl = round(($answer_within_thr/($call_offer - $aban_within_thr))*100,0) . ' %'  ;
$fcr_percentage = round(($row['fcr'] / $row['total'])*100,0);
$agent_ttb = round(($row['agent_ttb'] / $row['total'])*100,0);
$over_all_ttb = round(($row['over_all_sats'] / $row['total'])*100,0);
$outbound_calls = $row['auxoutofcalls'] + $row['acwoutofcalls'];
$held_calls = $row['held_calls'];
$aht = round((($row['acd_time'] + $row['acw_time'] + $row['hold_time'])/$row['acd_call']),0);
$aht_wl = round((($row['acd_time'] + $row['acw_time'] + $row['hold_time'] + $aux_out_of_time + $acw_out_of_time)/$row['acd_call']),0);
$hold = round(($row['hold_time']/($row['hold_time'] + $row['acw_time'] + $row['acd_time']))*100,0);
$avg_hold = round($row['hold_time'] / $row['acd_call'],0) . ' Sec';
$acw = round($row['acw_time']/($row['acw_time'] + $row['hold_time']+$row['acd_time'])*100,0);
$avg_acw = round($row['acw_time'] / $row['acd_call'],0) . ' Sec';
$support_calls = $row['support_calls'];
$support_agent = $row['support_agent'];
$held_percnt = round(($held_calls / $answer_call ) *100 , 0);
$absent_per = round(($absent + $sick + $emerg + $ex_annual + $un_unpaid)/($attend + $absent + $sick + $emerg + $ex_annual + $un_unpaid),3) *100 . ' %';




if($over_all_ttb < 86){
	$over_all_color = 'color:#ffa64a';
}else{
	$over_all_color = 'color:#ffffffb3';
}

if($agent_ttb < 90){
	$agent_ttb_color = 'color:#ffa64a';
}else{
	$agent_ttb_color = 'color:#ffffffb3';
}

if($fcr_percentage < 65){
	$fcr_color = 'color:#ffa64a';
}else{
	$fcr_color = 'color:#ffffffb3';
}


if($held_percnt > 16){
	$held_color = 'color:#ffa64a';
}else{
	$held_color = 'color:#ffffffb3';
}

if (is_nan($nps)) {
	$nps = '';
}else{
	if($nps < 48){
		$nps_color = 'color:#ffa64a';
	}else{
		$nps_color = 'color:#ffffffb3';
	}
$nps = $nps . ' %';
}




if(is_nan($fcr_percentage)){
	$fcr_percentage = '';
}else{
	$fcr_percentage = $fcr_percentage . ' %';
}


if($hold > 3){
	$hold_color = 'color:#ffa64a';
	$hold = $hold .' %';
}else{
$hold_color = 'color:#ffffffb3';
$hold = $hold .' %';
}



if($sl < 80){
	$sl_color = 'color:#ffa64a';
}else{
	$sl_color = 'color:#ffffffb3';
}


if($aht > 230){
	$aht_color = 'color:#ffa64a';
}else{
	$aht_color = 'color:#ffffffb3';
}


if($aht_wl > 290){
	$aht_wl_color = 'color:#ffa64a';
}else{
	$aht_wl_color = 'color:#ffffffb3';
}


if($acw >= 5){
	$acw_color = 'color:#ffa64a';
	$acw = $acw . ' %';
}else{
	$acw_color = 'color:#ffffffb3';
	$acw = $acw . ' %';
}


if($absent_per > 5){
	$absent_color = 'color:#ffa64a';
}else{
	$absent_color = 'color:#ffffffb3';
}





$call_offer_mtd += $row['call_offered'];
$answer_call_mtd += $row['acd_call'];

$acd_thr1 += $row['acd_thr1'];
$acd_thr2 += $row['acd_thr2'];
$acd_thr3 += $row['acd_thr3'];
$acd_thr4 += $row['acd_thr4'];
$acd_thr5 += $row['acd_thr5'];
$aban_thr1 += $row['abn_thr1'];
$aban_thr2 += $row['abn_thr2'];
$aban_thr3 += $row['abn_thr3'];
$aban_thr4 += $row['abn_thr4'];
$aban_thr5 += $row['abn_thr5'];

$aban_calls_mtd += $row['aban_calls'];

$promoter_mtd += $row['promoter'];
$detractor_mtd += $row['detractor'] ;
$total_survey_mtd += $row['total'];
$fcr_mtd += $row['fcr'];
$agent_sats += $row['agent_ttb'];

$auxoutofcalls_mtd += $row['auxoutofcalls'];
$acwoutofcalls_mtd += $row['acwoutofcalls'];
$aux_out_of_time_mtd +=$row['aux_out_of_time'];
$acw_out_of_time_mtd += $row['acw_out_of_time'];
$held_calls_mtd += $row['held_calls'];
$acd_time_mtd += $row['acd_time'];
$acw_time_mtd += $row['acw_time'];
$hold_time_mtd += $row['hold_time'];
$acd_calls_mtd += $row['acd_call'];

$support_calls_mtd += $row['support_calls'];
$support_agent_mtd += $row['support_agent'];
$absent_mtd += $row['absent'];
$sick_mtd += $row['sick'];
$emerg_mtd += $row['emerg'];
$ex_annual_mtd += $row['ex_annual'];
$un_unpaid_mtd += $row['un_unpaid'];
$attend_mtd += $row['attend'];





$answer_within_thr_mtd =  $acd_thr1 + $acd_thr2 + $acd_thr3 + $acd_thr4 + $acd_thr5  ;
$aban_within_thr_mtd =  $aban_thr1 + $aban_thr2 + $aban_thr3 + $aban_thr4 + $aban_thr5 ;
$aban_percentage_mtd = round(($aban_calls_mtd / $call_offer_mtd )*100,0);
$nps_mtd = round((($promoter_mtd - $detractor_mtd)/$total_survey_mtd)*100,1) ;
$fcr_percentage_mtd = round(($fcr_mtd / $total_survey_mtd)*100,0);
$agent_ttb_mtd = round(($agent_sats / $total_survey_mtd)*100,0);
$outbound_calls_mtd = $auxoutofcalls_mtd + $acwoutofcalls_mtd ;
$aht_mtd = round((($acd_time_mtd + $acw_time_mtd + $hold_time_mtd)/$acd_calls_mtd),0);
$aht_wl_mtd = round((($acd_time_mtd + $acw_time_mtd + $hold_time_mtd + $aux_out_of_time_mtd +$acw_out_of_time_mtd )/$acd_calls_mtd),0);
$hold_mtd = round(($hold_time_mtd/($hold_time_mtd + $acw_time_mtd + $acd_time_mtd))*100,0);
$avg_hold_mtd = round($hold_time_mtd / $acd_calls_mtd,0) . ' Sec';
$acw_mtd = round($acw_time_mtd /($acw_time_mtd + $hold_time_mtd + $acd_time_mtd)*100,0);
$avg_acw_mtd = round($acw_time_mtd / $acd_calls_mtd,0) . ' Sec';
$held_percnt_mtd = round(($held_calls_mtd/$answer_call_mtd)*100,0);


$sl_mtd = round(($answer_within_thr_mtd/($call_offer_mtd - $aban_within_thr_mtd))*100,0) . ' %'  ;
$absent_per_mtd = round(($absent_mtd + $sick_mtd + $emerg_mtd + $ex_annual_mtd + $un_unpaid_mtd)/($attend_mtd + $absent_mtd + $sick_mtd + $emerg_mtd + $ex_annual_mtd + $un_unpaid_mtd),3) *100 . ' %';


?>