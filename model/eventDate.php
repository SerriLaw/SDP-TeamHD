<?php
	include("db.php");
	$eventID = $_GET['eventid'];
	$datesql = "SELECT startDate, endDate, startTime, endTime FROM event WHERE eventID = " . $eventID;
	$dateresult = mysqli_query($db, $datesql);
	$dates = mysqli_fetch_array($dateresult,MYSQLI_ASSOC);;
?>