<?php  include '../Controller/ControllerVerificationDroit.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout Personnel</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/ajoutAdministration.css">
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <script src="../assets/js/ajoutAdministration.js"></script>

    <button type="button" onclick="retourPage()" class="btnRetour">Retour</button>


    <script>
        function retourPage() {
            window.history.back();
        }
    </script>
</head>
<body>
<form action="../Controller/ControllerAjoutAdministration.php" method="POST" id="form-adm" onsubmit="return validateForm()">
    <h1 class="titre1"> Ajout d'un membre du membre </h1>
    <ul>
        <li>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom">
            <span class="error-message" id="nom-error"></span>
        </li>
        <li>
            <label for="prenom">Prenom:</label>
            <input type="text" id="prenom" name="prenom">
            <span class="error-message" id="prenom-error"></span>
        </li>
        <li>
            <div class="formation-rectangle">

                <label for="formation-select">Formation :</label><select id="formation-select" name="formation">
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
                <span class="error-message" id="formation-error"></span>

            </div>
        </li>
        <li>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <span class="error-message" id="email-error"></span>
        </li>
        <li>
            <label for="mdp">Mot de passe:</label>
            <input type="password" id="mdp" name="mdp">
            <span class="error-message" id="mdp-error"></span>
        </li>
        <li>
            <div class="role-rectangle">

                <label for="role-select">Rôle:</label><select id="role-select" name="role">
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
        <button type="submit" id="ajoutEntreprise" name="valider">Valider</button>
    </div>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
</form>
</body>
</html>