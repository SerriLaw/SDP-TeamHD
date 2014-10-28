<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'MCtmmnUUKB');
	define('DB_DATABASE', 'volunteering');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=volunteering', 'root' ,'MCtmmnUUKB');
    }
    catch (Exception $ex)   
    {
        die("ERROR :". $ex->getMessage());
    }
?>
