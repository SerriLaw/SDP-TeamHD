<?php
	session_start();
	error_reporting(0);
	include("db.php");
	$activityID = $_GET['activityid'];
	if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['location']) && isset($_POST['startTime']) && isset($_POST['endTime']))
	{
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$description = mysqli_real_escape_string($db,$_POST['description']);
		$startDate = mysqli_real_escape_string($db,$_POST['startDate']);
		$endDate = mysqli_real_escape_string($db,$_POST['endDate']);
		$location = mysqli_real_escape_string($db,$_POST['location']);
		$startTime = mysqli_real_escape_string($db,$_POST['startTime']);
		$endTime = mysqli_real_escape_string($db,$_POST['endTime']);

		$sql = "UPDATE activity SET name='" . $name . "', description='" . $description . "', startDate='" . $startDate . "', endDate='" . $endDate . "', location='" . $location . "', startTime='" . $startTime . "', endTime='" . $endTime . "' WHERE activityID=" . $activityID;
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