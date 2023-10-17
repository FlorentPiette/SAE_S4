<?php

include 'ConnexionBDD.php';
include '../Model/Requetes.php';

$db = conn('localhost', 'td', 'emeline', 'root');

//Quand on selectionne un profil étudiant, on arrive sur la page du profil avec la checkbox en bas
//On recupère l'ID de l'étudiant et on ne peux changer le status qu'en modifiant le profil

if(isset($_POST["setInactif"])){
    $id = 1;
    if (isset($_POST['inactif'])){
        updateInactif($db, $id);
    }
    else{
        updateActif($db, $id);
    }
}
?>