<?php
include 'ConnexionBDD.php';

$conn = Conn::getInstance();
function reinitialiserMDP($conn, $mdp, $email){
    $req = "UPDATE Etudiant SET motDePasse = ? WHERE email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($mdp, $email));
}
?>