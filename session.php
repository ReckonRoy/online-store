<?php
	session_start();
	
	if(isset($_SESSION['username']))
	{
		echo json_encode([true, $_SESSION['name']]);
	}else{
		echo json_encode([false, "Login"]);
	}
?>