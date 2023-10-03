<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'ControllerMail.php';

$host = 'iutinfo-sgbd.uphf.fr';
$dbname = 'iutinfo244';
$username = 'iutinfo244';
$password = 'Gy6pdK1g';




$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

try {
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


if(isset($_POST["ajoutEtudiant"])) {
    $ajout = $db->prepare("INSERT INTO Etudiant VALUES (DEFAULT, upper(:nom), :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, NULL, :email, :mdp, NULL, :ine, NULL, :CodeMail)");

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
    setcookie("Mail_Etudiant", $email, time() + 3600, "/");

    $conformation = 0;
    for ($i = 0; $i < 7; $i++) {
        $chiffreAleatoire = mt_rand(0, 9); // Génère un chiffre aléatoire entre 0 et 9
        $conformation.= $chiffreAleatoire; // Ajoute le chiffre à la sélection
    }


    $reqmail = $db->prepare("SELECT * FROM Etudiant where email = ?");
    $reqmail->execute(array($email));
    $mailexist = $reqmail->rowCount();

    if ($mailexist == 0) {
        $ajout->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $mdp, $ine, $conformation));
        $result = envoieMail($email, $email, 'SAE', 'CORFIRMATION EMAIL', "Voici votre code ".$conformation);
        if (true !== $result)
        {
            // erreur -- traiter l'erreur
            echo $result;
        }
        header('Location: VerifMail.php');
    }
    else {
        $erreur = "Adresse mail déjà utilisée !";
    }


}
?>