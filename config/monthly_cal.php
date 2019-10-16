<?php
$connect = mysqli_connect('localhost','root','','mtd')

$sql = "select * from dashboard";
$sql_result =$connect->query($sql);
$row = $sql_result->fetch_assoc();
echo $row['date'];

?>