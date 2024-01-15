<?php
include "../Controller/ControllerVerificationDroit.php"
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="/asserts/css/adminMenuTest.css">
    <link rel="stylesheet" type="text/css" href="../asserts/css/ajoutEtudiant.css">
    <link rel="stylesheet" type="text/css" href="../asserts/css/demandeAjoutOffre.css">
    <link rel="stylesheet" type="text/css" href="../asserts/css/AffichageEtudiant.css">
    <link rel="stylesheet" type="text/css" href="../asserts/css/AffichageOffre.css">
    <link rel="stylesheet" type="text/css" href="../asserts/css/AjoutPersonnel.css">
    <link rel="stylesheet" type="text/css" href="../asserts/css/AffichageEntreprise.css">

    <script src="../asserts/js/AdminMain.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" href="../asserts/img/logo.png" type="image/x-icon">


    <script>
        // Écouteur d'événements pour le bouton d'ouverture
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('AjEtu').addEventListener('click', function () {
                openPopup('popUpEtu');
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('AjOffre').addEventListener('click', function () {
                openPopup('popUpOffre');
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('AjPerso').addEventListener('click', function () {
                openPopup3();
            });
        });

    </script>
</head>
<body class="body">

<div id="popUpEtu" class="popupEtu">

    <div class="popup-content" id="formulaireAjoutEtudiant">


        <form action="../Controller/ControllerAjoutEtudiant.php" method="post" >
            <ul>
                <li>
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" class="input" />
                </li>
                <li>
                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" class="input" />
                </li>
                <li>
                    <label for="dateDeNaissance">Date de naissance:</label>
                    <input type="date" id="dateDeNaissance" name="dateDeNaissance" class="input" />
                </li>
                <li>
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" name="adresse" class="input" />
                </li>
                <li>
                    <label for="ville">Ville:</label>
                    <input type="text" id="ville" name="ville" class="input" />
                </li>
                <li>
                    <label for="codePostal">Code postal:</label>
                    <input type="number" id="codePostal" name="codePostal" class="input" />
                </li>
                <li>
                    <label for="ine">INE:</label>
                    <input type="text" id="ine" name="ine" class="input"/>
                </li>
                <li>
                    <label for="anneeEtude">Année d'étude:</label>
                    <input type="number" id="anneeEtude" name="anneeEtude" class="input" />
                </li>
                <li>
                    <label for="formation">Formation:</label>
                    <select name="formation" id="formation" class="input">
                        <option value="BUT Info Parcours A">BUT Info Parcours A</option>
                        <option value="BUT Info Parcours B">BUT Info Parcours B</option>
                    </select>
                </li>
                <li>
                    <label for="mission">Type de mission:</label>
                    <input type="text" id="mission" name="mission" class="input" />
                </li>
                <li>
                    <label for="entreprise">Type d'entreprise:</label>
                    <input type="text" id="entreprise" name="entreprise" class="input" />
                </li>
                <li>
                    <label for="mobile">
                        Mobilité:
                        <select name="mobile" id="mobile">
                            <option value="10">10km</option>
                            <option value="50">50km</option>
                            <option value="100">100km</option>
                            <option value="500">500km</option>
                            <option value="1000">1000km</option>
                            <option value="99999">International</option>
                        </select>
                    </label>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="input" />
                </li>
                <li>
                    <label for="mdp">Mot de passe:</label>
                    <input type="password" id="mdp" name="mdp" class="input"/>
                </li>
            </ul>

            <div class="button">
                <button type="submit" id="ajoutEtudiant" name="ajoutEtudiant">Valider</button>
            </div>
        </form>

        <span class="close" onclick="closePopup('popUpEtu')">&times;</span>
    </div>
</div>

<div id="popUpOffre" class="popupEtu">
    <div class="popup-content">

        <form action="../Controller/ControllerAjouOffre.php" method="post" id="formulaire">

            <p>
                Nom de l'offre :
            </p>
            <label for="offre"></label><input type="text" name="Nom" id="offre">

            <p>
                Domaine de l'offre :
            </p>
            <label for="domaine"></label><input type="text" name="Domaine" id="domaine">

            <p>
                Missions :
            </p>
            <label for="mission"></label><textarea name="Mission" id="mission" class="zoneText"></textarea>

            <p>
                Nombre d'étudiants :
            </p>
            <label for="nbetudiant"></label><input type="text" name="NbEtudiant" id="nbetudiant"><br>

            <p id="message" class="error-message"></p>

            <p>Entreprise :</p>
            <label for="entreprise"></label><select name="entreprise" id="entreprise">
                <?php
                include_once '../Model/ConnexionBDD.php';
                $conn = Conn::getInstance();
                $sql = "SELECT identreprise, nom FROM entreprise";
                $result = $conn->query($sql);
                // Boucler à travers les résultats de la requête pour afficher les entreprises dans la liste déroulante
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['identreprise'] . "'>" . $row['nom'] . "</option>";
                }
                ?>
            </select><br>


            <button type="button" id="redirigerVersAjoutEntreprise" onclick="redirectEntreprise()">Création d'une entreprise</button>

            <p>Autre(s) fichier(s) :</p>
            <input type="file" name="fichier" id="fichier"><br>
            <br>
            <p>
                Parcours :
            </p>
            <label for="parcours"></label>
            <select name="Parcours" id="parcours">
                <option value="GEII">GEII</option>
                <option value="GIM">GIM</option>
                <option value="GMP">GMP</option>
                <option value="GEA">GEA</option>
                <option value="TCV">TCV</option>
                <option value="QLIQ">QLIQ</option>
                <option value="TCc">TCc</option>
                <option value="INFO">INFO</option>
                <option value="Mph">Mph</option>
            </select><br>

            <label for="brouillon"></label><input type="checkbox" name="Brouillon" id="brouillon">
            <label>
                Enregistrer en tant que brouillon
            </label><br>

            <label for="visible"></label><input type="checkbox" name="Visible" id="visible">
            <label>
                Voulez-vous que l'offre soit visible ?
            </label><br>

            <input type="submit" value="Enregistrer l'offre" id="enregistreroffre" name="EnregistrerOffre"><br>
        </form>

        <span class="close" onclick="closePopup2()">&times;</span>
    </div>
</div>

<div id="popUpPerso" class="popupEtu">
    <div class="popup-content">

        <form action="../Controller/ControllerAjoutAdministration.php" method="POST">
            <ul>
                <li>
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" />
                </li>
                <li>
                    <label for="prenom">Prenom:</label>
                    <input type="text" id="prenom" name="prenom" />
                </li>
                <li>
                    <div class="formation-rectangle">

                        <select id="formation-select" name="formation">
                            <option value="GEII">GEII</option>
                            <option value="GIM">GIM</option>
                            <option value="GMP">GMP</option>
                            <option value="GEA">GEA</option>
                            <option value="TCV">TCV</option>
                            <option value="QLIQ">QLIQ</option>
                            <option value="TCc">TCc</option>
                            <option value="INFO">INFO</option>
                            <option value="Mph">Mph</option>
                        </select>

                    </div>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" />
                </li>
                <li>
                    <label for="mdp">Mot de passe:</label>
                    <input type="text" id="mdp" name="mdp" />
                </li>
                <li>
                    <div class="role-rectangle">

                        <select id="role-select" name="role">
                            <option value="admin">Administration</option>
                            <option value="rp">Responsable pédagogique</option>
                            <option value="cd">Chargés de développement</option>
                            <option value="rs">Responsable du service</option>
                            <option value="secretaire">Secrétaire</option>
                        </select>

                    </div>
                </li>
            </ul>

            <div class="button">
                <button type="submit" id="ajoutPersonnel" name="valider">Valider</button>
            </div>
        </form>

        <span class="close" onclick="closePopup3()">&times;</span>
    </div>
</div>


<header class="header">
    <div class="logo-container">
        <img src="../asserts/img/logo.png" class="logo">
    </div>

    <div class="menu-container">
        <nav>
            <form method="post" action="../Controller/ControllerBtnDeco.php">
                <ul class="vertical-menu">
                    <li>
                        <button type="button" onclick="window.location.href ='ViewSecMain.php'" name="accueil" value="Accueil" class="btnCreation">  Acceuil </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='ViewSecEtu.php'" name="etudiant" value="Etudiant" class="btnCreation"> Etudiant </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='ViewSecEntreprise.php'" name="entreprise" value="Entreprise" class="btnCreation"> Entreprise </button>
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



<div class="body-container">

    <div class="rectangle-haut">
        <div class="image-box">
            <img class="banniere" src="../asserts/img/banniere.png" alt="Bannière">
        </div>
        <div class="all-text">
            <div class="rectangle-info">
                <div class="info-box">
                    <h3 class="nbrEtu">Nombre d'étudiants</h3>
                    <h3 class="nbr">X</h3>
                </div>
            </div>
            <div class="rectangle-info">
                <div class="info-box">
                    <h3 class="nbrEnt">Nombre d'entreprises</h3>
                    <h3 class="nbr">X</h3>
                </div>
            </div>
            <div class="rectangle-info">
                <div class="info-box">
                    <h3 class="nbrOff">Nombre d'offres</h3>
                    <h3 class="nbr">X</h3>
                </div>
            </div>
        </div>
        <div class="titreAppli">
            <h3 class="title">Bienvenue sur le Gestionnaire des Apprentis</h3>
        </div>
    </div>



    <section class="section-mid">

        <div class="rectangle">

            <h3 class="titreAjout">Ajouter un étudiant</h3>
            <input class="AjRapide" type="button" value="Ajouter" id="AjEtu">

        </div>
        <div class="rectangle">

            <h3 class="titreAjout">Ajouter une offre</h3>
            <input class="AjRapide" type="button" value="Ajouter" id="AjOffre">

        </div>
        <div class="rectangle">

            <h3 class="titreAjout">Ajouter un personnel</h3>
            <input class="AjRapide" type="button" value="Ajouter" id="AjPerso">

        </div>

    </section>

    <div class="main-rectangle">
        <div class="ajouter-recent">Ajouté récemment</div>
        <div class="other-rectangles">
            <div class="sub-rectangle">
                <h3 class="texteInRect">Etudiant</h3>
                <div class="inner-rectangle" id="etudiants-container"></div>
                <input class="btnAfficherPlus" type="button" value="Afficher Plus" id="afficherEtudiants">
            </div>
            <div class="sub-rectangle">
                <h3 class="texteInRect">Offre</h3>
                <div class="inner-rectangle" id="offres-container"></div>
                <input class="btnAfficherPlus" type="button" value="Afficher Plus" id="afficherOffres">
            </div>
            <div class="sub-rectangle">
                <h3 class="texteInRect">Entreprise</h3>
                <div class="inner-rectangle" id="entreprises-container"></div>
                <input class="btnAfficherPlus" type="button" value="Afficher Plus" id="afficherEntreprises">
            </div>
        </div>
    </div>

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
                    <li><a href="ViewSecMain.php">Accueil</a></li>
                    <li><a href="ViewSecEtu.php">Etudiants</a></li>
                    <li><a href="ViewSecEntreprise.php">Entreprises</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2023 Gestionnaire des Apprentis | Tous droits réservés</p>
        </div>
    </footer>

</div>
</body>


</html>
