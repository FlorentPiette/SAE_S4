<?php

/**
 * Ajouter une offre dans la base de donnée
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à définir le nom de l'offre
 * @param String $domaine sert à définir le domaine de l'offre
 * @param String $mission sert à définir les missions de l'offre
 * @param int $nbetudiant sert à définir le nombre d'étudiant voulu pour cette offre
 *
 * @return void
 */
function ajoutOffre($conn, $nom, $domaine, $mission, $nbetudiant){
    $req = "INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $domaine, $mission, $nbetudiant));

}


/**
 * Ajouter un étudiant dans la base de donnée
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à définir le nom de l'étudiant
 * @param String $prenom sert à définir le prénom de l'étudiant
 * @param date $dateDeNaissance sert à définir la date de naissance de l'étudiant
 * @param String $adresse sert à définir l'adresse de l'étudiant
 * @param String $ville sert à définir la ville de l'étudiant
 * @param int $codePostal (5 caractères) sert à définir le code postal de l'étudiant
 * @param int $anneeEtude sert à définir l'année d'étude de l'étudiant
 * @param String $formation sert à définir la formation de l'étudiant
 * @param String $email sert à définir l'email de l'étudiant
 * @param String $motDePasse sert à définir le mot de passe de l'étudiant
 * @param String $iNE sert à définir l'INE de l'étudiant
 * @param String $entreprise sert à définir le type d'entreprise que l'étudiant recherche
 * @param String $mission sert à définir le type de mission que l'étudiant recherche
 * @param Boolean $mobile sert à définir le status mobile ou non de l'étudiant
 * @param int $codeConfirmation (8 caractères) sert à confirmer le compte de l'étudiant
 *
 * @return void
 */
function ajoutEtudiant($conn, $nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $motDePasse, $iNE, $entreprise, $mission, $mobile, $codeConfirmation){
    $req = "INSERT INTO Etudiant (IdEtudiant, Nom, Prenom, DateDeNaissance, Adresse, Ville, CodePostal, AnneeEtude, Formation, Email, MotDePasse, INE, TypeEntreprise, TypeMission, Mobile, Actif, CodeConfirmation)
            VALUES (DEFAULT, upper(:nom), :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, :email, :motDePasse, :ine, :entreprise, :mission, " . ($mobile ? 'true' : 'false') . ", True, :CodeConfirmation)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $motDePasse, $iNE, $entreprise, $mission, $codeConfirmation));
}

/**
 * Ajouter une entreprise dans la base de donnée
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à définir le nom de l'entreprise
 * @param String $adresse sert à définir l'adresse de l'entreprise
 * @param String $ville sert à définir la ville de l'entreprise
 * @param int $codePostal (5 caractères) sert à définir le code postal de l'entreprise
 * @param String $num sert à définir le numéro de téléphone de l'entreprise
 * @param String $secteur sert à définir le secteur d'activité de l'entreprise
 * @param String $email sert à définir l'adresse email de l'entreprise
 *
 * @return void
 */
function ajoutEntreprise($conn, $nom, $adresse, $ville, $codePostal, $num, $secteur, $email){
    $req = "INSERT INTO Entreprise VALUES (DEFAULT, :nom, NULL, :adresse, :ville, :codePostal, :num, :secteur,:email)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $adresse, $ville, $codePostal, $num, $secteur, $email));

}

/**
 * Ajouter un membre de l'administration à la base de donnée
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à définir le nom du membre de l'administration
 * @param String $prenom sert à définir le prénom du membre de l'administration
 * @param String $formation sert à définir la formation à laquelle le membre de l'administration est rattaché
 * @param String $email sert à définir l'adresse email du membre de l'administration
 * @param String $mdp sert à définir le mot de passe du membre de l'administration
 * @param String $role sert à définir le role du membre de l'administration
 *
 * @return array $result
 */
function ajoutAdministration($conn, $nom, $prenom, $formation, $email, $mdp, $role){
    $req = "INSERT INTO Administration VALUES (DEFAULT, :nom, :prenom, :formation, :email, :mdp, :role)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $prenom, $formation, $email, $mdp, $role));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Création du code de confirmation pour confirmer son email
 *
 * @return int $result
 */
function code()
{
    $confirmation = 0;
    for ($i = 0; $i < 7; $i++) {
        $chiffreAleatoire = mt_rand(0, 9); // Génère un chiffre aléatoire entre 0 et 9
        $confirmation .= $chiffreAleatoire; // Ajoute le chiffre à la sélection
    }
    return $confirmation ;
}

/**
 * Récuperer de la base de donnée, les étudiants qui ont cette adresse email
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $email sert à  chercher si l'email est dans la base de donnée
 *
 * @return array $result
 */
function selectEtuWhereEmail($conn, $email){
    $req = "SELECT * FROM Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
?>


