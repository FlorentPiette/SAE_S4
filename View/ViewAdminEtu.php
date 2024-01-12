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
    <div class="logo-container">
        <img src="../asserts/img/logo.png" class="logo">
    </div>

    <script src="../asserts/js/testJS.js"></script>

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
                            <form method="post" action="../Controller/ControllerBtnDeco.php">
                                <input class="" name="compte" type="submit" value="Mon compte">
                                <input class="" name="deco" type="submit" value="Se déconnecter">

                            </form>

                        </div>
                    </li>
                    <li>
                        <a><img src="../asserts/img/notification.png" alt="Description de l'image" class="notification"></a>
                    </li>
                </ul>
            </form>
        </nav>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var photo = document.getElementById("photo");
            var dropdown = document.getElementById("account-dropdown");

            photo.addEventListener("click", function (event) {
                event.stopPropagation(); // Empêche la propagation du clic à d'autres éléments parents
                dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
            });

            // Ajout d'un écouteur d'événements sur le document pour fermer le menu s'il est ouvert et que l'on clique en dehors
            document.addEventListener("click", function (event) {
                if (dropdown.style.display === "block" && !event.target.closest('#account-photo')) {
                    dropdown.style.display = "none";
                }
            });
        });


    </script>

</header>

<div id="menuBurger" class="menu-burger">
    <div id="closeBtn" class="close-btn" onclick="fermerMenuBurger()">×</div>

    <div class="menu-content">
        <h2>Informations de l'étudiant</h2>
        <hr class="separator-line">

        <p class="test"><span id="infoNom"></span></p>
        <p class="test"><span id="infoPrenom"></span></p>
        <p class="test"><span id="infoIne"></span></p>
        <p class="test"><span id="infoDate"></span></p>
        <p class="test"><span id="infoAdresse"></span></p>
        <p class="test"><span id="infoVille"></span></p>
        <p class="test"><span id="infoCP"></span></p>
        <p class="test"><span id="infoAnnee"></span></p>
        <p class="test"><span id="infoFormation"></span></p>
        <p class="test"><span id="infoEmail"></span></p>
        <p class="test"><span id="infoActif"></span></p>

        <p class="test"><span id="infoTypeEntreprise"></span></p>
        <p class="test"><span id="infoTypeMission"></span></p>
        <p class="test"><span id="infoMobile"></span></p>

        <hr class="separator-line">

        <script src="../asserts/js/rechercheEtu.js"></script>
        <button onclick="redirectModifierProfil()" class="modifProfil">Modifier le profil</button>
    </div>
</div>

<div class="body-container">


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

            <br>

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
                        <option value="0">Peu importe</option>
                        <option value="10">10km</option>
                        <option value="50">50km</option>
                        <option value="100">100km</option>
                        <option value="500">500km</option>
                        <option value="1000">1000km</option>
                        <option value="99999">International</option>
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
