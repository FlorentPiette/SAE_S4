<?php

include 'ConnexionBDD.php';

$db = conn('localhost', 'postgres', 'postgres', 'admin');

    if(isset($_POST["Ajouteroffre"])) {
        $nom = $_POST['Nom'];
        $domaine = $_POST['Domaine'];
        $mission = $_POST['Mission'];
        $nbetudiant = $_POST['NbEtudiant'];

        // Préparez la requête avec des paramètres nommés
        $stmt = $db->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)");

        // Liez les valeurs aux paramètres nommés
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':domaine', $domaine);
        $stmt->bindParam(':mission', $mission);
        $stmt->bindParam(':nbetudiant', $nbetudiant);

        // Exécutez la requête
        $stmt->execute();

        echo "Ajout réussi";
    }

?>
