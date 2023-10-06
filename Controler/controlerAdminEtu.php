<?php

    session_start();

if(isset($_POST['accueil'])){

    header('Location: ../admin/adminMain.html');

}elseif (isset($_POST['etudiant'])){

    header('Location: ../admin/AdminEtu.php');

}elseif (isset($_POST['entreprise'])){

    header('Location: ../admin/AdminEntreprise.php');

}elseif (isset($_POST['administration'])){

    header('Location: ../AdminAdministration.php');

}





?>