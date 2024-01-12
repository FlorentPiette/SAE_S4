<?php include '../Controller/ControllerVerificationDroit.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout Entreprise</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/ajoutAdministration.css">
</head>
<body>
<form action="../Controller/ControllerAjoutAdministration.php" method="POST">
    <ul>
        <li>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom">
        </li>
        <li>
            <label for="prenom">Prenom:</label>
            <input type="text" id="prenom" name="prenom">
        </li>
        <li>
            <div class="formation-rectangle">

                <label for="formation-select"></label><select id="formation-select" name="formation">
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
            <input type="email" id="email" name="email">
        </li>
        <li>
            <label for="mdp">Mot de passe:</label>
            <input type="password" id="mdp" name="mdp">
        </li>
        <li>
            <div class="role-rectangle">

                <label for="role-select"></label><select id="role-select" name="role">
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
</form>
</body>
</html>