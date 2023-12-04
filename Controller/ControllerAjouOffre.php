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
    $creationEntreprise = $_POST["creationEntreprise"];



    // Traitement en tant que brouillon ou entrée complète
    if ($estBrouillon) {
        $Offre1 = $conn->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant, visible) VALUES (:nom, :domaine, :mission, :nbetudiant, :visible)");

        $Offre1->execute(array(':nom' => $nom, ':domaine' => $domaine, ':mission' => $mission, ':nbetudiant' => $nbEtudiant, ':visible' => $estvisible));

        $message = "L'offre a été enregistrée en tant que brouillon.";
    } else {
        $Offre = $conn->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant, visible) VALUES (:nom, :domaine, :mission, :nbetudiant, :visible)");

        $Offre->execute(array(':nom' => $nom, ':domaine' => $domaine, ':mission' => $mission, ':nbetudiant' => $nbEtudiant, ':visible' => $estvisible));

        $message = "L'offre a été enregistrée avec succès.";
    }

    if($creationEntreprise){
        echo "Redirection vers ViewAjoutEntreprise.php";
        header('Location: ../View/ViewAjoutEntreprise.php');
    }

    header('Location: ../View/ViewAdminEntreprise.php');
}
