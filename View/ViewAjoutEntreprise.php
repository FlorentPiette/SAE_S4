<?php
include '../Controller/ControllerVerificationDroit.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajout Entreprise</title>
</head>
<body>
<form action="../Controller/ControllerAjoutEntreprise.php" method="POST">
    <ul>
        <li>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom">
        </li>
        <li>
            <label for="nom">Email:</label>
            <input type="text" id="mail" name="email">
        </li>
        <li>
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse">
        </li>
        <li>
            <label for="ville">Ville:</label>
            <input type="text" id="ville" name="ville">
        </li>
        <li>
            <label for="codePostal">Code postal:</label>
            <input type="number" id="codePostal" name="codePostal">
        </li>
        <li>
            <label for="num">Numéro de téléphone:</label>
            <input type="text" id="num" name="num">
        </li>
        <li>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </li>
        <li>
            <label for="secteur">Secteur d'activité:</label>
            <input type="text" id="secteur" name="secteur">
        </li>
    </ul>

    <div class="button">
        <button type="submit" id="ajoutEntreprise" name="ajoutEntreprise">Valider</button>
    </div>
</form>
</body>
</html>