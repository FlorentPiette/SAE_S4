<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST['btnDeco'])){

    // Détruire la session
    session_unset();
    session_destroy();

    // Redirigez l'utilisateur vers la page de connexion
    header('Location: ../choix.php');
    exit;

}

ob_end_flush();
?>