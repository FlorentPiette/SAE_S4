<?php

include '../Model/ModelMail.php';
include '../Model/ConnexionBDD.php';
include '../Model/ModelInscriptionEtu.php';

session_start();

$db = Conn::getInstance();

$email = $_SESSION['email'];
$id = selectidWhereEmail($db, $email);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../asserts/css/importationCV.css">
    <title>Formulaire d'importation de fichier PDF</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="rectangle">
        <label for="fichier">Sélectionnez un fichier PDF à importer :</label>
        <input type="file" name="fichier" id="fichier" accept="application/pdf">
        <br>
        <input type="submit" value="Importer">
    </div>
</form>
</body>
</html>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] == UPLOAD_ERR_OK) {

        $dossier_destination = "../Controller/";
        $chemin_fichier_destination = $dossier_destination . basename($_FILES["fichier"]["name"]);

        if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $chemin_fichier_destination)) {
            $sql = "INSERT INTO CV (id, chemin, contenu) VALUES (:id, :chemin, :contenu)";
            $stmt = $db->prepare($sql);

            if (!empty($id)) {
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':chemin', $chemin_fichier_destination);

                $stmt->bindValue(':contenu', file_get_contents($chemin_fichier_destination), PDO::PARAM_LOB);
            if ($stmt->execute()) {
                echo "Le fichier a été ajouté avec succès à la base de données.";
            } else {
                echo '<div style="color: red;">Erreur lors de l\'ajout du fichier dans la base de données : ' . $stmt->errorInfo()[2] . '</div>';
            }
            }
        } else {
            echo "Erreur lors du déplacement du fichier vers le serveur.";
        }
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }
}
?>