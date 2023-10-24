<?php
include ('../Model/ModelConnexionEtu.php');
include ('../Model/ConnexionBDD.php');

session_start();
ob_start();

//Connexion bdd
$conn = Conn::getInstance();

// Récupérer tous les étudiants (adresses email et mots de passe)
$students = selectEmailMDPEtu($conn);


// Supprimer les balises HTML et PHP des données postées
$email = htmlspecialchars($_POST['Email'], ENT_QUOTES, 'UTF-8');
$motDePasse = htmlspecialchars($_POST['MotDePasse'], ENT_QUOTES, 'UTF-8');


if (authenticated($students, $email, $motDePasse)) {
    header('Location: ../View/ViewPageEtu.php');
    exit();
} else {
    header('Location: ../View/ViewEtudiant.html');
}

if (isset($_POST['btnRetour'])){
    header('Location: ../View/ViewConnexionEtu.html');
}

ob_end_flush();
?>

