<?php

    if(isset($_POST['choixEtudiant'])){

        header('Location: ../mainEtu.php');

    }

    if(isset($_POST['choixAdmin'])){

        header('Location: ../mainAdmin.php');

    }

?>
