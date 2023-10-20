<?php
include '../Model/ConnexionBDD.php';
include '../Model/ModelRechercheEtu.php';

$conn = Conn::getInstance();

$nom = $_GET['nom'] ?? '';
$prenom = $_GET['prenom'] ?? '';
$ine = $_GET['ine'] ?? '';
$formation = $_GET['formation'] ?? '';
$adresse = $_GET['adresse'] ?? '';
$ville = $_GET['ville'] ?? '';
$codepostal = $_GET['codepostal'] ?? '';
$anneeetude = $_GET['anneeetude'] ?? '';
$typeentreprise = $_GET['typeentreprise'] ?? '';
$typedemission = $_GET['typedemission'] ?? '';
$mobile = $_GET['mobile'] ?? '';
$actif = $_GET['actif'] ?? '';

RecherEtu($conn,$nom,$prenom,$ine,$formation,$adresse,$ville,$codepostal,$anneeetude,$typeentreprise,$typedemission,$mobile,$actif)

?>
