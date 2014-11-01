<?php 
    session_start();
	include("db.php");
	if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['location']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['startTime']) && isset($_POST['endTime'])) 
	{
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$description = mysqli_real_escape_string($db,$_POST['description']);
		$location = mysqli_real_escape_string($db,$_POST['location']);
		$startDate = mysqli_real_escape_string($db,$_POST['startDate']);
		$endDate = mysqli_real_escape_string($db,$_POST['endDate']);
		$startTime = mysqli_real_escape_string($db,$_POST['startTime']);
		$endTime = mysqli_real_escape_string($db,$_POST['endTime']);
		$eventID = mysqli_real_escape_string($db,$_POST['eventID']);

		$sql = "INSERT INTO activity (name, description, location, startDate, endDate, startTime, endTime, eventID) VALUES ('$name', '$description', '$location', '$startDate', '$endDate', '$startTime', '$endTime', '$eventID');";
		if (!mysqli_query($db,$sql)) {
			echo("SQLFAILURE");
			die('Error: ' . mysqli_error($db));
		}
		else{
			$sql1 = "SELECT MAX(activityID) FROM activity;";
			$qry = mysqli_query($db,$sql1);
			$result=mysqli_fetch_array($qry,MYSQLI_ASSOC);
			echo(implode(" ", $result));
		}
	}
	else{
		echo("FAILURE");
	}
?>