<?php

if (isset($_POST["connectionEtu"])) {

    header('Location: ../connectionEtu.html');
    exit();

}
if (isset($_POST["creationEtu"])) {
    header('Location: ../nouvcompte.html');
    exit();

}
if(isset($_POST["connectionAdmin"])){

    header('Location: ../connection.php');
    exit();
}
if(isset($_POST["btnRetour"])){

    header('Location: ../choix.php');
    exit();
}










?>