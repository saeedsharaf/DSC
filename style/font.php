<?php
error_reporting(0);

if($nps < 45 ){
$nps_color = 'color: #ff0000';

} else {
$nps_color = 'color : #108003db';
};


if($fcr_pre < 60){
	$fcr_color = 'color: #ff0000';
}else {
	$fcr_color = 'color : #108003db';

};


if($per_agttb < 80 ){
	$ag_tt = 'color: #ff0000';

}else {

	$ag_tt = 'color : #108003db';

}

if($ir_pre < 60 ){
	$ir_color = 'color: #ff0000';
}else {
	$ir_color = 'color : #108003db';
};


if($aht > 260){
	$aht_color = 'color: #ff0000';

} else{
	$aht_color = 'color : #108003db';
}


if($hold_percentage > 3){
	$hold_color = 'color: #ff0000';

} else{
	$hold_color = 'color: #108003db';
}


if($acw_percentage > 5){
	$acw_color = 'color: #ff0000';

} else{
	$acw_color = 'color: #108003db';
}


if($sl < 80 ){
	$sl_color = 'color: #ff0000';
} else{
	$sl_color = 'color: #108003db';
}

?>