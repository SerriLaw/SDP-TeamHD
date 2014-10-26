<?php
	session_start();
	include("db.php");
	$userID = mysqli_real_escape_string($db,$_POST['userID']);
	$userType = mysqli_real_escape_string($db,$_POST['userType']);
	if($_SESSION['userID'] == $userID) //the user is trying to delete themselves
	{
		if($userType < 2) // the user is a volunteer
		{
			$sql = "SELECT userID FROM role WHERE userID = " . $userID;
			$result = mysqli_query($db, $sql);
			$count = mysqli_num_rows($result);
			if($count > 0) //the user is assigned to any roles
			{
				echo("CURRENT");
				die();
			}
			else
			{
				echo("SUCCESS");
				die();
			}
		}
		elseif($userType > 1) //the user is an event manager or above
		{
			
		}
		else()
		{
			echo("FAILURE");
		}
	}
	elseif () //the user is an event manager or higher and trying to delete a volunteer or sprout
	{
		
	}
	else
	{
		echo("FAILURE");
	}

?>