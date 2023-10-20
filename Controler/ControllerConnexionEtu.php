<?php
include ('../Model/ModelConnexionEtu.php');
include ('../Model/ConnexionBDD.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
ob_start();

//Conneion bdd
$conn = Conn::getInstance();

// Récupérer tous les étudiants (adresses email et mots de passe)
$students = selectEmailMDPEtu($conn);


// Supprimer les balises HTML et PHP des données postées
$email = htmlspecialchars($_POST['Email'], ENT_QUOTES, 'UTF-8');
$motDePasse = htmlspecialchars($_POST['MotDePasse'], ENT_QUOTES, 'UTF-8');


if (authenticated($students,$email,$motDePasse) == true) {
    header('Location: ../PageAccueil.php');
    exit();
} else {
    header('Location: ../View/View/ViewEtudiant.html');
}

ob_end_flush();
?>

