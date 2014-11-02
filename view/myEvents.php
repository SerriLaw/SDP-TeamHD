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
			<div class="heroname"><?php echo($row2['firstName'] ." " . $row2['lastName'] . "'s Events"); ?></div>
			<div class="heroname">Upcoming Events</div>
			<table class="event-table">
				<tr>
					<th>Event Name</th>
					<th>Description</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Report</th>
				</tr>
				<?php
					while($row = mysqli_fetch_array($result))
					{
						echo('
							<tr>
								<td>'.$row['name'].'</td>
								<td>'.$row['description'].'</td>
								<td class="dateToForm">'.$row['startDate'].'</td>
								<td class="dateToForm">'.$row['endDate'].'</td>
								<td><a href="/SDP/eventReport.php?eventid='.$row['eventID'].'">View</a></td>
							</tr>
							');
					}
				?>
			</table>
			<br>

			<div class="heroname">Past Events</div>
			<table class="event-table">
				<tr>
					<th>Event Name</th>
					<th>Description</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>View Report</th>
				</tr>
				<?php
					while($row1 = mysqli_fetch_array($result1))
					{
						echo('
							<tr>
								<td>'.$row1['name'].'</td>
								<td>'.$row1['description'].'</td>
								<td class="dateToForm">'.$row1['startDate'].'</td>
								<td class="dateToForm">'.$row1['endDate'].'</td>
								<td><a href="/SDP/eventReport.php?eventid='.$row1['eventID'].'">View</a></td>
							</tr>
							');
					}
				?>
		</div>
	</body>
</html>