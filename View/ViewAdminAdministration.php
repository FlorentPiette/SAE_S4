<?php include '../Controller/ControllerVerificationDroit.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/adminAdministration.css">
</head>
<body class="body">

<header class="header">
    <div class="logo-container">
        <img src="../asserts/img/logo.png" class="logo">
    </div>

    <div class="menu-container">
        <nav>
            <form method="post" action="../Controller/ControllerBtnDeco.php">
                <ul class="vertical-menu">
                    <li>
                        <button type="button" onclick="window.location.href ='ViewAdminMainTest.php'" name="accueil" value="Accueil" class="btnCreation">  Acceuil </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='ViewAdminEtu.php'" name="etudiant" value="Etudiant" class="btnCreation"> Etudiant </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='ViewAdminEntreprise.php'" name="entreprise" value="Entreprise" class="btnCreation"> Entreprise </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='ViewAdminAdministration.php'" name="adminitrsation" class="btnCreation"> Administration </button>
                    </li>
                    <li id="account-photo">
                        <img id="photo" src="../asserts/img/utilisateur.png" alt="Image de l'utilisateur" class="utilisateur">
                        <div id="account-dropdown">
                            <button type="submit" name="compte" class="">Mon compte</button>
                            <button type="submit" name="deco" class="">Se déconnecter</button>


                        </div>
                    </li>
                    <li>
                        <a><img src="../asserts/img/notification.png" alt="Description de l'image" class="notification"></a>
                    </li>
                </ul>
            </form>
        </nav>
    </div>

</header>


<div class="body-container">

    <h1 class="titlePrinci">Bienvenue dans le Gestion du Personnel</h1>

    <div class="rectangle-haut">
        <div class="all-text">
            <div class="rectangleNbr">
                <h3 class="nbrEtu">Nombre d'étudiant</h3>
            </div>

            <div class="rectangleNbr">
                <h3 class="nbrEnt">Nombre d'entreprise</h3>
            </div>

            <div class="rectangleNbr">
                <h3 class="nbrOff">Nombre d'offre</h3>
            </div>

            <div class="rectangleNbr">
                <h3 class="nbrPers">Nombre de personnel</h3>
            </div>
        </div>
    </div>


</div>

<div class="rectangle-mid">

    <div class="all-text2">

        <h3 class="titre">Equipe pédagogique</h3>



        <p class="description">Vous trouverez ici l’ensemble des personnes ayant un compte sur l’application. Ils sont triés par leur
            statut dans l’université.
        </p>

        <div class="all-text3">

            <h3 class="titre2">Compte de l'administration</h3>
            <form method="post" >

                <button type="button" onclick="window.location.href ='ViewAjoutAdministration.php'" name="btnAjoutAdministration" class="ajoutAdministration" > Ajouter Administration </button>

            </form>
            <p class="description2">Vous trouverez ici l’ensemble des comptes du personnel avec leurs rôles, leurs permissions, leurs adresses mail etc... </p>

            <div class="button-filtre">

                <button class="compteTous" id="tous">Tous (X)</button>
                <button class="nbSecretaire" id="secretaire">Secrétaire</button>
                <button class="nbCD" id="cd">Chargé de développement</button>
                <button class="nbRP" id="rp">Responsable pédagogique</button>

            </div>

            <table id="dataTable">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Formation</th>
                    <th>Rôle</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>



    </div>

</div>

</div>

<script src="../asserts/js/AdminAdminitration.js"></script>

<footer class="footer" id="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h2>À propos de nous</h2>
            <p>Le Gestionnaire des Apprentis est une plateforme dédiée à la gestion des étudiants, des offres et des entreprises pour les programmes d'apprentissage.</p>
        </div>

        <div class="footer-section contact">
            <h2>Contactez-nous</h2>
            <p>Email : communication@uphf.fr</p>
            <p> Université Polytechnique Hauts-de-France - Campus Mont Houy - 59313 Valenciennes Cedex 9 | +33 (0)3 27 51 12 34</p>
        </div>

        <div class="footer-section links">
            <h2>Liens rapides</h2>
            <ul>
                <li><a href="ViewAdminMainTest.php">Accueil</a></li>
                <li><a href="ViewAdminEtu.php">Etudiants</a></li>
                <li><a href="ViewAdminEntreprise.php">Entreprises</a></li>
                <li><a href="ViewAdminAdministration.php">Administration</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2023 Gestionnaire des Apprentis | Tous droits réservés</p>
    </div>
</footer>
</body>
</html>
