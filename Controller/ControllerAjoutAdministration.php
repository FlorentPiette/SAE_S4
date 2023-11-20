<?php

include '../Model/ConnexionBDD.php';
include '../Model/ModelAjout.php';
$conn = Conn::getInstance();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$formation = $_POST['formation'];
$email = $_POST['email'];
$mdp =  password_hash($_POST['mdp'], PASSWORD_DEFAULT);
$role = $_POST['role'];


if(isset($_POST["valider"])) {
    ajoutAdministration($conn, $nom, $prenom, $formation, $email, $mdp, $role);
    header('Location: ../View/ViewAdminAdministration.php');
}
