<?php include '../Controller/ControllerVerificationDroit.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OffreEntreprise</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/adminEntreprise.css">
    <script src="../asserts/js/AdminEntreprise.js"></script>
    <script src="../asserts/js/rechercheOffre.js"></script>
    <script src="../asserts/js/rechercherEntreprise.js"></script>
    <link rel="icon" href="../asserts/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../asserts/css/Cloche.css">
    <script src="../asserts/js/script.js"></script>
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
                        <button type="button" onclick="window.location.href ='ViewAdminMain.php'" name="accueil" value="Accueil" class="btnCreation">  Accueil </button>
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
                        <img id="photo" src="../../asserts/img/utilisateur.png" alt="Image de l'utilisateur" class="utilisateur">
                        <div id="account-dropdown">
                            <form method="post" action="../../Controller/ControllerBtnDeco.php">
                                <input class="" name="compte" type="submit" value="Mon compte">
                                <input class="" name="deco" type="submit" value="Se déconnecter">

                            </form>

                        </div>
                    </li>
                    <li>
                        <div class="notification">
                            <div class="icon-bell" onclick="toggleNotifications()">
                                <span class="badge" id="notificationBadge"> </span>
                            </div>
                        </div>
                        <div class="burger-menu" id="burgerMenu" style="display: none;">
                            <div class="milieu">
                                <button type="button" id="showUnreadButton">Notifications non lues</button>
                                <button type="button" id="showReadButton">Notifications lues</button>
                            </div>

                            <div>
                                <h2 id="hnonlu">Notifications non lues</h2>
                                <ul id="unreadNotificationList" ></ul>

                            </div>
                            <div>
                                <h2 id="hlu">Notifications lues</h2>
                                <ul id="readNotificationList"></ul>
                            </div>

                            <button type="button" id="validationButton" class="validationButton" ">Valider</button>

                        </div>
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

<div class="body-container">


    <div class="rectangle-mid">
        <form action="" method="post">
            <button name="btnAjoutEntreprise" onclick="window.location.href ='ViewAjoutEntreprise.php'" class="btnAjoutEntreprise" type="button">Ajouter une entreprise</button>
            <button name="btnAjoutOffre" onclick="window.location.href ='ViewDemandeAjoutOffre.php'" class="btnAjoutOffre" type="button">Ajouter une offre</button>
        </form>

        <form method="post" action="">
            <input type="button" value="Afficher les Offres" name="btnAfficherOffre" class="btnAfficherOffre" onclick="afficherOffres()">
            <input type="button" value="Afficher les Entreprises" name="btnAfficherEntreprise" class="btnAfficherEntreprise" onclick="afficherEntreprises()">
        </form>

        <ul id="donneesOffre" class="affichOffre">
        <form id="rechercheOffre">
            <label for="nomCheckbox">
                <input type="checkbox" id="nomCheckbox"> Nom
            </label>
            <label for="domaineCheckbox">
                <input type="checkbox" id="domaineCheckbox"> Domaine
            </label>
            <label for="missionCheckbox">
                <input type="checkbox" id="missionCheckbox"> Missions
            </label>
            <label for="nbEtudiantCheckbox">
                <input type="checkbox" id="nbEtudiantCheckbox"> Nombre d'étudiants recherché
            </label>
            <label for="parcoursCheckbox">
                <input type="checkbox" id="parcoursCheckbox"> Parcours
            </label>

            <br>
            <div id="nomDiv" style="display: none">
                <input type="text" name="nom" id="nom" placeholder="Nom">
            </div>
            <div id="domaineDiv" style="display: none">
                <input type="text" name="domaine" id="domaine" placeholder="Domaine">
            </div>
            <div id="missionDiv" style="display: none">
                <input type="text" name="mission" id="mission" placeholder="Missions">
            </div>
            <div id="nbEtudiantDiv" style="display: none">
                <input type="number" name="nbEtudiant" id="nbEtudiant" placeholder="Nombre d'étudiants">
            </div>
            <div id="parcoursDiv" style="display: none">
                <input type="text" name="parcours" id="parcours" placeholder="Parcours">
            </div>

            <input type="hidden" name="selectedOffer" id="selectedOffer" value="">
            <input type="button" value="Rechercher une offre" onclick="rechercherOffres()" class="rechercheOffre">
        </form>

        <ul id="resultatsOffre" class="result">
        </ul>

        <script src="../asserts/js/rechercheOffre.js"></script>
        </ul>

        <ul id="donneesEntreprise" class="affichEntreprise">
            <form id="rechercheEntreprise">
                <label for="nomEntrepriseCheckbox">
                    <input type="checkbox" id="nomEntrepriseCheckbox"> Nom
                </label>
                <label for="villeCheckbox">
                    <input type="checkbox" id="villeCheckbox"> Ville
                </label>
                <label for="codepostalCheckbox">
                    <input type="checkbox" id="codepostalCheckbox"> Code Postal
                </label>
                <label for="adresseCheckbox">
                    <input type="checkbox" id="adresseCheckbox"> Adresse
                </label>
                <label for="secteurActiviteCheckbox">
                    <input type="checkbox" id="secteurActiviteCheckbox"> Secteur d'activité
                </label>
                <label for="emailCheckbox">
                    <input type="checkbox" id="emailCheckbox"> Adresse email
                </label>
                <label for="numtelCheckbox">
                    <input type="checkbox" id="numtelCheckbox"> Numéro de téléphone
                </label>


                <br>

                <div id="nomEntrepriseDiv" style="display: none">
                    <input type="text" name="nomEntreprise" id="nomEntreprise" placeholder="Nom">
                </div>
                <div id="villeDiv" style="display: none">
                    <input type="text" name="ville" id="ville" placeholder="Ville">
                </div>
                <div id="codepostalDiv" style="display: none">
                    <input type="text" name="codepostal" id="codepostal" placeholder="Code Postal">
                </div>
                <div id="adresseDiv" style="display: none">
                    <input type="text" name="adresse" id="adresse" placeholder="Adresse">
                </div>
                <div id="secteurActiviteDiv" style="display: none">
                    <input type="text" name="secteurActivite" id="secteurActivite" placeholder="Secteur d'activité">
                </div>
                <div id="emailDiv" style="display: none">
                    <input type="email" name="email" id="email" placeholder="Adresse email">
                </div>
                <div id="numtelDiv" style="display: none">
                    <input type="text" name="numtel" id="numtel" placeholder="Numéro de téléphone">
                </div>

                <input type="button" value="Rechercher une entreprise" onclick="rechercherEntreprises()" class="rechercheEntreprise">
            </form>

            <ul id="resultatsEntreprise" class="result">
            </ul>

            <script src="../asserts/js/rechercherEntreprise.js"></script>
        </ul>

    </div>
</div>

<script>
    window.addEventListener('load', function () {
        <?php
        // Vérifiez la session pour afficher la popup
        session_start();
        if (isset($_SESSION['afficher_popup']) && $_SESSION['afficher_popup'] === true) {
            echo 'afficherPopup();';
            // Réinitialisez l'indicateur pour qu'il ne s'affiche qu'une fois.
            $_SESSION['afficher_popup'] = false;
        }
        ?>
    });
</script>

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
                <li><a href="ViewAdminMain.php">Accueil</a></li>
                <li><a href="ViewAdminEtu.php">Etudiant</a></li>
                <li><a href="ViewAdminEntreprise.php">Entreprise</a></li>
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