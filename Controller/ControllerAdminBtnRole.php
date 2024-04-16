<?php
// Controler/ControllerAdminbtnRole.php


include '../Model/ConnexionBDD.php';
include '../Model/ModelAdminBtnRole.php';


if (isset($_POST['role'])) {
    if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])){
        $role = $_POST['role'];
}   else {
        echo "Aucun rôle spécifique n'a été spécifié.";
        exit;
}}

echo getAdminDataByRoleAndReturnJSON($role);


?>
