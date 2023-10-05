<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'ConnexionBDD.php';

$db = conn('localhost', 'postgres', 'postgres', 'admin');

if(isset($_POST["ajoutEntreprise"])) {
    $ajout = $db->prepare("INSERT INTO Entreprise VALUES (DEFAULT, :nom, :logo, :adresse, :ville, :codePostal, :num, :secteur)");

    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['codePostal'];
    $num = $_POST['num'];
    $secteur = $_POST['secteur'];
    $logo = '../logo.png';

    $ajout->execute(array($nom, $logo, $adresse, $ville, $codePostal, $num, $secteur));
}
?>