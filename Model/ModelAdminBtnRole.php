<?php

/**
 * Récupérer les données d'un rôle au format json
 *
 * @param String $role sert à selectionner le rôle pour lequel on veut les données
 *
 * @return false|string $roles_json
 */
function getAdminDataByRoleAndReturnJSON(String $role) : false|string
{
    try {
        $conn = Conn::getInstance();

        if ($role === 'tous') { // Vérifie s'il s'agit d'une demande pour "Tous"
            $sql = "SELECT nom, prenom, formation, role, email FROM administration";
            $stmt = $conn->query($sql);
        } else { // Sinon, récupère les données des rôles en fonction du rôle spécifié
            $sql = "SELECT nom, prenom, formation, role, email FROM administration WHERE role = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$role]);
        }

        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Convertis les données en JSON
        $roles_json = json_encode($roles);

        // Indique que la réponse est du JSON
        header('Content-Type: application/json');

        // Renvoie les données JSON
        return $roles_json;

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    return false;
}
