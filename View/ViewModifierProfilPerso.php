<?php // include '../Controller/ControllerVerificationDroit.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <title>Profil - <?= $perso['nom'] ?> <?= $perso['prenom'] ?></title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/ModifierProfilPerso.css">
    <script src="../asserts/js/modifProfil.js"></script>
    <link rel="icon" href="../asserts/img/logo.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="../asserts/css/Cloche.css">
        <script src="../asserts/js/script.js"></script>
</head>

<body>

<header class="header">
    <div class="logo-container">
        <img src="../asserts/img/logo.png" class="logo">
    </div>

    <div class="menu-container">
        <nav>
            <form method="post" action="../Controller/ControllerBtnDeco.php">
                <ul class="vertical-menu">
                    <li><button type="button" onclick="window.location.href ='../View/View<?php echo $_SESSION['role']; ?>Main.php'" name="accueil" value="Accueil" class="btnCreation">Accueil</button><li>
                    <li>
                        <button type="button" onclick="window.location.href ='../View/View<?php echo $_SESSION['role']; ?>Etu.php'" name="etudiant" value="Etudiant" class="btnCreation"> Etudiant </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='../View/View<?php echo $_SESSION['role']; ?>Entreprise.php'" name="entreprise" value="Entreprise" class="btnCreation"> Entreprise </button>
                    </li>
                    <?php
                    if ($_SESSION['role'] === 'admin') {
                        echo '<li><button type="button" onclick="window.location.href =\'../View/View' . $_SESSION['role'] . 'Administration.php\'" name="administration" value="Administration" class="btnCreation">Administration</button></li>';
                    }
                    ?>
                    <li id="account-photo">
                        <img id="photo" src="../asserts/img/utilisateur.png" alt="Image de l'utilisateur" class="utilisateur">
                        <div id="account-dropdown">
                            <button type="submit" name="compte" class="">Mon compte</button>
                            <button type="submit" name="deco" class="">Se déconnecter</button>


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



<div class="content">

    <div class="photo"></div>

    <div class = "container-content">
        <h1>Mon Profil</h1>

        <form method="post" action="../Controller/ControllerModifierProfilPerso.php">
        <div class="information">

            <div>
                <label class="labelNom"> Nom : </label>
                <input type="text" name="nouveau_nom" value="<?= $perso['nom'] ?>" class="editableNom">
            </div>

            <div>
                <label class="labelPrenom"> Prénom : </label>
                <input type="text" name="nouveau_prenom" value="<?= $perso['prenom'] ?>" class="editablePrenom">
            </div>

            <div>
                <label class="labelFormation"> Formation : </label>
                <select name="nouvelle_formation" class="editableFormation">
                    <option value="GEII" <?= ($perso['formation'] === 'GEII') ? 'selected' : '' ?>>GEII</option>
                    <option value="GIM" <?= ($perso['formation'] === 'GIM') ? 'selected' : '' ?>>GIM</option>
                    <option value="GMP" <?= ($perso['formation'] === 'GMP') ? 'selected' : '' ?>>GMP</option>
                    <option value="GEA" <?= ($perso['formation'] === 'GEA') ? 'selected' : '' ?>>GEA</option>
                    <option value="TCV" <?= ($perso['formation'] === 'TCV') ? 'selected' : '' ?>>TCV</option>
                    <option value="QLIQ" <?= ($perso['formation'] === 'QLIQ') ? 'selected' : '' ?>>QLIQ</option>
                    <option value="TCc" <?= ($perso['formation'] === 'TCc') ? 'selected' : '' ?>>TCc</option>
                    <option value="INFO" <?= ($perso['formation'] === 'INFO') ? 'selected' : '' ?>>INFO</option>
                    <option value="Mph" <?= ($perso['formation'] === 'Mph') ? 'selected' : '' ?>>Mph</option>
                </select>
            </div>

            <div>
                <label class="labelEmail"> Email : </label>
                <input type="text" name="nouvelle_email" value="<?= $perso['email'] ?>" class="editableEmail">
            </div>

            <div>
                <label class="labelRole"> Rôle : </label>
                <select name="nouveau_role" class="editableRole">
                    <option value="admin" <?= ($perso['role'] === 'Admin') ? 'selected' : '' ?>>Administrateur</option>
                    <option value="rp" <?= ($perso['role'] === 'rp') ? 'selected' : '' ?>>Responsable pédagogique</option>
                    <option value="cd" <?= ($perso['role'] === 'cd') ? 'selected' : '' ?>>Chargés de développement</option>
                    <option value="rs" <?= ($perso['role'] === 'rs') ? 'selected' : '' ?>>Responsable du service</option>
                    <option value="sec" <?= ($perso['role'] === 'sec') ? 'selected' : '' ?>>Secrétaire</option>
                </select>
            </div>
        </div>

            <button type="submit" name="modifier_profil" class="transparent-button">
                <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
            </button>
        </form>

    </div>

</div>

</body>
</html>