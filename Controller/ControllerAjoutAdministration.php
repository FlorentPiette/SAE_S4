<?php

include '../Model/ConnexionBDD.php';
include '../Model/ModelAjout.php';
$conn = Conn::getInstance();
include('/Controller/csrf_check.php');
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$formation = $_POST['formation'];
$email = $_POST['email'];
$mdp =  password_hash($_POST['mdp'], PASSWORD_BCRYPT);
$role = $_POST['role'];


if(isset($_POST["valider"])) {
    echo 'test';
        ajoutAdministration($conn, $nom, $prenom, $formation, $email, $mdp, $role);
        header('Location: ../View/ViewAdminAdministration.php');
    }

