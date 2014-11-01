<?php
	$sql = "SELECT * FROM user JOIN student ON(user.userID = student.userID) WHERE isActive = 1 ORDER BY user.userID";
	$result = mysqli_query($db, $sql);
	$sql1 = "SELECT * FROM user JOIN student ON(user.userID = student.userID) WHERE isActive = 0 ORDER BY user.userID";
	$result1 = mysqli_query($db, $sql1);
?>