<?php
include 'config/login.php';

?>

<!doctype html>
<html>
<head>

<link rel="stylesheet" href="style/loginstyle.css">
<link rel="shortcut icon" href="style/icon.png" />

</head>


<body>
<div class="login"> 
	<form action=""  method="post">
		<label>User Name</label><input type="text" name="username" class="user" placeholder="User name" autocomplete="off"> <br>
		<label>Password</label><input type="password" name="pass" class="pass" placeholder="Password" autocomplete="off" > <br>
		<input type="submit" name="submit" class="submit" value="Login">
	</form>
	<span> <?php echo $error; ?> </span>
</div>
<div class="footer" >
<span >Supervision & Idea <a>Moustafa Magdy </a> & <a style="text-decoration:none;" href='mailto:XCC-Tamer  Kassem'>Tamer Kassem </a>. Developed & Designed by <a style="text-decoration:none;" href='mailto:XCC-Saeed Sharaf'>Saeed Sharaf </a> </span>
</div>




</body>
</html>

