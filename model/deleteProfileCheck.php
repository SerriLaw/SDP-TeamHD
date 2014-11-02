<?php
	session_start();
	include("db.php");
	$userID = mysqli_real_escape_string($db,$_POST['userID']);
	$userType = mysqli_real_escape_string($db,$_POST['userType']);
	if($_SESSION['userID'] == $userID) //the user is trying to delete themselves
	{
		if($userType < 2) // the user is a volunteer or sprout
		{
			$sql = "SELECT * FROM role JOIN application ON(role.roleID = application.roleID) WHERE userID = " . $userID;
			$result = mysqli_query($db, $sql);
			$count = mysqli_num_rows($result);
			if($count > 0) //the user is assigned to any roles past or future
			{
				while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					if($row['endDate'] > date("Y-m-d")) // if the user is assigned to future roles
					{
					echo("CURRENT");
					die();
					}
				}
				echo("SUCCESS");
				die();
			}
			else // the user is not assigned to any roles
			{
				echo("SUCCESS");
				die();
			}
		}
		elseif($userType > 1) //the user is an event manager or above
		{
			$sql = "SELECT * FROM event WHERE managerID = " . $_SESSION['userID'];
			$result = mysqli_query($db, $sql);
			$count = mysqli_num_rows($result);
			if($count > 0) // the event manager is managing any events past or future
			{
				while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					if($row['endDate'] > date("Y-m-d")) // the event manager is managing events in the future
					{
						echo("CURRENT");
						die();
					}
				}
				echo("SUCCESS");
				die();
			}
		}
		else //shouldn't be possible to reach here
		{
			echo("FAILURE");
		}
	}
	elseif ($_SESSION['userID'] != $userID && $_SESSION['userType'] > 2) //the user is a system admin trying to delete another profile
	{
		if($userType < 2) // the profile is a volunteer or sprout
		{
			$sql = "SELECT * FROM role JOIN application ON(role.roleID = application.roleID) WHERE userID = " . $userID;
			$result = mysqli_query($db, $sql);
			$count = mysqli_num_rows($result);
			if($count > 0) //the user is assigned to any roles past or future
			{
				while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					if($row['endDate'] > date("Y-m-d")) // if the user is assigned to future roles
					{
					echo("CURRENT");
					die();
					}
				}
				echo("SUCCESS");
				die();
			}
			else // the user is not assigned to any roles
			{
				echo("SUCCESS");
				die();
			}
		}
		elseif($userType > 1) // the profile is an event manager or system admin
		{
			$sql = "SELECT * FROM event WHERE managerID = " . $userID;
			$result = mysqli_query($db, $sql);
			$count = mysqli_num_rows($result);
			echo($count);
			if($count > 0) // the event manager is managing any events past or future
			{
				while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					if($row['endDate'] > date("Y-m-d")) // the event manager is managing events in the future
					{
						echo("CURRENT");
						die();
					}
				}
				echo("SUCCESS");
				die();
			}
			echo("SUCCESS");
			die();
		}
		else
		{
			echo("FAILURE");
		}
	}
	else
	{
		echo("FAILURE");
	}

?>