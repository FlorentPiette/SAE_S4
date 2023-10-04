<?php

include 'ConnexionBDD.php';

$db = conn('iutinfo-sgbd.uphf.fr', 'iutinfo244','iutinfo244','Gy6pdK1g');

if(isset($_POST["ajoutEntreprise"])) {
    $ajout = $db->prepare("INSERT INTO Entreprise VALUES (DEFAULT, :nom, NULL, :adresse, :ville, :codePostal, :num, :secteur)");

    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['codePostal'];
    $num = $_POST['num'];
    $secteur = $_POST['secteur'];

    $ajout->execute(array($nom, $adresse, $ville, $codePostal, $num, $secteur));
}
?>