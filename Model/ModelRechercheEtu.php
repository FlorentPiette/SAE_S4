<?php
function RecherEtu($conn,$nom,$prenom,$ine,$formation,$adresse,$ville,$codepostal,$anneeetude,$typeentreprise,$typedemission,$mobile,$actif)
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

    if (!empty($codepostal)) {
        $sql .= " AND codepostal ILIKE :codepostal";
    }

    if (!empty($anneeetude)) {
        $sql .= " AND anneeetude ILIKE :anneeetude";
    }

    if (!empty($typeentreprise)) {
        $sql .= " AND typeentreprise ILIKE :typeentreprise";
    }

    if (!empty($typedemission)) {
        $sql .= " AND typedemission ILIKE :typedemission";
    }

    if (!empty($mobile)) {
        $sql .= " AND mobile ILIKE :mobile";
    }

    if (!empty($actif)) {
        $sql .= " AND actif ILIKE :actif";
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

    if (!empty($codepostal)) {
        $stmt->bindValue(':codepostal', "%codepostal%", PDO::PARAM_STR);
    }

    if (!empty($anneeetude)) {
        $stmt->bindValue(':anneeetude', "%$anneeetude%", PDO::PARAM_STR);
    }

    if (!empty($typeentreprise)) {
        $stmt->bindValue(':typeentreprise', "%$typeentreprise%", PDO::PARAM_STR);
    }

    if (!empty($typedemission)) {
        $stmt->bindValue(':typedemission', "%$typedemission%", PDO::PARAM_STR);
    }

    if (!empty($mobile)) {
        $stmt->bindValue(':mobile', "%$mobile%", PDO::PARAM_STR);
    }

    if (!empty($actif)) {
        $stmt->bindValue(':actif', "%$actif%", PDO::PARAM_STR);
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
?>