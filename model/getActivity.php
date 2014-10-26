<?php
	include("db.php");
	$activityID = $_GET['activityid'];
	$sql = "SELECT * FROM activity WHERE activityID = " . $activityID;
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	$row = array('name' => 'FAILURE');
	if ($count == 1)
	{
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	}

?>