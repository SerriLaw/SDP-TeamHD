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
		$sql1 = "SELECT * FROM application WHERE roleID = " . $roleID;
		$result1 = mysqli_query($db, $sql1);
		$count1 = mysqli_num_rows($result1);
		$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
		if($count1 > 0 && $row1['status'] != 2) // The role has a volunteer attached that isn't ignored
		{
			echo("ATTACHED");
			die();
		}
		else //delete the role
		{
			$sql3 = "UPDATE role SET isActive = 0 WHERE roleID = " . $roleID;
			if(!mysqli_query($db,$sql3))
			{
				echo("ERROR");
				die();
			}
			echo("DELETED");
		}
	}
?>