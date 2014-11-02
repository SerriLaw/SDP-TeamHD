<?php
	session_start();
	include("db.php");
	$roleID = $_GET['roleid'];
	$sql = "UPDATE role SET isActive = 0 WHERE roleID = " . $roleID;
	if(!mysqli_query($db,$sql))
	{
		echo("ERROR");
		die();
	}
	else
	{
		echo("SUCCESS");
		header('location: /SDP/home.php']);
	}
?>