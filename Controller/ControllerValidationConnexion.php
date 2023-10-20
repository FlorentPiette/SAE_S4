<?php

if (isset($_POST["connectionEtu"])) {

    header('Location: ../View/ViewEtudiant.html');
    exit();

}
if (isset($_POST["creationEtu"])) {
    header('Location: ../View/ViewNouvCompteAdmin.html');
    exit();

}
if(isset($_POST["connectionAdmin"])){

    header('Location: ../View/ViewConnexionAdmin.php');
    exit();
}
if(isset($_POST["btnRetour"])){

    header('Location: ../Choix.php');
    exit();
}










?>