<?php
session_start();

try{
    $dsn = 'mysql:dbname=auroraintranet;host=localhost';
    $user = 'clientaurora';
    $password = '@U24del!a';

    $dbh = new PDO($dsn, $user, $password);
}catch (PDOException $e){   
    die('Connexion impossible à la base de donnée'.$e);
}

if(isset($_POST['username']) && ($_POST['password']) && !empty($_POST['username'] && !empty($_POST['password']))){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $user;

    $_SESSION['motdepasse'] = $password;
    //$_SESSION['username'];


    $sth = $dbh->prepare("SELECT * FROM users WHERE `nom_utilisateur` = :username ;");
    
    $sth -> bindValue(":username", $username);
    $sth -> execute();

    $result = $sth->fetch();
    
    if(!password_verify($password, $result["mot_de_passe"])){
        $_SESSION['erreur'] = "Utilisateur ou mot de passe incorrect, réessayez.";
        header('Location: ../index.php'); // utilisateur ou mot de passe incorrect
    }else{
        $_SESSION['prenom'] = $result['prenom_utilisateur'];
        $_SESSION['nom'] = $result['nom_utilisateur'];
        $_SESSION['mail'] = $result['mail_utilisateur'];


        header('Location: principale.php');
    }

    
}else{
    $_SESSION['erreur'] = "Champs vides, réessayez.";
    header('Location: ../index.php'); // utilisateur ou mot de passe vide
}