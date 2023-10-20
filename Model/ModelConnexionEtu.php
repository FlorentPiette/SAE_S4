<?php

function selectEmailMDPEtu($conn,$email){
    $req = "SELECT email, motdepasse FROM Etudiant";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function authenticated ($students,$email,$motDePasse){
    foreach ($students as $student) {
        if ($student['email'] === $email && password_verify($student['motdepasse'],$motDePasse)) {
            $_SESSION['nom'] = $student['email'];
            return true;
        }
        return false;
    }

}