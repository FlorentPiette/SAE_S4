<?php
include '../Model/ConnexionBDD.php';
include '../Model/ModelFiltres.php';

$conn = Conn::getInstance();

$nom = $_GET['nom'] ?? '';
$domaine = $_GET['domaine'] ?? '';
$mission = $_GET['mission'] ?? '';
$nbEtudiant = $_GET['nbEtudiant'] ?? '';

$sql = "SELECT * FROM Offre WHERE 1=1";

if (!empty($nom)) {
    $sql .= " AND nom ILIKE :nom";
}

if (!empty($domaine)) {
    $sql .= " AND domaine ILIKE :domaine";
}

if (!empty($mission)) {
    $sql .= " AND mission ILIKE :mission";
}

if (!empty($nbetudiant)) {
    $sql .= " AND nbetudiant = :nbetudiant";
}

$req = $conn->prepare($sql);

if (!empty($nom)) {
    $req->bindValue(':nom', "%$nom%", PDO::PARAM_STR);
}

if (!empty($domaine)) {
    $req->bindValue(':domaine', "%$domaine%", PDO::PARAM_STR);
}

if (!empty($mission)) {
    $req->bindValue(':mission', "%$mission%", PDO::PARAM_STR);
}

if (!empty($nbetudiant)) {
    $req->bindValue(':nbetudiant', $nbetudiant, PDO::PARAM_INT);
}

$req->execute();
$resultats = $req->fetchAll(PDO::FETCH_ASSOC);

// Ajoutez ici la boucle pour récupérer les étudiants qui ont postulé à chaque offre
foreach ($resultats as &$offre) {
    $sqlEtudiants = "SELECT nom, prenom FROM postule join Etudiant using(idetudiant) WHERE idoffre = :idOffre";
    $reqEtudiants = $conn->prepare($sqlEtudiants);
    $reqEtudiants->bindParam(':idOffre', $offre['idoffre'], PDO::PARAM_INT);
    $reqEtudiants->execute();
    $etudiants = $reqEtudiants->fetchAll(PDO::FETCH_ASSOC);
    $offre['offreEtudiants'] = $etudiants;
}

// Retournez les résultats au format JSON
header('Content-Type: application/json');
echo json_encode($resultats);
