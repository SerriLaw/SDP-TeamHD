<html>
	<head>
		<title>BeanSprouts - Past Events</title>
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
			<div class="heroname">Past Events</div>
			<table class="event-table">
				<tr>
					<th>Event Name</th>
					<th>Activity Name</th>
					<th>Role Name</th>
					<th>Role Description</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>View</th>
				</tr>
				<?php
					
					while($row = mysqli_fetch_array($result))
					{
						echo('
							<tr>
								<td>'.$row[0].'</td>
								<td>'.$row[1].'</td>
								<td>'.$row[2].'</td>
								<td>'.$row[3].'</td>
								<td class="dateToForm">'.$row[4].'</td>
								<td class="dateToForm">'.$row[5].'</td>
								<td><a href="/SDP/viewRole.php?roleid='.$row[6].'">View</a></td>
							</tr>
							');
					}
				?>
		</table>
		</div>
	</body>
</html>