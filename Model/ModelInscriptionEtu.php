<?php

function generationToken(){
    $token = bin2hex(random_bytes(50));
    return $token;
}


function ajouterEtudiant($db,$nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email,  $ine, $token){
    $prenom=htmlentities($prenom);
    $nom=htmlentities($nom);
    $adresse=htmlentities($adresse);
    $ville=htmlentities($ville);
    $formation=htmlentities($formation);
    $ine=htmlentities($ine);
    if(filter_var($codePostal,FILTER_VALIDATE_INT) and filter_var($email,FILTER_VALIDATE_EMAIL)){
    $ajout = $db->prepare("INSERT INTO Etudiant (Nom, Prenom, DateDeNaissance, Adresse, Ville, CodePostal, AnneeEtude, Formation, Email, MotDePasse, INE, codemail) 
    VALUES (upper(:nom), :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, :email, null, :ine, :CodeMail)");
    $ajout->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $ine, $token));}
}


function ajouterCV($db, $etu, $chemin){
    if(filter_var($etu,FILTER_VALIDATE_INT) and file_exists($chemin)) {
        $sql = "INSERT INTO CV (id, chemin, contenu) VALUES (:id, :chemin, :contenu)";
        $stmt = $db->prepare($sql);

        if (!empty($etu)) {
            $stmt->bindParam(':id', $etu);
            $stmt->bindParam(':chemin', $chemin);

            $stmt->bindValue(':contenu', file_get_contents($chemin), PDO::PARAM_LOB);
            if ($stmt->execute()) {
                echo "Le fichier a été ajouté avec succès à la base de données.";
                header('Location: ../View/ViewEtuMain.php');
            } else {
                echo '<div style="color: red;">Erreur lors de l\'ajout du fichier dans la base de données : ' . $stmt->errorInfo()[2] . '</div>';
            }
        }
    }
}

/**
 * Récuperer de la base de donnée, les étudiants qui ont cette adresse email
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $email sert à  chercher si l'email est dans la base de donnée
 *
 * @return array $result
 */
function selectEtuWhereEmail($conn, $email): array
{
    $req = "SELECT * FROM Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function selectidWhereEmail($conn, $email)
{
    $req = "SELECT idEtudiant FROM Etudiant WHERE email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetchColumn();

    return $result;
}
?>


