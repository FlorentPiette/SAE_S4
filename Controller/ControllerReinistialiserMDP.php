<?php

include '../Model/ConnexionBDD.php';
include '../Model/ModelReinitialiserMdp.php';
$db = Conn::GetInstance();

if(isset($_POST["nouveauMDP"])){
    $email = $_COOKIE["Mail_Etudiant"];
    $nouveauMDP = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
    $updateMDP = reinitialiserMDP($nouveauMDP,$email);
    echo 'mot de passe reset';
}
?>