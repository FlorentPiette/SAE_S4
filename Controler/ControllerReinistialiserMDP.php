<?php

include 'ConnexionBDD.php';

$db = conn('localhost', 'postgres', 'postgres', 'admin');


if(isset($_POST["nouveauMDP"])){
    $email = $_COOKIE["Mail_Etudiant"];
    $nouveauMDP = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
    $updateMDP = $db->prepare("UPDATE etudiant SET motDePasse = ? WHERE email = ?");
    $updateMDP->execute(array($nouveauMDP, $email));
    echo 'mot de passe reset';
}
?>