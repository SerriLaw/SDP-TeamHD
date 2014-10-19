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
		<title>BeanSprouts</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/main.min.css">
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
		<script src="/SDP/view/js/script.js"></script>
	</head>
	<body>
		<div id="nav-bar">
			<span id="ham"><a href="#" onClick="$('.h').toggle()"><i class="fa fa-bars"></i></a></span>
			<ul>
				<li><a href=""><img src="img/icon.png" alt="BeanSprouts"><span id="logo">BeanSprouts</span></a></li>
				<li class="h"><a href="login.php">Login</a></li>
				<li class="h"><a href="">Register</a></li>
				<li class="h"><a href="viewEvent.php">View Events</a></li>
			</ul>			
		</div>
		<h1>Welcome to the User Dashboard</h1>
		<a href="/SDP/model/logout.php">Logout</a>
	</body>
</html>