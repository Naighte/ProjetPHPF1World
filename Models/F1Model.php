<?php

function selectAllF1($pdo)
{
    try {
        $query = 'select * from ecurie';
        $selectF1 = $pdo->prepare($query);
        $selectF1->execute();
        $F1 = $selectF1->fetchAll();
        return $F1;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }

}



function deleteAllTeamsFromUser($pdo) 
{
    try {
        $query = 'delete from userteam where UtiliID = :UtiliID';
        $deleteAllTeamsFromId = $pdo->prepare($query);
        $deleteAllTeamsFromId->execute([
            'UtiliID' => $_SESSION["user"]->UserID
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectMyF1($pdo)
{
    try{
        $query = 'select * from userteam where UtiliID = :UtiliID';
        $selectF1 = $pdo->prepare($query);
        $selectF1->execute([
            'UtiliID' => $_SESSION["user"]->UserID
        ]);
        $F1 = $selectF1->fetchAll();
        return $F1;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function createF1($pdo)
{
    try {
        $query = 'insert into userteam (CustomTeamName, CustomTeamDrivers1, CustomTeamDriver2, CustomTeamInge1, CustomTeamInge2, CustomTeamQG, UtiliID)
        values (:CustomTeamName, :CustomTeamDrivers1, :CustomTeamDriver2, :CustomTeamInge1, :CustomTeamInge2, :CustomTeamQG, :UtiliID)';
        $addF1 = $pdo->prepare($query);
        $addF1->execute([
            'CustomTeamName' => $_POST["customNom"],
            'CustomTeamDrivers1' => $_POST["customDriver1"],
            'CustomTeamDriver2' => $_POST["customDriver2"],
            'CustomTeamInge1' => $_POST["customInge1"],
            'CustomTeamInge2' => $_POST["customInge2"],
            'CustomTeamQG' => $_POST["customQG"],
            'UtiliID' => $_SESSION["user"]->UserID
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectOneF1($pdo)
{
    try{
        $query = 'select * from ecurie where TeamID = :TeamID';
        $selectF1 = $pdo->prepare($query);
        $selectF1->execute([
            'TeamID' => $_GET["TeamID"]
        ]);
        $F1 = $selectF1->fetch();
        return $F1;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function updateF1($dbh)
{
    try{
        $query = 'update userteam set CustomTeamName = :CustomTeamName, CustomTeamDrivers1 = :CustomTeamDrivers1, CustomTeamDriver2 = :CustomTeamDriver2, CustomTeamInge1 = :CustomTeamInge1, CustomTeamInge2 = :CustomTeamInge2, CustomTeamQG = :CustomTeamQG where CustomTeamID = :CustomTeamID';
        $updateF1FromId = $dbh->prepare($query);
        $updateF1FromId->execute([
            'CustomTeamName' => $_POST["customNom"],
            'CustomTeamDrivers1' => $_POST["customDriver1"],
            'CustomTeamDriver2' => $_POST["customDriver2"],
            'CustomTeamInge1' => $_POST["customInge1"],
            'CustomTeamInge2' => $_POST["customInge2"],
            'CustomTeamQG' => $_POST["customQG"],
            'CustomTeamID' => $_GET["CustomTeamID"]
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function deleteOneF1($pdo)
{
    try {
        $query = 'delete from userteam where CustomTeamID = :CustomTeamID';
        $deleteAllTeamsFromId = $pdo->prepare($query);
        $deleteAllTeamsFromId->execute([
            'CustomTeamID' => $_GET["CustomTeamID"]
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectComments($com)
{
    try{
        $query = 'select * from commentateur where CommLangueID = :CommLangueID';
        $selectCom = $com->prepare($query);
        $selectCom->execute([
            'CommLangueID' => $_GET["CommLangueID"]
        ]);
        $com = $selectCom->fetch();
        return $com;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}