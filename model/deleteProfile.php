<?php
	session_start();
	include("db.php");
	$userID = mysqli_real_escape_string($db,$_GET['userid']);
	$userType = mysqli_real_escape_string($db,$_GET['usertype']);
	$sql = "UPDATE user SET isActive = 0 WHERE userID = ". $userID;
	if($_SESSION['userID'] == $userID) //user has deleted themselves
	{
		if(!mysqli_query($db, $sql))
		{
			echo("SQLERROR");
			die();
		}
		session_destroy();
		header("Location: /SDP/home.php");
	}
	elseif($_SESSION['userID'] != $userID && $_SESSION['userType'] > 2) // a system admin has deleted another profile
	{
		if(!mysqli_query($db, $sql))
		{
			echo("SQLERROR");
			die();
		}
		header("Location: /SDP/home.php");
	}
	else // impossible
	{
		echo("FAILURE");
	}
?>