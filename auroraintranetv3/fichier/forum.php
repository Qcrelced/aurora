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

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$fullName = $nom . " " . $prenom;

$titre = $_POST['titremessage'];
$message = $_POST['message'];

$extensions_autorisees = [
    "jpg" => "image/jpeg",
    "jpeg" => "image/jpeg",
    "png" => "image/png",
    "mp4" => "video/mp4"
];

if(isset($_FILES['fichier']) && $_FILES['fichier']['error'] === 0){

    $nomFichier = $_FILES['fichier']['name'];
    $tempname = $_FILES['fichier']['tmp_name'];
    $typeFichier = $_FILES['fichier']['type'];
    $sizeFichier = $_FILES['fichier']['size'];

    $extension = strtolower(pathinfo($nomFichier, PATHINFO_EXTENSION));

    //On vérifie si l'extension du fichier est accepter
    if(!array_key_exists($extension, $extensions_autorisees) || !in_array($typeFichier,
     $extensions_autorisees)){
        die("Erreur : format de fichier incorrect");
    }
    // On limite le poids du fichier à 5mo
    if($sizeFichier > 1024 * 5 *1024){
        die("ERREUR : fichier trop volumineux");
    }

    $newname = md5(uniqid());
    $newfilename = __DIR__ . "/imgforum/$newname.$extension";
    $fileposition = "imgforum/$newname.$extension";
    
    if(!move_uploaded_file($_FILES["fichier"]["tmp_name"], $newfilename)){
        die("Echec de l'enregistrement du fichier");
    }

    chmod($newfilename, 0644);
}

$sth = $dbh->prepare("INSERT INTO `forum`(`titre`, `auteur`, `message`, `image`, `video`) VALUES (?,?,?,?,?);");

$sth->bindParam(1, $titre);
$sth->bindParam(2, $fullName);
$sth->bindParam(3, $message);

//Permet de mettre un champ NULL
$empty = NULL;

//Si le fichier n'est pas une vidéo :
if($typeFichier !== "video/mp4"){
    $sth->bindParam(4, $fileposition);
}else{
    $sth->bindParam(4, $empty);
}

//Si le fichier est une vidéo :
if($typeFichier == "video/mp4"){ 
    $sth->bindParam(5, $fileposition);
}else{
    $sth->bindParam(5, $empty);
}

//On execute
$sth->execute();
//Redirection vers la page principale
header('Location: principale.php');