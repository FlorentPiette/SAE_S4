<?php

include '../Model/ModelMail.php';
include '../Model/ConnexionBDD.php';
include '../Model/ModelInscriptionEtu.php';

session_start();

$db = Conn::getInstance();

$email = $_SESSION['email'];
$id = selectidWhereEmail($db, $email);

include '../View/ViewImportationCV.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Importer'])) {
        if (isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] == UPLOAD_ERR_OK) {

            $dossier_destination = "../Controller/";
            $chemin_fichier_destination = $dossier_destination . basename($_FILES["fichier"]["name"]);

            if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $chemin_fichier_destination)) {
                ajouterCV($db, $id, $chemin_fichier_destination);
            }
        } else {
            echo "Erreur lors du déplacement du fichier vers le serveur.";
        }
    }
    if (isset($_POST['NePasImporter'])){
        header('Location: ../View/ViewEtuMain.php');
    }
}
?>