<?php
// Controler/ControllerAdminbtnRole.php


include '../Model/ConnexionBDD.php';
include '../Model/ModelAdminBtnRole.php';


if (isset($_POST['role'])) {
    $role = $_POST['role'];
} else {
    echo "Aucun rôle spécifique n'a été spécifié.";
    exit;
}

echo getAdminDataByRoleAndReturnJSON($role);


?>
