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
		<h1>Future Events</h1>
		<table border="1px">
			<tr>
				<td>Event Name</td>
				<td>Activity Name</td>
				<td>Role Name</td>
				<td>Role Description</td>
				<td>Start Date</td>
				<td>End Date</td>
				<td>View</td>
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
							<td>'.$row[4].'</td>
							<td>'.$row[5].'</td>
							<td><a href="/SDP/viewRole.php?roleid='.$row[6].'">View</a></td>
						</tr>
						');
				}
			?>
		</table>
		</div>
	</body>
</html>