<?php
include '../Model/ConnexionBDD.php';
include '../Model/ModelModifierProfilEtu.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = Conn::getInstance();

$id = $_GET['ine'];
$etu = selectEtudiantIne($conn, $id);

include ("../View/ViewModifierProfilEtu.php");

if (isset($_POST['modifier_nom'])){
    $nom = $_POST['nouveau_nom'];
    updateNomEtu($conn, $nom, $id);
    // Rediriger l'utilisateur vers la page de profil de l'étudiant mis à jour
    header("Location: ControllerModifierProfilEtu.php");
}

if (isset($_POST['modifier_prenom'])){
    $prenom = $_POST['nouveau_prenom'];
    updatePrenomEtu($conn, $prenom, $id);
    header("Location: ControllerModifierProfilEtu.php");
}

if (isset($_POST['modifier_adresse'])){
    $adresse = $_POST['nouvelle_adresse'];
    updateAdresseEtu($conn, $adresse, $id);
    header("Location: ControllerModifierProfilEtu.php");
}

if (isset($_POST['modifier_ville'])){
    $ville = $_POST['nouvelle_ville'];
    updateVilleEtu($conn, $ville, $id);
    header("Location: ControllerModifierProfilEtu.php");
}

if (isset($_POST['modifier_cp'])){
    $codePostal = $_POST['nouveau_cp'];
    updateCpEtu($conn, $codePostal, $id);
    header("Location: ControllerModifierProfilEtu.php");
}

if (isset($_POST['modifier_anneeEtude'])){
    $anneeEtude = $_POST['annouvelle_anneeEtudeneeetude'];
    updateAnneeEtudeEtu($conn, $anneeEtude, $id);
    header("Location: ControllerModifierProfilEtu.php");
}

if (isset($_POST['modifier_formation'])){
    $formation = $_POST['nouvelle_formation'];
    updateFormationEtu($conn, $formation, $id);
    header("Location: ControllerModifierProfilEtu.php");
}

if (isset($_POST['modifier_email'])){
    $email = $_POST['nouvel_email'];
    updateEmailEtu($conn, $email, $id);
    header("Location: ControllerModifierProfilEtu.php");
}

if (isset($_POST['modifier_typeentreprise'])){
    $typeentreprise = $_POST['nouveau_typeentreprise'];
    updateTypeEntrepriseEtu($conn, $typeentreprise, $id);
    header("Location: ControllerModifierProfilEtu.php");
}

if (isset($_POST['modifier_typemission'])){
    $typemission = $_POST['nouveau_typemission'];
    updateTypeMissionEtu($conn, $typemission, $id);
    header("Location: ControllerModifierProfilEtu.php");
}

if (isset($_POST['modifier_mobile'])){
    if (isset($_POST['mobile'])){
        $mobile = true;
    }
    else{
        $mobile = false;
    }
    updateMobile($conn, $mobile, $id);
    header("Location: ControllerModifierProfilEtu.php");
}

if(isset($_POST["setActif"])){
    if (isset($_POST['actif'])){
        updateActif($conn, $id);
    }
    else{
        updateInactif($conn, $id);
    }
    header("Location: ControllerModifierProfilEtu.php");
}

