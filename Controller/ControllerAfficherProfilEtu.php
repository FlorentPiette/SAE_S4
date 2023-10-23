<?php
include '../Model/ConnexionBDD.php';
include '../Model/ModelModifierProfilEtu.php';

$conn = Conn::getInstance();

$id = 1;

$etu = selectEtudiant($conn, $id);

include ("../View/ViewModifierProfilEtu.php");