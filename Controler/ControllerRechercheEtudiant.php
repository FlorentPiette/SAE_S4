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

// Récupérer les valeurs du formulaire de recherche
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$ine = $_POST['ine'];

// Requête SQL en fonction des critères de recherche
$sql = "SELECT * FROM Etudiant WHERE 1=1"; // Initialise la requête avec une condition vraie

if (!empty($nom)) {
    $sql .= " AND nom ILIKE :nom";
}

if (!empty($prenom)) {
    $sql .= " AND prenom ILIKE :prenom";
}

if (!empty($ine)) {
    $sql .= " AND ine ILIKE :ine";
}

// Préparer la requête
$stmt = $conn->prepare($sql);

// Associer les valeurs aux paramètres
if (!empty($nom)) {
    $stmt->bindValue(':nom', "%$nom%", PDO::PARAM_STR);
}

if (!empty($prenom)) {
    $stmt->bindValue(':prenom', "%$prenom%", PDO::PARAM_STR);
}

if (!empty($ine)) {
    $stmt->bindValue(':ine', "%$ine%", PDO::PARAM_STR);
}

// Exécuter la requête
$stmt->execute();

// Récupérer les résultats
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Générer le HTML des résultats
// ...

// Générer le HTML des résultats
// ...

if (count($resultats) > 0) {
    echo '<ul>';
    foreach ($resultats as $resultat) {
        echo '<li>';
        echo 'Nom : ' . (isset($resultat['nom']) ? $resultat['nom'] : '') . '<br>';
        echo 'Prénom : ' . (isset($resultat['prenom']) ? $resultat['prenom'] : '') . '<br>';
        echo 'INE : ' . (isset($resultat['ine']) ? $resultat['ine'] : '') . '<br>';
        // Ajoutez d'autres champs que vous souhaitez afficher
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo "Aucun résultat trouvé.";
}


?>
