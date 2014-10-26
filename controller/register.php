<?php
	session_start();
	if(!empty($_SESSION))
	{
		header('Location: /SDP/login.php');
		die();
	}
include ("view/register.php");
?>