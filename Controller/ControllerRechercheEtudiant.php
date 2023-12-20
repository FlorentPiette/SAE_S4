<?php
include '../Model/ConnexionBDD.php';
include '../Model/ModelRechercheEtu.php';

$conn = Conn::getInstance();

if (isset($_SESSION['formation'])) {
    $userFormation = $_SESSION['formation'];
}
else {
    $userFormation = $_GET['userFormation'] ?? '';
}

$nom = $_GET['nom'] ?? '';
$prenom = $_GET['prenom'] ?? '';
$ine = $_GET['ine'] ?? '';
$email = $_GET['email'] ?? '';
$formation = $_GET['formation'] ?? '';
$adresse = $_GET['adresse'] ?? '';
$ville = $_GET['ville'] ?? '';
$codepostal = $_GET['codepostal'] ?? '';
$anneeetude = $_GET['anneeEtude'] ?? '';
$typeentreprise = $_GET['typeEntreprise'] ?? '';
$typemission = $_GET['typeMission'] ?? '';
$mobile = $_GET['mobile'] ?? '';
$actif = $_GET['actif'] ?? '';

RecherEtu($conn, $userFormation, $nom, $prenom, $ine, $email, $formation, $adresse, $ville, $codepostal, $anneeetude, $typeentreprise, $typemission, $mobile, $actif);

