<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/adminEtu.css">
</head>
<body class="body">

<header class="header">
    <div class="menu-container">
        <div class="menu-header">
            <nav>
                <form  method="post">
                    <ul class="vertical-menu">
                        <li><button type="button" onclick="window.location.href ='ViewAdminMain.html'" name="accueil"class="btnCreation"> Acceuil </button></li>
                        <li><button type="button"  onclick="window.location.href ='ViewAdminEtu.php'" name="etudiant"  class="btnCreation"> Etudiant </button></li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminEntreprise.php'" name="entreprise" class="btnCreation"> Entreprise </button> </li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminAdministration.php'" name="adminitrsation"  class="btnCreation"> Administration </button> </li>
                    </ul>
                </form>
            </nav>
        </div>

        <div class="header-content">
            <h1 class="title">Gestionnaire des apprentis</h1>
            <img src="../asserts/img/logo.png" class="logo">
            <form method="post" action="../Controller/ControllerBtnDeco.php">
                <input class="btnDeco" value="Déconnexion" type="submit" name="btnDeco">
            </form>
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
        <form

                method="post">
            <button name="btnAjoutEtu" onclick="window.location.href ='ViewAjoutEtudiant.php'" class="btnAjoutEtu" type="button" >  Ajouter </button>
        </form>

        <form id="rechercheForm">
            <label for="nomCheckbox">
                <input type="checkbox" id="nomCheckbox"> Nom
            </label>
            <label for="prenomCheckbox">
                <input type="checkbox" id="prenomCheckbox"> Prénom
            </label>
            <label for="ineCheckbox">
                <input type="checkbox" id="ineCheckbox"> INE
            </label>
            <label for="villeCheckbox">
                <input type="checkbox" id="villeCheckbox"> Ville
            </label>
            <label for="codepostalCheckbox">
                <input type="checkbox" id="codepostalCheckbox"> Code Postal
            </label>
            <label for="formationCheckbox">
                <input type="checkbox" id="formationCheckbox"> Formation
            </label>
            <label for="anneeEtudeCheckbox">
                <input type="checkbox" id="anneeEtudeCheckbox"> Année d'étude
            </label>
            <label for="typeEntrepriseCheckbox">
                <input type="checkbox" id="typeEntrepriseCheckbox"> Type d'entreprise
            </label>
            <label for="typeMissionCheckbox">
                <input type="checkbox" id="typeMissionCheckbox"> Type de missions
            </label>
            <label for="mobile">
                <input type="checkbox" id="mobileCheckbox"> Mobile
            </label>



            <div id="nomDiv" style="display: none">
                <input type="text" name="nom" id="nom" placeholder="Nom">
            </div>
            <div id="prenomDiv" style="display: none">
                <input type="text" name="prenom" id="prenom" placeholder="Prénom">
            </div>
            <div id="ineDiv" style="display: none">
                <input type="text" name="ine" id="ine" placeholder="INE">
            </div>
            <div id="villeDiv" style="display: none">
                <input type="text" name="ville" id="ville" placeholder="Ville">
            </div>
            <div id="codepostalDiv" style="display: none">
                <input type="number" name="codepostal" id="codepostal" placeholder="Code Postal">
            </div>
            <div id="formationDiv" style="display: none">
                <input type="text" name="formation" id="formation" placeholder="Formation">
            </div>
            <div id="anneeEtudeDiv" style="display: none">
                <input type="number" name="anneeEtude" id="anneeEtude" placeholder="Année d'étude">
            </div>
            <div id="typeEntrepriseDiv" style="display: none">
                <input type="text" name="typeEntreprise" id="typeEntreprise" placeholder="Type d'entreprise">
            </div>
            <div id="typeMissionDiv" style="display: none">
                <input type="text" name="typeMission" id="typeMission" placeholder="Type de missions">
            </div>
            <div id="mobileDiv" style="display: none">
                <label for="mobile">
                    <input type="checkbox" name="mobile" id="mobile"> Mobile
                </label>
            </div>

            <input type="button" value="Rechercher un étudiant" onclick="rechercherEtudiants()">
        </form>

        <ul id="resultats" class="result">
            <!-- Les résultats seront affichés ici -->
        </ul>
        <!-- Affichage des résultats -->

    </div>
</div>

<script src="../asserts/js/rechercheEtu.js"></script>

</body>
</html>
