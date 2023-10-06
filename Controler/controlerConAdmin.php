<?php
session_start();
ob_start();

$conn = new PDO('pgsql:host=localhost;port=5432;dbname=postgres', 'postgres', '31lion2004');

// Récupérer tous les utilisateurs (adresse email, mot de passe et rôle)
$stmt = $conn->prepare("SELECT email, motdepasse, role FROM adminitrsation");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Supprimer les balises HTML et PHP des données postées
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$motDePasse = htmlspecialchars($_POST['mdp'], ENT_QUOTES, 'UTF-8');

$authenticated = false;
$userRole = '';

foreach ($users as $user) {
    if ($user['email'] === $email && password_verify($motDePasse , $user['motdepasse'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $authenticated = true;
        $userRole = $user['role'];
        break;
    }
}

if ($authenticated && isset($_POST["valider"])) {
    // Rediriger en fonction du rôle
    switch ($userRole) {
        case 'cd':
            header('Location: ../CdMain.php');
            break;
        case 'rp':
            header('Location: RpMain.php');
            break;
        case 'rs':
            header('Location: RsMain.php');
            break;
        case 'Administrateur':
            header('Location: ../adminMain.php');
            break;
        // Ajoutez d'autres cas selon les rôles et les pages correspondantes
        default:
            echo 'Rôle non reconnu';
    }
    exit();
} else {
    echo 'Connexion refusée'.password_hash('Test@456', PASSWORD_DEFAULT);
}

if (isset($_POST['btnRetour'])){

    header('Location: ../mainAdmin.php');

}


ob_end_flush();
