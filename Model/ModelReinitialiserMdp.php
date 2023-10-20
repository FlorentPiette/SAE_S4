<?php

/**
 * Changer le mot de passe d'un étudiant dans la base de donnée
 *
 * @param PDO $conn
 * @param String $mdp
 * @param String $email
 *
 * @return void
 */
function reinitialiserMDP($conn, $mdp, $email): void
{
    $req = "UPDATE Etudiant SET motDePasse = ? WHERE email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($mdp, $email));
}
?>