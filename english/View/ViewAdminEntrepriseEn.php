<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/adminEntreprise.css">
    <script src="../../assets/js/AdminEntreprise.js"></script>
    <script src="../../assets/js/rechercheOffre.js"></script>
    <script src="../../assets/js/rechercherEntreprise.js"></script>
</head>
<body class="body">


<header class="header">
    <div class="logo-container">
        <img src="../../assets/img/logo.png" class="logo">
    </div>

    <div class="menu-container">
        <nav>
            <form method="post" action="../../Controller/ControllerBtnDeco.php">
                <ul class="vertical-menu">
                    <li>
                        <button type="button" onclick="window.location.href ='ViewAdminMainTestEn.php'" name="accueil" value="Accueil" class="btnCreation">Homepage</button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='ViewAdminEtuEn.php'" name="etudiant" value="Etudiant" class="btnCreation">Student</button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='ViewAdminEntrepriseEn.php'" name="entreprise" value="Entreprise" class="btnCreation">Company</button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='ViewAdminAdministrationEn.php'" name="adminitrsation" class="btnCreation">Administration</button>
                    </li>

                    <li id="account-photo">
                        <img id="photo" src="../../assets/img/utilisateur.png" alt="Image de l'utilisateur" class="utilisateur">
                        <div id="account-dropdown">
                            <form method="post" action="../../Controller/ControllerBtnDeco.php">
                                <input class="" name="compte" type="submit" value="My account">
                                <input class="" name="deco" type="submit" value="Disconnect">

                            </form>

                        </div>
                    </li>
                    <li>
                        <a><img src="../../assets/img/notification.png" alt="Description de l'image" class="notification"></a>
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
            <button name="btnAjoutEntreprise" onclick="window.location.href ='ViewAjoutEntreprise.php'" class="btnAjoutEntreprise" type="button">Add a company</button>
            <button name="btnAjoutOffre" onclick="window.location.href ='ViewDemandeAjoutOffre.php'" class="btnAjoutOffre" type="button">Add an offer</button>
        </form>

        <form method="post" action="">
            <input type="button" value="Show offers" name="btnAfficherOffre" class="btnAfficherOffre" onclick="afficherOffres()">
            <input type="button" value="Show companies" name="btnAfficherEntreprise" class="btnAfficherEntreprise" onclick="afficherEntreprises()">
        </form>

        <ul id="donneesOffre" class="affichOffre">
        <form id="rechercheOffre">
            <label for="nomCheckbox">
                <input type="checkbox" id="nomCheckbox"> Name
            </label>
            <label for="domaineCheckbox">
                <input type="checkbox" id="domaineCheckbox"> Domain
            </label>
            <label for="missionCheckbox">
                <input type="checkbox" id="missionCheckbox"> Missions
            </label>
            <label for="nbEtudiantCheckbox">
                <input type="checkbox" id="nbEtudiantCheckbox"> Number of students searched
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
            <input type="button" value="Search offer" onclick="rechercherOffres()" class="rechercheOffre">
        </form>

        <ul id="resultatsOffre" class="result">
        </ul>

        <script src="../../assets/js/rechercheOffre.js"></script>
        </ul>

        <ul id="donneesEntreprise" class="affichEntreprise">
            <form id="rechercheEntreprise">
                <label for="nomEntrepriseCheckbox">
                    <input type="checkbox" id="nomEntrepriseCheckbox"> Name
                </label>
                <label for="villeCheckbox">
                    <input type="checkbox" id="villeCheckbox"> City
                </label>
                <label for="codepostalCheckbox">
                    <input type="checkbox" id="codepostalCheckbox"> Postal Code
                </label>
                <label for="adresseCheckbox">
                    <input type="checkbox" id="adresseCheckbox"> Address
                </label>
                <label for="secteurActiviteCheckbox">
                    <input type="checkbox" id="secteurActiviteCheckbox"> Activity sector
                </label>
                <label for="emailCheckbox">
                    <input type="checkbox" id="emailCheckbox"> Email address
                </label>
                <label for="numtelCheckbox">
                    <input type="checkbox" id="numtelCheckbox"> Phone number
                </label>


                <br>

                <div id="nomEntrepriseDiv" style="display: none">
                    <input type="text" name="nomEntreprise" id="nomEntreprise" placeholder="Name">
                </div>
                <div id="villeDiv" style="display: none">
                    <input type="text" name="ville" id="ville" placeholder="City">
                </div>
                <div id="codepostalDiv" style="display: none">
                    <input type="text" name="codepostal" id="codepostal" placeholder="Postal Code">
                </div>
                <div id="adresseDiv" style="display: none">
                    <input type="text" name="adresse" id="adresse" placeholder="Address">
                </div>
                <div id="secteurActiviteDiv" style="display: none">
                    <input type="text" name="secteurActivite" id="secteurActivite" placeholder="Activity sector">
                </div>
                <div id="emailDiv" style="display: none">
                    <input type="email" name="email" id="email" placeholder="Email address">
                </div>
                <div id="numtelDiv" style="display: none">
                    <input type="text" name="numtel" id="numtel" placeholder="Phone number">
                </div>

                <input type="button" value="Search a company" onclick="rechercherEntreprises()" class="rechercheEntreprise">
            </form>

            <ul id="resultatsEntreprise" class="result">
            </ul>

            <script src="../../assets/js/rechercherEntreprise.js"></script>
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
            <h2>About us</h2>
            <p>The Apprentice Manager is a platform dedicated to the management of students, offers, and companies for apprentice programs.</p>
        </div>

        <div class="footer-section contact">
            <h2>Contact us</h2>
            <p>Email : communication@uphf.fr</p>
            <p> Université Polytechnique Hauts-de-France - Campus Mont Houy - 59313 Valenciennes Cedex 9 | +33 (0)3 27 51 12 34</p>
        </div>

        <div class="footer-section links">
            <h2>Quick links</h2>
            <ul>
                <li><a href="../../View/ViewAdminMain.php">Homepage</a></li>
                <li><a href="../../View/ViewAdminEtu.php">Students</a></li>
                <li><a href="../../View/ViewAdminEntreprise.php">Companies</a></li>
                <li><a href="../../View/ViewAdminAdministration.php">Administration</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2023 Apprentice Manager | All rights reserved</p>
    </div>
</footer>
</body>

</html>