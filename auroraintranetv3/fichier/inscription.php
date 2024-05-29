<?php
session_start();
?>
<html>
    <header>
        <meta charset="utf-8">
        <title>AURORA | Inscrription</title>
        <link rel="stylesheet" href="../login.css" type="text/css"/>
    </header>
    <body>
        <h1>Formulaire d'inscription Aurora</h1>
        <form action="fonctionAjoutUtilisateur.php" method="POST">
        <h2>Créer un utilisateur</h2>
        
        <div class="input-formulaire">
            <p>Nom de l'utilisateur</p>
            <div class="input-champ-formulaire">
                <input type="text" placeholder="Entrer le nom de l'utilisateur" name="nom" required>
            </div>
        </div>
        <br>
        <div class="input-formulaire">
            <p>Prénom de l'utilisateur</p>
            <div class="input-champ-formulaire">
                <input type="text" placeholder="Entrer le prénom de l'utilisateur" name="prenom" required>
            </div>
        </div>
        <br>
        <div class="input-formulaire">
            <p>Email de l'utilisateur</p>
            <div class="input-champ-formulaire">
                <input type="email" placeholder="Entrer l'email de l'utilisateur" name="email" required>
            </div>
        </div>
        <br>
        <div class="input-formulaire">
            <p>Mot de passe de l'utilisateur</p>
            <div class="input-champ-formulaire">
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            </div>
        </div>
        <br>
        <input type="submit" id='submit' value='Créer utilisateur' >

        </form>

        <?php
            if(isset($_SESSION['erreur'])){
                echo "<div class=\"erreur\"><h3 class='erreur-message'>".$_SESSION['erreur']."</h3></div>";
                unset($_SESSION['erreur']);
            }
        ?> 

    </body>
</html>
