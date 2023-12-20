<?php

function semaine($conn){
    $req = "insert into notfication ( idetudiant, date) select idetudiant, current_timestamp from postule where current_timestamp >= postule.date + integer '7';";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $req2->fetchAll(PDO::FETCH_ASSOC);
    return $req2;
}

function notif($conn){
    $req = 'SELECT etudiant.nom as em,etudiant.prenom as ep ,offre.nom as om, entreprise.nom, idetudiant, idoffre, lu, idnotif  From notification  JOIN etudiant using (idetudiant)  left join postule using(idetudiant) left join poste using (idoffre) left join entreprise using (identreprise) left join offre using (idoffre);';
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
?>