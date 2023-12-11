<?php

function generationToken(){
    $token = bin2hex(random_bytes(50));
    return $token;
}


function ajouterEtudiant($db,$nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email,  $ine, $token){
    $ajout = $db->prepare("INSERT INTO Etudiant (Nom, Prenom, DateDeNaissance, Adresse, Ville, CodePostal, AnneeEtude, Formation, Email, MotDePasse, INE, codemail) 
    VALUES (upper(:nom), :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, :email, null, :ine, :CodeMail)");
    $ajout->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $ine, $token));
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
?>


