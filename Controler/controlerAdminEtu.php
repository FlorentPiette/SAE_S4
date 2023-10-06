<?php

    session_start();

if(isset($_POST['accueil'])){

    header('Location: ../adminMain.html');

}elseif (isset($_POST['etudiant'])){

    header('Location: ../AdminEtu.php');

}elseif (isset($_POST['entreprise'])){

    header('Location: ../AdminEntreprise.php');

}elseif (isset($_POST['administration'])){

    header('Location: ../AdminAdministration.php');

}





?>