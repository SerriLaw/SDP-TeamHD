<html>
	<head>
		<title>BeanSprouts - Managers</title>
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
		<div class="heroname">Active Event Managers and Admins</div>
		<?php
		while($row = mysqli_fetch_array($result))
		{
			  
			echo "<div class=\"user-list-block\">";
			
			echo " <table><tr><td class=\"listStudentName\">" .$row['firstName'] . " " . $row['lastName'] . "</td><td class=\"userType\">";
			
			if($row['userType'] ==2){echo("Event Manager");} else { echo ("System Administrator");}

			echo "</td></tr><tr><td class=\"listStudentID\">User ID: " .$row['userID']. "</td><td class=\"callToAction\"><a href=\"/SDP/viewProfile.php?userid=".$row['userID']."\"><i class=\"fa fa-user\"></i> View Profile</a></td></tr></table> ";
			
			echo "</div>";
			//echo($row['userID'] . " " . $row['firstName'] . " " . $row['lastName'] . ' <a href ="viewProfile.php?userid=' . $row['userID'] . '">View Profile</a>' . "<br>");
		}
		?>
		<div class="heroname">Inactive Event Managers and Admins</div>
		<?php
		while($row1 = mysqli_fetch_array($result1))
		{
			if($row1['userType'] ==2){echo("Event Manager ");}else{echo("System Administrator ");} echo($row1['userID'] . " " . $row1['firstName'] . " " . $row1['lastName'] . ' <a href ="viewProfile.php?userid=' . $row1['userID'] . '">View Profile</a>' . "<br>");
		}
		?>
	</div>
	</body>
</html>