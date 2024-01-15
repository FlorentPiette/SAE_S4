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
        $result = envoieMail($email, $email, 'SAE', 'CONFIRMATION EMAIL', "http://localhost:/View/ViewMdpinscriptionEtu.php?token=" . $token);
        ajouterEtudiant($db, $nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $ine, $token);
        if (isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] == UPLOAD_ERR_OK) {

            $dossier_destination = "../Controller/";
            $chemin_fichier_destination = $dossier_destination . basename($_FILES["fichier"]["name"]);
            if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $chemin_fichier_destination)) {
                $idEtu = selectidWhereEmail($db, $email);
                $sql = "INSERT INTO CV (chemin, contenu) VALUES (:chemin, :contenu)";
                $stmt = $db->prepare($sql);
                // Lier les paramètres
                $stmt->bindParam(':chemin', $chemin_fichier_destination);

                // Utiliser bindValue pour le contenu du fichier
                $stmt->bindValue(':contenu', file_get_contents($chemin_fichier_destination), PDO::PARAM_LOB);

                // Exécuter la requête
                if ($stmt->execute()) {
                    echo "Le fichier a été ajouté avec succès à la base de données.";
                } else {
                    echo '<div style="color: red;">Erreur lors de l\'ajout du fichier dans la base de données : ' . $stmt->errorInfo()[2] . '</div>';
                }
            }
        }

        setcookie("mailEtu", $email, time() + 3600, "/"); // Cookie du mail de l'étudiant
        if (true !== $result) {
            echo $result;
        }
        exit();
        } else {
            $erreur = "Adresse mail déjà utilisée !";
        }
}

