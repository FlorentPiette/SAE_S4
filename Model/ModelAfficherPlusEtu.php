<?php
include '../Model/ConnexionBDD.php';
$db = Conn::getInstance();
$sql = "SELECT idetudiant, nom, prenom,ine,formation FROM Etudiant ORDER BY idetudiant DESC";
$req = $db->prepare($sql);
$req->execute();
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultat as $etudiant) {
    echo "<li><strong>Nom:</strong> " . $etudiant['nom'] . "<br>";
    echo "<strong>Prénom:</strong> " . $etudiant['prenom'] . "<br>";
    echo "<strong>INE:</strong> " . $etudiant['ine'] . "<br>";
    echo "<strong>Formation:</strong> " . $etudiant['formation'] . "</li><br>";
}


