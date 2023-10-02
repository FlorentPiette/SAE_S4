<?php
try {
$conn = new PDO('pgsql:host=localhost;port=5432;dbname=postgres', 'postgres', 'flo');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST["Ajouteroffre"])) {
$nom = $_POST['Nom'];
$domaine = $_POST['Domaine'];
$mission = $_POST['Mission'];
$nbetudiant = $_POST['NbEtudiant'];

$Offre = $conn->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)");

$Offre->execute(array(':nom' => $nom, ':domaine' => $domaine, ':mission' => $mission, ':nbetudiant' => $nbetudiant));

echo "Ajout réussi";
}
} catch(PDOException $e) {
echo "Erreur : " . $e->getMessage();
}
