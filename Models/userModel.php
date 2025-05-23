<?php 
function createUser($pdo)
{
    try {
        $query = 'insert into userinfos(UserNom, UserPrenom, UserLogin, UserMDP, UserEmail, UserRole)
         values (:UserNom, :UserPrenom, :UserLogin, :UserMDP, :UserEmail, :UserRole)';
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute([
            'UserNom' => $_POST["nom"],
            'UserPrenom' => $_POST["prenom"],
            'UserLogin' => $_POST["login"],
            'UserMDP' => $_POST["mot_de_passe"],
            'UserEmail' => $_POST["email"],
            'UserRole' => 'user'
            ]);   

    }   catch (PDOException $e) {
        $message = $e->getMessage();
        die($message); }
}


function connectUser($pdo)
{
    try {
        var_dump("coucou");
        $query = 'select * from userinfos where UserLogin = :UserLogin and UserMDP = :UserMDP';
        $connectUser = $pdo->prepare($query);
        $connectUser->execute([
            'UserLogin'  => $_POST["login"],
            'UserMDP'  => $_POST["mot_de_passe"]
        ]);
        $user = $connectUser->fetch();
        if (!$user){
            return false;
        }
        else{
            $_SESSION["user"] = $user;
            return true;
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function updateUser($pdo)
{
    try {
        $query = 'update userinfos set UserNom = :UserNom, UserPrenom = :UserPrenom, UserMDP = :UserMDP, UserEmail = :UserEmail where UserID = :UserID';
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute([
            'UserNom' => $_POST["nom"],
            'UserPrenom' => $_POST["prenom"],
            'UserMDP' => $_POST["mot_de_passe"],
            'UserEmail' => $_POST["email"],
            'UserID' => $_SESSION["user"]->UserID
        ]);
        var_dump("fzef");
    } catch (PDOEXCEPTION $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function updateSession($pdo)
{
    try {
        $query = 'select * from userinfos where UserID = :UserID';
        $selectUser = $pdo->prepare($query);
        $selectUser->execute([
            'UserID' => $_SESSION["user"]->UserID
        ]);
        $user = $selectUser->fetch();
        $_SESSION["user"] = $user;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function DeleteUser($pdo)
{
    try {
        $query = 'delete from userinfos where UserID = :UserID';
        $delUser = $pdo->prepare($query);
        $delUser->execute([
            'UserID' => $_SESSION["user"]->UserID
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}