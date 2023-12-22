<?php
include '../Controller/ControllerVerificationDroit.php';
?>
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
                <form  method="post" action="../Controller/ControllerBtnDeco.php">
                    <ul class="vertical-menu">
                        <li><button type="button" onclick="window.location.href ='ViewAdminMain.html'" name="accueil"class="btnCreation"> Acceuil </button></li>
                        <li><button type="button"  onclick="window.location.href ='ViewAdminEtu.php'" name="etudiant"  class="btnCreation"> Etudiant </button></li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminEntreprise.php'" name="entreprise" class="btnCreation"> Entreprise </button> </li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminAdministration.php'" name="adminitrsation"  class="btnCreation"> Administration </button> </li>
                        <li> <button type="submit" name="deco" class="btnCreation"> Déconnexion </button> </li>
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

<div id="menuBurger" class="menu-burger">
    <div id="closeBtn" class="close-btn" onclick="fermerMenuBurger()">×</div>

    <div class="menu-content">
        <h2>Informations de l'étudiant</h2>
        <p><span id="infoNom"></span></p>
        <p><span id="infoPrenom"></span></p>
        <p><span id="infoIne"></span></p>
        <p><span id="infoDate"></span></p>
        <p><span id="infoAdresse"></span></p>
        <p><span id="infoVille"></span></p>
        <p><span id="infoCP"></span></p>
        <p><span id="infoAnnee"></span></p>
        <p><span id="infoFormation"></span></p>
        <p><span id="infoEmail"></span></p>
        <p><span id="infoActif"></span></p>

        <p><span id="infoTypeEntreprise"></span></p>
        <p><span id="infoTypeMission"></span></p>
        <p><span id="infoMobile"></span></p>


        <script src="../asserts/js/rechercheEtu.js"></script>
        <button onclick="redirectModifierProfil()">Modifier le profil</button>
    </div>
</div>

<div class="body-container">
    <div class="rectangle-haut">
        <div class="all-text">
            <h3 class="nbrEtu">Nombre d'étudiants</h3>
            <h3 class="nbrEnt">Nombre d'entreprises</h3>
            <h3 class="nbrOff">Nombre d'offres</h3>
            <h3 class="nbrPers">Nombre de personnels</h3>
        </div>
    </div>

    <div class="rectangle-mid">
        <form method="post">
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
            <label for="codepostalCheckbox">
                <input type="checkbox" id="codepostalCheckbox"> Code Postal
            </label>
            <label for="formationCheckbox">
                <input type="checkbox" id="formationCheckbox"> Formation
            </label>
            <label for="anneeEtudeCheckbox">
                <input type="checkbox" id="anneeEtudeCheckbox"> Année d'étude
            </label>
            <label for="autresCheckbox">
                <input type="checkbox" id="autresCheckbox"> Autres
            </label>



            <div id="nomDiv" style="display: none">
                <label for="nom"></label><input type="text" name="nom" id="nom" placeholder="Nom">
            </div>
            <div id="prenomDiv" style="display: none">
                <label for="prenom"></label><input type="text" name="prenom" id="prenom" placeholder="Prénom">
            </div>
            <div id="ineDiv" style="display: none">
                <label for="ine"></label><input type="text" name="ine" id="ine" placeholder="INE">
            </div>
            <div id="codepostalDiv" style="display: none">
                <label for="codepostal"></label><input type="number" name="codePostal" id="codePostal" placeholder="Code Postal">
            </div>
            <div id="formationDiv" style="display: none">
                <label for="formation"></label><input type="text" name="formation" id="formation" placeholder="Formation">
            </div>
            <div id="anneeEtudeDiv" style="display: none">
                <label for="anneeEtude"></label><input type="number" name="anneeEtude" id="anneeEtude" placeholder="Année d'étude">
            </div>
            <div id="autresDiv" style="display: none">
                <label for="email">
                    <input type="text" name="email" id="email" placeholder="Adresse Email">
                </label>
                <label for="adresse">
                    <input type="text" name="adresse" id="adresse" placeholder="Adresse">
                </label>
                <label for="ville">
                    <input type="text" name="ville" id="ville" placeholder="Ville">
                </label>
                <label for="typeEntreprise">
                    <input type="text" name="typeEntreprise" id="typeEntreprise" placeholder="Type d'entreprise">
                </label>
                <label for="typeMission">
                    <input type="text" name="typeMission" id="typeMission" placeholder="Type de missions">
                </label>
                <label for="mobileSelect">
                    Mobile:
                    <select id="mobileSelect">
                        <option value="peuimporte">Peu importe</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </label>
                <label for="actifSelect">
                    Actif:
                    <select id="actifSelect">
                        <option value="peuimporte">Peu importe</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </label>
            </div>

            <input type="button" value="Rechercher un étudiant" onclick="rechercherEtudiants()" class="btnRechercheEtu">
        </form>

        <table id="dataTable">
            <thead>
            <tr>
                <th class="colonne">Nom</th>
                <th class="colonne">Prénom</th>
                <th class="colonne">INE</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
</div>

<script src="../asserts/js/rechercheEtu.js"></script>

</body>
</html>
