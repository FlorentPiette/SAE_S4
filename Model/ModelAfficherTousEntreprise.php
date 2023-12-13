<?php
include '../Model/ConnexionBDD.php';
$db = Conn::getInstance();
$sql = "SELECT nom FROM Entreprise";
$req = $db->prepare($sql);
$req->execute();
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultat as $entreprise) {
    echo "<li><strong>Nom:</strong> " . $entreprise['nom'] . "<br>";
}


