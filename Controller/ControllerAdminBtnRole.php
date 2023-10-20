<?php
// Controler/ControllerAdminbtnRole.php


include '../Model/ConnexionBDD.php';
include '../Model/ModelAdminBtnRole.php';


if (isset($_POST['role'])) {
    $role = $_POST['role'];
} else {
    // Si aucun rôle spécifique n'est demandé, renvoyez une erreur ou une réponse vide
    echo "Aucun rôle spécifique n'a été spécifié.";
    exit;
}

echo getAdminDataByRoleAndReturnJSON($role);


?>
