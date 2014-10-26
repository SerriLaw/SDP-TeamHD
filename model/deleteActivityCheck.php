<?php
	session_start();
	include("db.php");
	$activityID = $_POST['activityID'];
	$sql = "SELECT endDate FROM activity WHERE activityID = " . $activityID;
	$result = mysqli_query($db, $sql);
	if (date("Y-md-") > $result) //If the Activity is over
	{
		echo("FINISHED");
		die();
	}
	else //the activity is current
	{
		$sql1 = "SELECT roleID FROM role WHERE activityID = " . $activityID;
		$result = mysqli_query($db, $sql1);
		$count = mysqli_num_rows($result);
		if($count > 0) // the activity has a role attached
		{
			echo("ROLE");
		}
		else
		{
			$sql2 = "UPDATE activity SET isActive = 0 WHERE activityID = " . $activityID;
			if(!mysqli_query($db, $sql2))
			{
				echo("ERROR");
				die();
			}
			echo("DELETED");
		}
	}
?>