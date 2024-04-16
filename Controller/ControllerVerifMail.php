<?php

include '../Model/ConnexionBDD.php';
include '../Model/ModelVerifMail.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = Conn::getInstance();

$mail = $_COOKIE["Mail_Etudiant"];
$verif = selectCodeEtuWhereEmail($conn,$mail);

if(isset($_POST["verification"])){
    if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])){
    if (implode($verif)==$_POST["verification"]){
        echo 'yess';
    } else {
        echo "mince";
    }}
}