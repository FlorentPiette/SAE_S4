<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['deco'])){

    // Détruire la session
    session_unset();
    session_destroy();

    header('Location: ../View/ViewAvConnexion.html');
    exit;

}

ob_end_flush();
