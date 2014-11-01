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
		<h1><?php echo($row['name']); ?></h1>
		<?php 
			echo(
				'Description: '.$row['description']."<br>".
				'Start Date: '.$row['startDate']."<br>".
				'End Date: '.$row['endDate']."<br>".
				'Location: '.$row['location']."<br>"
				);
		?>

			<?php
				while($row1 = mysqli_fetch_array($result1))
				{
					$sql2 = "SELECT * FROM activity WHERE activityID = " . $row1['activityID'];
					$result2 = mysqli_query($db, $sql2);
					while($row2 = mysqli_fetch_array($result2))
					{
						echo(
							'<h2> Activity: '.$row2['name'].'</h2><br>'.
							'Description: '.$row2['description'].'<br>'.
							'Location: '.$row2['location'].'<br>'.
							'Start Date: '.$row2['startDate'].'<br>'.
							'End Date:'.$row2['endDate'].'<br>'.
							'Start Time'.$row2['startTime'].'<br>'.
							'End Time'.$row2['endTime'].'<br>'
							);
						$sql3 = "SELECT * FROM role WHERE activityID = " . $row2['activityID'];
						$result3 = mysqli_query($db, $sql3);
						while($row3 = mysqli_fetch_array($result3))
						{
							echo(
								'<h3>Role: '.$row3['name'].'</h3>'.
								'Paid: '.$row3['isPaid'].'<br>'.
								'Description: '.$row3['description'].'<br>'.
								'Requirements: '.$row3['requirements'].'<br>'.
								'Start Date: '.$row3['startDate'].'<br>'.
								'End Date: '.$row3['endDate'].'<br>'.
								'Start Time: '.$row3['startTime'].'<br>'.
								'End Time'.$row3['endTime'].'<br>'
								);
							$sql4 = "SELECT * FROM application WHERE roleID = " . $row3['roleID'];
							$result4 = mysqli_query($db, $sql4);
							echo("<h4>Applicants</h4>");
							while($row4 = mysqli_fetch_array($result4))
							{
								if($row4['status'] == 0){$status = "Applied";}elseif($row4['status'] == 1){$status = "Allocated";}else{$status = "Ignored";}
								$sql5 = "SELECT firstName, lastName FROM user WHERE userID = " . $row4['userID'];
								$result5 = mysqli_query($db, $sql5);
								$row5 = mysqli_fetch_array($result5);
								echo($row4['userID'] . " " . $row5['firstName'] . " ". $row5['lastName'] ." ". $row4['dateSubmitted'] . " ". $status);
							}
						}
					}
				}
			?>
		</div>
	</body>
</html>