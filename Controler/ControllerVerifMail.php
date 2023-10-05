<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'ConnexionBDD.php';

$db = conn('localhost', 'postgres', 'postgres', 'admin');

$mail = $_COOKIE["Mail_Etudiant"];
$compteur = isset($_COOKIE["Compteur"]) ? $_COOKIE["Compteur"] : 0;
$verif = $db->prepare("SELECT CodeMail from Etudiant where email = ?");
$verif->execute(array($mail));
$row = $verif->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["verification"])){
    if (implode($row)===$_POST["verification"]){
        $delete = $db->prepare("UPDATE etudiant SET CodeMail = NULL where email= ?");
        setcookie("Compteur", 0, time() - 3600, "/"); // Réinitialise le compteur
        $delete->execute(array($mail));
        header('Location: ../main.html');
    } elseif ($compteur < 2) {
        $compteur++;
        setcookie("Compteur", $compteur, time() + 3600, "/"); // Met à jour le compteur dans le cookie
        header('Location: ../VerifMail.php');
        $compteur ++;
    } else {
        $supp = $db->prepare("DELETE FROM etudiant WHERE email = ? ");
        $supp->execute(array($mail));
        setcookie("Compteur", 0, time() - 3600, "/"); // Réinitialise le compteur
        header('Location: ../admin/nouvcompte.html');

    }
}



?>