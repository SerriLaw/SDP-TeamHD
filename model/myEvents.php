<?php
	$userID = mysqli_real_escape_string($db, $_GET['userid']);
	$sql = "SELECT * FROM event WHERE managerID = " . $userID . " AND endDate > NOW()";
	$result = mysqli_query($db, $sql);

	$sql1 = "SELECT * FROM event WHERE managerID = " . $userID . " AND endDate < NOW()";
	$result1 = mysqli_query($db, $sql1);

	$sql2 = "SELECT * FROM user JOIN staff ON(user.userID = staff.userID) WHERE user.userID = " . $userID;
	$result2 = mysqli_query($db, $sql2);
	$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
?>