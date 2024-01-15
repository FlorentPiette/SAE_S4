<?php include '../Controller/ControllerVerificationDroit.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil <?= $etu['nom'] ?> <?= $etu['prenom'] ?></title>

    <link rel="stylesheet" type="text/css" href="../asserts/css/ModifierProfilEtu.css">
    <script src="../asserts/js/modifProfil.js"></script>
    <link rel="icon" href="../asserts/img/logo.png" type="image/x-icon">
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
                    <li>
                        <button type="button" onclick="window.location.href ='../View/ViewAdminMainTest.php'" name="accueil" value="Accueil" class="btnCreation">  Acceuil </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='../View/ViewAdminEtu.php'" name="etudiant" value="Etudiant" class="btnCreation"> Etudiant </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='../View/ViewAdminEntreprise.php'" name="entreprise" value="Entreprise" class="btnCreation"> Entreprise </button>
                    </li>
                    <li>
                        <button type="button" onclick="window.location.href ='../View/ViewAdminAdministration.php'" name="adminitrsation" class="btnCreation"> Administration </button>
                    </li>
                    <li id="account-photo">
                        <img id="photo" src="../asserts/img/utilisateur.png" alt="Image de l'utilisateur" class="utilisateur">
                        <div id="account-dropdown">
                            <button type="submit" name="compte" class="">Mon compte</button>
                            <button type="submit" name="deco" class="">Se déconnecter</button>


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


<div class="content">


<h1><?= $etu['nom'] ?> <?= $etu['prenom'] ?></h1>
    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Nom : </label>
    <input type="text" name="nouveau_nom" value="<?= $etu['nom'] ?>">
        <button type="submit" name="modifier_nom" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Prénom : </label>
    <input type="text" name="nouveau_prenom" value="<?= $etu['prenom'] ?>">
        <button type="submit" name="modifier_prenom" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Date de naissance : </label>
    <input type="date" name="modifier_date" value="<?= $etu['datedenaissance'] ?>">
        <button type="submit" name="modifier_date" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Adresse : </label>
    <input type="text" name="nouvelle_adresse" value="<?= $etu['adresse'] ?>">
        <button type="submit" name="modifier_adresse" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Ville : </label>
    <input type="text" name="nouvelle_ville" value="<?= $etu['ville'] ?>">
        <button type="submit" name="modifier_ville" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Code postal : </label>
    <input type="number" name="nouveau_cp" value="<?= $etu['codepostal'] ?>">
        <button type="submit" name="modifier_cp" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Année d'étude : </label>
    <input type="number" name="nouvelle_anneeEtude" value="<?= $etu['anneeetude'] ?>">
        <button type="submit" name="modifier_anneeEtude" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Formation : </label>
    <input type="text" name="nouvelle_formation" value="<?= $etu['formation'] ?>">
        <button type="submit" name="modifier_formation" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Email : </label>
    <input type="email" name="nouvel_email" value="<?= $etu['email'] ?>">
        <button type="submit" name="modifier_email" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Type d'entreprises recherchées : </label>
    <input type="text" name="nouveau_typeentreprise" value="<?= $etu['typeentreprise'] ?>">
        <button type="submit" name="modifier_typeentreprise" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Type de missions recherchées : </label>
    <input type="text" name="nouveau_typemission" value="<?= $etu['typemission'] ?>">
        <button type="submit" name="modifier_typemission" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
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
        <button type="submit" name="modifier_mobile" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Actif : </label>
    <input type="checkbox" name="actif" id="actif" value="actif" <?php if ($etu['actif']) echo 'checked'; ?>>
        <button type="submit" name="setActif" value="Modifier" class="transparent-button">
            <img class="editable" id="editIcon" src="../asserts/img/editer.png" alt="edit">
        </button>
</form>
</div>
</body>
</html>
