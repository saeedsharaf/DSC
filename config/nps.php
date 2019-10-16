<?php

$connect = mysqli_connect('localhost','root','','mtd' );



/*
if($_GET['table']){ // name of db table
	$tabel = $_GET['table'];
}else{
	$table = 'dashboard_' . date('Y') ;
}
*/

if($_SESSION['id'] == 555){ // if user manno

	$sql = "select * from $table ";

} else if ($_SESSION['id'] == 222){ // if user prepaid

	$sql = "select * from $table where queue = 'pre' ";

}else if($_SESSION['id'] == 333){ // if user postpaid

	$sql = "select * from $table where queue = 'post' ";
}

echo $table;
$sql = "select * from $table ";

$result = $connect->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$s = $row['date'];
		?>
		

<?php
		
	}
}
?>
<script>
			var s = 1;
</script>





