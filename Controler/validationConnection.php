<?php

if (isset($_POST["connectionEtu"])) {

    header('Location: ../etu/connectionEtu.html');
    exit();

}
if (isset($_POST["creationEtu"])) {
    header('Location: ../etu/nouvcompteEtu.html');
    exit();

}
if(isset($_POST["connectionAdmin"])){

    header('Location: ../admin/connection.html');
    exit();
}










?>