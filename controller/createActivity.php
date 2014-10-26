<?php
	session_start();
	if(empty($_SESSION) || $_SESSION['userType'] < 2)
	{
		header('Location: /SDP/home.php'); //urled
		die();
	}
    include('view/createActivity.php');
?>