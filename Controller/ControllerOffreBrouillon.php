<?php

include_once '../Model/ConnexionBDD.php';

$conn = Conn::getInstance();

if (isset($_POST['nomOffre'])) {
    $inputnombrouillon = $_POST['nomOffre'];
    $sql = 'SELECT * FROM Offre WHERE nom = :nom';
    $brouillon = $conn->prepare($sql);
    $brouillon->bindParam(':nom', $inputnombrouillon, PDO::PARAM_STR);
    $brouillon->execute();

    if ($brouillon->rowCount() > 0) {
        echo "valide"; // Réponse AJAX pour une offre valide
        exit;
    } else {
        echo "invalide"; // Réponse AJAX pour une offre invalide
        exit;
    }
}

if (isset($_POST["SubmitForm2"])) {
    $domaine = $_POST["Domaine"];
    $mission = $_POST["Mission"];
    $nbEtudiant = $_POST["NbEtudiant"];
    $estBrouillon = isset($_POST["Brouillon"]);
    $estvisible = isset($_POST["Visible"]) ? 1 : 0;

    $updateOffre = $conn->prepare('UPDATE Offre SET domaine = :domaine, mission = :mission, nbetudiant = :nbetudiant, visible = :visible WHERE nom = :nom');
    $updateOffre->bindParam(':domaine', $domaine, PDO::PARAM_STR);
    $updateOffre->bindParam(':mission', $mission, PDO::PARAM_STR);
    $updateOffre->bindParam(':nbetudiant', $nbEtudiant, PDO::PARAM_STR);
    $updateOffre->bindParam(':visible', $estvisible, PDO::PARAM_STR);
    $updateOffre->bindParam(':nom', $_POST['nomOffre'], PDO::PARAM_STR);

        if ($updateOffre->execute()) {
            header('Location: ../View/ViewAdminEntreprise.php');
            exit;
        } else {
            // Gérer une éventuelle erreur de mise à jour
            echo "Erreur lors de la mise à jour de l'offre.";
        }
}
