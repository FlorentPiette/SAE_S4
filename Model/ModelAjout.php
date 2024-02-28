<?php

/**
 * Ajouter une offre dans la base de donnée
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à définir le nom de l'offre
 * @param String $domaine sert à définir le domaine de l'offre
 * @param String $mission sert à définir les missions de l'offre
 * @param int $nbetudiant sert à définir le nombre d'étudiants voulus pour cette offre
 *
 * @return void
 */
function ajoutOffre(PDO $conn, string $nom, string $domaine, string $mission, int $nbetudiant): void
{
    $nom = htmlentities($nom);
    $domaine=htmlentities($domaine);
    $mission=htmlentities($mission);
    if(filter_var($nbetudiant,FILTER_VALIDATE_INT)) {
        $req = "INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)";
        $req2 = $conn->prepare($req);
        $req2->execute(array($nom, $domaine, $mission, $nbetudiant));
    }
}

/**
 * Associer une offre a une entreprise dans la base de données
 *
 * @param PDO $conn
 * @param String $nomOffre
 * @param String $nomEntreprise
 *
 * @return void
 */
function ajouterOffreEntreprise(PDO $conn, string $nomOffre, string $nomEntreprise): void
{
    $nomOffre=htmlentities($nomOffre);
    $nomEntreprise=htmlentities($nomEntreprise);
    $req = "INSERT INTO Poste (nomoffre, nomentreprise) VALUES (:nomOffre, :nomEntreprise)";
    $req2 = $conn->prepare($req);
    $req2->execute(array(':nomOffre' => $nomOffre, ':nomEntreprise' => $nomEntreprise));
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
 * @param String $iNE sert à définir l'INE de l'étudiant
 * @param String $entreprise sert à définir le type d'entreprise que l'étudiant recherche
 * @param String $mission sert à définir le type de mission que l'étudiant recherche
 * @param int $mobile sert à définir le status mobile ou non de l'étudiant
 * @param int $CodeMail (8 caractères) sert à confirmer le compte de l'étudiant
 *
 * @return void
 */
function ajoutEtudiant(PDO $conn, String $nom, String $prenom, $dateDeNaissance, String $adresse, String $ville, int $codePostal, int $anneeEtude, String $formation, String $email, String $iNE, string $entreprise, String $mission, int $mobile, $CodeMail): void
{
    $nom=htmlentities($nom);
    $prenom=htmlentities($prenom);
    $adresse=htmlentities($adresse);
    $ville=htmlentities($ville);
    $formation=htmlentities($formation);
    $iNE=htmlentities($iNE);
    $entreprise=htmlentities($entreprise);
    $mission=htmlentities($mission);
    if(filter_var($codePostal,FILTER_VALIDATE_INT) and filter_var($email,FILTER_VALIDATE_EMAIL) and filter_var($anneeEtude,FILTER_VALIDATE_INT) and filter_var($mobile,FILTER_VALIDATE_INT) and filter_var($CodeMail,FILTER_VALIDATE_INT)){
    $req = "INSERT INTO Etudiant (IdEtudiant, Nom, Prenom, DateDeNaissance, Adresse, Ville, CodePostal, AnneeEtude, Formation, Email, INE, TypeEntreprise, TypeMission, Mobile, Actif, CodeMail)
            VALUES (DEFAULT, upper(:nom), :prenom, :dateDeNaissance, :adresse, :ville, :codePostal, :anneeEtude, :formation, :email, :ine, :entreprise, :mission, :mobile, True, :CodeConfirmation)";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom, $prenom, $dateDeNaissance, $adresse, $ville, $codePostal, $anneeEtude, $formation, $email, $iNE, $entreprise, $mission, $mobile, $CodeMail));
    }
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
function ajoutEntreprise(PDO $conn, string $nom, string $adresse, string $ville, int $codePostal, string $num, string $secteur, string $email): void
{
    $nom=htmlentities($nom);
    $adresse=htmlentities($adresse);
    $ville=htmlentities($ville);
    $num=htmlentities($num);
    $secteur=htmlentities($secteur);
    if(filter_var($codePostal,FILTER_VALIDATE_INT) and filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $req = "INSERT INTO Entreprise VALUES (DEFAULT, :nom, NULL, :adresse, :ville, :codePostal, :num, :secteur,:email)";
        $req2 = $conn->prepare($req);
        $req2->execute(array($nom, $adresse, $ville, $codePostal, $num, $secteur, $email));
    }
}

/**
 * Afficher les entreprises dans le menu
 *
 * @param PDO $conn
 *
 * @return void
 */
function affichageEntreprise(PDO $conn): void
{
    try {
        // Requête SQL pour récupérer les noms des entreprises
        $query = "SELECT nomentreprise FROM Entreprise";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $entreprises = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $entreprises[] = $row;
        }

        // Renvoyer les entreprises au format JSON
        header('Content-Type: application/json');
        echo json_encode($entreprises);
    } catch (PDOException $e) {
        // Gérez les erreurs de base de données
        echo json_encode(array('error' => 'Erreur lors de la récupération des entreprises.'));
    }
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
function ajoutAdministration(PDO $conn, string $nom, string $prenom, string $formation, string $email, string $mdp, string $role): array
{
    $nom=htmlentities($nom);
    $prenom=htmlentities($prenom);
    $formation=htmlentities($formation);
    $mdp=htmlentities($mdp);
    $role=htmlentities($role);
    if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $req = "INSERT INTO Administration VALUES (DEFAULT, :nom, :prenom, :formation, :email, :mdp, :role)";
        $req2 = $conn->prepare($req);
        $req2->execute(array($nom, $prenom, $formation, $email, $mdp, $role));
        $result = $req2->fetchAll(PDO::FETCH_ASSOC);
    }

    return $result;
}

/**
 * Création du code de confirmation pour confirmer son email
 *
 * @return int|string $result
 */
function code(): int|string
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
 * @param String $email sert à chercher si l'email est dans la base de donnée
 *
 * @return array $result
 */
function selectEtuWhereEmail($conn, $email): array
{
    $req = "SELECT * FROM Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Récuperer de la base de donnée, l'offre ayant ce nom'
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 * @param String $nom sert à chercher si le nom est dans la base de donnée
 *
 * @return array $result
 */
function selectOffreWhereNom($conn, $nom)
{
    $req = "SELECT idoffre FROM Offre where nom = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom));
    $result = $req2->fetch(PDO::FETCH_ASSOC);

    return $result;
}