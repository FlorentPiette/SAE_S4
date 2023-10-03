
<?php

$conn = new PDO('pgsql:host=localhost;port=5432;dbname=postgres', 'postgres', 'flo');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["Nom"];
    $domaine = $_POST["Domaine"];
    $mission = $_POST["Mission"];
    $nbEtudiant = $_POST["NbEtudiant"];
    $estBrouillon = isset($_POST["Brouillon"]);

    // Traitement en tant que brouillon ou entrée complète
    if ($estBrouillon) {

        $Offre1 = $conn->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)");

        $Offre1->execute(array(':nom' => $nom, ':domaine' => $domaine, ':mission' => $mission, ':nbetudiant' => $nbEtudiant));

        $message = "L'offre a été enregistrée en tant que brouillon.";
    } else {

        $Offre = $conn->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)");

        $Offre->execute(array(':nom' => $nom, ':domaine' => $domaine, ':mission' => $mission, ':nbetudiant' => $nbEtudiant));

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