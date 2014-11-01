<?php
	session_start();
	if(empty($_SESSION) || ($_GET['userid'] != $_SESSION['userID'] && $_SESSION['userType'] < 2)) // not logged in OR trying to look at another student but not a manager or admin
	{
		header('Location: /SDP/home.php'); //urled
		die();
	}
	include('model/db.php');
	include('model/futureEvents.php');
	include('view/futureEvents.php');
?>