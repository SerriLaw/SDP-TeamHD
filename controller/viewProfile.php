<?php
	session_start();
	include('model/viewProfile.php');
	if(empty($_SESSION))
	{
		header('Location: home.php'); //urled
		die();
	}
    include('view/viewProfile.php');
?>