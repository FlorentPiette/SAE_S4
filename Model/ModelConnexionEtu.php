<?php

/**
 * Récuperer de la base de donnée, les email et mot de passes de tous les étudiants
 *
 * @param PDO $conn
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
 * @param array $students
 * @param string $email
 * @param string $motDePasse
 *
 * @return boolean
 */
function authenticated ($students,$email,$motDePasse){
    foreach ($students as $student) {
        if ($student['email'] === $email && password_verify($student['motdepasse'],$motDePasse)) {
            $_SESSION['nom'] = $student['email'];
            return true;
        }
        return false;
    }

}