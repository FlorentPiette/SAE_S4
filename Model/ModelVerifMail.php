<?php

function selectCodeEtuWhereEmail($conn, $email){
    $req = "SELECT CodeConfirmation from Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $row = $req2->fetch(PDO::FETCH_ASSOC);

    return $row;
}