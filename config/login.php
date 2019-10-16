<?php
error_reporting(0);
$error="";
if(isset($_POST['submit'])){
	if(empty($_POST['username'])){
		$error = 'Please write your username';
	} else if(empty($_POST['pass'])){
		$error = 'Please write your Password';
	} else {
		include 'connect.php';
		if(isset($_POST['username']) && isset($_POST['pass'])){
			$username = $_POST['username'];
			$password = $_POST['pass'];
			
			$saeed = $connect->query("SELECT * FROM member WHERE user_name = '$username' AND password = '$password'");
			$row = $saeed->fetch_assoc();
			$user = $row['user_name'];
			$pass = $row['password'];

			

			
			if(strcasecmp($username,$user) == 0 && strcasecmp($password,$pass) == 0 ){
				session_start();
				$_SESSION['username'] = $row['user_name'];
				$_SESSION['id'] = $row['login_id'];
				$_SESSION['login_id'] = $row['login_id'];
				$_SESSION['super'] = $row['super'];
				$_SESSION['queue'] = $row['queue'];
				$_SESSION['access'] = $row['access'];
				$_SESSION['month'] = date("m");

				
				?>
				<script> 
					  window.location.href='config/redirect_page.php' ;
					// window.location.href='config/update.php'
					

				</script>

			
			<?php
			
			
			} else {
			
				$error= '<span style="margin-left: 110px;">Wrong user Name or Paswword</span>';
			
			}
		
	
		
		}
		$connect->close();
	}
}
?>