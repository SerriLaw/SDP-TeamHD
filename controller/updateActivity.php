<?php
	session_start();
	if(empty($_SESSION) || $_SESSION['userType'] < 2)
	{
		header('Location: /SDP/login.php'); //urled
		die();
	}
    include('model/getActivity.php');
    include('view/updateActivity.php');
?>