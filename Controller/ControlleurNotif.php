<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../Model/ModelNotifation.php";
include "../Model/ConnexionBDD.php";

$conn = Conn::getInstance();

// Ajoutez un bloc try-catch pour capturer les erreurs
try {
    $nbnotif = nbnotif($conn);
    $notif = notif($conn);

    // Appel de la fonction verifdate
    verifdate($conn);

    semaineinsert($conn);
    sdf($conn);

    $response = [
        'nb' => $nbnotif,
        'notif' => $notif
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
