<html>
	<head>
		<title>BeanSprouts - My Events</title>
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
		<h1><?php echo($row2['firstName'] ." " . $row2['lastName'] . "'s Events"); ?></h1>
		<h2>Upcoming Events</h2>
		<table border="1px">
			<tr>
				<td>Event Name</td>
				<td>Event Description</td>
				<td>Event Start Date</td>
				<td>Event End Date</td>
				<td>View Report</td>
			</tr>
			<?php
				while($row = mysqli_fetch_array($result))
				{
					echo('
						<tr>
							<td>'.$row['name'].'</td>
							<td>'.$row['description'].'</td>
							<td>'.$row['startDate'].'</td>
							<td>'.$row['endDate'].'</td>
							<td><a href="/SDP/eventReport.php?eventid='.$row['eventID'].'">View</a></td>
						</tr>
						');
				}
			?>
		</table>
		<br>

		<h2>Past Events</h2>
		<table border="1px">
			<tr>
				<td>Event Name</td>
				<td>Event Description</td>
				<td>Event Start Date</td>
				<td>Event End Date</td>
				<td>View Report</td>
			</tr>
			<?php
				while($row1 = mysqli_fetch_array($result1))
				{
					echo('
						<tr>
							<td>'.$row1['name'].'</td>
							<td>'.$row1['description'].'</td>
							<td>'.$row1['startDate'].'</td>
							<td>'.$row1['endDate'].'</td>
							<td><a href="/SDP/eventReport.php?eventid='.$row1['eventID'].'">View</a></td>
						</tr>
						');
				}
			?>
		</div>
	</body>
</html>