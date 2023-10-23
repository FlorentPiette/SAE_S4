<?php
include '../Model/ConnexionBDD.php';
include '../Model/ModelModifierProfilEtu.php';

$conn = Conn::getInstance();

$id = 1;

if (isset($_POST['modifier_nom'])){
    $nom = $_POST['nouveau_nom'];
    updateNomEtu($conn, $nom, $id);
}

if (isset($_POST['modifier_prenom'])){
    $prenom = $_POST['nouveau_prenom'];
    updatePrenomEtu($conn, $prenom, $id);
}

if (isset($_POST['modifier_adresse'])){
    $adresse = $_POST['nouvelle_adresse'];
    updateAdresseEtu($conn, $adresse, $id);
}

if (isset($_POST['modifier_ville'])){
    $ville = $_POST['nouvelle_ville'];
    updateVilleEtu($conn, $ville, $id);
}

if (isset($_POST['modifier_cp'])){
    $codePostal = $_POST['nouveau_cp'];
    updateCpEtu($conn, $codePostal, $id);
}

if (isset($_POST['modifier_anneeEtude'])){
    $anneeEtude = $_POST['annouvelle_anneeEtudeneeetude'];
    updateAnneeEtudeEtu($conn, $anneeEtude, $id);
}

if (isset($_POST['modifier_formation'])){
    $formation = $_POST['nouvelle_formation'];
    updateFormationEtu($conn, $formation, $id);
}

if (isset($_POST['modifier_email'])){
    $email = $_POST['nouvel_email'];
    updateEmailEtu($conn, $email, $id);
}

if(isset($_POST["setActif"])){
    if (isset($_POST['actif'])){
        updateActif($conn, $id);
    }
    else{
        updateInactif($conn, $id);
    }
}

// Rediriger l'utilisateur vers la page de profil de l'étudiant mis à jour
header("Location: ControllerAfficherProfilEtu.php");
?>
