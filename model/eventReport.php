<?php
	$eventID = mysqli_real_escape_string($db, $_GET['eventid']);
	
	$sql = "SELECT * FROM event WHERE eventID = " . $eventID;
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);

	$sql1 = "SELECT activityID FROM activity WHERE eventID = " . $eventID;
	$result1 = mysqli_query($db, $sql1);

?>