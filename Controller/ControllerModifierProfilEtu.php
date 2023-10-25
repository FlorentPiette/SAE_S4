<?php
include '../Model/ConnexionBDD.php';
include '../Model/ModelModifierProfilEtu.php';

$conn = Conn::getInstance();

$id = 1;
$etu = selectEtudiant($conn, $id);

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

if(isset($_POST["setActif"])){
    if (isset($_POST['actif'])){
        updateActif($conn, $id);
    }
    else{
        updateInactif($conn, $id);
    }
    header("Location: ControllerModifierProfilEtu.php");
}
