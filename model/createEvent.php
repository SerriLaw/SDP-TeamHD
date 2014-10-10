<?php
	session_start();
	error_reporting(0);
	include("db.php");
	if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['location']) && isset($_POST['managerID'])) {
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$description = mysqli_real_escape_string($db,$_POST['description']);
		$startDate = mysqli_real_escape_string($db,$_POST['startDate']);
		$endDate = mysqli_real_escape_string($db,$_POST['endDate']);
		$location = mysqli_real_escape_string($db,$_POST['location']);
		$managerID = mysqli_real_escape_string($db,$_POST['managerID']);

		$sql = "INSERT INTO event (name, description, startDate, endDate ,location, managerID) VALUES ('$name', '$description', '$startDate', '$endDate', '$location', '$managerID')";
		if (!mysqli_query($db,$sql)) {
			echo("SQLFAILURE");
			die('Error: ' . msqli_error($db));
		}
		else{
			$sql1 = "SELECT MAX(eventID) FROM event;";
			$qry = mysqli_query($db,$sql1);
			$result=mysqli_fetch_array($qry,MYSQLI_ASSOC);
			echo(implode(" ", $result));
		}
	}
	else{
		echo("FAILURE");
	}
?>