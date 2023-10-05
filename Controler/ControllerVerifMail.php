<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../ConnexionBDD.php';

$db = conn('iutinfo-sgbd.uphf.fr', 'iutinfo244','iutinfo244','Gy6pdK1g');

$mail = $_COOKIE["Mail_Etudiant"];

$verif = $db->prepare("SELECT CodeMail from Etudiant where email = ?");
$verif->execute(array($mail));
$row = $verif->fetch(PDO::FETCH_ASSOC);


if(isset($_POST["verification"])){
    if (implode($row)===$_POST["verification"]){
        echo $_POST["verification"]." ".implode($row);
        $delete = $db->prepare("UPDATE etudiant SET CodeMail = NULL where email= ?");
        $delete->execute(array($mail));
    } else {
        echo "mince";
    }
}



?>