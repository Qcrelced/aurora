<?php
session_start();
try{
    $dsn = 'mysql:dbname=auroraintranet;host=localhost';
    $user = 'accesbase';
    $password = 'Kel-6!beM@MeibN';

    $dbh = new PDO($dsn, $user, $password);
}catch (PDOException $e){
    die('Connexion impossible à la base de donnée'.$e);
}

if (isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['password']) && ($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['password']) && !empty($_POST['email'])){
    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $motdepasse = $_POST["password"];
    $mail = $_POST['email'];

    $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

    $sth = $dbh->prepare("INSERT INTO `users`(`nom_utilisateur`, `prenom_utilisateur`, `mot_de_passe`, `mail_utilisateur`) VALUES (?,?,?,?);");

    $sth->bindParam(1, $nom);
    $sth->bindParam(2, $prenom);
    $sth->bindParam(3, $motdepasse);
    $sth->bindParam(4, $mail);
    //On execute
    $sth->execute();
    header('Location: inscription.php'); // utilisateur ou mot de passe vide
} else {
    $_SESSION['erreur'] = "Champs vides, réessayez.";
    header('Location: inscription.php'); // utilisateur ou mot de passe vide
}
?>