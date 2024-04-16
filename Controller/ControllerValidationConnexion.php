<?php
if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])){
if (isset($_POST["connectionEtu"])) {

    header('Location: ../View/ViewConnexion.php');
    exit();

}
if (isset($_POST["creationEtu"])) {
    header('Location: ../View/ViewNouvCompteAdmin.php');
    exit();

}
if(isset($_POST["connectionAdmin"])){

    header('Location: ../View/ViewConnexionAdmin.php');
    exit();
}
if(isset($_POST["btnRetour"])){

    header('Location: ../Choix.php');
    exit();
}}

