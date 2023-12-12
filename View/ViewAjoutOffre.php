
<?php
//include '../Controller/ControllerVerificationDroit.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout offre</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/demandeAjoutOffre.css">
</head>
<body>
<form action="../Controller/ControllerAjouOffre.php" method="post" id="formulaire">
    <p>
        Nom de l'offre :
    </p>
    <label for="offre"></label><input type="text" name="Nom" id="offre">

    <p>
        Domaine de l'offre :
    </p>
    <label for="domaine"></label><input type="text" name="Domaine" id="domaine">

    <p>
        Mission :
    </p>
    <label for="mission"></label><textarea name="Mission" id="mission" class="zoneText"></textarea>

    <p>
        Nombre d'étudiant :
    </p>
    <label for="nbetudiant"></label><input type="text" name="NbEtudiant" id="nbetudiant"><br>

    <p id="message" class="error-message"></p>

    <p>Entreprise :</p>
    <label for="entreprise"></label><select name="entreprise" id="entreprise">
        <?php
        include_once '../Model/ConnexionBDD.php';
        $conn = Conn::getInstance();
        $sql = "SELECT identreprise, nom FROM entreprise";
        $result = $conn->query($sql);
        // Boucler à travers les résultats de la requête pour afficher les entreprises dans la liste déroulante
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['identreprise'] . "'>" . $row['nom'] . "</option>";
        }
        ?>
    </select><br>


    <button type="button" id="redirigerVersAjoutEntreprise">Création d'une entreprise</button>

    <button type="button" id="redirigerVersAjoutEntreprise">Création d'une entreprise</button>

    <p>Autre(s) fichier(s) :</p>
    <input type="file" name="fichier" id="fichier"><br>
    <br>

    <label for="brouillon"></label><input type="checkbox" name="Brouillon" id="brouillon">
    <label>
        Enregistrer en tant que brouillon
    </label><br>

    <label for="visible"></label><input type="checkbox" name="Visible" id="visible">
    <label>
        Voulez-vous que l'offre soit visible ?
    </label><br>

    <input type="submit" value="Enregistrer l'offre" id="enregistreroffre" name="EnregistrerOffre"><br>
</form>


<script src="../asserts/js/AdminEntreprise.js"></script>
</body>
</html>
