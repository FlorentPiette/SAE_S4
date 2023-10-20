<?php
include '../Model/ModelAjout.php';

if(isset($_POST["Ajouteroffre"])) {
    $nom = $_POST['Nom'];
    $domaine = $_POST['Domaine'];
    $mission = $_POST['Mission'];
    $nbetudiant = $_POST['NbEtudiant'];

    // Préparez la requête avec des paramètres nommés
    $stmt = ajoutOffre($nom, $domaine, $mission, $nbetudiant);
    echo "Ajout réussi";
}

?>
