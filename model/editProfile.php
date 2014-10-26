<?php
	include("db.php");
	$userID = mysqli_real_escape_string($db,$_POST['userID']);
	$firstName = mysqli_real_escape_string($db,$_POST['firstName']);
	$lastName = mysqli_real_escape_string($db,$_POST['lastName']);
	$email =  mysqli_real_escape_string($db,$_POST['email']);
	$phone = mysqli_real_escape_string($db,$_POST['phone']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$dateOfBirth = mysqli_real_escape_string($db,$_POST['dateOfBirth']);
	$gender = mysqli_real_escape_string($db,$_POST['gender']);

	if($_POST['userType'] < 2) //user is a volunteer or sprout
	{
		$courseID = mysqli_real_escape_string($db,$_POST['courseID']);
		$skills = mysqli_real_escape_string($db,$_POST['skills']);
		$experience = mysqli_real_escape_string($db,$_POST['experience']);
		$sql = "UPDATE user JOIN student ON(user.userID = student.userID) SET firstName='" . $firstName . "', lastName='" . $lastName . "', email='" . $email . "', phone='" . $phone . "', password='" . $password . "', DOB='" . $dateOfBirth . "', gender='" . $gender . "', courseID='" . $courseID . "', skills='" . $skills . "', experience='" . $experience . "'";
		if(!mysqli_query($db,$sql))	
		{
			echo("ERROR1");
		}
		else
		{
			echo("SUCCESS");
		}
	}
	elseif($_POST['userType'] > 1) // user is an event manager or system admin
	{
		$department = mysqli_real_escape_string($db,$_POST['department']);
		$role = mysqli_real_escape_string($db,$_POST['role']);
		$sql = "UPDATE user JOIN staff ON(user.userID = staff.userID) SET firstName='" . $firstName . "', lastName='" . $lastName . "', email='" . $email . "', phone='" . $phone . "', password='" . $password . "', DOB='" . $dateOfBirth . "', gender='" . $gender . "', department='" . $department . "', role='" . $role . "'";
		if(!mysqli_query($db,$sql))
		{
			echo("ERROR2");
		}
		else
		{
			echo("SUCCESS");
		}

	}
?>