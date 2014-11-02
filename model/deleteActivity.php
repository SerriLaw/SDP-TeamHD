<?php
	session_start();
	include("db.php");
	$activityID = $_GET['activityid'];
	$sql = "SELECT roleID FROM role WHERE activityID = " . $activityID;
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	if($count > 0)
	{
		
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) //for each role
		{
			$sql1 = "UPDATE role SET isActive = 0 WHERE roleID = " . $row['roleID'];
			if(!mysqli_query($db,$sql1))
				{
					echo("HELP1");
					die();
				}
		}
		$sql2 = "UPDATE activity SET isActive = 0 WHERE activityID = " . $activityID;
		if(!mysqli_query($db,$sql2))
		{
			echo("HELP2");
			die();
		}
		echo("SUCCESS");
		header('location: /SDP/home.php');
	}
	else
	{
		echo("ERROR");
	}
?>