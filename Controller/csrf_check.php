<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    try {
        if (!(hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']))) {
            throw new Exception('Token CSRF invalide');
        }
    } catch (Exception $e) {
        header('Location: /View/ViewAvConnexion.html');
        die();
    }
?>