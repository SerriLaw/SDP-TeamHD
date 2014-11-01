<?php
	$sql = "SELECT * FROM user JOIN staff ON(user.userID = staff.userID) WHERE isActive = 1 ORDER BY user.userType";
	$result = mysqli_query($db, $sql);
	$sql1 = "SELECT * FROM user JOIN staff ON(user.userID = staff.userID) WHERE isActive = 0 ORDER BY user.userType";
	$result1 = mysqli_query($db, $sql1);
?>