<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../Model/ModelMail.php';
include '../Model/ConnexionBDD.php';
include '../Model/ModelInscriptionEtu.php';
include('/Controller/csrf_check.php');
$db = Conn::getInstance();

$token = generationToken();

setcookie("token", $token, time() + 350 , '/');

if (isset($_POST["valider"])) {

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
    $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);

    if (selectEtuWhereEmail($db, $email) == null) {
        $result = envoieMail($email, $email, 'SAE', 'CONFIRMATION EMAIL', "http://localhost:/View/ViewMdpinscriptionEtu.php?token=" . $token);
        ajouterEtudiant($db, $nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $ine, $token);

        setcookie("mailEtu", $email, time() + 3600, "/"); // Cookie du mail de l'étudiant
        if (true !== $result) {
            echo $result;
        }
        session_start();
        $_SESSION['email'] = $email;
        header('Location: ControllerImportationCV.php');
    } else {
        $erreur = "Adresse mail déjà utilisée !";
    }
}

?>
