<?php

/**
 * Rechercher des étudiants
 *
 * @param PDO $conn
 * @param String $nom
 * @param String $prenom
 * @param String $ine
 * @param String $formation
 * @param String $adresse
 * @param String $ville
 * @param String $codePostal
 * @param int $anneeEtude
 * @param String $typeEntreprise
 * @param String $typeMission
 * @param boolean $mobile
 * @param boolean $actif
 *
 * @return void
 */
function RecherEtu($conn, $nom, $prenom, $ine, $formation, $adresse, $ville, $codePostal, $anneeEtude, $typeEntreprise, $typeMission, $mobile, $actif)
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

    // Préparer et exécuter la requête
    $stmt = $conn->prepare($sql);

    if (!empty($nom)) {
        $stmt->bindValue(':nom', "%$nom%", PDO::PARAM_STR);
    }

    if (!empty($prenom)) {
        $stmt->bindValue(':prenom', "%$prenom%", PDO::PARAM_STR);
    }

    if (!empty($ine)) {
        $stmt->bindValue(':ine', "%$ine%", PDO::PARAM_STR);
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