<?php


if(isset($_POST['accueil'])){

    header('Location: ../CdMain.php');

}elseif (isset($_POST['etudiant'])){

    header('Location: ../CdEtu.php');

}elseif (isset($_POST['entreprise'])) {

    header('Location: ../CdEntreprise.php');

}



?>