<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chargé de Développement</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/Cdmain.css">
</head>
<body class="body">

<header class="header">
    <div class="menu-container">
        <div class="menu-header">
            <nav>
                <form >
                    <ul class="vertical-menu">
                        <li><button type="button" onclick="window.location.href ='ViewCdMain.php'" name="accueil" value="Accueil" class="btnCreation">  Acceuil </button</li>
                        <li><button type="button" onclick="window.location.href ='ViewCdEtu.php'" name="etudiant" value="Etudiant" class="btnCreation"> Etudiant </button> </li>
                        <li><button type="button" onclick="window.location.href ='ViewCdEntreprise.php'" name="entreprise" value="Entreprise" class="btnCreation"> Entreprise </button></li>
                    </ul>
                </form>
            </nav>
        </div>

        <div class="header-content">
            <h1 class="title">Gestionnaire des apprentis</h1>
            <img src="../asserts/img/logo.png" class="logo">
        </div>
    </div>
</header>

<div class="body-container">
    <div class="rectangle-haut">
        <div class="all-text">
            <h3 class="nbrEtu">Nombre d'étudiant</h3>
            <h3 class="nbrEnt">Nombre d'entreprise</h3>
            <h3 class="nbrOff">Nombre d'offre</h3>
            <h3 class="nbrPers">Nombre de personnel</h3>
        </div>
    </div>

    <div class="rectangle-mid">
        <!-- Contenu du milieu de la page -->
    </div>

    <div class="rectangle-bas">
        <!-- Contenu du bas de la page -->

        <!-- Bouton de retour au menu de l'administrateur -->
        <div id="bouton-retour-admin" style="display: none;">
            <button id="retour-admin">Retour au menu de l'administrateur</button>
        </div>
    </div>
</div>

<script src="../asserts/js/cdJS.js"></script>
</body>
</html>
