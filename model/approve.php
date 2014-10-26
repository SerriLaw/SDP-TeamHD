<?php
    include('db.php');

    $hh = $bdd->prepare("UPDATE application SET status = 1 WHERE roleID = :roleID AND userID = :userID");
    $hh->execute(array(
    'roleID' => $_GET['roleid'],
    'userID' => $_GET['appid']
    ));
    header('location: '. $_SERVER['HTTP_REFERER']);
?>