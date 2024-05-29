<?php 
    session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="login.css" media="screen" type="text/css" />
    </head>

    <body>
        <div id="container">
            <form action="fichier/verif.php" method="POST">
                <h1 class="titre-connexion">Se connecter a l'intranet</h1>

                <div class="input-formulaire">
                    <p>Identifiant</p>
                    <div class="input-champ-formulaire">
                        <input type="text" name="username" class="champ-forulaire" placeholder="Ex: Monadresse@aurora.fr" required><br>
                    </div>
                </div>
                <br>
                <div class="input-formulaire">
                    <p>Mot de passe</p>
                    <div class="input-champ-formulaire">
                        <input type="password" name="password" class="champ-forulaire" placeholder="Votre mot de passe" required><br>
                    </div>
                </div>
                <br>
                <input type="submit" id='submit' value='Se connecter' >

                <?php
                    if(isset($_SESSION['erreur'])){
                    echo "<div class=\"erreur\"><h3 class='erreur-message'>".$_SESSION['erreur']."</h3></div>";
                    unset($_SESSION['erreur']);
                }
                ?>  
            </form>
        </div>
    </body>
</html>