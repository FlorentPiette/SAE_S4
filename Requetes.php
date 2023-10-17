<?php


function selectOffres($conn){
    $req = "SELECT * FROM Offre";
    $req2 = $conn->prepare($req);
    $req2->execute();

    return $req2;
}

function selectEtudiants($conn){
    $req = "SELECT * FROM Etudiant";
    $req2 = $conn->prepare($req);
    $req2->execute();

    return $req2;
}

function selectEntreprises($conn){
    $req = "SELECT * FROM Entreprise";
    $req2 = $conn->prepare($req);
    $req2->execute();

    return $req2;
}

function ajoutAdministration($conn, $nom, $prenom, $formation, $email, $mdp, $role){
    $req = "INSERT INTO Adminitrsation VALUES (DEFAULT, :nom, :prenom, :formation, :email, :mdp, :role)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $prenom, $formation, $email, $mdp, $role));
}

function ajoutEtudiant($conn, $nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $motDePasse, $iNE, $codeConfirmation){
    $req = "INSERT INTO Etudiant (IdEtudiant, Nom, Prenom, DateDeNaissance, Adresse, Ville, CodePostal, AnneeEtude, Formation, Email, MotDePasse, INE, Actif, CodeConfirmation)
            VALUES (DEFAULT, upper(:nom), :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, :email, :mdp, :ine, True, :CodeMail)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $motDePasse, $iNE, $codeConfirmation));
}

function ajoutOffre($conn, $nom, $domaine, $mission, $nbetudiant){
    $req = "INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $domaine, $mission, $nbetudiant));
}

function ajoutEntreprise($conn, $nom, $adresse, $ville, $codePostal, $num, $secteur, $email){
    $req = "INSERT INTO Entreprise VALUES (DEFAULT, :nom, NULL, :adresse, :ville, :codePostal, :num, :secteur,:email)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $adresse, $ville, $codePostal, $num, $secteur, $email));
}

function reinitialiserMDP($conn, $mdp, $email){
    $req = "UPDATE Etudiant SET motDePasse = ? WHERE email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($mdp, $email));
}

function selectEmailMDPRoleAdmin($conn){
    $req = "SELECT email, motdepasse, role FROM Administration";
    $req2 = $conn->prepare($req);
    $req2->execute();

    return req2;
}

function selectEmailMDPAdmin($conn){
    $req = "SELECT email, motdepasse FROM Administration";
    $req2 = $conn->prepare($req);
    $req2->execute();

    return req2;
}

function selectEmailMDPEtu($conn){
    $req = "SELECT email, motdepasse FROM Etudiant";
    $req2 = $conn->prepare($req);
    $req2->execute();

    return req2;
}

function selectEtuWhereEmail($conn, $email){
    $req = "SELECT * FROM Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));

    return req2;
}

function selectOffreWhereNom($conn, $nom){
    $req = "SELECT * FROM Offre WHERE nom = :nom";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom));

    return req2;
}

function selectCodeEtuWhereEmail($conn, $email){
    $req = "SELECT CodeConfirmation from Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));

    return req2;
}

function selectEtuWhereNom($conn, $nom){
    $req = "SELECT * FROM Etudiant WHERE 1=1 AND nom ILIKE :nom";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom));

    return req2;
}

function selectEtuWherePrenom($conn, $prenom){
    $req = "SELECT * FROM Etudiant WHERE 1=1 AND prenom ILIKE :prenom";
    $req2 = $conn->prepare($req);
    $req2->execute(array($prenom));

    return req2;
}

function selectEtuWhereINE($conn, $ine){
    $req = "SELECT * FROM Etudiant WHERE 1=1 AND ine ILIKE :ine";
    $req2 = $conn->prepare($req);
    $req2->execute(array($ine));

    return req2;
}

function updateActif($conn, $id){
    $req = "UPDATE etudiant SET actif = TRUE WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
}

function updateInactif($conn, $id){
    $req = "UPDATE etudiant SET actif = FALSE WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
}