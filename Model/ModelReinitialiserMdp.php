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

/**
 * Récuperer de la base de donnée, le code de confirmation de l'étudiant qui a cette adresse email
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $email sert à rechercher l'étudiant ayant cette adresse email
 *
 * @return array $result
 */
function selectCodeEtuWhereEmail($conn, $email){
    $req = "SELECT CodeMail from Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
?>