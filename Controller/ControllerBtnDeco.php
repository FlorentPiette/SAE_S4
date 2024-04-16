<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['deco'])){
    if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])){

    // Détruire la session
    session_unset();
    session_destroy();

    header('Location: ../View/ViewAvConnexion.html');
    exit;}

}

if (isset($_POST['compte'])){
    if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])){

    header('Location: ../Controller/ControllerModifierProfilPerso.php');
    exit;}

}

ob_end_flush();
