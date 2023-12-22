<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../Model/ModelNotifation.php";
include "../Model/ConnexionBDD.php";

$conn = Conn::getInstance();
$nbnotif = nbnotif($conn);
$notif = notif($conn);

$response = [
    'nb' => $nbnotif,
    'notif' => $notif
];



header('Content-Type: application/json');
echo json_encode($response);

?>