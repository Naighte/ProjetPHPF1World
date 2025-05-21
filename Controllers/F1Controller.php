<?php 

require_once "Models/F1Model.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/myTeam"){
    $F1 = selectMyF1($pdo);

    $title = "Mon écurie";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}
elseif ($uri === "/createTeam"){
    if (isset($_POST['btnEnvoi'])) {
        createF1($pdo);

        $TeamID = $pdo->lastInsertId();

        header("location:/myTeam");
    }
    $title = "Ajout d'une écurie";
    $template = "Views/F1/editOrCreateF1.php";
    require_once("Views/base.php");
}

elseif (isset($_GET["TeamID"]) && $uri === "/voirEcurie?TeamID=" . $_GET["TeamID"]) {
    
    $F1 = selectOneF1($pdo);
    $title = "Ajout d'une écurie";
    $template = "Views/F1/voirEcurie.php";
    require_once("Views/base.php");
}

elseif (isset($_GET["TeamID"]) && $uri === "/updateEcurie?TeamID=" . $_GET["TeamID"]) {

    if (isset($_POST['btnEnvoi'])) {
        updateF1($pdo);

        header("location=/myTeam");
    }
    $F1 = selectOneF1($pdo);
    $title = "Mise à jour de l'écurie";
    $template = "Views/F1/editOrCreateF1.php";
    require_once("Views/base.php");
}

elseif (isset($_GET["CustomTeamID"]) && $uri === "/deleteF1?CustomTeamID=" . $_GET["CustomTeamID"]) {
    deleteOneF1($pdo);
    header("location:/myTeam");
}