<?php
	session_start();
	//if no user is logged in redirect them back to the login page
	if(empty($_SESSION))
	{
		 echo "empty session";
	}
?>
<html>
	<head>

	</head>
	<body>
		<h1>Welcome to the User Dashboard</h1>
		<a href="/SDP/model/logout.php">Logout</a>
	</body>
</html>