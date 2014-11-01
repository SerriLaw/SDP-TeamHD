<?php
	session_start();
	if(empty($_SESSION) || $_SESSION['userType'] < 2)
	{
		header('Location: /SDP/home.php'); //urled
		die();
	}
	include("model/db.php");
	include('model/managerList.php');
    include('view/managerList.php');
?>