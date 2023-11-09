<?php

/**
 * Récuperer de la base de donnée, les email et mot de passes de tous les étudiants
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 *
 * @return array $result
 */
function selectEmailMDPEtu($conn){
    $req = "SELECT email, motdepasse FROM Etudiant";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Vérifier si les identifiants correspondent à une personne de la base de donnée
 *
 * @param array $etudiants liste de tous les étudiants de la base de donnée
 * @param string $email sert à chercher cette email dans la base de donnée
 * @param string $motDePasse sert à vérifier si ce mot de passe correspond à cette email dans la base de donnée
 *
 * @return boolean true si le mot de passe et l'email sont associé à un étudiant, sinon false
 */
function authenticatedEtu($etudiants,$email,$motDePasse){
    foreach ($etudiants as $etudiant) {
        if ($etudiant['email'] === $email && password_verify($motDePasse,$etudiant['motdepasse'])) {
            return true;
        }

    }
    return false;

}