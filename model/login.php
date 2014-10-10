<?php
	session_start(); // start a session between the website and our user
	include("db.php"); // grab the database
	//if username and password accepted in the form
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		//get username and password. Username and Password formatted and passowrd encrypted
		$username=mysqli_real_escape_string($db,$_POST['username']);
		$password=mysqli_real_escape_string($db,$_POST['password']);
		//grab primary key from database to use as an identifier for session
		$result=mysqli_query($db, "SELECT * FROM user WHERE userID='$username' and password='$password'");
		$count=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($count==1) //if there is a single matching record
		{
			foreach ($row as $key => $value) {
				$_SESSION[$key] = $value;
			}

			echo("SUCCESS");
		}else{
			echo("FAILURE");
			session_destroy();
		}
	}
?>