<?php include '../Controller/ControllerVerificationDroit.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil <?= $etu['nom'] ?> <?= $etu['prenom'] ?></title>

    <link rel="stylesheet" type="text/css" href="../asserts/css/ModifierProfilEtu.css">
    <link rel="icon" href="../asserts/img/logo.png" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="../asserts/css/Cloche.css">
    <script src="../asserts/js/script.js"></script>

</head>

<body>
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
                        <button type="button" onclick="window.location.href ='../View/ViewCdMain.php'" name="accueil" value="Accueil" class="btnCreation">  Accueil </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='../View/ViewCdEtu.php'" name="etudiant" value="Etudiant" class="btnCreation"> Etudiant </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='../View/ViewCdEntreprise.php'" name="entreprise" value="Entreprise" class="btnCreation"> Entreprise </button>
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
                        <div class="notification">
                            <div class="icon-bell" onclick="toggleNotifications()">
                                <span class="badge" id="notificationBadge"> </span>
                            </div>
                        </div>
                        <div class="burger-menu" id="burgerMenu" style="display: none;">
                            <div class="millieu">
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


<div class="content">

    <button type="submit" name="modifier_nom" value="Modifier" class="transparent-button">
        <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
    </button>
    <button type="submit" name="annuler_nom" value="Annuler" class="transparent-button">
        <img class="editable" id="annuleIcon" src="../asserts/img/annulerModif.png" alt="edit">
    </button>


    <h1><?= $etu['nom'] ?> <?= $etu['prenom'] ?></h1>
    <div class="modif">
        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie1">
                <label> Nom : </label>
                <input type="text" name="nouveau_nom" value="<?= $etu['nom'] ?>">
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie2">
                <label> Prénom : </label>
                <input type="text" name="nouveau_prenom" value="<?= $etu['prenom'] ?>">
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie1">
                <label> Date de naissance : </label>
                <input type="date" name="modifier_date" value="<?= $etu['datedenaissance'] ?>">
            </div>


        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie2">
                <label> Adresse : </label>
                <input type="text" name="nouvelle_adresse" value="<?= $etu['adresse'] ?>">
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie1">
                <label> Ville : </label>
                <input type="text" name="nouvelle_ville" value="<?= $etu['ville'] ?>">
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie2">
                <label> Code postal : </label>
                <input type="number" name="nouveau_cp" value="<?= $etu['codepostal'] ?>">
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie1">
                <label> Année d'étude : </label>
                <input type="number" name="nouvelle_anneeEtude" value="<?= $etu['anneeetude'] ?>">
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie2">
                <label> Formation : </label>
                <input type="text" name="nouvelle_formation" value="<?= $etu['formation'] ?>">
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie1">
                <label> Email : </label>
                <input type="email" name="nouvel_email" value="<?= $etu['email'] ?>">
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie2">
                <label> Type d'entreprises recherchées : </label>
                <input type="text" name="nouveau_typeentreprise" value="<?= $etu['typeentreprise'] ?>">
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie1">
                <label> Type de missions recherchées : </label>
                <input type="text" name="nouveau_typemission" value="<?= $etu['typemission'] ?>">
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie2">
                <label for="mobile">
                    Mobile:
                    <select name="mobile" id="mobile">
                        <option value="10" <?php if ($etu['mobile'] == 10) echo 'selected'; ?>>10km</option>
                        <option value="50" <?php if ($etu['mobile'] == 50) echo 'selected'; ?>>50km</option>
                        <option value="100" <?php if ($etu['mobile'] == 100) echo 'selected'; ?>>100km</option>
                        <option value="500" <?php if ($etu['mobile'] == 500) echo 'selected'; ?>>500km</option>
                        <option value="1000" <?php if ($etu['mobile'] == 1000) echo 'selected'; ?>>1000km</option>
                        <option value="99999" <?php if ($etu['mobile'] == 99999) echo 'selected'; ?>>International</option>
                    </select>
                </label>
            </div>
        </form>

        <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
            <div class="saisie1">
                <label> Actif : </label>
                <input type="checkbox" name="actif" id="actif" value="actif" <?php if ($etu['actif']) echo 'checked'; ?>>
            </div>
        </form>
    </div>
</div>
<script src="../asserts/js/modifProfil.js"></script>


</body>
</html>
