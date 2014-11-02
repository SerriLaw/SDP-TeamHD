<?php
	$sql10 = "SELECT activityID FROM role WHERE activityID = " . $row['activityID'];
	$result10 = mysqli_query($db, $sql10);
	$row10 = mysqli_fetch_array($result10,MYSQLI_ASSOC);

	$activityID = $row10['activityID'];
	$datesql = "SELECT startDate, endDate, startTime, endTime FROM role WHERE activityID = " . $activityID;
	$dateresult = mysqli_query($db, $datesql);
	$dates = mysqli_fetch_array($dateresult,MYSQLI_ASSOC);
?>