<?php
include '../Model/ModelAjout.php';
include_once '../Model/ConnexionBDD.php';


$conn = Conn::getInstance();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["Nom"];
    $domaine = $_POST["Domaine"];
    $mission = $_POST["Mission"];
    $nbEtudiant = $_POST["NbEtudiant"];
    $estBrouillon = isset($_POST["Brouillon"]);
    $estvisible = isset($_POST["Visible"]) ? 1 : 0;
    $parcours = $_POST["Parcours"];



    // Traitement en tant que brouillon ou entrée complète
    if ($estBrouillon) {
        $Offre1 = $conn->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant, visible, parcours) VALUES (:nom, :domaine, :mission, :nbetudiant, :visible, :parcours)");

        $Offre1->execute(array(':nom' => $nom, ':domaine' => $domaine, ':mission' => $mission, ':nbetudiant' => $nbEtudiant, ':visible' => $estvisible, ':parcours' => $parcours));

        $message = "L'offre a été enregistrée en tant que brouillon.";
    } else {
        $Offre = $conn->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant, visible, parcours) VALUES (:nom, :domaine, :mission, :nbetudiant, :visible, :parcours)");

        $Offre->execute(array(':nom' => $nom, ':domaine' => $domaine, ':mission' => $mission, ':nbetudiant' => $nbEtudiant, ':visible' => $estvisible, ':parcours' => $parcours));

        $message = "L'offre a été enregistrée avec succès.";
    }

    header('Location: ../View/ViewAdminMain.php');
}
