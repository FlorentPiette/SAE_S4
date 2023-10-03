<?php
session_start();
ob_start();

$conn = new PDO('pgsql:host=localhost;port=5432;dbname=postgres', 'postgres', '31lion2004');

// Récupérer tous les étudiants (adresses email et mots de passe)
$stmt = $conn->prepare("SELECT email,motdepasse  FROM etudiant");
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Supprimer les balises HTML et PHP des données postées
$email = htmlspecialchars($_POST['Email'], ENT_QUOTES, 'UTF-8');
$motDePasse = htmlspecialchars($_POST['MotDePasse'], ENT_QUOTES, 'UTF-8');

$authenticated = false;

foreach ($students as $student) {
    if ($student['email'] === $email && $student['motdepasse'] === $motDePasse) {
        $_SESSION['nom'] = $student['email'];
        $authenticated = true;
        break;
    }
}

if ($authenticated && isset($_POST["valider"])) {
    header('Location: ../pageEtu.php');
    exit();
} else {
    echo 'Connexion refusée';
}

ob_end_flush();