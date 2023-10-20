
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
    $estBrouillon = isset($_POST["Brouillon"]);

    ajoutOffre($conn, $nom, $domaine, $mission, $nbEtudiant);
    // Traitement en tant que brouillon ou entrée complète
    if ($estBrouillon) {
        $message = "L'offre a été enregistrée en tant que brouillon.";
    } else {

        $message = "L'offre a été enregistrée avec succès.";
    }

}
?>
<!DOCTYPE html>
<html lang="fr">

<body>
<!-- Affichez un message de confirmation ici -->
<p><?php echo $message; ?></p>
<!-- Vous pouvez également ajouter un lien de retour au formulaire ou à une autre page ici -->
</body>

</html>