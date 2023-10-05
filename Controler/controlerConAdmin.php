<?php
error_reporting(E_ALL);
ini_set('display_errors', 2);
require 'ConnexionBDD.php';
session_start();
ob_start();

$conn = conn('localhost', 'postgres', 'postgres', 'admin');

// Récupérer tous les étudiants (adresses email et mots de passe)
$stmt = $conn->prepare("SELECT email,motdepasse  FROM adminitrsation");
$stmt->execute();
$students = $stmt->fetch(PDO::FETCH_ASSOC);

// Supprimer les balises HTML et PHP des données postées
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$motDePasse = htmlspecialchars($_POST['mdp'], ENT_QUOTES, 'UTF-8');

$authenticated = false;

foreach ($students as $student) {
    if ($student['email'] === $email && $student['motdepasse'] === $motDePasse) {
        $_SESSION['nom'] = $student['email'];
        $authenticated = true;
        break;
    }
}

if ($authenticated && isset($_POST["valider"])) {
    header('Location: ../adminMain.html');
    exit();
} else {
    echo 'Connexion refusée';
}

ob_end_flush();
