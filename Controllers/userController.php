<?php   // code php qui décide de ce qu'il faut donner comme valeur à la variable $template

require_once ("Models/userModel.php"); 
// on ajoutera par la suite les require aux modèles

// récupération du chemin désiré
$uri = $_SERVER["REQUEST_URI"];
var_dump($uri);
if ($uri === "/connexion") {
    
    if(isset($_POST['btnEnvoi'])){
        var_dump("joujou");
        $erreur=false;
        if(connectUser($pdo)){
            var_dump("blabla");
            header("location:/");
        }
        else{
            $erreur=true;
        }
    }
    $title = "Connexion";                  //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/Users/connexion.php";        //chemin vers la vue demandée
    require_once("Views/base.php");             //appel de la page de base qui sera remplie avec la vue demandée
}
elseif ($uri === "/deconnexion") {      // on anticipe pour la suite
    session_destroy();
    header("location:/");
}
elseif ($uri ==="/inscription") {
    if(isset($_POST['btnEnvoi'])) {
        $messageError = verifEmptyData();
    
        if(!$messageError){
            createUser($pdo); 
            header('location:/connexion');
            }
        }
    
             //appel de la page de base qui sera remplie avec la vue demandée
$title = "Inscription";                  //titre à afficher dans l'onglet de la page du navigateur
$template = "Views/Users/inscriptionOrEditProfile.php";        //chemin vers la vue demandée
require_once("Views/base.php");   
        }


elseif ($uri ==="/profil") {
    var_dump($_SESSION);
    if(isset($_POST['btnEnvoi'])){
        $messageError = verifEmptyData();
        if(!$messageError){
            updateUser($pdo);
            updateSession($pdo);
            header('location:/profil');
        }
    }
    $title = "Mise à jour du profil";
    $template = "Views/Users/inscriptionOrEditProfile.php";
    require_once("Views/base.php");
}

elseif ($uri === "/deleteProfil") {
    deleteAllTeamsFromUser($pdo);
    deleteUser($pdo);
    header("location:/deconnexion");
}
 
elseif ($uri === "/déconnexion") {
    session_destroy();
    header("location:/");
}

function verifEmptyData()
{
    foreach ($_POST as $key => $value) {
        if (empty(str_replace(' ', '', $value))){
            $messageError[$key] = "Votre " . $key . " est vide.";
        }
    }
    if (isset($messageError)) {
        return $messageError;
    
    } else {
        return false;
    }
}

