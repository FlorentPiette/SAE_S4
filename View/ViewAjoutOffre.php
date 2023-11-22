<?php
//include '../Controller/ControllerVerificationDroit.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Titre</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/demandeAjoutOffre.css">
</head>
<body>
<form action="../Controller/ControllerAjouOffre.php" method="post" id="formulaire">
    <p>
        Nom de l'offre :
    </p>
    <input type="text" name="Nom" id="offre">

    <p>
        Domaine de l'offre :
    </p>
    <input type="text" name="Domaine" id="domaine">

    <p>
        Mission :
    </p>
    <textarea name="Mission" id="mission" class="zoneText"></textarea>

    <p>
        Nombre d'étudiant :
    </p>
    <input type="text" name="NbEtudiant" id="nbetudiant"><br>

    <p id="message" class="error-message"></p>

    <p>Entreprise :</p>
    <select name="entreprise" id="entreprise"></select><br>

    <p>Autre(s) fichier(s) :</p>
    <input type="file" name="fichier" id="fichier"><br>
    <br>

    <input type="checkbox" name="Brouillon" id="brouillon">
    <label>
        Enregistrer en tant que brouillon
    </label><br>

    <input type="checkbox" name="Visible" id="visible">
    <label>
        Voulez-vous que l'offre soit visible ?
    </label><br>

    <input type="submit" value="Enregistrer l'offre" id="enregistreroffre" name="EnregistrerOffre"><br>
</form>

<script src="../asserts/js/AdminEntreprise.js"></script>
</body>
</html>
