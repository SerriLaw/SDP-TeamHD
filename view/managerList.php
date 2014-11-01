<html>
	<head>
		<title>BeanSprouts - Managers</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="view/img/icon.png">
		<link rel="stylesheet" type="text/css" href="view/css/main.min.css">
		<script src="view/js/jquery-1.11.1.min.js"></script>
		<script src="view/js/script.js"></script>
	</head>
	<body>
		<?php include('../SDP/menu.php');?>
		<div id="wrap">
		<h1>Active Event Managers and Admins</h1>
		<?php
		while($row = mysqli_fetch_array($result))
		{
			if($row['userType'] ==2){echo("Event Manager ");}else{echo("System Administrator ");}  echo($row['userID'] . " " . $row['firstName'] . " " . $row['lastName'] . ' <a href ="viewProfile.php?userid=' . $row['userID'] . '">View Profile</a>' . "<br>");
		}
		?>
		<h1>Inactive Event Managers and Admins</h1>
		<?php
		while($row1 = mysqli_fetch_array($result1))
		{
			if($row1['userType'] ==2){echo("Event Manager ");}else{echo("System Administrator ");} echo($row1['userID'] . " " . $row1['firstName'] . " " . $row1['lastName'] . ' <a href ="viewProfile.php?userid=' . $row1['userID'] . '">View Profile</a>' . "<br>");
		}
		?>
	</div>
	</body>
</html>