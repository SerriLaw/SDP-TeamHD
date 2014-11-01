<?php
	session_start();
	if(empty($_SESSION) || $_SESSION['userType'] < 2) // the user is not logged in or not an event manager/system admin
	{
		header('Location: /SDP/home.php'); //urled
		die();
	}
	else
	{
		include('model/db.php');
		include('model/eventReport.php');
		include('view/eventReport.php');
	}
?>