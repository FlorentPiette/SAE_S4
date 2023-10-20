<?php
session_start();
ob_start();
include '../Model/ModelConnexionAdmin.php';
include '../Model/ConnexionBDD.php';

$conn = Conn::getInstance();

// Récupérer tous les utilisateurs (adresse email, mot de passe et rôle)
$users = selectEmailMDPRoleAdmin($conn);

// Supprimer les balises HTML et PHP des données postées
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$motDePasse = htmlspecialchars($_POST['mdp'], ENT_QUOTES, 'UTF-8');



if ( isset($_POST["valider"])) {
    authenticatedAdmin($users,$email,$motDePasse);
}

if (isset($_POST['btnRetour'])){
    header('Location: ../ViewAvConnexionAdmin.php');
}


ob_end_flush();
