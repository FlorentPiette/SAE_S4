<?php

/*
 * @author emeline
 */

/*
 * @param PDO conn
 *
 * @return array $result
 */
function selectOffres($conn){
    $req = "SELECT * FROM Offre";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * @param PDO conn
 *
 * @return array $result
 */
function selectEtudiants($conn){
    $req = "SELECT * FROM Etudiant";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * @param PDO conn
 *
 * @return array $result
 */
function selectEntreprises($conn){
    $req = "SELECT * FROM Entreprise";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * @param PDO conn
 * @param String nom
 * @param String prenom
 * @param String formation
 * @param String email
 * @param String mdp
 * @param String role
 *
 * @return array $result
 */
function ajoutAdministration($conn, $nom, $prenom, $formation, $email, $mdp, $role){
    $req = "INSERT INTO Adminitrsation VALUES (DEFAULT, :nom, :prenom, :formation, :email, :mdp, :role)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $prenom, $formation, $email, $mdp, $role));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * Ajouter un étudiant dans la base de donnée
 *
 * @param PDO conn
 * @param String nom
 * @param String prenom
 * @param date dateDeNaissance
 * @param String adresse
 * @param String ville
 * @param int codePostal (5 caractères)
 * @param int anneeEtude
 * @param String formation
 * @param String email
 * @param String motDePasse
 * @param String iNE
 * @param int codeConfirmation (8 caractères)
 *
 * @return void
 */
function ajoutEtudiant($conn, $nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $motDePasse, $iNE, $codeConfirmation){
    $req = "INSERT INTO Etudiant (IdEtudiant, Nom, Prenom, DateDeNaissance, Adresse, Ville, CodePostal, AnneeEtude, Formation, Email, MotDePasse, INE, Actif, CodeConfirmation)
            VALUES (DEFAULT, upper(:nom), :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, :email, :mdp, :ine, True, :CodeMail)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $motDePasse, $iNE, $codeConfirmation));
}

/*
 * Ajouter une offre dans la base de donnée
 *
 * @param PDO
 * @param String nom
 * @param String domaine
 * @param String mission
 * @param int nbetudiant
 *
 * @return void
 */
function ajoutOffre($conn, $nom, $domaine, $mission, $nbetudiant){
    $req = "INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $domaine, $mission, $nbetudiant));
}

/*
 * Ajouter une entreprise dans la base de donnée
 *
 * @param PDO
 * @param String nom
 * @param String adresse
 * @param String ville
 * @param int codePostal (5 caractères)
 * @param String num
 * @param String secteur
 * @param String email
 *
 * @return void
 */
function ajoutEntreprise($conn, $nom, $adresse, $ville, $codePostal, $num, $secteur, $email){
    $req = "INSERT INTO Entreprise VALUES (DEFAULT, :nom, NULL, :adresse, :ville, :codePostal, :num, :secteur,:email)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $adresse, $ville, $codePostal, $num, $secteur, $email));
}

/*
 * Changer le mot de passe d'un étudiant dans la base de donnée
 *
 * @param PDO
 * @param String mdp
 * @param String email
 *
 * @return void
 */
function reinitialiserMDP($conn, $mdp, $email){
    $req = "UPDATE Etudiant SET motDePasse = ? WHERE email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($mdp, $email));
}

/*
 * Récuperer de la base de donnée, les email, mot de passes et roles de toutes les personnes de l'administration
 *
 * @param PDO conn
 *
 * @return array $result
 */
function selectEmailMDPRoleAdmin($conn){
    $req = "SELECT email, motdepasse, role FROM Administration";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * Récuperer de la base de donnée, les email et mot de passes de toutes les personnes de l'administration
 *
 * @param PDO conn
 *
 * @return array $result
 */
function selectEmailMDPAdmin($conn){
    $req = "SELECT email, motdepasse FROM Administration";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * Récuperer de la base de donnée, les email et mot de passes de tous les étudiants
 *
 * @param PDO conn
 *
 * @return array $result
 */
function selectEmailMDPEtu($conn){
    $req = "SELECT email, motdepasse FROM Etudiant";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * Récuperer de la base de donnée, les étudiants qui ont cette adresse email
 *
 * @param PDO conn
 * @param String email
 *
 * @return array $result
 */
function selectEtuWhereEmail($conn, $email){
    $req = "SELECT * FROM Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * Récuperer de la base de donnée, les offres qui ont ce nom
 *
 * @param PDO conn
 * @param String nom
 *
 * @return array $result
 */
function selectOffreWhereNom($conn, $nom){
    $req = "SELECT * FROM Offre WHERE nom = :nom";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * Récuperer de la base de donnée, le code de confirmation de l'étudiant qui a cette adresse email
 *
 * @param PDO conn
 * @param String email
 *
 * @return array $result
 */
function selectCodeEtuWhereEmail($conn, $email){
    $req = "SELECT CodeConfirmation from Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * Récuperer de la base de donnée, les étudiants qui ont ce nom
 *
 * @param PDO conn
 * @param String nom
 *
 * @return array $result
 */
function selectEtuWhereNom($conn, $nom){
    $req = "SELECT * FROM Etudiant WHERE 1=1 AND nom ILIKE :nom";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * Récuperer de la base de donnée, les étudiants qui ont ce prenom
 *
 * @param PDO conn
 * @param String prenom
 *
 * @return array $result
 */
function selectEtuWherePrenom($conn, $prenom){
    $req = "SELECT * FROM Etudiant WHERE 1=1 AND prenom ILIKE :prenom";
    $req2 = $conn->prepare($req);
    $req2->execute(array($prenom));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * Récuperer de la base de donnée, les étudiants qui ont cet ine
 *
 * @param PDO conn
 * @param String ine
 *
 * @return array $result
 */
function selectEtuWhereINE($conn, $ine){
    $req = "SELECT * FROM Etudiant WHERE 1=1 AND ine ILIKE :ine";
    $req2 = $conn->prepare($req);
    $req2->execute(array($ine));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/*
 * Définir dans la base de donnée, le statut actif de l'étudiant ayant cet id
 *
 * @param PDO conn
 * @param String id
 *
 * @return void
 */
function updateActif($conn, $id){
    $req = "UPDATE etudiant SET actif = TRUE WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
}

/*
 * Définir dans la base de donnée, le statut inactif de l'étudiant ayant cet id
 *
 * @param PDO conn
 * @param String id
 *
 * @return void
 */
function updateInactif($conn, $id){
    $req = "UPDATE etudiant SET actif = FALSE WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
}