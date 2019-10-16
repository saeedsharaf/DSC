<?php
session_start();
error_reporting(0);
include'../config/connect.php';

$output = '';

    $month = $_GET['month'];
    $queue = $_GET['queue'];
    $sql_export = "select * from sv where month = '$month' and queue = '$queue'";
  
$query = $connect->query($sql_export);

?>

<style>
table, th, td {
    border: 0.5pt solid gray;
    border-collapse: collapse;
    text-align:center;
}


.color{
	background-color:#24318e;
	color:white;
}


.th{
	width:90px;
}

</style>


<?php		
	


if($query->num_rows > 0){
	$output .='
	<table>
		<thead class="color"> 
			<tr>
				<th> SPV </th>
				<th class="width"> No Calls </th>
				<th class="width"> AHT </th>
				<th class="width"> AHT WL </th>
				<th class="width"> ACW </th>
				<th class="width"> Avg_ACW </th>
				<th class="width"> Hold </th>
				<th class="width"> Avg_Hold </th>
				<th class="width"> Adherence </th>
				<th class="width"> Absenteeism</th>
				<th class="width"> NPS Calls </th>
				<th class="width"> Promoter </th>
				<th class="width"> Detractor </th>
				<th class="width"> Passive </th>
				<th class="width"> NPS </th>
				<th class="width"> FCR </th>
				<th class="width"> Agent TTB </th>
			</tr>
		</thead>	

	';

	while ($row = $query->fetch_assoc()){
		if($row['queue'] == 'pre'){

		if($row['nps'] < 25){
			$nps_color = 'background-color : #ffc7ce';
		} else{
			$nps_color = 'background-color : white';
		}

		if($row['aht_wl'] > 290){
			$aht_color = 'background-color : #ffc7ce';
		} else{
			$aht_color = 'background-color : white';
		}

		if($row['fcr'] < 60){
			$fcr_color = 'background-color : #ffc7ce';
		} else{
			$fcr_color = 'background-color : white';
		}


		if($row['agent_ttb'] < 90){
			$agent_ttb_color = 'background-color : #ffc7ce';
		} else{
			$agent_ttb_color = 'background-color : white';
		}


		

	}else if ($row['queue'] == 'post'){

		if($row['nps'] < 50){
			$nps_color = 'background-color : #ffc7ce';
		} else{
			$nps_color = 'background-color : white';
		}

		if($row['aht_wl'] > 430){
			$aht_wl_color = 'background-color : #ffc7ce';
		} else{
			$aht_wl_color = 'background-color : white';
		}

		if($row['fcr'] < 60){
			$fcr_color = 'background-color : #ffc7ce';
		} else{
			$fcr_color = 'background-color : white';
		}


		if($row['agent_ttb'] < 90){
			$agent_ttb_color = 'background-color : #ffc7ce';
		} else{
			$agent_ttb_color = 'background-color : white';
		}


		if($row['avg_hold'] > 20){
			$avg_hold_color = 'background-color : #ffc7ce';
		} else{
			$avg_hold_color = 'background-color : white';
		}




		}


		

		if($row['adhe'] < 95){
			$adhe_color = 'background-color : #ffc7ce';
		} else{
			$adhe_color = 'background-color : white';
		}

		if($row['absent_percentage']*100 > 5){
			$absent_color = 'background-color : #ffc7ce';
		}else{
			$absent_color = 'background-color : white';
		}

		$output .= '
		<tbody>
			<tr>
				<td>' .  $row['name'] . '</td>
				<td>' .  $row['no_calls'] . '</td>
				<td style="' . $aht_color . '">' .  round($row['aht'],0) . '</td>
				<td style="' . $aht_wl_color . '">' .  round($row['aht_wl'],0) . '</td>
				<td style="' . $acw_color . '">' .  round($row['acw'],0) . ' %</td>
				<td style="' . $avg_acw_color . '">' .  round($row['avg_acw'],0) . ' Sec</td>
				<td style="' . $hold_color . '">' .  round($row['hold'],0) . ' %</td>
				<td style="' . $avg_hold_color . '">' .  round($row['avg_hold'],0) . ' Sec</td>
				<td style="' . $adhe_color . '">' .  round($row['adhe'],0) . ' %</td>
				<td style="' . $absent_color . '">' .  round($row['absent_percentage']*100,0) . ' %</td>
				<td>' .  $row['nps_calls'] . '</td>
				<td>' .  $row['promoter'] . '</td>
				<td>' .  $row['detractor'] . '</td>
				<td>' .  $row['passive'] . '</td>
				<td style="' . $nps_color . '">' .  round($row['nps'],0) . ' %</td>
				<td style="' . $fcr_color . '">' .  round($row['fcr'],0) . ' %</td>
				<td style="' . $agent_ttb_color . '">' .  round($row['agent_ttb'],0) . ' %</td>
			</tr>
		</tbody>
		';

	}
	$output .= '

	</table>';
	header("content-type: application/'xls");
	header("content-disposition:attachement; filename=SPV Score.xls");


}

echo $output ;

?>