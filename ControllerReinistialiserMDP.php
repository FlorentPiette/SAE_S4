<?php

$host = 'localhost';
$dbname = 'td';
$username = 'emeline';
$password = 'root';

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

try {
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if(isset($_POST["nouveauMDP"])){
    $email = $_COOKIE["Mail_Etudiant"];
    $nouveauMDP = $_POST['mdp'];
    $updateMDP = $db->prepare("UPDATE etudiant SET motDePasse = ? WHERE email = ?");
    $updateMDP->execute(array($nouveauMDP, $email));
}
?>