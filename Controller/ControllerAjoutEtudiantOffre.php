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
            <head>
                <link rel="stylesheet" type="text/css" href="../asserts/css/AjoutEtudiantOffre.css">
            </head>
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
            <input type="submit" name="BoutonRetour" value="Retour aux offres">
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

                // Vérifier si l'étudiant est déjà sélectionné
                if (in_array($selectedStudentId, $_SESSION['selectedStudents'])) {
                    echo '<div class="error-message">Erreur : L\'étudiant ' . $etudiant['nom'] . ' ' . $etudiant['prenom'] . ' est déjà sélectionné.</div>';
                    continue; // Passe à l'étudiant suivant dans la boucle
                }


                if ($etudiant) {
                    echo "-" . $etudiant['nom'] . ' ' . $etudiant['prenom'] . "<br>";
                    $_SESSION['selectedStudents'][] = $selectedStudentId;

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

