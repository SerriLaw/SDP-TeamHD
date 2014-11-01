<?php
	session_start();
	include("db.php");
	if(isset($_POST['studentID']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['dateOfBirth']) && isset($_POST['gender']) && isset($_POST['courseID']) && isset($_POST['skills']) && isset($_POST['experience']))
	{
		$studentID = mysqli_real_escape_string($db,$_POST['studentID']);
		$firstName = mysqli_real_escape_string($db,$_POST['firstName']);
		$lastName = mysqli_real_escape_string($db,$_POST['lastName']);
		$email =  mysqli_real_escape_string($db,$_POST['email']);
		$phone = mysqli_real_escape_string($db,$_POST['phone']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$dateOfBirth = mysqli_real_escape_string($db,$_POST['dateOfBirth']);
		$gender = mysqli_real_escape_string($db,$_POST['gender']);
		$courseID = mysqli_real_escape_string($db,$_POST['courseID']);
		$skills = mysqli_real_escape_string($db,$_POST['skills']);
		$experience = mysqli_real_escape_string($db,$_POST['experience']);

		$sql = "INSERT INTO user (userID, firstName, lastName, email, password, phone, DOB, gender, userType, isActive) VALUES ('$studentID', '$firstName', '$lastName', '$email', '$password', '$phone', '$dateOfBirth', '$gender', '0', '1'); ";
		$sql1 = "INSERT INTO student (userID, skills, experience, courseID) VALUES('$studentID', '$skills', '$experience', '$courseID');";
		$sql2 = "SELECT userID FROM user WHERE userID = $studentID";
		$sql3 = "SELECT email FROM user WHERE email = '$email'";
		$result2 = mysqli_query($db,$sql2);
		$result3 = mysqli_query($db,$sql3);
		$count2 = mysqli_num_rows($result2);
		$count3 = mysqli_num_rows($result3);
		if($count2 > 0 || $count3 > 0)
		{
			echo("EXISTS");			
		}
		elseif (!mysqli_query($db,$sql) || !mysqli_query($db,$sql1))
		{
			echo("FAILURE");
			echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
		}
		else
		{
			echo("SUCCESS");
			echo($sql);
			echo($sql1);
		}
	}
?>