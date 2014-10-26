<?php
	session_start();
	include("db.php");
	$eventID = $_POST['eventID'];
	$sql = "SELECT endDate FROM event WHERE eventID = " . $eventID;
	$result = mysqli_query($db, $sql);
	if (date("Y-md-") > $result) //If the event is over
	{
		echo("FINISHED");
		die();
	}
	else //the event is current
	{
		$sql1 = "SELECT activityID FROM activity WHERE eventID = " . $eventID;
		$result = mysqli_query($db, $sql1);
		$count = mysqli_num_rows($result);
		if($count > 0) // the event has an activity attached
		{
			echo("ACTIVITY");
		}
		else
		{
			$sql2 = "UPDATE event set isActive = 0 WHERE eventID = " . $eventID;
			if(!mysqli_query($db, $sql2))
			{
				echo("ERROR");
				die();
			}
			echo("DELETED");
		}
	}
?>