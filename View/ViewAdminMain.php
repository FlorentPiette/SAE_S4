<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="/asserts/css/adminMenu.css">
</head>
<body class="body">

<header class="header">
    <div class="menu-container">
        <div class="menu-header">
            <nav>
                <form  method="post" action="../Controller/ControllerBtnDeco.php">
                    <ul class="vertical-menu">
                        <li><button type="button" onclick="window.location.href ='ViewAdminMain.php'" name="accueil" value="Accueil" class="btnCreation">  Acceuil </button> </li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminEtu.php'" name="etudiant" value="Etudiant" class="btnCreation"> Etudiant </button> </li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminEntreprise.php'" name="entreprise" value="Entreprise" class="btnCreation"> Entreprise </button></li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminAdministration.php'" name="adminitrsation"  class="btnCreation"> Administration </button> </li>
                        <li> <button type="submit" name="deco" class="btnCreation"> Déconnexion </button> </li>
                    </ul>
                </form>
            </nav>
        </div>

        <div class="header-content">
            <h1 class="title">Gestionnaire des apprentis</h1>
            <img src="/asserts/img/logo.png" class="logo" alt="logo uphf">
            <form method="post" action="/Controller/ControllerBtnDeco.php">

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
