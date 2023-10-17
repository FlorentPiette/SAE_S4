<?php


if (isset($_POST['btnAjoutEtu'])){

    header('Location: ../AjoutEtudiant.php');

}

if(isset($_POST['btnAjoutEntreprise'])){

    header('Location: ../AjoutEntreprise.php');

}

if(isset($_POST['btnAjoutOffre'])){

    header('Location: ../DemandeAjoutOffre.php');

}

if(isset($_POST['btnVoirOffre'])){

    header('Location: ../AjoutOffre.php');

}

if(isset($_POST['btnAjoutAdministration'])){

    header('Location: ../AjoutAdministration.php');

}

if(isset($_POST['BtnRechercherEtu'])){

    header('Location: ../RechercheEtudiant.php');

}


?>

