<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'ControllerMail.php';
include 'C:\Users\kylli\SAE\ConnexionBDD.php';

$db = conn('iutinfo-sgbd.uphf.fr', 'iutinfo244','iutinfo244','Gy6pdK1g');

function aleatoire(){
    $conformation = 0;
    for ($i = 0; $i < 7; $i++) {
        $chiffreAleatoire = mt_rand(0, 9); // Génère un chiffre aléatoire entre 0 et 9
        $conformation.= $chiffreAleatoire; // Ajoute le chiffre à la sélection
    }
    return $conformation;
}


if(isset($_POST["valider"])) {
    $ajout = $db->prepare("INSERT INTO Etudiant VALUES (DEFAULT, upper(:nom), :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, NULL, :email, :mdp, NULL, :ine, NULL, :CodeMail)");

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

    setcookie("Mail_Etudiant", $email, time() + 3600, "/"); // Cookie du mail de l'étudiant

    $code = aleatoire(); // code de confirmation aléatoire



    $reqmail = $db->prepare("SELECT * FROM Etudiant where email = ?");
    $reqmail->execute(array($email));
    $mailexist = $reqmail->rowCount();

    if ($mailexist == 0) {
        $ajout->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $mdp, $ine, $code));
        $result = envoieMail($email, $email, 'SAE', 'CONFIRMATION EMAIL', "Voici votre code ".$code);
        if (true !== $result)
        {
            // erreur -- traiter l'erreur
            echo $result;
        }
        header('Location: ..\VerifMail.php');
    }
    else {
        $erreur = "Adresse mail déjà utilisée !";
    }


}
?>