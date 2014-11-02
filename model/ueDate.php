<?php
	$sql10 = "SELECT eventID FROM activity WHERE eventID = " . $row['eventID'];
	$result10 = mysqli_query($db, $sql10);
	$row10 = mysqli_fetch_array($result10,MYSQLI_ASSOC);

	$eventID = $row10['eventID'];
	$datesql = "SELECT startDate, endDate, startTime, endTime FROM event WHERE eventID = " . $eventID;
	$dateresult = mysqli_query($db, $datesql);
	$dates = mysqli_fetch_array($dateresult,MYSQLI_ASSOC);
?>