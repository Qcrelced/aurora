<?php
    session_start();

    if($_SESSION['nom'] == "" || $_SESSION['prenom'] == ""){
        session_destroy();
        header('Location: ../index.php');
    }else{

        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $mail = $_SESSION['mail'];
    }
    //include("forum.php");
    include("fonctions.php");
    //Connexion à la base de donnée
    $conn = connexionClient();

    $releves = recupMessage($conn);
?>
<html>
    
<head>
    <meta charset="utf-8">
    <title>AURORA | INTRANET</title>
    <link rel="stylesheet" href="intranet.css" type="text/css"/>
</head>

<body id="revenirenhaut">
<div class="tete"> 
    <div class="header">
        <nav>
            <h1 id="titre">AURORA</h1>
            <ul>
              <li><a href="#actu">Les dernieres actualites</a></li>
              <li><a href="#message">Messages</a></li>
              <li><a href="#mon-profil">Mon profil</a></li>
              <div class="deco">
                    <a href="deconnexion.php" ><p>Déconnexion</p></a>
              </div>
            </ul>
        </nav>
    </div>
    <div class="intro">
        <h2 class="pro">INTRANET</a></h2>
        <p>Bienvenue <?php echo $nom; ?>, Vous etes sur l'intranet de l'entreprise.</p>
    </div>
    <div class="saut">
        <p>saut</p>
    </div>
</div>

<div class="corp">
    <div id="actu">
        <h2 class="mess">Les dernieres actualites</h2>
        <h3>Suivez les dernières actualités dans l'entreprise à tout moment.</h3></br>
        <h2 class="serv">messages</h2>
    </div>
    <div class="dm">
        <h2 id="message">Les derniers messages :</h2>
        <?php
        for($i=0;$i<10;$i++){ //ou sizeof($releves)
        ?>
            <tr>
            <div class="tableau">
                <div class="tmessage"><td><h3><strong><?=$releves[$i]["titre"]?></strong></h3></td></div>
                <div class="amessage"><td><p>De : <?=$releves[$i]["auteur"]?></p></td></div>
                <div class="mmessage"><td><?=$releves[$i]["message"]?></td>
                    <?php
                        if(!empty($releves[$i]["image"])){
                            echo'<div class="image-message"><td><img src="'.$releves[$i]["image"].'"</td></div>';
                        }
                        if(!empty($releves[$i]["video"])){
                            echo'<div class="image-message"><td><video controls> <source src="'.$releves[$i]["video"].'" type=video/mp4></video></td></div>';
                        }
                    ?>
                </div>  
            </div>
            <br>
            </tr>
        <?php
        }
        ?>
    </div>
</div>

    <div class="fm">
        <h2 class="titrefm">Publier un message :</h2>
        <form enctype="multipart/form-data" action="forum.php" method="post" class="faire-message">
            <h3>Titre du message :</h3>
            <input type="text" name="titremessage" placeholder="Ecrivez le titre ici." required><br><br>
            <h3>Contenue du message :</h3>
            <textarea name="message" cols="75" rows="2" required></textarea><br><br>
			<div class="boutton-envoyer-message">
				<input type="file" name="fichier"/><br><p>Seuls les fichiers .mp4, .jpeg, .jpg et .png sont autorisés.</p>
            </div><br>
            <input type="submit" name="formmessage">    
        </form>
    </div>

    <div class="corp">
        <div>
            <h2 id="mon-profil">Mon profil</h2>
            <h2>Vos informations :</h2>
            <div class="information">
                <h3>Votre nom : </h3><?php echo '<p>' . $prenom . '</p>'?>
            </div>
            <br>
            <div class="information">
                <h3>Votre prénom :</h3><?php echo '<p>' . $nom . '</p>'; ?>
            </div>
            <br>
            <div class="information">
            <h3>Votre addesse électronique :</h3><?php echo '<p>' . $mail . '</p>';?>
            </div>
            <h2 id="changez-vos-informations">Changez vos informations</h2>
            <p>Pour tout information personnelle qui doit être changer, addressez vous au responsable de votre section.</p>
        </div>    
    </div>

<footer>
    <p class="titfoot">AURORA</p>
    <ul>
        <li>Naviguer</li>
        <li><a href="#actu">Les dernières actualités</a></li>
        <li><a href="#message">Messages</a></li>
        <li><a href="#mon-profil">Mon profil</a></li>
    </ul>
    <ul>
        <li class="copy">Copyright © 2023 Aurora. All rights reserved.</li>
        <li class="plan"><a href="#revenirenhaut">Revenir en haut </a></li>
    </ul>
</footer>

</body>
</html>