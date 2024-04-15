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
if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])){
    if (isset($_POST['Importer'])) {
        if (isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] == UPLOAD_ERR_OK) {
            $maxFileSize = 5 * 1024 * 1024;
            $allowedFileTypes = ['application/pdf'];

            if ($_FILES["fichier"]["size"] > $maxFileSize) {
                echo "Erreur : La taille du fichier est supérieure à la limite autorisée.";
            } elseif (!in_array($_FILES["fichier"]["type"], $allowedFileTypes)) {
                echo "Erreur : Seuls les fichiers PDF sont autorisés.";
            } else {
                $dossier_destination = "../Controller/";
                $chemin_fichier_destination = $dossier_destination . basename($_FILES["fichier"]["name"]);

                if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $chemin_fichier_destination)) {
                    ajouterCV($db, $id, $chemin_fichier_destination);
                } else {
                    echo "Erreur lors du déplacement du fichier vers le serveur.";
                }
            }
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
    }
    if (isset($_POST['NePasImporter'])){
        header('Location: ../View/ViewEtuMain.php');
    }}
}
?>
