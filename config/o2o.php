<?php
session_start();
$access = $_SESSION['access'];
include'connect.php';

$login_id = $_POST['login_id'];
$month = $_POST['month'];
$year = $_POST['year'];
//$spv_name = $_POST['spv_name'];
//$manger_name = $_POST['manger_name'];
//$aera = $_POST['area'];
//$login_id = $_POST['agent_name'];
$att_1 = $_POST['att_1'];
$att_2 = $_POST['att_2'];
$att_3 = $_POST['att_3'];
$att_4 = $_POST['att_4'];
$att_5 = $_POST['att_5'];
$att_6 = $_POST['att_6'];
$spv_des = $_POST['spv_des'];
$agent_des = $_POST['agent_des'];


echo $month;
echo $year ;

echo $agent_des;

$sql = "update agent set attr_1 = '$att_1' , attr_2 = '$att_2' ,attr_3 = '$att_3' ,attr_4 = '$att_4' ,attr_5 = '$att_5' ,attr_6 = '$att_6', spv_des = '$spv_des', agent_des = '$agent_des' where login_id = '$login_id' and month = '$month' and year = '$year'  ";

$connect->query($sql);
echo $connect->error;



if($access == 'super'){
?>
<script>
	window.location.href="../dsc/agent_details.php";
</script>
<?php
}else if ($access == 'agent'){
	?>
	<script>
	window.location.href="../dsc/agent_daily.php";
</script>
<?php
}




























?>