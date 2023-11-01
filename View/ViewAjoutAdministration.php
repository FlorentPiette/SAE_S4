<?php
include '../Controller/ControllerVerificationDroit.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout Entreprise</title>
</head>
<body>
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
                    <option value="informatique">BUT informatique</option>
                    <option value="marketing">Responsable pédagogique</option>
                    <option value="finance">Chargés de développement</option>
                    <option value="finance">Responsable du service</option>
                    <!-- Ajoutez autant d'options que nécessaire -->
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
                    <!-- Ajoutez autant d'options que nécessaire -->
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