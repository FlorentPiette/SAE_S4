<?php include '../Controller/ControllerVerificationDroit.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajout Etudiant</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/ajoutEtudiant.css">
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <script src="../assets/js/ajoutEtudiant.js"></script>
</head>
<body>

<button onclick="retourPage()" class="btnRetour">Retour</button>


<script>
    function retourPage() {
        window.history.back();
    }
</script>


<form action="../Controller/ControllerAjoutEtudiant.php" method="post" id="formulaireAjoutEtudiant">
    <h1 class="titre1"> Création d'un étudiant </h1>
    <ul>
        <li>
            <label for="nom" class="label-text">Nom:</label>
            <input type="text" id="nom" name="nom" class="input">
            <span class="error-message" id="nom-error"></span>
        </li>
        <li>
            <label for="prenom" class="label-text">Prénom:</label>
            <input type="text" id="prenom" name="prenom" class="input">
            <span class="error-message" id="prenom-error"></span>
        </li>
        <li>
            <label for="dateDeNaissance" class="label-text">Date de naissance:</label>
            <input type="date" id="dateDeNaissance" name="dateDeNaissance" class="input">
            <span class="error-message" id="dateDeNaissance-error"></span>
        </li>
        <li>
            <label for="adresse" class="label-text">Adresse:</label>
            <input type="text" id="adresse" name="adresse" class="input">
            <span class="error-message" id="adresse-error"></span>
        </li>
        <li>
            <label for="ville" class="label-text">Ville:</label>
            <input type="text" id="ville" name="ville" class="input">
            <span class="error-message" id="ville-error"></span>
        </li>
        <li>
            <label for="codePostal" class="label-text">Code postal:</label>
            <input type="number" id="codePostal" name="codePostal" class="input">
            <span class="error-message" id="codePostal-error"></span>
        </li>
        <li>
            <label for="ine" class="label-text">INE:</label>
            <input type="text" id="ine" name="ine" class="input">
            <span class="error-message" id="ine-error"></span>
        </li>
        <li>
            <label for="anneeEtude" class="label-text">Année d'étude:</label>
            <input type="number" id="anneeEtude" name="anneeEtude" class="input">
            <span class="error-message" id="anneeEtude-error"></span>
        </li>
        <li>
            <label for="formation" class="label-text">Formation:</label>
            <select name="formation" id="formation" class="input">
                <option value="GEII">GEII</option>
                <option value="GIM">GIM</option>
                <option value="GMP">GMP</option>
                <option value="GEA">GEA</option>
                <option value="TCV">TCV</option>
                <option value="QLIQ">QLIQ</option>
                <option value="TCc">TCc</option>
                <option value="INFO">INFO</option>
                <option value="Mph">Mph</option>
            </select><br>
            <span class="error-message" id="formation-error"></span>
        </li>
        <li>
            <label for="entreprise" class="label-text">Type d'entreprises recherchées:</label>
            <input type="text" id="entreprise" name="entreprise" class="input">
            <span class="error-message" id="entreprise-error"></span>
        </li>
        <li>
            <label for="mission" class="label-text">Type de missions recherchées:</label>
            <input type="text" id="mission" name="mission" class="input">
            <span class="error-message" id="mission-error"></span>
        </li>
        <li>
            <label for="mobile" class="label-text">Mobilité de l'étudiant:</label>
                <select name="mobile" id="mobile" id="mobile" name="mobile" class="input">
                    <option value="10">10km</option>
                    <option value="50">50km</option>
                    <option value="100">100km</option>
                    <option value="500">500km</option>
                    <option value="1000">1000km</option>
                    <option value="99999">International</option>
                </select>
            <span class="error-message" id="mobile-error"></span>
        </li>
        <li>
            <label for="email" class="label-text">Email:</label>
            <input type="email" id="email" name="email" class="input">
            <span class="error-message" id="email-error"></span>
        </li>
        <li>
            <label for="cv" class="label-text">CV de l'étudiant:</label>
            <input type="file" name="cv" id="cv" class="input">
            <span class="error-message" id="cv-error"></span>
        </li>
    </ul>

    <div class="button">
        <button type="submit" id="ajoutEtudiant" name="ajoutEtudiant" onclick="validateForm()">Valider</button>
    </div>
</form>
</body>
<script src="../assets/js/ajoutEtudiant.js"></script>
</html>