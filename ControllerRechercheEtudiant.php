<?php
$host = 'iutinfo-sgbd.uphf.fr';
$dbname = 'iutinfo244';
$username = 'iutinfo244';
$password = 'Gy6pdK1g';

//connexion à la base de données
$bdd = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

try{
    $conn = new PDO($bdd);

    if($conn){
        echo "" ;
    }
}catch (PDOException $e) {
    echo $e->getMessage();
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
if (isset($_POST['validation'])){
    // Requete en fonction de la recherche
    if ( $nom == null and $prenom != null){
        $data = $conn->prepare("select * from coureur  where prenom like LOWER('%$prenom%')" );
    } elseif ( $nom != null and $prenom == null){
        $data = $conn->prepare("select * from coureur  where nom like UPPER('%$nom%')" );
    } else{
        $data = $conn->prepare("select * from coureur  where nom like UPPER('%$nom%') or prenom like LOWER('%$prenom%')" );
    }
    //Execution de la requete
    $data->execute();
    $row = $data->fetchall(PDO::FETCH_ASSOC);
    foreach ($row as $item) {
        echo implode("\r\n", $item) . '<br/>';
    }
}
?>