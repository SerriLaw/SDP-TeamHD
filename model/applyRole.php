<?php
    session_start();
    include('db.php');
    $date = mysqli_real_escape_string($db,date("Y-m-d"));
    $studentID = mysqli_real_escape_string($db,$_SESSION['userID']);
    $roleID = mysqli_real_escape_string($db,$_GET['roleid']);
    $sql=" INSERT INTO application (userID, roleID, dateSubmitted) VALUES('$studentID', '$roleID', '$date');";
    if(!mysqli_query($db, $sql))
    {
        echo($sql);
        die();
    }
    echo("SUCCESS");
 ?>