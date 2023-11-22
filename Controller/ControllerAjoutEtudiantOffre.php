<?php
// process-form.php
session_start();

include_once '../Model/ConnexionBDD.php';

$conn = Conn::getInstance();

// Initialize la variable de session si elle n'existe pas
if (!isset($_SESSION['selectedStudents'])) {
    $_SESSION['selectedStudents'] = array();
}

// Afficher la liste des étudiants
$sqlTousEtudiants = $conn->prepare('SELECT * FROM Etudiant');
if ($sqlTousEtudiants->execute()) {
    $result = $sqlTousEtudiants->fetchAll(PDO::FETCH_ASSOC);

    echo "Voici la liste de tous les étudiants :" . "<br>";

    if ($result) {
        ?>
        <form action="" method="post">
            <?php
            $nomOffre = isset($_POST['nomOffre']) ? $_POST['nomOffre'] : null;
            foreach ($result as $row) {
                // Ajouter une case à cocher à côté du nom de chaque étudiant
                echo '<input type="checkbox" name="selectedStudents[]" value="' . $row['idetudiant'] . '"> ';
                echo $row['nom'] . " " . $row['prenom'] . "<br>";
            }
            ?>
            <input type="submit" name="buttonValider" value="Valider">
            <input type="submit" name="BoutonRetour" value="Retour">
            <input type="hidden" name="nomOffre" value="<?php echo $nomOffre; ?>">
        </form>
        <?php
    } else {
        echo "Aucun étudiant trouvé.";
    }
} else {
    echo "Erreur lors de l'exécution de la requête SQL : " . $sqlTousEtudiants->errorInfo()[2];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buttonValider'])) {
    // Votre logique pour le bouton Valider
    echo 'Le résumé de l\'élève ou des élèves choisis :' . "<br>";

    if (isset($_POST['selectedStudents'])) {
        foreach ($_POST['selectedStudents'] as $selectedStudentId) {
            // Récupérer le nom et prénom de l'étudiant depuis la base de données
            $sqlEtudiant = $conn->prepare('SELECT nom, prenom FROM Etudiant WHERE idetudiant = :id');
            $sqlEtudiant->bindParam(':id', $selectedStudentId, PDO::PARAM_INT);


            if ($sqlEtudiant->execute()) {
                $etudiant = $sqlEtudiant->fetch(PDO::FETCH_ASSOC);

                if ($etudiant) {

                    $sqlRecherceID = $conn->prepare('SELECT Idoffre FROM Offre WHERE nom = :nom');
                    $sqlRecherceID->bindParam(':nom',$nomOffre);
                    if ($sqlRecherceID->execute()) {
                        $resultatSelect = $sqlRecherceID->fetch(PDO::FETCH_ASSOC);

                        if (isset($resultatSelect['idoffre'])) {
                            $idOffre = $resultatSelect['idoffre'];
                        } else {
                            echo "Aucun résultat trouvé pour 'L idoffre";
                        }
                    } else {
                        echo "Erreur lors de l'exécution de la requête SQL pour rechercher l'ID de l'offre : " . $sqlRecherceID->errorInfo()[2];
                    }


                    // Ajouter le nom et prénom de l'étudiant à la variable de session
                    $_SESSION['selectedStudents'][] = $etudiant['nom'] . ' ' . $etudiant['prenom'];
                    echo "-" . $etudiant['nom'] . ' ' . $etudiant['prenom'] . "<br>";
                    $sqlInsert = $conn->prepare('INSERT INTO Postule (idpostule,idoffre,nom, prenom) VALUES (DEFAULT,:idoffre,:nom, :prenom)');
                    $sqlInsert->bindParam(':idoffre', $idOffre, PDO::PARAM_INT);
                    $sqlInsert->bindParam(':nom', $etudiant['nom']);
                    $sqlInsert->bindParam(':prenom', $etudiant['prenom']);
                    $sqlInsert->execute();
                } else {
                    echo "Étudiant non trouvé.";
                }
            } else {
                echo "Erreur lors de l'exécution de la requête SQL pour l'étudiant : " . $sqlEtudiant->errorInfo()[2];
            }
        }
    } else {
        echo 'Aucun étudiant sélectionné.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['BoutonRetour'])) {
    header('Location: ../View/ViewAdminEntreprise.php');
    exit();
}
?>
