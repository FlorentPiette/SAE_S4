<?php
include '../Model/ConnexionBDD.php';
include '../Model/ModelModifierProfilPerso.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
ob_start();

$conn = Conn::getInstance();

$email = $_SESSION['email'];
$id = selectId($conn, $email);
$perso = selectPersoId($conn, $id);

include ("../View/ViewModifierProfilPerso.php");

if (isset($_POST['modifier_profil'])){
    $nom = $_POST['nouveau_nom'];
    $prenom = $_POST['nouveau_prenom'];
    $formation = $_POST['nouvelle_formation'];
    $email = $_POST['nouvelle_email'];
    $role = $_POST['nouveau_role'];

    updatePerso($conn, $nom, $prenom, $formation, $email, $role, $id);

    header("Location: ControllerModifierProfilPerso.php?id=$id");
}
ob_end_flush();