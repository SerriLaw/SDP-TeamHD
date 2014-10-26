<?php
	session_start();
	if(empty($_SESSION))
	{
		header('Location: home.php'); //urled
		die();
	}
	include('model/viewProfile.php');
    include('view/editProfile.php');
?>