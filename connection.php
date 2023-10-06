<?php

    session_start();
    ob_start();
    ob_end_flush();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Principale</title>

    <link rel="stylesheet" type="text/css" href="asserts/css/connection.css" />
</head>
<body class="body">

<header class="header">



    <div class="cercle">

        <img src="asserts/img/perso.png" class="perso" alt="Perso en haut du rectangle principale">

        <div class="perso">

        </div>

    </div>

    <div class="princi-rectangle">

        <div class="id-rectangle">

            <div class="petit-rectangle">

                <img src="asserts/img/perso2.png" class="perso2" alt="Petit perso id">

            </div>




        </div>

        <form action="Controler/controlerConAdmin.php" method="post">
            <input type="text" name="email" class="email" placeholder="Email">
            <input type="password" name="mdp" class="mdp" placeholder="Mot de passe">
            <input type="submit" value="Connexion" name="valider" class="btnConnexion">

        </form>


        <div class="mdp-rectangle">

            <div class="petit2-rectangle">

                <img src="asserts/img/cadena.png" class="cadena" alt="Petit cadena mdp">

            </div>


        </div>

        <a href="OubliMotDePasse.php" class="link-p">
            <p class="mdp-oublie">Mot de passe oublié ?</p>
        </a>
    </div>





</header>

<form action="Controler/controlerConAdmin.php" method="post">
    <input type="submit" value="Retour" name="btnRetour" class="btnRetour">
</form>



</body>




</html>
