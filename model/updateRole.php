<?php 
	session_start();
	include("db.php");
	$roleID = $_GET['roleid'];
	if (isset($_POST['name']) && isset($_POST['isPaid']) && isset($_POST['description']) && isset($_POST['requirements']) && isset($_POST['date']) && isset($_POST['startTime']) && isset($_POST['endTime'])) 
	{
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$isPaid = mysqli_real_escape_string($db,$_POST['isPaid']);
		$description = mysqli_real_escape_string($db,$_POST['description']);
		$requirements = mysqli_real_escape_string($db,$_POST['requirements']);
		$rate = mysqli_real_escape_string($db,$_POST['rate']);
		$date = mysqli_real_escape_string($db,$_POST['date']);
		$startTime = mysqli_real_escape_string($db,$_POST['startTime']);
		$endTime= mysqli_real_escape_string($db,$_POST['endTime']);

		$sql = "UPDATE role SET name='" . $name . "', isPaid='" . $isPaid . "', description='" . $description . "', requirements='" . $requirements . "', rate='" . $rate . "' WHERE roleID = " . $roleID;
		if (!mysqli_query($db,$sql)) 
		{
			echo("SQLFAILURE");
			die('Error: ' . mysqli_error($db));
		}
		else
		{
			$sql1 = "INSERT INTO roleHours (roleID, date, startTime, endTime) VALUES ('$roleID','$date', '$startTime', '$endTime')";
			$sql1 = "UPDATE roleHOURS set date='" . $date . "', startTime='" . $startTime . "', endTime='" . $endTime . "' WHERE roleID =" . $roleID ;
			if (!mysqli_query($db,$sql1)) 
			{
				echo("SQLFAILURE1");
			}
			else
			{
				echo("SUCCESS");
			}
		}
	}
	else
	{
		echo("FAILURE");
	}
?>