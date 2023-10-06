<?php


    if(isset($_POST['choixEtudiant'])){

        header('Location: ../etu/mainEtu.php');

    }

    if(isset($_POST['choixAdmin'])){

        header('Location: ../admin/mainAdmin.php');

    }

?>
