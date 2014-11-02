<?php
    session_start();
    include('db.php');
    $studentID = mysqli_real_escape_string($db,$_SESSION['userID']);
    $roleID = mysqli_real_escape_string($db,$_GET['roleid']);
    $sql="DELETE FROM application WHERE roleID = " . $roleID . " AND userID = " . $studentID;
    if(!mysqli_query($db, $sql))
    {
        echo($sql);
        die();
    }
    echo("SUCCESS");
    header('location: '. $_SERVER['HTTP_REFERER']);
 ?>