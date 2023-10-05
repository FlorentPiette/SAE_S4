<?php

$code = $_COOKIE["Code_Confirmation"];

if(isset($_POST["confirmationCode"])){
    if ($code == $_POST["code"]){
        header('Location: ../ReinitialiserMDP.php');
    } else {
        echo "mince";
    }
}