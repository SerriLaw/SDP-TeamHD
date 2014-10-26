<?php
	session_start();
	if(empty($_SESSION) || $_SESSION['userType'] < 2)
	{
		header('Location: /SDP/login.php'); //urled
		die();
	}
    include('model/getEvent.php');
    include('view/updateEvent.php');
?>