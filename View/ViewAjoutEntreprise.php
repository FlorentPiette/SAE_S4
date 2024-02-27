<?php
include '../Controller/ControllerVerificationDroit.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajout Entreprise</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/AjoutEntreprise.css">
    <link rel="icon" href="../asserts/img/logo.png" type="image/x-icon">
    <script src="../asserts/js/ajoutEntreprise.js"></script>
</head>
<body>
<h3> Création d'une Entreprise </h3>
<form action="../Controller/ControllerAjoutEntreprise.php" method="POST" id="formulaire" onsubmit="return validateForm()">
    <ul>
        <li>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom">
            <span class="error-message" id="nom-error"></span>
        </li>
        <li>
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse">
            <span class="error-message" id="adresse-error"></span>
        </li>
        <li>
            <label for="ville">Ville:</label>
            <input type="text" id="ville" name="ville">
            <span class="error-message" id="ville-error"></span>
        </li>
        <li>
            <label for="codePostal">Code postal:</label>
            <input type="number" id="codePostal" name="codePostal">
            <span class="error-message" id="codePostal-error"></span>
        </li>
        <li>
            <label for="num">Numéro de téléphone:</label>
            <input type="text" id="num" name="num">
            <span class="error-message" id="num-error"></span>
        </li>
        <li>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <span class="error-message" id="email-error"></span>
        </li>
        <li>
            <label for="secteur">Secteur d'activité:</label>
            <input type="text" id="secteur" name="secteur">
            <span class="error-message" id="secteur-error"></span>
        </li>
    </ul>

    <div class="button">
        <button type="submit" id="ajoutEntreprise" name="ajoutEntreprise">Valider</button>
    </div>
</form>
</body>
</html>