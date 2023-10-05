<?php


if (isset($_POST['btnAjoutEtu'])){

    header('Location: ../AjoutEtudiant.php');

}

if(isset($_POST['btnAjoutEntreprise'])){

    header('Location: ../AjoutEntreprise.php');

}

if(isset($_POST['btnAjoutOffre'])){

    header('Location: ../ControllerAjouttOffre.php');

}

if(isset($_POST['btnVoirOffre'])){

    header('Location: ../AjoutOffre.php');

}


?>

