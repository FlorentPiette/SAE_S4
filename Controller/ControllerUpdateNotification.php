<?php
include '../Model/ConnexionBDD.php';
include '../Model/ModelNotifation.php';
$conn = Conn::getInstance();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idnotif = $_POST['idnotif'] ?? null;
    $idetudiant = $_POST['idetudiant'] ?? null;

    if ($idnotif !== null && $idetudiant !== null) {


        $idoffre = $_POST['idnotif'];
        $idetudiant = $_POST['idetudiant'];
        $lu = $_POST['lu'];
        $rappel = $_POST['dateSaisie'];

        semaine($conn, $idoffre, $idetudiant, $lu,$rappel);

        header('Content-Type: application/json');

        exit;
    }
}
$idoffre = $_POST['idnotif'];
$idetudiant = $_POST['idetudiant'];



http_response_code(400);
echo json_encode( $idetudiant );



