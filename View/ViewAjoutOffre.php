<?php
 include '../Controller/ControllerVerificationDroit.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout offre</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/demandeAjoutOffre.css">
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <script src="../assets/js/ajoutOffre.js"></script>
</head>
<body class="body">

<button onclick="retourPage()" class="btnRetour">Retour</button>


<script>
    function retourPage() {
        window.history.back();
    }
</script>

<form action="../Controller/ControllerAjouOffre.php" method="post" id="formulaire" class="form-offre" onsubmit="return validateForm()">
    <h1 class="titre1"> Création d'une offre </h1>
    <p class="label-text">
        Nom de l'offre :
    </p>
    <label for="offre"></label><input type="text" name="Nom" id="offre" class="input-field">
    <span class="error-message" id="offre-error"></span>

    <p class="label-text">
        Domaine de l'offre :
    </p>
    <label for="domaine"></label><input type="text" name="Domaine" id="domaine" class="input-field">
    <span class="error-message" id="domaine-error"></span>

    <p class="label-text">
        Mission :
    </p>
    <label for="mission"></label><textarea name="Mission" id="mission" class="zoneText input-field"></textarea>
    <span class="error-message" id="mission-error"></span>

    <p class="label-text">
        Nombre d'étudiant :
    </p>
    <label for="nbetudiant"></label><input type="text" name="NbEtudiant" id="nbetudiant" class="input-field"><br>
    <span class="error-message" id="nbetudiant-error"></span>

    <p id="message" class="error-message"></p>

    <p class="label-text">Entreprise :</p>
    <label for="entreprise"></label><select name="entreprise" id="entreprise" class="select-field">
        <?php
        include_once '../Model/ConnexionBDD.php';
        $conn = Conn::getInstance();
        $sql = "SELECT identreprise, nom FROM entreprise";
        $result = $conn->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['identreprise'] . "'>" . $row['nom'] . "</option>";
        }
        ?>
    </select><br>
    <span class="error-message" id="entreprise-error"></span>

    <p class="label-text">
        Parcours :
    </p>
    <label for="parcours" ></label>
    <select name="Parcours" id="parcours"  class="select-field">
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
    <span class="error-message" id="parcours-error"></span>

    <button type="button" id="redirigerVersAjoutEntreprise" class="btn-create-enterprise">Création d'une entreprise</button>

    <p class="label-text">Autre(s) fichier(s) :</p>
    <input type="file" name="fichier" id="fichier" class="file-input"><br>
    <br>

    <label for="brouillon"></label><input type="checkbox" name="Brouillon" id="brouillon" class="checkbox-input">
    <label for="brouillon" class="checkbox-label">
        Enregistrer en tant que brouillon
    </label><br>

    <label for="visible"></label><input type="checkbox" name="Visible" id="visible" class="checkbox-input">
    <label for="visible" class="checkbox-label">
        Voulez-vous que l'offre soit visible ?
    </label><br>

    <input type="submit" value="Enregistrer l'offre" id="enregistreroffre" name="EnregistrerOffre" class="submit-btn" onclick="validateForm()"><br>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
</form>


<script src="../assets/js/AdminEntreprise.js"></script>
</body>
</html>