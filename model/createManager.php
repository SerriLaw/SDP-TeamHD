<?php
	if(isset($_POST['userID']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['dateOfBirth']) && isset($_POST['gender']) && isset($_POST['department']) && isset($_POST['role']))
	{
		include('db.php');
		$userID = mysqli_real_escape_string($db,$_POST['userID']);
		$firstName = mysqli_real_escape_string($db,$_POST['firstName']);
		$lastName = mysqli_real_escape_string($db,$_POST['lastName']);
		$email =  mysqli_real_escape_string($db,$_POST['email']);
		$phone = mysqli_real_escape_string($db,$_POST['phone']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$dateOfBirth = mysqli_real_escape_string($db,$_POST['dateOfBirth']);
		$gender = mysqli_real_escape_string($db,$_POST['gender']);
		$department = mysqli_real_escape_string($db,$_POST['department']);
		$role = mysqli_real_escape_string($db,$_POST['role']);

		$sql = "INSERT INTO user (userID, firstName, lastName, email, password, phone, DOB, gender, userType, isActive) VALUES ('$userID', '$firstName', '$lastName', '$email', '$password', '$phone', '$dateOfBirth', '$gender', '2', '1'); ";
		$sql1 = "INSERT INTO staff (userID, department, role) VALUES('$userID', '$department', '$role');";
		$sql2 = "SELECT userID FROM user WHERE userID = $userID";
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