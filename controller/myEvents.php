<?php
	session_start();
	if(empty($_SESSION) || $_SESSION['userType'] < 2)
	{
		header('Location: /SDP/home.php');
		die();
	}
	else
	{
		include('model/db.php');
		include('model/myEvents.php');
		include('view/myEvents.php');
	}
?>