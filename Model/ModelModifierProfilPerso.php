<?php

/**
 * Modifier dans la base de donnée les informations de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param string $nom sert à rechercher l'étudiant ayant cet id
 * @param String $prenom sert à modifier le nom de l'étudiant
 * @param String $formation sert à modifier le prénom de l'étudiant
 * @param String $email sert à modifier l'adresse de l'étudiant
 * @param String $motdepasse sert à modifier la ville de l'étudiant
 * @param int $role (5 caractères) sert à modifier le code postal de l'étudiant
 *
 * @return void
 */
function updatePerso($conn, $nom, $prenom, $formation, $email, $role, $id){
    $nom=htmlentities($nom);
    $prenom=htmlentities($prenom);
    $formation=htmlentities($formation);
    $role=htmlentities($role);
    if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $req = "UPDATE Administration SET nom = ?, prenom = ?, formation = ?, email = ?, role = ? WHERE idprofil = ?";
        $req2 = $conn->prepare($req);
        $req2->execute(array($nom, $prenom, $formation, $email, $role, $id));
    }
}

/**
 * Modifier dans la base de donnée le nom de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $id sert à rechercher l'étudiant ayant cet id
 * @param String $nom sert à modifier le nom de l'étudiant
 *
 * @return void
 */
function updateNomPerso($conn, $nom, $id){
    $nom=htmlentities($nom);
    $req = "UPDATE Administration SET nom = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $id));
}

/**
 * Modifier dans la base de donnée le prénom de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $prenom sert à modifier le prénom de l'étudiant
 *
 * @return void
 */
function updatePrenomPerso($conn, $prenom, $id){
    $prenom=htmlentities($prenom);
    $req = "UPDATE Administration SET prenom = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($prenom, $id));
}

/**
 * Modifier dans la base de donnée l'adresse email de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $formation sert à modifier l'adresse de l'étudiant
 *
 * @return void
 */
function updateFormationPerso($conn, $formation, $id){
    $formation=htmlentities($formation);
    $req = "UPDATE Administration SET formation = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($formation, $id));
}

/**
 * Modifier dans la base de donnée la ville de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param String $email sert à modifier la ville de l'étudiant
 *
 * @return void
 */
function updateEmailPerso($conn, $email, $id){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $req = "UPDATE Administration SET email = ? WHERE ine = ?";
        $req2 = $conn->prepare($req);
        $req2->execute(array($email, $id));
    }
}

/**
 * Modifier dans la base de donnée le code postal de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param int $motdepasse (5 caractères) sert à modifier le code postal de l'étudiant
 *
 * @return void
 */
function updateMpPerso($conn, $motdepasse, $id){

    $req = "UPDATE Administration SET motdepasse = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($motdepasse, $id));
}

/**
 * Modifier dans la base de donnée l' année d'étude de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 * @param int $role (1 caractères) sert à modifier l'année d'étude de l'étudiant
 *
 * @return void
 */
function updateRolePerso($conn, $role, $id){
    $role=htmlentities($role);
    $req = "UPDATE Administration SET role = ? WHERE ine = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($role, $id));
}

/**
 * Récupérer tous les informations de l'étudiant ayant cet id
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param int $id sert à rechercher l'étudiant ayant cet id
 *
 * @return array $result
 */


function selectPersoId($conn, $id){
    $req = "SELECT * FROM Administration where idprofil = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($id));
    $result = $req2->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function selectId($conn, $email){
    $req = "SELECT idprofil FROM Administration where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetch(PDO::FETCH_ASSOC);
    return (int) $result['idprofil'];
}