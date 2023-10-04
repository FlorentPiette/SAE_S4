<?php

if (isset($_POST["connectionEtu"])) {

    header('Location: ../connectionEtu.html');
    exit();

}
if (isset($_POST["creationEtu"])) {
    header('Location: ../nouvcompteEtu.html');
    exit();

}
if(isset($_POST["connectionAdmin"])){

    header('Location: ../connection.html');
    exit();
}










?>