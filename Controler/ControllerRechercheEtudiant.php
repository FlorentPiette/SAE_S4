<?php
include 'ConnexionBDD.php';

$db = conn('iutinfo-sgbd.uphf.fr', 'iutinfo244','iutinfo244','Gy6pdK1g');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$ine = $_POST['ine'];
if (isset($_POST['validation'])){
    // Requete en fonction de la recherche
    if ($ine != null ){
        $data = $db->prepare("select * from Etudiant   where IdEtudiant  = '%$ine%'" );
    }
    elseif ( $nom == null and $prenom != null){
        $data = $db->prepare("select * from Etudiant   where prenom like LOWER('%$prenom%')" );
    } elseif ( $nom != null and $prenom == null){
        $data = $db->prepare("select * from Etudiant   where nom like UPPER('%$nom%')" );
    }
    else{
        $data = $db->prepare("select * from Etudiant   where nom like UPPER('%$nom%') or prenom like LOWER('%$prenom%')" );
    }
    //Execution de la requete
    $data->execute();
    $row = $data->fetchall(PDO::FETCH_ASSOC);
    $data->execute();
    $row = $data->fetchall(PDO::FETCH_ASSOC);
    if ($row == null ){
        echo "Il n’y a pas d’étudiants correspondants.";
    } else {
        foreach ($row as $item) {
            echo implode("\r\n", $item) . '<br/>';
        }
    }
}
?>