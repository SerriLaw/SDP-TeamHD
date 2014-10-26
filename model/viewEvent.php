<?php

    function getAct($act)
    {
        $actList = array();
        $sql = "SELECT * FROM activity where eventID =".$act;
        $q = $bdd->prepare($sql);
        $q->execute();
        while ($data = $q-> fetch(PDO::FETCH_ASSOC))
        {
            $actID = $data['activityID'];
            $name = $data['name'];
        }
    }

    $e = $_GET['id'];
        $sql = "SELECT * FROM event where eventID = ".$e;
        $q = $bdd->prepare($sql);
        $q->execute(array($e));
        $row = $q->fetch();
        
?>