<?php

/**
 * Récupérer dans la base de donnée, le token de l'étudiant ayant cet adresse email
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $email sert à rechercher l'étudiant ayant cet email
 *
 * @return $result
 */
function recuptoken($conn,$email){
    $req = "SELECT codemail FROM Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetch(PDO::FETCH_ASSOC);

    return $result;
}


/**
 * Modifier dans la base de donnée, le mot de passe de l'étudiant ayant ce token
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $token sert à rechercher l'étudiant ayant ce token
 * @param String $token sert à modifier le mot de passe de l'étudiant
 *
 * @return void
 */
function mdpEtu($conn,$token,$mdp)
{
    $req = "UPDATE etudiant SET motdepasse = ? WHERE codemail = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($mdp,$token));

}


/**
 * Supprimer de la base de donnée, l'étudiant ayant cette adresse email
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $email sert à rechercher l'étudiant ayant cette adresse email
 *
 * @return void
 */
function suppEtu($conn,$email)
{
    $req = "DELETE FROM etudiant WHERE email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
}
?>