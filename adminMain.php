<?php

session_start();
ob_start();

if (isset($_POST['btnDeco'])) {
    session_unset();
    session_destroy();

    header('Location: connection.php');
    exit();
}
ob_end_flush();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="asserts/css/adminMenu.css">
</head>
<body class="body">

<header class="header">
    <div class="menu-container">
        <div class="menu-header">
            <nav>
                <form action="Controler/controlerAdminEtu.php" method="post">
                    <ul class="vertical-menu">
                        <li><input type="submit" name="accueil" value="Accueil" class="btnCreation"></li>
                        <li><input type="submit" name="etudiant" value="Etudiant" class="btnCreation"></li>
                        <li><input type="submit" name="entreprise" value="Entreprise" class="btnCreation"></li>
                        <li><input type="submit" name="administration" value="Administration" class="btnCreation"></li>
                    </ul>
                </form>
            </nav>
        </div>

        <div class="header-content">
            <h1 class="title">Gestionnaire des apprentis</h1>
            <img src="asserts/img/logo.png" class="logo">
            <form method="post">
                <input class="btnDeco" value="Déconnexion" type="submit" name="btnDeco">
            </form>



        </div>
    </div>
</header>


<div class="body-container">

    <div class="rectangle-haut">

        <div class="all-text">

            <h3 class = "nbrEtu">Nombre d'étudiant</h3>

            <h3 class = "nbrEnt">Nombre d'entreprise</h3>

            <h3 class = "nbrOff">Nombre d'offre</h3>

            <h3 class = "nbrPers">Nombre de personnel</h3>

        </div>

    </div>

    <div class="rectangle-mid">

        <div class="all-text2">

            <h3 class="titre">Equipe pédagogique</h3>

            <p class="description">Vous trouverez ici l’ensemble des personnes ayant un compte sur l’application. Ils sont trier par leur
                statuts dans l’université.
            </p>

            <div class="rectangle-gauche">

                <p class="nbrCompte"> X comptes</p>

                <h3 class="role">Chargé de développement</h3>

            </div>

            <div class="rectangle-milieu">

                <p class="nbrCompte"> X comptes</p>

                <h3 class="roleSpe">Secrétaire</h3>

            </div>

            <div class="rectangle-droit">

                <p class="nbrCompte"> X comptes</p>

                <h3 class="role">Résponsable pédagogique</h3>

            </div>



        </div>

    </div>

    <div class="rectangle-bas">

        <div class="all-text3">

            <h3 class="titre2">Compte de l'administration</h3>
            <p class="description2">Vous trouverez ici l’ensemble des comptes du personnel avec leurs rôles, leurs permissions, leurs adresse mails etc... </p>

            <div class="button-filtre">

                <button class="compteTous">Tous (X)</button>
                <button class="nbSecretaire">Secrétaire</button>
                <button class="nbCD">Chargés de développement</button>
                <button class="nbRP">Responsable pédagogique</button>

            </div>







        </div>




    </div>


</div>



</body>
</html>

