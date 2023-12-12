<?php
include '../Model/ConnexionBDD.php';
$db = Conn::getInstance();
$sql = "SELECT nom, prenom,ine,formation FROM Etudiant ";
$req = $db->prepare($sql);
$req->execute();  // Correction : Utilisation de $req au lieu de $sql
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultat as $etudiant) {
    echo "<li><strong>Nom:</strong> " . $etudiant['nom'] . "<br>";
    echo "<strong>Prénom:</strong> " . $etudiant['prenom'] . "<br>";
    echo "<strong>INE:</strong> " . $etudiant['ine'] . "<br>";
    echo "<strong>Formation:</strong> " . $etudiant['formation'] . "</li><br>";
    echo "-------------------------------------------------<br>";
}


