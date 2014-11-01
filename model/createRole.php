<?php 
	session_start();
	include("db.php");
	if (isset($_POST['name']) && isset($_POST['isPaid']) && isset($_POST['description']) && isset($_POST['requirements']) && isset($_POST['activityID']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['startTime']) && isset($_POST['endTime'])) 
	{
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$isPaid = mysqli_real_escape_string($db,$_POST['isPaid']);
		$description = mysqli_real_escape_string($db,$_POST['description']);
		$requirements = mysqli_real_escape_string($db,$_POST['requirements']);
		$activityID = mysqli_real_escape_string($db,$_POST['activityID']);
		$startDate = mysqli_real_escape_string($db,$_POST['startDate']);
		$endDate = mysqli_real_escape_string($db,$_POST['endDate']);
		$startTime = mysqli_real_escape_string($db,$_POST['startTime']);
		$endTime= mysqli_real_escape_string($db,$_POST['endTime']);

		$sql = "INSERT INTO role (name, isPaid, description, requirements, startDate, endDate, startTime, endTime, activityID) VALUES ('$name', '$isPaid', '$description', '$requirements', '$startDate', '$endDate', '$startTime', '$endTime', '$activityID');";
		if (!mysqli_query($db,$sql)) 
		{
			echo("SQLFAILURE");
			die('Error: ' . mysqli_error($db));
		}
			$sql1 = "SELECT MAX(eventID) FROM event;";
			$qry = mysqli_query($db,$sql1);
			$result=mysqli_fetch_array($qry,MYSQLI_ASSOC);
			echo(implode(" ", $result));
	}
	else
	{
		echo("FAILURE");
	}
?>