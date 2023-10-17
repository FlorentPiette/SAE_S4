<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'postgres';
$username = 'postgres';
$password = '31lion2004';

try {
    $conn = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer les paramètres de recherche depuis l'URL
$nom = $_GET['nom'] ?? '';
$prenom = $_GET['prenom'] ?? '';
$ine = $_GET['ine'] ?? '';
$formation = $_GET['formation'] ?? '';


// Construire la requête SQL
$sql = "SELECT * FROM Etudiant WHERE 1=1";

if (!empty($nom)) {
    $sql .= " AND nom ILIKE :nom";
}

if (!empty($prenom)) {
    $sql .= " AND prenom ILIKE :prenom";
}

if (!empty($ine)) {
    $sql .= " AND ine ILIKE :ine";
}

if (!empty($formation)) {
    $sql .= " AND formation ILIKE :formation";
}

// Préparer et exécuter la requête
$stmt = $conn->prepare($sql);

if (!empty($nom)) {
    $stmt->bindValue(':nom', "%$nom%", PDO::PARAM_STR);
}

if (!empty($prenom)) {
    $stmt->bindValue(':prenom', "%$prenom%", PDO::PARAM_STR);
}

if (!empty($ine)) {
    $stmt->bindValue(':ine', "%$ine%", PDO::PARAM_STR);
}

if (!empty($formation)) {
    $stmt->bindValue(':formation', "%$formation%", PDO::PARAM_STR);
}

if ($stmt->execute()) {
    // Récupérer les résultats
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Renvoyer les résultats au format JSON
    header('Content-Type: application/json');
    echo json_encode($resultats);
} else {
    // En cas d'erreur d'exécution de la requête, renvoyer un JSON vide
    header('Content-Type: application/json');
    echo json_encode([]);
}
?>
