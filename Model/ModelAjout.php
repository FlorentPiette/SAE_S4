<?php
include 'ConnexionBDD.php';
$conn = Conn::getInstance();

/**
 * Ajouter une offre dans la base de donnée
 *
 * @param PDO $conn
 * @param String $nom
 * @param String $domaine
 * @param String $mission
 * @param int $nbetudiant
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
 * @param PDO $conn
 * @param String $nom
 * @param String $prenom
 * @param date $dateDeNaissance
 * @param String $adresse
 * @param String $ville
 * @param int $codePostal (5 caractères)
 * @param int $anneeEtude
 * @param String $formation
 * @param String $email
 * @param String $motDePasse
 * @param String $iNE
 * @param int $codeConfirmation (8 caractères)
 *
 * @return void
 */
function ajoutEtudiant($conn, $nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $motDePasse, $iNE, $codeConfirmation){
    $req = "INSERT INTO Etudiant (IdEtudiant, Nom, Prenom, DateDeNaissance, Adresse, Ville, CodePostal, AnneeEtude, Formation, Email, MotDePasse, INE, Actif, CodeConfirmation)
            VALUES (DEFAULT, upper(:nom), :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, :email, :mdp, :ine, True, :CodeMail)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $motDePasse, $iNE, $codeConfirmation));
}

/**
 * Ajouter une entreprise dans la base de donnée
 *
 * @param PDO $conn
 * @param String $nom
 * @param String $adresse
 * @param String $ville
 * @param int $codePostal (5 caractères)
 * @param String $num
 * @param String $secteur
 * @param String $email
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
 * @param PDO $conn
 * @param String $nom
 * @param String $prenom
 * @param String $formation
 * @param String $email
 * @param String $mdp
 * @param String $role
 *
 * @return array $result
 */
function ajoutAdministration($conn, $nom, $prenom, $formation, $email, $mdp, $role){
    $req = "INSERT INTO Adminitrsation VALUES (DEFAULT, :nom, :prenom, :formation, :email, :mdp, :role)";
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
?>