<?php       

    session_start();
    

    require_once("Config/connectDataBase.php"); 
    var_dump($_POST);
    require_once("Controllers/indexController.php");
    require_once("Controllers/userController.php");