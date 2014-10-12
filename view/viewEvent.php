<?php
	//session_start();
	include('../model/viewEvent.php');
?>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/main.min.css">
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">

		</script>
	</head>
	<body>
		<div id="nav-bar">
			<ul>
				<li><a href=""><img src="img/icon.png" alt="BeanSprouts"><span id="logo">BeanSprouts</span></a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="">Register</a></li>
				<li><a href="viewEvent.php">View Events</a></li>
			</ul>
		</div>


		<div id="eventID">Event ID: <?php echo($row['eventID']); ?></div> <br>
		<div id="name">Event Name: <?php echo($row['name']); ?></div> <br>
		<div id="description">Event Description: <?php echo($row['description']); ?></div> <br>
		<div id="startDate">Event Start Date: <?php echo($row['startDate']); ?></div> <br>
		<div id="endDate">Event End Date: <?php echo($row['endDate']); ?></div> <br>
		<div id="location">Event Location: <?php echo($row['location']); ?></div> <br>
	</body>
</html>