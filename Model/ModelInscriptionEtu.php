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
?>
