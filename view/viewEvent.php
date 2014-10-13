<?php
	//session_start();
	include('../model/viewEvent.php');
?>
<html>
	<head>
		<title>BeanSprouts</title>
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/main.min.css">
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">

		</script>
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

		<div id="wrap">
			<div id="eventID">Event ID: <?php echo($row['eventID']); ?></div>
			<div id="name"><?php echo($row['name']); ?></div>
			<div id="description"><?php echo($row['description']); ?></div>
			<div id="startDate"><?php echo($row['startDate']); ?></div>
			<div id="endDate"><?php echo($row['endDate']); ?></div>
			<div id="location"><?php echo($row['location']); ?></div>
		</div>
	</body>
</html>