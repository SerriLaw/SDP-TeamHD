<?php
	include("db.php");
	$roleID = $_GET['roleid'];
	$sql = "SELECT * FROM role WHERE roleID = '$roleID';";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	$row = array('name' => 'FAILURE');
	if ($count == 1) 
	{
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$sql1 = "SELECT * FROM rolehours WHERE roleID = '$roleID';";
		$result1 = mysqli_query($db, $sql1);
		$count1 = mysqli_num_rows($result);
		$row1 = array('name' => 'FAILURE');
		if ($count1 == 1) 
		{
			$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
		}
	}
?>
