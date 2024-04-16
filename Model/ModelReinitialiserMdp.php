<?php

/**
 * Changer le mot de passe d'un étudiant dans la base de donnée
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $mdp sert à modifier le mot de passe de l'étudiant
 * @param String $email sert à rechercher l'étudiant ayant cette adresse email
 *
 * @return void
 */

 
function reinitialiserMDP($conn, $mdp, $email): void
{
    $req = "UPDATE Etudiant SET motDePasse = ? WHERE email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($mdp, $email));
}

function getcode(PDO $db, ?string $mail) : string {
    $code = (string) random_int(10000000, 99999999);
    $req = $db->prepare("UPDATE Etudiant SET codemail = :code WHERE email = :mail");
    $req->execute(array(':code' => $code, ':mail' => $mail));
    return $code;   
}