<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
function semaineinsert($conn){
    $req = "insert into notification ( idetudiant, date) select idetudiant, current_timestamp from postule where current_timestamp >= postule.date + integer '7' except select idetudiant,current_timestamp from notification;";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $req2->fetchAll(PDO::FETCH_ASSOC);
    return $req2;
}
function sdf($conn){
    $req = "insert into notification ( idetudiant, date) select idetudiant, current_timestamp from etudiant except select idetudiant,current_timestamp from postule except select  idetudiant,current_timestamp from notification;";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $req2->fetchAll(PDO::FETCH_ASSOC);
    return $req2;
}

function notif($conn){
    $req = 'SELECT etudiant.nom as em,etudiant.prenom as ep ,offre.nom as om, entreprise.nom, idetudiant, idoffre, lu, idnotif, rappel  From notification  JOIN etudiant using (idetudiant)  left join postule using(idetudiant) left join poste using (idoffre) left join entreprise using (identreprise) left join offre using (idoffre);';
    $req2 = $conn->prepare($req);
    $req2->execute();
    $res = $req2->fetchall(PDO::FETCH_ASSOC);
    return $res;
}

function nbnotif($conn){
    $req = "select  count(*) as nb from notification where lu = false ;";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $result = $req2->fetch(PDO::FETCH_ASSOC);


    return $result['nb'];
}

function semaine($conn, $idnotif, $idetudiant, $lu, $rappel)
{
    $req = "UPDATE notification SET lu = ?, rappel = ? WHERE idnotif = ? AND idetudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($lu,$rappel,$idnotif, $idetudiant ));
}
?>