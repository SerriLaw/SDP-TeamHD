<?php
	//session_start();
	include("db.php");
	$eventID = $_GET['eventid'];
	$sql = "SELECT * FROM event WHERE eventID = '$eventID'";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	$row = array('name' => 'FAILURE');
	if ($count == 1) {
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	}
?>