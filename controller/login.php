<?php
	session_start();
	//if already logged in redirects user to the dashboard
	if(!empty($_SESSION['userID']))
	{
        header('Location: home.php'); //urled    
	}
include("view/login.php");
?>