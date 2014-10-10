<?php
	//session_start();
	include('../model/viewEvent.php');
?>
<html>
	<head>
		<script src="/SDP/view/js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">

		</script>
	</head>
	<body>
		<div id="eventID">Event ID: <?php echo($row['eventID']); ?></div> <br>
		<div id="name">Event Name: <?php echo($row['name']); ?></div> <br>
		<div id="description">Event Description: <?php echo($row['description']); ?></div> <br>
		<div id="startDate">Event Start Date: <?php echo($row['startDate']); ?></div> <br>
		<div id="endDate">Event End Date: <?php echo($row['endDate']); ?></div> <br>
		<div id="location">Event Location: <?php echo($row['location']); ?></div> <br>
	</body>
</html>