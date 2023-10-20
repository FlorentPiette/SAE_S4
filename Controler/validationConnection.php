<?php

if (isset($_POST["connectionEtu"])) {

    header('Location: ../ViewEtudiant.html');
    exit();

}
if (isset($_POST["creationEtu"])) {
    header('Location: ../ViewNouvCompteAdmin.html');
    exit();

}
if(isset($_POST["connectionAdmin"])){

    header('Location: ../ViewConnexionAdmin.php');
    exit();
}
if(isset($_POST["btnRetour"])){

    header('Location: ../choix.php');
    exit();
}










?>