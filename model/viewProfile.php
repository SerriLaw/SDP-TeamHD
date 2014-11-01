<?php
	include("db.php");
	if(empty($_SESSION))
	{
		header( 'Location: /SDP/home.php' );
	}
	elseif($_GET['userid'] == $_SESSION['userID']) // user is viewing their own profile
	{
		$userID = $_GET['userid'];
		if($_SESSION['userType'] < 2) // the user is a student
		{	
			$sql = 'SELECT * FROM user JOIN student ON user.userID=student.userID WHERE user.userID = ' . $userID;
		}
		elseif($_SESSION['userType'] > 1) // the user is staff
		{
			$sql = 'SELECT * FROM user JOIN staff ON user.userID=staff.userID WHERE user.userID = ' . $userID;
		}
	}
	elseif($_SESSION['userType'] > 1) // the user is not viewing their own profile and is a manager or system admin
	{
		$userID = $_GET['userid'];
		$sql1 = "SELECT userType FROM user WHERE userID = " . $userID;
		$result1 = mysqli_query($db, $sql1);
		if($result1 < 2) // the user is a student
		{
			$sql = 'SELECT * FROM user JOIN student ON user.userID=student.userID WHERE user.userID = ' . $userID;
		}
		elseif($result1 > 1) // the user is staff
		{
			$sql = 'SELECT * FROM user JOIN staff ON user.userID=staff.userID WHERE user.userID = ' . $userID;
		}
	}
	else
	{
		echo("FAILUURE");
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
		echo($sql);
	} 
?>