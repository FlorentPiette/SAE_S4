<?php

include 'ConnexionBDD.php';
$conn = Conn::getInstance();


/**
 * Définir dans la base de donnée, le statut actif de l'étudiant ayant cet id
 *
 * @param PDO $conn
 * @param String $id
 *
 * @return void
 */
function updateActif($conn, $id){
    $req = "UPDATE etudiant SET actif = TRUE WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
}

/**
 * Définir dans la base de donnée, le statut inactif de l'étudiant ayant cet id
 *
 * @param PDO $conn
 * @param String $id
 *
 * @return void
 */
function updateInactif($conn, $id){
    $req = "UPDATE etudiant SET actif = FALSE WHERE idEtudiant = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
}