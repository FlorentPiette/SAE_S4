<?php
include '../Model/ConnexionBDD.php';
$db = Conn::getInstance();
$sql = "SELECT nom,email,secteuractivite, identreprise FROM Entreprise ORDER BY identreprise DESC LIMIT 4";
$req = $db->prepare($sql);
$req->execute();
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultat as $entreprise) {
    echo "<li><strong>Nom:</strong> " . $entreprise['nom'] . "<br>";
    echo "<strong>Secteur d'activité:</strong> " . $entreprise['secteuractivite'] . "<br>";
    echo "<strong>Email:</strong> " . $entreprise['email'] . "</li><br>";

}


