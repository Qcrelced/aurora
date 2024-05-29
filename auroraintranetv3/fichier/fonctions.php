<?php
//Connexion à la base de donnée
function connexionClient(){
    try{
        $dsn = 'mysql:dbname=auroraintranet;host=localhost';
        $user = 'clientaurora';
        $password = '@U24del!a';

        $dbh = new PDO($dsn, $user, $password);
        return $dbh;
    }catch (PDOException $e){
        die('Connexion impossible à la base de donnée'.$e);
    }
}

//Récupérer les valeurs dans la base de donnée
function recupMessage($dbh){
    $sth = $dbh->prepare("SELECT `ID`,`titre`,`auteur`,`message`,`image`, `video` FROM `forum` ORDER by ID DESC");
    $sth->execute();
    $result = $sth->fetchALL();
    return $result; 
}
