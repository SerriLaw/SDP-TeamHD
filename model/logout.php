<?php
	session_start();
	session_destroy();
	header("Location: /SDP/view/login.php");
?>