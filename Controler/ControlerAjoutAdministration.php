<?php

$host = 'localhost';
$dbname = 'postgres';
$username = 'postgres';
$password = '31lion2004';

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

try {
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if(isset($_POST["valider"])) {
    $ajout = $db->prepare("INSERT INTO Adminitrsation VALUES (DEFAULT, :nom, :prenom, :formation, :email, :mdp, :role)");

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $formation = $_POST['formation'];
    $email = $_POST['email'];
    $mdp =  password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $ajout->execute(array($nom, $prenom, $formation, $email, $mdp, $role));

    header('Location: ../AdminAdministration.php');
}
?>