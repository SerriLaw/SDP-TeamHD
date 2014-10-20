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
		<script src="/SDP/view/js/script.js"></script>
		
		<script>
			$(document).ready(function() {
			    dateFormat("#date1");
			});
		</script>

	</head>
	<body>
		<div id="nav-bar">
			<span id="ham"><a href="#" onClick="$('.h').toggle()"><i class="fa fa-bars"></i></a></span>
			<ul>
				<li><a href=""><img src="img/icon.png" alt="BeanSprouts"><span id="logo">BeanSprouts</span></a></li>
				<li class="h"><a href="login.php">Login</a></li>
				<li class="h"><a href="">Register</a></li>
				<li class="h"><a href="">View Events</a></li>
			</ul>			
		</div>

		<div id="wrap">
			<!-- <div id="eventID">Event ID: <?php echo($row['eventID']); ?></div> -->
			<div id="hero">
				<img src="img/BeanSprouts_large.png" alt="BeanSprouts Event" id="eventimg">
				<div id="name"><?php echo($row['name']); ?></div>
			</div>
			<div id="container">
				<div id="startDate" class="date"><i class="fa fa-calendar"></i> <span id="date1"><?php echo($row['startDate']); ?></span></div>
				<div id="startTime" class="time"><i class="fa fa-clock-o"></i> Start time: </div>



				<div id="location"><?php echo($row['location']); ?></div>

				<div id="description"><?php echo($row['description']); ?></div>
			</div>

			
		</div>
	</body>
</html>