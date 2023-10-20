<?php

include 'ConnexionBDD.php';
include '../Model/ModelVerifMail.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = Conn::getInstance();

$mail = $_COOKIE["Mail_Etudiant"];
$verif = selectCodeEtuWhereEmail($conn);

if(isset($_POST["verification"])){
    if (implode($verif)==$_POST["verification"]){
        echo 'yess';
    } else {
        echo "mince";
    }
}

?>