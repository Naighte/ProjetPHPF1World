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