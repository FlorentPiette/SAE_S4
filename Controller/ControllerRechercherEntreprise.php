<?php
include '../Model/ConnexionBDD.php';
include '../Model/ModelFiltres.php';

$conn = Conn::getInstance();

$nom = $_GET['nom'] ?? '';
$ville = $_GET['ville'] ?? '';
$codepostal = $_GET['codepostal'] ?? '';
$secteurActivite = $_GET['secteurActivite'] ?? '';

FiltrerEntreprises($conn,$nom,$ville,$codepostal,$secteurActivite);

