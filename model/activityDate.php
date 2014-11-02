<?php
	include("db.php");
	$activityID = $_GET['activityid'];
	$datesql = "SELECT startDate, endDate, startTime, endTime FROM activity WHERE activityID = " . $activityID;
	$dateresult = mysqli_query($db, $datesql);
	$dates = mysqli_fetch_array($dateresult,MYSQLI_ASSOC);;
?>