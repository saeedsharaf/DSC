<?php
session_start();
$login_id = $_SESSION['login_id'];
echo $login_id;
?>
<span> what's your skill you want to be imrpoved next period ? </span>
<form action="#" method="get">
	<input type="radio"  name="data" value="Leader Ship">Leader Ship <br>
	<input type="radio"  name="data"  value="Business cases">Business cases <br>
	<input type="radio"  name="data"  value="Presentation">Presentation  <br>
	<input type="radio"  name="data"  value="Excel">Excel <br>
	<input type="radio"  name="data"  value="English">English <br>
	<div style="">
	<label>Other</label>
	<textarea name="saeed" style="width: 500px;height: 100px;" placeholder="Also plz wtite login_id"></textarea> 
	<br>
	</div>
	<input type="submit" name="submit">
</form>




<?php
$connect = mysqli_connect("localhost","root","","wakel");


if(isset($_GET['submit'])){
	$data = $_GET['data'];
	$other = $_GET['saeed'];

	$insert = "INSERT INTO `data`(`login_id`,`Skill`,`other`) VALUES ('$login_id','$data','$other')";
	$connect->query($insert);
	?>
	<script type="">
		window.location.href ='dsc/agent_daily.php';
	</script>

	<?php
}
?>