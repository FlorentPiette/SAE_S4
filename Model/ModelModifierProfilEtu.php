<?php

/**
 * Modifier dans la base de donnée les informations de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à modifier le nom de l'étudiant
 * @param String $prenom sert à modifier le prénom de l'étudiant
 * @param String $adresse sert à modifier l'adresse de l'étudiant
 * @param String $ville sert à modifier la ville de l'étudiant
 * @param int $codePostal (5 caractères) sert à modifier le code postal de l'étudiant
 * @param int $anneeEtude (1 caractère) sert à modifier l'année d'étude de l'étudiant
 * @param String $formation sert à modifier la formation de l'étudiant
 * @param String $email sert à modifier l'email de l'étudiant
 * @param string $ine sert à rechercher l'étudiant ayant cet ine
 *
 * @return void
 */
function updateEtu($conn, $nom, $prenom, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $id){
    $req = "UPDATE etudiant SET nom = ?, prenom = ?, adresse = ?, ville = ?, codePostal = ?, anneeEtude = ?, formation = ?, email = ?, WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $prenom, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $id));
}

/**
 * Modifier dans la base de donnée le nom de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à modifier le nom de l'étudiant
 * @param String $ine sert à rechercher l'étudiant ayant cet ine
 *
 * @return void
 */
function updateNomEtu($conn, $nom, $ine){
    $req = "UPDATE etudiant SET nom = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $ine));
}

/**
 * Modifier dans la base de donnée le prénom de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 * @param String $prenom sert à modifier le prénom de l'étudiant
 *
 * @return void
 */
function updatePrenomEtu($conn, $prenom, $ine){
    $req = "UPDATE etudiant SET prenom = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($prenom, $ine));
}

/**
 * Modifier dans la base de donnée l'adresse de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 * @param String $adresse sert à modifier l'adresse de l'étudiant
 *
 * @return void
 */
function updateAdresseEtu($conn, $adresse, $ine){
    $req = "UPDATE etudiant SET adresse = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($adresse, $ine));
}

/**
 * Modifier dans la base de donnée la ville de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 * @param String $ville sert à modifier la ville de l'étudiant
 *
 * @return void
 */
function updateVilleEtu($conn, $ville, $ine){
    $req = "UPDATE etudiant SET ville = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($ville, $ine));
}

/**
 * Modifier dans la base de donnée le code postal de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 * @param int $codePostal (5 caractères) sert à modifier le code postal de l'étudiant
 *
 * @return void
 */
function updateCpEtu($conn, $codePostal, $ine){
    $req = "UPDATE etudiant SET codePostal = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($codePostal, $ine));
}

/**
 * Modifier dans la base de donnée l'année d'étude de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 * @param int $anneeEtude (1 caractère) sert à modifier l'année d'étude de l'étudiant
 *
 * @return void
 */
function updateAnneeEtudeEtu($conn, $anneeEtude, $ine){
    $req = "UPDATE etudiant SET anneeEtude = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($anneeEtude, $ine));
}

/**
 * Modifier dans la base de donnée la formation de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 * @param String $formation sert à modifier la formation de l'étudiant
 *
 * @return void
 */
function updateFormationEtu($conn, $formation, $ine){
    $req = "UPDATE etudiant SET formation = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($formation, $ine));
}

/**
 * Modifier dans la base de donnée l'adresse email de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 * @param String $email sert à modifier l'adresse email de l'étudiant
 *
 * @return void
 */
function updateEmailEtu($conn, $email, $ine){
    $req = "UPDATE etudiant SET email = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email, $ine));
}

/**
 * Modifier dans la base de donnée le type d'entreprises que l'étudiant ayant cet ine recherche
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 * @param String $typeentreprise sert à modifier le type d'entreprise que l'étudiant recherche
 *
 * @return void
 */
function updateTypeEntrepriseEtu($conn, $typeentreprise, $ine){
    $req = "UPDATE etudiant SET typeentreprise = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($typeentreprise, $ine));
}

/**
 * Modifier dans la base de donnée le type de missions que l'étudiant ayant cet ine recherche
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 * @param String $typemission sert à modifier le type de mission que l'étudiant recherche
 *
 * @return void
 */
function updateTypeMissionEtu($conn, $typemission, $ine){
    $req = "UPDATE etudiant SET typemission = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($typemission, $ine));
}

/**
 * Récupérer toutes les informations de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 *
 * @return array $result
 */
function selectEtudiant($conn, $ine){
    $req = "SELECT * FROM Etudiant where ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($ine));
    $result = $req2->fetch(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Modifier dans la base de donnée, le statut mobile de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 * @param int $mobile sert à modifier le status mobile de l'étudiant
 *
 * @return void
 */
function updateMobile($conn, $mobile, $ine){
    $req = "UPDATE etudiant SET mobile = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($mobile, $ine));
}

/**
 * Définir dans la base de donnée, le statut actif de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 *
 * @return void
 */
function updateActif($conn, $ine){
    $req = "UPDATE etudiant SET actif = TRUE WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($ine));
}

/**
 * Définir dans la base de donnée, le statut inactif de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 *
 * @return void
 */
function updateInactif($conn, $ine){
    $req = "UPDATE etudiant SET actif = FALSE WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($ine));
}

/**
 * Selectionner les informations de l'étudiant ayant cet ine
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $ine sert à rechercher l'étudiant ayant cet ine
 *
 * @return void
 */
function selectEtudiantIne($conn, $ine){
    $req = "SELECT * FROM Etudiant where ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($ine));
    $result = $req2->fetch(PDO::FETCH_ASSOC);
    return $result;
}