<?php

include '../ConnexionBDD.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = 'localhost';
$dbname = 'postgres';
$username = 'postgres';
$password = '31lion2004';
$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

$mail = $_COOKIE["Mail_Etudiant"];

try {
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
$verif = $db->prepare("SELECT CodeConfirmation from Etudiant where email = '$mail'");
$verif->execute();
$row = $verif->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["verification"])){
    if (implode($row)==$_POST["verification"]){
        echo "yeess";
    } else {
        echo "mince";
    }
}



?>