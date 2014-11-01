<?php
	$userID = mysqli_real_escape_string($db,$_GET['userid']);
	$date = mysqli_real_escape_string($db,date('Y-m-d'));
	$sql = "SELECT event.name, activity.name, role.name, role.description, role.startDate, role.endDate, role.roleID FROM event, activity, role, application WHERE event.eventID = activity.eventID AND activity.activityID = role.activityID AND role.roleID = application.roleID AND role.endDate < NOW() AND application.userID = " . $userID;
	$result = mysqli_query($db, $sql);

?>