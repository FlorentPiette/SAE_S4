<?php

$host = 'localhost';
$dbname = 'td';
$username = 'emeline';
$password = 'root';

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

try {
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if(isset($_POST["ajoutEtudiant"])) {
    $ajout = $db->prepare("INSERT INTO Etudiant VALUES (DEFAULT, :nom, :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, NULL, :email, :mdp, NULL, :ine, NULL)");

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

    $reqmail = $db->prepare("SELECT * FROM Etudiants WHERE email = ?");
    $reqmail->execute(array($email));
    $mailexist = $reqmail->rowCount();

    if ($mailexist == 0) {
        $ajout->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $mdp, $ine));

        /*$cle = md5(microtime(TRUE)*100000);

        $reqCle = $db->prepare("UPDATE Etudiant SET cle=:cle WHERE nom = :nom AND prenom = :prenom");
        $reqCle->execute($cle, $nom, $prenom);

        $destinataire = $email;
        $sujet = "Activer votre compte" ;
        $entete = "From: inscription@votresite.com" ;

        $message = 'Bienvenue sur VotreSite,
 
                    Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
                    ou copier/coller dans votre navigateur Internet.
                     
                    http://votresite.com/activation.php?log='.urlencode($nom, $prenom).'&cle='.urlencode($cle).'
                                         
                     
                    ---------------
                    Ceci est un mail automatique, Merci de ne pas y répondre.';


        mail($destinataire, $sujet, $message, $entete) ;*/
    }
    else {
        $erreur = "Adresse mail déjà utilisée !";
    }
}
?>