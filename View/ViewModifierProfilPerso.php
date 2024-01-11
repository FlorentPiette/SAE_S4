<?php include '../Controller/ControllerVerificationDroit.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <title>Profil - <?= $perso['nom'] ?> <?= $perso['prenom'] ?></title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/ModifierProfilPerso.css">
    <script src="../asserts/js/modifProfil.js"></script>
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
                <input type="text" name="nouvelle_formation" value="<?= $perso['formation'] ?>" class="editableFormation">
            </div>

            <div>
                <label class="labelEmail"> Email : </label>
                <input type="text" name="nouvelle_email" value="<?= $perso['email'] ?>" class="editableEmail">
            </div>

            <div>
                <label class="labelRole"> Rôle : </label>
                <input type="text" name="nouveau_role" value="<?= $perso['role'] ?>" class="editableRole">
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