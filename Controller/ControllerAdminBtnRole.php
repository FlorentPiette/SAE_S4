<?php
// Inclure les fichiers de configuration et de modèle nécessaires
include '../Model/ConnexionBDD.php';
include '../Model/ModelAdminBtnRole.php';

if (isset($_POST['role'])) {
    $role = $_POST['role'];
} else {
    echo "Aucun rôle spécifique n'a été spécifié.";
    exit;
}

// Utilisez la fonction pour récupérer les données en fonction du rôle
$rolesData = getAdminDataByRoleAndReturnJSON($role);






// Débogage : Affichez les données pour vérifier si elles sont correctes


// Renvoyez les données au format JSON
echo $rolesData;

if (isset($_POST['action']) && $_POST['action'] === 'getCountTous') {
    // Code pour obtenir le nombre de comptes (assurez-vous d'avoir votre connexion à la base de données)
    countTous();
}

?>