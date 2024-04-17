<?php

include '../Model/ModelAjout.php';
include '../Model/ConnexionBDD.php';
include('/Controller/csrf_check.php');
$db = Conn::getInstance();

if(isset($_POST["ajoutEntreprise"])) {


        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $codePostal = $_POST['codePostal'];
        $num = $_POST['num'];
        $secteur = $_POST['secteur'];
        $email = $_POST['email'];

        ajoutEntreprise($db, $nom, $adresse, $ville, $codePostal, $num, $secteur, $email);

        header('Location: ../View/ViewAdminMain.php');
    }

