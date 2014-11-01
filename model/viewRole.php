<?php
	include("db.php");
	$roleID = $_GET['roleid'];
	$sql = "SELECT * FROM role WHERE roleID =" . $roleID;
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	$row = array('name' => 'FAILURE');
	if ($count == 1) 
	{
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	}
?>