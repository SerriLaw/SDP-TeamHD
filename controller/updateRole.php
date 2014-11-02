<?php
	session_start();
	if(empty($_SESSION) || $_SESSION['userType'] < 2)
	{
		header('Location: /SDP/login.php'); //urled
		die();
	}
    include('model/db.php');
    include('model/viewRole.php');
    include('view/updateRole.php');
?>