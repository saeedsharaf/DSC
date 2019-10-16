<?php
error_reporting(0);
session_start();


//$_SESSION['access'] = 'super';
//$_SESSION['id'] = 1;
//$_SESSION['queue'] = 'pre';




if($_SESSION['access'] == 'manger'){
	?>
		<script>
			window.location.href ='../dsc/dashboard.php';
		</script>

	<?php

}else if ($_SESSION['access'] == 'super'){
	?>
		<script>
			window.location.href ='../dsc/spv_score.php';
		</script>

	<?php


}else {
	?>
		<script>
			window.location.href ='../dsc/agent_daily.php';
			//window.location.href ='../ss.php';
		</script>

	<?php

}


?>