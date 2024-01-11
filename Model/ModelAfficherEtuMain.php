<?php
include '../Model/ConnexionBDD.php';
$db = Conn::getInstance();
$sql = "SELECT idetudiant, nom, prenom,ine,formation FROM Etudiant ORDER BY idetudiant DESC LIMIT 4";
$req = $db->prepare($sql);
$req->execute();  // Correction : Utilisation de $req au lieu de $sql
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultat as $etudiant) {
    echo "<li><strong>Nom:</strong> " . $etudiant['nom'] . "<br>";
    echo "<strong>Prénom:</strong> " . $etudiant['prenom'] . "<br>";
    echo "<strong>INE:</strong> " . $etudiant['ine'] . "<br>";
    echo "<strong>Formation:</strong> " . $etudiant['formation'] . "</li><br>";
}


