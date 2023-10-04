<?php

$host = 'localhost';
$dbname = 'td';
$username = 'emeline';
$password = 'root';

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

try {
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if(isset($_POST["ajoutEntreprise"])) {
    $ajout = $db->prepare("INSERT INTO Entreprise VALUES (DEFAULT, :nom, NULL, :adresse, :ville, :codePostal, :num, :secteur)");

    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['codePostal'];
    $num = $_POST['num'];
    $secteur = $_POST['secteur'];

    $ajout->execute(array($nom, $adresse, $ville, $codePostal, $num, $secteur));
}
?>