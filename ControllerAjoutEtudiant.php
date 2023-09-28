<?php

$host = 'localhost';
$dbname = 'td';
$username = 'emeline';
$password = 'root';

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

try {
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if(isset($_POST["ajoutEtudiant"])) {
    $ajout = $db->prepare("INSERT INTO Etudiant VALUES (DEFAULT, :nom, :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, NULL, :email, :mdp, NULL, :ine, NULL)");

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateDeNaissance = $_POST['dateDeNaissance'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['codePostal'];
    $ine = $_POST['ine'];
    $anneeEtude = $_POST['anneeEtude'];
    $formation = $_POST['formation'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $reqmail = $db->prepare("SELECT * FROM Etudiant WHERE email = ?");
    $reqmail->execute(array($email));
    $mailexist = $reqmail->rowCount();

    if ($mailexist == 0) {
        $ajout->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $mdp, $ine));
    }
    else {
        $erreur = "Adresse mail déjà utilisée !";
    }
}
?>