<?php
	session_start();
	include("db.php");
	$roleID = $_POST['roleID'];
	$sql = "SELECT date FROM roleHours WHERE roleID = " . $roleID;
	$result = mysqli_query($db, $sql);
	if (date("Y-md-") > $result) //If the Role is over
	{
		echo("FINISHED");
		die();
	}
	else //The role is current
	{
		$sql1 = "SELECT userID FROM role WHERE roleID = " . $roleID;
		$result1 = mysqli_query($db, $sql1);
		$row = mysqli_fetch_array($result1,MYSQLI_ASSOC);
		if($row['userID'] !== null) // The role has a volunteer attached
		{
			echo("ATTACHED");
			die();
		}
		else
		{
			$sql2 ="SELECT userID FROM application WHERE roleID = " . $roleID;
			$result2 = mysqli_query($db, $sql2);
			$row1 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
			if($row1['userID'] !== null) // the role has applicant(s) attached
			{
				echo("ATTACHED");
				die();
			}
		}
		$sql3 = "UPDATE role SET isActive = 0 WHERE roleID = " . $roleID;
		if(!mysqli_query($db,$sql3))
		{
			echo("ERROR");
			die();
		}
		echo("DELETED");
	}
?>