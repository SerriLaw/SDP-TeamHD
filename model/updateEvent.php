<?php
	session_start();
	error_reporting(0);
	include("db.php");
	$eventID = $_GET['id'];
	if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['location']))
	{
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$description = mysqli_real_escape_string($db,$_POST['description']);
		$startDate = mysqli_real_escape_string($db,$_POST['startDate']);
		$endDate = mysqli_real_escape_string($db,$_POST['endDate']);
		$location = mysqli_real_escape_string($db,$_POST['location']);

		$sql = "UPDATE event SET name='" . $name . "', description='" . $description . "', startDate='" . $startDate . "', endDate='" . $endDate . "', location='" . $location . "' WHERE eventID=" . $eventID;
		if (!mysqli_query($db,$sql))
		{
			echo($sql);
			echo("SQLFAILURE");
			die('Error: ' . msqli_error($db));
		}
		echo("SUCCESS");
	}
	else{
		echo("FAILURE");
	}
?>