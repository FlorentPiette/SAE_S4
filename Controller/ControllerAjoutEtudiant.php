<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'ModelMail.php';
include '../Model/ConnexionBDD.php';
include 'Model/ModelAjout.php';

$db = Conn::getInstance();


if(isset($_POST["ajoutEtudiant"])) {


    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateDeNaissance = $_POST['dateDeNaissance'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['codePostal'];
    $ine = $_POST['ine'];
    $anneeEtude = $_POST['anneeEtude'];
    $formation = $_POST['formation'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $confirmation = code();
    setcookie("Mail_Etudiant", $email, time() + 3600, "/");

    $reqmail = selectEtuWhereEmail($db, $email);
    $mailexist = $reqmail->rowCount();

    if ($mailexist == 0) {
        $ajout = ajoutEtudiant($db, $nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $mdp, $ine, $confirmation);
        $result = envoieMail($email, $email, 'SAE', 'CORFIRMATION EMAIL', "Voici votre code ".$confirmation);
        if (true !== $result)
        {
            // erreur -- traiter l'erreur
            echo $result;
        }
        header('Location: ../VerifMail.php');
    }
    else {
        $erreur = "Adresse mail déjà utilisée !";
    }


}
?>