<?php


if(isset($_POST['accueil'])){

    header('Location: ../admin/adminMain.html');

}elseif (isset($_POST['etudiant'])){

    header('Location: ../admin/AdminEtu.php');

}elseif (isset($_POST['entreprise'])){

    header('Location: ../admin/AdminEntreprise.php');

}elseif (isset($_POST['adminitrsation'])){

    header('Location: ../AdminAdministration.php');

}

?>