<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../Model/ModelMdpEtu.php';
include '../Model/ConnexionBDD.php';
include('/Controller/csrf_check.php');

$conn = Conn::getInstance();
$email = $_COOKIE["mailEtu"];

if ($_POST['token'] && $_COOKIE['token']) {
    $token = $_POST['token'];
    if (isset($_POST['Valider'])) {
            $mdp = $_POST['mdp'];
            $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
            mdpEtu($conn, $token, $mdp);
            session_start();
            $_SESSION["Etu"] = true;
            header('location: ../View/ViewConnexion.php');
        }
    }
 else {
    // Gestion des erreurs si le token est manquant
    echo "Le lien de réinitialisation du mot de passe est incorrect ou a expiré.";
    suppEtu($conn,$email);
    header('location: ../View/ViewNouvCompte.php');
    exit;
}