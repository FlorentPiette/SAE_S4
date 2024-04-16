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
    if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $nom = htmlspecialchars($_POST['nouveau_nom']);
        $prenom = htmlspecialchars($_POST['nouveau_prenom']);
        $formation = htmlspecialchars($_POST['nouvelle_formation']);
        $email = htmlspecialchars($_POST['nouvelle_email']);
        $role = htmlspecialchars($_POST['nouveau_role']);

        updatePerso($conn, $nom, $prenom, $formation, $email, $role, $id);

        header("Location: ControllerModifierProfilPerso.php?id=$id");
    }
}
ob_end_flush();