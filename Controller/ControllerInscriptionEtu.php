<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../Model/ModelMail.php';
include '../Model/ConnexionBDD.php';
include '../Model/ModelInscriptionEtu.php';

$db = Conn::getInstance();

$token = generationToken();

setcookie("token", $token, time() + 350 , '/');

if(isset($_POST["valider"])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateDeNaissance = $_POST['date'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['cp'];
    $ine = $_POST['ine'];
    $anneeEtude = $_POST['anneeetude'];
    $formation = $_POST['formation'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);




    if (selectEtuWhereEmail($db, $email) == null) {
        $result = envoieMail($email, $email, 'SAE', 'CONFIRMATION EMAIL', "http://localhost:/View/ViewMdpinscriptionEtu.php?token=".$token);
        ajouterEtudiant($db,$nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email,  $ine, $token);
        setcookie("mailEtu", $email, time() + 3600, "/"); // Cookie du mail de l'étudiant
        if (true !== $result)
        {
            // erreur -- traiter l'erreur
            echo $result;
        }
    exit();
    }
    else {
        $erreur = "Adresse mail déjà utilisée !";
    }

}
?>