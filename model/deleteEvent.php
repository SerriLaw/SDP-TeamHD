<?php
	session_start();
	include("db.php");
	$eventID = $_GET['eventid'];
	$sql = "SELECT activityID FROM activity WHERE eventID = " . $eventID;
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	if($count > 0)
	{
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) //for each activity
		{
			$sql1 = "SELECT roleID FROM role WHERE activityID = " . $row['activityID'];
			$result1 = mysqli_query($db, $sql1);
			$count1 = mysqli_num_rows($result1);
			if($count1 > 0) // if there are roles associated with the event
			{
				while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)) //for each role
				{
					$sql2 = "UPDATE role SET isActive = 0 WHERE roleID = " . $row1['roleID'];
					if(!mysqli_query($db,$sql2))
					{
						echo("HELP1");
						die();
					}
				}
			}
			$sql3 = "UPDATE activity SET isActive = 0 WHERE activityID = " . $row['activityID'];
			if(!mysqli_query($db,$sql3))
			{
				echo("HELP2");
				die();
			}
		}
		$sql4 = "UPDATE event SET isActive = 0 WHERE eventID = " . $eventID;
		if(!mysqli_query($db,$sql4))
		{
			echo("HELP3");
			die();
		}
		echo("SUCCESS");
	}
	else
	{
		echo("ERROR");
	}
?>