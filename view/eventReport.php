<html>
	<head>
		<title>BeanSprouts - Event Report</title>
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
		<div class="heroname"><?php echo($row['name']); ?></div>

		
		<table class="report">
			<tr>
				<td class="label">Description</td>
				<td class="data"><?php echo($row['description']);?></td>
			</tr>
			<tr>
				<td class="label">Start Date</td>
				<td class="data dateToForm"><?php echo($row['startDate']);?></td>
			</tr>
			<tr>
				<td class="label">End Date</td>
				<td class="data dateToForm"><?php echo($row['endDate']);?></td>
			</tr>
			<tr>
				<td class="label">Location</td>
				<td class="data"><?php echo($row['location']);?></td>
			</tr>
	</table>



			<?php
				while($row1 = mysqli_fetch_array($result1))
				{
					$sql2 = "SELECT * FROM activity WHERE activityID = " . $row1['activityID'];
					$result2 = mysqli_query($db, $sql2);
					while($row2 = mysqli_fetch_array($result2))
					{
						echo(
							'<div class="heroname-2">Activity: '.$row2['name'].'</div>'.
							'<table class="report"><tr>'.
							'<tr><td class="label">Description</td><td class="data">'.$row2['description'].'</td></tr>'.
							'<tr><td class="label">Location</td><td class="data">'.$row2['location'].'</td></tr>'.
							'<tr><td class="label">Start Date</td><td class="data dateToForm">'.$row2['startDate'].'</td></tr>'.
							'<tr><td class="label">End Date</td><td class="data dateToForm">'.$row2['endDate'].'</td></tr>'.
							'<tr><td class="label">Start Time</td><td class="data timeToForm">'.$row2['startTime'].'</td></tr>'.
							'<tr><td class="label">End Time</td><td class="data timeToForm">'.$row2['endTime'].'</td></tr>'.
							'</tr></table>'
							);
						$sql3 = "SELECT * FROM role WHERE activityID = " . $row2['activityID'];
						$result3 = mysqli_query($db, $sql3);
						while($row3 = mysqli_fetch_array($result3))
						{
							echo(
								'<div class="heroname-3">Role: '.$row3['name'].'</div>'.
								'<table class="report"><tr>'.
								'<tr><td class="label">Paid</td><td class="data">'.$row3['isPaid'].'</td></tr>'.
								'<tr><td class="label">Description</td><td class="data">'.$row3['description'].'</td></tr>'.
								'<tr><td class="label">Requirements</td><td class="data">'.$row3['requirements'].'</td></tr>'.
								'<tr><td class="label">Start Date</td><td class="data dateToForm">'.$row3['startDate'].'</td></tr>'.
								'<tr><td class="label">End Date</td><td class="data dateToForm">'.$row3['endDate'].'</td></tr>'.
								'<tr><td class="label">Start Time</td><td class="data timeToForm">'.$row3['startTime'].'</td></tr>'.
								'<tr><td class="label">End Time</td><td class="data timeToForm">'.$row3['endTime'].'</td></tr>'.
								'</tr></table>'
								);
							$sql4 = "SELECT * FROM application WHERE roleID = " . $row3['roleID'];
							$result4 = mysqli_query($db, $sql4);
							echo('<div class="heroname-3">Applicants</div>');
							while($row4 = mysqli_fetch_array($result4))
							{
								if($row4['status'] == 0){$status = "Applied";}elseif($row4['status'] == 1){$status = "Allocated";}else{$status = "Ignored";}
								$sql5 = "SELECT firstName, lastName FROM user WHERE userID = " . $row4['userID'];
								$result5 = mysqli_query($db, $sql5);
								$row5 = mysqli_fetch_array($result5);
								echo '<div class="user-list-block">';
								echo '<table><tr><td class="listStudentName">';
								echo ($row5['firstName'] . " ". $row5['lastName']);
								echo '</td></tr><tr><td class="listStudentID">User ID: ';
								echo ($row4['userID']);
								echo '</td></tr><tr><td colspan="2" class="dateSub">Date Submitted: <span class="dateToForm">';
								echo ($row4['dateSubmitted']);
								echo '</span></td></tr><tr><td>Status: ';
								echo ($status);
								echo '</td></tr></table>';
								echo '</div>';
							}
						}
					}
				}
			?>
		</div>
	</body>
</html>