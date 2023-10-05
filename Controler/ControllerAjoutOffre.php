
<?php

$conn = new PDO('pgsql:host=localhost;port=5432;dbname=postgres', 'postgres', '31lion2004');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["Nom"];
    $domaine = $_POST["Domaine"];
    $mission = $_POST["Mission"];
    $nbEtudiant = $_POST["NbEtudiant"];
    $estBrouillon = isset($_POST["Brouillon"]);
    $estvisible = isset($_POST["Visible"]);

    // Traitement en tant que brouillon ou entrée complète
    if ($estBrouillon) {

        $Offre1 = $conn->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)");

        $Offre1->execute(array(':nom' => $nom, ':domaine' => $domaine, ':mission' => $mission, ':nbetudiant' => $nbEtudiant));

        $message = "L'offre a été enregistrée en tant que brouillon.";
    }
    if (!$estBrouillon){

        $Offre = $conn->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)");

        $Offre->execute(array(':nom' => $nom, ':domaine' => $domaine, ':mission' => $mission, ':nbetudiant' => $nbEtudiant));

        $message = "L'offre a été enregistrée avec succès.";
    }

    if ($estvisible){

        $stmt = $conn->prepare("SELECT * FROM Offre WHERE nom = :nom");

        $stmt->execute(array(':nom' => $nom));

        $resultat2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultat2 as $res2): ?>
            <li id="offre">
                Nom : <?php echo $res2['nom']; ?><br>
                Domaine : <?php echo $res2['domaine']; ?><br>
                Mission : <?php echo $res2['mission']; ?><br>
                Nombre d'étudiants : <?php echo $res2['nbetudiant']; ?><br>
            </li>
        <?php endforeach;
    }
};

echo $message;
