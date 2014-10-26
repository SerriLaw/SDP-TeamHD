<?php
	session_start();
	session_destroy();
	header("Location: /SDP/home.php");
?>