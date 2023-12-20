<?php

/**
 * Rechercher des étudiants
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à rechercher les étudiants ayant ce nom
 * @param String $prenom sert à rechercher les étudiants ayant ce prénom
 * @param String $ine sert à rechercher les étudiants ayant cet INE
 * @param String $email sert à rechercher l'étudiant ayant cette email
 * @param String $formation sert à rechercher les étudiants inscrits dans cette formation
 * @param String $adresse sert à rechercher les étudiants habitant à cette adresse
 * @param String $ville sert à rechercher les étudiants habitant dans cette ville
 * @param String $codePostal sert à rechercher l'étudiant ayant ce code postal
 * @param int $anneeEtude sert à rechercher les étudiants inscrits dans cette année d'étude
 * @param String $typeEntreprise sert à rechercher les étudiants recherchant ce type d'entreprise
 * @param String $typeMission sert à rechercher les étudiants recherchant ce type de mission
 * @param boolean $mobile sert à rechercher les étudiants étant mobile ou non
 * @param boolean $actif sert à rechercher les étudiants étant actif ou non
 *
 * @return void
 */
function RecherEtu($conn, $userFormation, $nom, $prenom, $ine, $email, $formation, $adresse, $ville, $codePostal, $anneeEtude, $typeEntreprise, $typeMission, $mobile, $actif)
{
    $sql = "SELECT * FROM Etudiant WHERE 1=1";


    if (!empty($nom)) {
        $sql .= " AND nom ILIKE :nom";
    }

    if (!empty($prenom)) {
        $sql .= " AND prenom ILIKE :prenom";
    }

    if (!empty($ine)) {
        $sql .= " AND ine ILIKE :ine";
    }

    if (!empty($email)) {
        $sql .= " AND email ILIKE :email";
    }

    if (!empty($formation)) {
        $sql .= " AND formation ILIKE :formation";
    }

    if (!empty($adresse)) {
        $sql .= " AND adresse ILIKE :adresse";
    }

    if (!empty($ville)) {
        $sql .= " AND ville ILIKE :ville";
    }

    if (!empty($codePostal)) {
        $sql .= " AND codepostal ILIKE :codePostal";
    }

    if (!empty($anneeEtude)) {
        $sql .= " AND anneeetude = :anneeEtude";
    }

    if (!empty($typeEntreprise)) {
        $sql .= " AND typeentreprise ILIKE :typeEntreprise";
    }

    if (!empty($typeMission)) {
        $sql .= " AND typemission ILIKE :typeMission";
    }

    if (!empty($mobile)) {
        $sql .= " AND mobile = :mobile";
    }

    if (!empty($actif)) {
        $sql .= " AND actif = :actif";
    }

    if (!empty($userFormation)) {
        $sql .= " ORDER BY CASE WHEN formation LIKE :userFormation THEN 0 ELSE 1 END";
    }

    // Préparer et exécuter la requête
    $stmt = $conn->prepare($sql);

    if (!empty($userFormation)) {
        $stmt->bindValue(':userFormation', "%$userFormation%", PDO::PARAM_STR);
    }

    if (!empty($nom)) {
        $stmt->bindValue(':nom', "%$nom%", PDO::PARAM_STR);
    }

    if (!empty($prenom)) {
        $stmt->bindValue(':prenom', "%$prenom%", PDO::PARAM_STR);
    }

    if (!empty($ine)) {
        $stmt->bindValue(':ine', "%$ine%", PDO::PARAM_STR);
    }

    if (!empty($email)) {
        $stmt->bindValue(':email', "%$email%", PDO::PARAM_STR);
    }

    if (!empty($formation)) {
        $stmt->bindValue(':formation', "%$formation%", PDO::PARAM_STR);
    }

    if (!empty($adresse)) {
        $stmt->bindValue(':adresse', "%$adresse%", PDO::PARAM_STR);
    }

    if (!empty($ville)) {
        $stmt->bindValue(':ville', "%$ville%", PDO::PARAM_STR);
    }

    if (!empty($codePostal)) {
        $stmt->bindValue(':codePostal', "%$codePostal%", PDO::PARAM_STR);
    }

    if (!empty($anneeEtude)) {
        $stmt->bindValue(':anneeEtude', $anneeEtude, PDO::PARAM_INT);
    }

    if (!empty($typeEntreprise)) {
        $stmt->bindValue(':typeEntreprise', "%$typeEntreprise%", PDO::PARAM_STR);
    }

    if (!empty($typeMission)) {
        $stmt->bindValue(':typeMission', "%$typeMission%", PDO::PARAM_STR);
    }

    if (!empty($mobile)) {
        $stmt->bindValue(':mobile', $mobile, PDO::PARAM_BOOL);
    }

    if (!empty($actif)) {
        $stmt->bindValue(':actif', $actif, PDO::PARAM_BOOL);
    }

    if ($stmt->execute()) {
        // Récupérer les résultats
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Renvoyer les résultats au format JSON
        header('Content-Type: application/json');
        echo json_encode($resultats);
    } else {
        // En cas d'erreur d'exécution de la requête, renvoyer un JSON vide
        header('Content-Type: application/json');
        echo json_encode([]);
    }
}