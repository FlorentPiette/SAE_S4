<?php

/**
 * Modifier dans la base de donnée les informations de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $nom sert à modifier le nom de l'étudiant
 * @param String $prenom sert à modifier le prénom de l'étudiant
 * @param String $adresse sert à modifier l'adresse de l'étudiant
 * @param String $ville sert à modifier la ville de l'étudiant
 * @param int $codePostal (5 caractères) sert à modifier le code postal de l'étudiant
 * @param int $anneeEtude (1 caractère) sert à modifier l'année d'étude de l'étudiant
 * @param String $formation sert à modifier la formation de l'étudiant
 * @param String $email sert à modifier l'email de l'étudiant
 *
 * @return void
 */
function updateEtu($conn, $nom, $prenom, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $id){
    $req = "UPDATE etudiant SET nom = ?, prenom = ?, adresse = ?, ville = ?, codePostal = ?, anneeEtude = ?, formation = ?, email = ?, WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $prenom, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $id));
}

/**
 * Modifier dans la base de donnée le nom de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $nom sert à modifier le nom de l'étudiant
 *
 * @return void
 */
function updateNomEtu($conn, $nom, $id){
    $req = "UPDATE etudiant SET nom = ? WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $id));
}

/**
 * Modifier dans la base de donnée le prénom de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $prenom sert à modifier le prénom de l'étudiant
 *
 * @return void
 */
function updatePrenomEtu($conn, $prenom, $id){
    $req = "UPDATE etudiant SET prenom = ? WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($prenom, $id));
}

/**
 * Modifier dans la base de donnée l'adresse email de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $adresse sert à modifier l'adresse de l'étudiant
 *
 * @return void
 */
function updateAdresseEtu($conn, $adresse, $id){
    $req = "UPDATE etudiant SET adresse = ? WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($adresse, $id));
}

/**
 * Modifier dans la base de donnée la ville de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $ville sert à modifier la ville de l'étudiant
 *
 * @return void
 */
function updateVilleEtu($conn, $ville, $id){
    $req = "UPDATE etudiant SET ville = ? WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($ville, $id));
}

/**
 * Modifier dans la base de donnée le code postal de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param int $codePostal (5 caractères) sert à modifier le code postal de l'étudiant
 *
 * @return void
 */
function updateCpEtu($conn, $codePostal, $id){
    $req = "UPDATE etudiant SET codePostal = ? WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($codePostal, $id));
}

/**
 * Modifier dans la base de donnée l' année d'étude de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param int $anneeEtude (1 caractères) sert à modifier l'année d'étude de l'étudiant
 *
 * @return void
 */
function updateAnneeEtudeEtu($conn, $anneeEtude, $id){
    $req = "UPDATE etudiant SET anneeEtude = ? WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($anneeEtude, $id));
}

/**
 * Modifier dans la base de donnée l' année d'étude de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $formation sert à modifier la formation de l'étudiant
 *
 * @return void
 */
function updateFormationEtu($conn, $formation, $id){
    $req = "UPDATE etudiant SET formation = ? WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($formation, $id));
}

/**
 * Modifier dans la base de donnée l'adresse email de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $email sert à modifier l'adresse email de l'étudiant
 *
 * @return void
 */
function updateEmailEtu($conn, $email, $id){
    $req = "UPDATE etudiant SET email = ? WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email, $id));
}

/**
 * Modifier dans la base de donnée le type d'entreprises que l'étudiant ayant cet id recherche
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $typeentreprise sert à modifier le type d'entreprise que l'étudiant recherche
 *
 * @return void
 */
function updateTypeEntrepriseEtu($conn, $typeentreprise, $id){
    $req = "UPDATE etudiant SET typeentreprise = ? WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($typeentreprise, $id));
}

/**
 * Modifier dans la base de donnée le type de missions que l'étudiant ayant cet id recherche
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $typemission sert à modifier le type de mission que l'étudiant recherche
 *
 * @return void
 */

function updateTypeMissionEtu($conn, $typemission, $id){
    $req = "UPDATE etudiant SET typemission = ? WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($typemission, $id));
}

/**
 * Récupérer tous les informations de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 *
 * @return array $result
 */
function selectEtudiant($conn, $id){
    $req = "SELECT * FROM Etudiant where idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
    $result = $req2->fetch(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Modifier dans la base de donnée, le statut mobile de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param boolean $mobile sert à modifier le status mobile de l'étudiant
 *
 * @return void
 */
function updateMobile($conn, $mobile, $id){
    if($mobile == true){
        $req = "UPDATE etudiant SET mobile = TRUE WHERE idEtudiant = ?";
    }
    else{
        $req = "UPDATE etudiant SET mobile = FALSE WHERE idEtudiant = ?";
    }
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
}

/**
 * Définir dans la base de donnée, le statut actif de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 *
 * @return void
 */
function updateActif($conn, $id){
    $req = "UPDATE etudiant SET actif = TRUE WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
}

/**
 * Définir dans la base de donnée, le statut inactif de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 *
 * @return void
 */
function updateInactif($conn, $id){
    $req = "UPDATE etudiant SET actif = FALSE WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
}