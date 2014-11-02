<html>
	<head>
		<title>BeanSprouts - Volunteers</title>
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
			<div class="heroname">Active Volunteers</div>
			<?php
			while($row = mysqli_fetch_array($result))
			{
				echo "<div class=\"user-list-block\">";
				
				echo " <table><tr><td class=\"listStudentName\">" .$row['firstName'] . " " . $row['lastName'] . "</td></tr><tr><td class=\"listStudentID\">Student ID: " .$row['userID'] . "</td><td class=\"callToAction\"><a href=\"/SDP/viewProfile.php?userid=".$row['userID']."\"><i class=\"fa fa-user\"></i> View Profile</a></td></tr></table> ";
			
				echo "</div>";
			}
			?>
			<div class="heroname">Inactive Volunteers</div>
			<?php
			while($row1 = mysqli_fetch_array($result1))
			{
				echo "<div class=\"user-list-block\">";
				
				echo " <table><tr><td class=\"listStudentName\">" .$row1['firstName'] . " " . $row1['lastName'] . "</td></tr><tr><td class=\"listStudentID\">Student ID: " .$row1['userID'] . "</td><td class=\"callToAction\"><a href=\"/SDP/viewProfile.php?userid=".$row1['userID'] ."\"><i class=\"fa fa-user\"></i> View Profile</a></td></tr></table> ";
				
				echo "</div>";
			}
			?>
		</div>
	</body>
</html>