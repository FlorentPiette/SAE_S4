<?php
include '../Model/ModelAjout.php';
include '../Model/ConnexionBDD.php';

$conn = Conn::getInstance();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["Nom"];
    $domaine = $_POST["Domaine"];
    $mission = $_POST["Mission"];
    $nbEtudiant = $_POST["NbEtudiant"];
    $fichier = $_POST["fichier"];
    $entreprise = $_POST["entreprise"];
    $estBrouillon = isset($_POST["Brouillon"]);

    // voirFichier($conn, $fichier);
    ajoutOffre($conn, $nom, $domaine, $mission, $nbEtudiant, $fichier);
    ajouterOffreEntreprise($conn, $nom, $entreprise);

    // Activer l'indicateur pour afficher la popup
    $_SESSION['afficher_popup'] = true;

    // Rediriger l'utilisateur après avoir ajouté l'offre
    if ($estBrouillon) {
        $message = "L'offre a été enregistrée en tant que brouillon.";
    } else {
        $message = "L'offre a été enregistrée avec succès.";
    }

    // Redirection vers la page souhaitée
    header('Location: ../View/ViewAdminEntreprise.php');
    exit; // Assurez-vous de sortir du script après la redirection.
} else {
    // Si ce n'est pas une requête POST, on doit récupérer les données des entreprises
    affichageEntreprise($conn);
}

