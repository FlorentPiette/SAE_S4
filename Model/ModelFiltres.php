<?php

/**
 * Filtrer les offres
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à rechercher les offres ayant ce nom
 * @param String $domaine sert à rechercher les offres ayant ce domaine
 * @param String $mission sert à rechercher les offres ayant ces missions
 * @param int $nbetudiant sert à rechercher les offres ayant ce nombre d'étudiants
 *
 * @return void
 */



function FiltrerOffres($conn, $nom, $domaine, $mission, $nbetudiant)
{
    $sql = "SELECT * FROM Offre WHERE 1=1";

    if (!empty($nom)) {
        $sql .= " AND nom ILIKE :nom";
    }

    if (!empty($domaine)) {
        $sql .= " AND domaine ILIKE :domaine";
    }

    if (!empty($mission)) {
        $sql .= " AND mission ILIKE :mission";
    }

    if (!empty($nbetudiant)) {
        $sql .= " AND nbetudiant = :nbetudiant";
    }

    $req = $conn->prepare($sql);

    if (!empty($nom)) {
        $req->bindValue(':nom', "%$nom%", PDO::PARAM_STR);
    }

    if (!empty($domaine)) {
        $req->bindValue(':domaine', "%$domaine%", PDO::PARAM_STR);
    }

    if (!empty($mission)) {
        $req->bindValue(':mission', "%$mission%", PDO::PARAM_STR);
    }

    if (!empty($nbetudiant)) {
        $req->bindValue(':nbetudiant', $nbetudiant, PDO::PARAM_INT);
    }

    $req->execute();
    $resultats = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultats as &$offre) {
        $sqlEtudiants = "SELECT nom, prenom FROM postule join Etudiant using(idetudiant) WHERE idoffre = :idOffre";
        $reqEtudiants = $conn->prepare($sqlEtudiants);
        $reqEtudiants->bindParam(':idOffre', $offre['idoffre'], PDO::PARAM_INT);
        $reqEtudiants->execute();
        $etudiants = $reqEtudiants->fetchAll(PDO::FETCH_ASSOC);
        $offre['offreEtudiants'] = $etudiants;
    }

    header('Content-Type: application/json');
    echo json_encode($resultats);
}


/**
 * Filtrer les entreprises
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à rechercher les entreprises ayant ce nom
 * @param String $ville sert à rechercher les entreprises situées dans cette ville
 * @param int $codepostal (5 caractères) sert à rechercher les entreprises ayant ce code postal
 * @param String $secteurActivite sert à rechercher les entreprises ayant ce secteur d'activité
 *
 * @return void
 */
function FiltrerEntreprises($conn, $nom, $ville, $codepostal, $secteurActivite)
{
    $sql = "SELECT * FROM Entreprise WHERE 1=1";

    if (!empty($nom)) {
        $sql .= " AND nom ILIKE :nom";
    }

    if (!empty($ville)) {
        $sql .= " AND ville ILIKE :ville";
    }

    if (!empty($codepostal)) {
        $sql .= " AND codepostal ILIKE :codepostal";
    }

    if (!empty($secteurActivite)) {
        $sql .= " AND secteurActivite ILIKE :secteurActivite";
    }

    $req = $conn->prepare($sql);

    if (!empty($nom)) {
        $req->bindValue(':nom', "%$nom%", PDO::PARAM_STR);
    }

    if (!empty($ville)) {
        $req->bindValue(':ville', "%$ville%", PDO::PARAM_STR);
    }

    if (!empty($codepostal)) {
        $req->bindValue(':codepostal', "%$codepostal%", PDO::PARAM_STR);
    }

    if (!empty($secteurActivite)) {
        $req->bindValue(':secteurActivite', "%$secteurActivite%", PDO::PARAM_STR);
    }

    if ($req->execute()) {
        // Récupérer les résultats
        $resultats = $req->fetchAll(PDO::FETCH_ASSOC);

        // Renvoyer les résultats au format JSON
        header('Content-Type: application/json');
        echo json_encode($resultats);
    } else {
        // En cas d'erreur d'exécution de la requête, renvoyer un JSON vide
        header('Content-Type: application/json');
        echo json_encode([]);
    }
}