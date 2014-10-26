<?php 
	session_start();
	include("db.php");
	if (isset($_POST['name']) && isset($_POST['isPaid']) && isset($_POST['description']) && isset($_POST['requirements']) && isset($_POST['activityID']) && isset($_POST['date']) && isset($_POST['startTime']) && isset($_POST['endTime'])) 
	{
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$isPaid = mysqli_real_escape_string($db,$_POST['isPaid']);
		$description = mysqli_real_escape_string($db,$_POST['description']);
		$requirements = mysqli_real_escape_string($db,$_POST['requirements']);
		$rate = mysqli_real_escape_string($db,$_POST['rate']);
		$activityID = mysqli_real_escape_string($db,$_POST['activityID']);
		$date = mysqli_real_escape_string($db,$_POST['date']);
		$startTime = mysqli_real_escape_string($db,$_POST['startTime']);
		$endTime= mysqli_real_escape_string($db,$_POST['endTime']);

		$sql = "INSERT INTO role (name, isPaid, description, requirements, rate, activityID) VALUES ('$name', '$isPaid', '$description', '$requirements', '$rate', '$activityID');";
		if (!mysqli_query($db,$sql)) 
		{
			echo("SQLFAILURE");
			die('Error: ' . mysqli_error($db));
		}
		else
		{
			$sql2 = "SELECT MAX(roleID) FROM role;";
			$qry = mysqli_query($db,$sql2);
			$result=mysqli_fetch_array($qry,MYSQLI_ASSOC);
			$roleID = implode(" ", $result);
			$sql1 = "INSERT INTO roleHours (roleID, date, startTime, endTime) VALUES ('$roleID','$date', '$startTime', '$endTime')";
			if (!mysqli_query($db,$sql1)) 
			{
				echo("SQLFAILURE1");
			}
			else
			{
				echo($roleID);
			}
		}
	}
	else
	{
		echo("FAILURE");
	}
?>