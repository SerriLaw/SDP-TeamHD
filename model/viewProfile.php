<?php
	include("db.php");
	//edit fix
	if(!empty($_GET['userid']) && $_GET['userid'] == $_SESSION['userID'])
	{
		$_GET['userid'] = null;
	}
	//end edit fix
	if(!empty($_GET['userid']) && $_SESSION['userType'] > 1) // user is an event manager and is viewing the profile of an applicant
	{
		$userID = $_GET['userid'];
		$sql = 'SELECT * FROM user JOIN student ON user.userID=student.userID WHERE user.userID = ' . $userID;
	}
	elseif(empty($_GET['userid']) && $_SESSION['userType'] < 2) // the user wants to view their own profile and is a student
	{
		$userID = $_SESSION['userID'];
		$sql = 'SELECT * FROM user JOIN student ON user.userID=student.userID WHERE user.userID = ' . $userID;
	}
	elseif(empty($_GET['userid']) && $_SESSION['userType'] > 1) // the user wants to view their own profile and is a staff member;
	{
		$userID = $_SESSION['userID'];
		$sql = 'SELECT * FROM user JOIN staff ON user.userID=staff.userID WHERE user.userID = ' . $userID;
	}
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	$row = array('name' => 'FAILURE');
	if ($count == 1) //only one user in the system
	{
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$userName = $row['firstName'] . " " . $row['lastName'] . "'s Profile";
		if($row['userType'] < 2)
		{
			$sql1 = "SELECT name FROM course WHERE courseID = (SELECT courseID FROM student WHERE userID =" . $row['userID'] . ")";
			$result1 = mysqli_query($db, $sql1);
			$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
		}
		if($row['gender'] == 'm')
		{
			$gender = "male";
		}
		else
		{
			$gender = "female";
		}
		if($row['userType'] == 0) 
		{
			$userType = "Volunteer";
		}
		elseif($row['userType'] == 1)
		{
			$userType = "Sprout";
		}
		elseif($row['userType'] == 2)
		{
			$userType = "Event Manager";
		}
		elseif($row['userType'] > 2)
		{
			$userType = "System Admin";
		}
	}
	else
	{
		echo("FAILURE");
	} 
?>