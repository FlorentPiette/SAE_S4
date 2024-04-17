<?php
include '../Model/ModelAjout.php';
include_once '../Model/ConnexionBDD.php';
include($_SERVER["DOCUMENT_ROOT"]."/Controller/csrf_check.php");
$conn = Conn::getInstance();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = htmlspecialchars($_POST["Nom"]);
        $domaine = htmlspecialchars($_POST["Domaine"]);
        $mission = htmlspecialchars($_POST["Mission"]);
        $nbEtudiant = $_POST["NbEtudiant"];
        $estBrouillon = isset($_POST["Brouillon"]);
        $estvisible = isset($_POST["Visible"]) ? 1 : 0;
        $parcours = htmlspecialchars($_POST["Parcours"]);
        $entreprise = htmlspecialchars($_POST["entreprise"]);
        echo 'test';
        if(filter_var($nbEtudiant, FILTER_VALIDATE_INT)){
            echo 'test2';
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
            $idoffre = selectOffreWhereNom($conn, $nom)['idoffre'];

            $req = $conn->prepare("INSERT INTO Poste (idoffre, identreprise) VALUES (:idoffre, :identreprise)");

            $req->execute(array(':idoffre' => $idoffre, ':identreprise' => $entreprise));


            header('Location: ../View/ViewAdminMain.php');
        }
}
