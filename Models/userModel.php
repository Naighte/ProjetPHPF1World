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