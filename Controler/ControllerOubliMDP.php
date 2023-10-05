<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'ControllerMail.php';

include 'ConnexionBDD.php';

$db = conn('localhost', 'postgres', 'postgres', 'admin');

$code = 0;
for ($i = 0; $i < 7; $i++) {
    $chiffreAleatoire = mt_rand(0, 9); // Génère un chiffre aléatoire entre 0 et 9
    $code.= $chiffreAleatoire; // Ajoute le chiffre à la sélection
}

setcookie("Code_Confirmation", $code, time() + 3600, "/");

if(isset($_POST["envoieCode"])){
    $email = $_POST['email'];

    setcookie("Mail_Etudiant", $email, time() + 3600, "/");

    $reqmail = $db->prepare("SELECT * FROM Etudiant where email = ?");
    $reqmail->execute(array($email));
    $mailexist = $reqmail->rowCount();

    if ($mailexist != 0){
        $result = envoieMail($email, $email, 'SAE', 'REINITIALISATION MOT DE PASSE', "Voici votre code ".$code);

        if (true !== $result)
        {
            echo $result;
        }
        else{
            header('Location: ../OubliMotDePasseCode.php');
        }
    } else {
        echo "mince";
    }
}
?>