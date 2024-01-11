<?php
// process-form.php
session_start();

include_once '../Model/ConnexionBDD.php';

$conn = Conn::getInstance();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['BoutonRetour'])) {
    header('Location: ../View/ViewAfficherPlusOffre.php');
    exit();
}

// Initialize la variable de session si elle n'existe pas
if (!isset($_SESSION['selectedStudents'])) {
    $_SESSION['selectedStudents'] = array();

}

$nomOffre = isset($_GET['nomOffre']) ? $_GET['nomOffre'] : null;

if ($nomOffre === null) {
    echo "Erreur : Nom de l'offre introuvable.";
    exit;
}

$_SESSION['selectedOffer'] = $nomOffre;

// Afficher la liste des étudiants
$sqlTousEtudiants = $conn->prepare('SELECT * FROM Etudiant');
if ($sqlTousEtudiants->execute()) {
    $result = $sqlTousEtudiants->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        ?>
        <head>
            <link rel="stylesheet" type="text/css" href="../asserts/css/AjoutEtudiantOffre.css">
        </head>
        <form id="rechercheForm">
            <label for="nomCheckbox">
                <input type="checkbox" id="nomCheckbox"> Nom
            </label>
            <label for="prenomCheckbox">
                <input type="checkbox" id="prenomCheckbox"> Prénom
            </label>
            <label for="ineCheckbox">
                <input type="checkbox" id="ineCheckbox"> INE
            </label>
            <label for="codepostalCheckbox">
                <input type="checkbox" id="codepostalCheckbox"> Code Postal
            </label>
            <label for="formationCheckbox">
                <input type="checkbox" id="formationCheckbox"> Formation
            </label>
            <label for="anneeEtudeCheckbox">
                <input type="checkbox" id="anneeEtudeCheckbox"> Année d'étude
            </label>
            <label for="autresCheckbox">
                <input type="checkbox" id="autresCheckbox"> Autres
            </label>



            <div id="nomDiv" style="display: none">
                <label for="nom"></label><input type="text" name="nom" id="nom" placeholder="Nom">
            </div>
            <div id="prenomDiv" style="display: none">
                <label for="prenom"></label><input type="text" name="prenom" id="prenom" placeholder="Prénom">
            </div>
            <div id="ineDiv" style="display: none">
                <label for="ine"></label><input type="text" name="ine" id="ine" placeholder="INE">
            </div>
            <div id="codepostalDiv" style="display: none">
                <label for="codepostal"></label><input type="number" name="codePostal" id="codePostal" placeholder="Code Postal">
            </div>
            <div id="formationDiv" style="display: none">
                <label for="formation"></label><input type="text" name="formation" id="formation" placeholder="Formation">
            </div>
            <div id="anneeEtudeDiv" style="display: none">
                <label for="anneeEtude"></label><input type="number" name="anneeEtude" id="anneeEtude" placeholder="Année d'étude">
            </div>
            <div id="autresDiv" style="display: none">
                <label for="email">
                    <input type="text" name="email" id="email" placeholder="Adresse Email">
                </label>
                <label for="adresse">
                    <input type="text" name="adresse" id="adresse" placeholder="Adresse">
                </label>
                <label for="ville">
                    <input type="text" name="ville" id="ville" placeholder="Ville">
                </label>
                <label for="typeEntreprise">
                    <input type="text" name="typeEntreprise" id="typeEntreprise" placeholder="Type d'entreprise">
                </label>
                <label for="typeMission">
                    <input type="text" name="typeMission" id="typeMission" placeholder="Type de missions">
                </label>
                <label for="mobileSelect">
                    Mobile:
                    <select id="mobileSelect">
                        <option value="peuimporte">Peu importe</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </label>
                <label for="actifSelect">
                    Actif:
                    <select id="actifSelect">
                        <option value="peuimporte">Peu importe</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </label>
            </div>

            <input type="button" value="Rechercher un étudiant" onclick="rechercherEtudiants()" class="btnRechercheEtu">
        </form>



        <script src="../asserts/js/rechercheEtuOffre.js"></script>

        <form action="../Controller/ControllerAjoutEtudiantOffre.php?nomOffre=<?php echo $nomOffre; ?>" method="post">
            <div class="result" id="result"> </div>
            <input type="submit" name="buttonValider" value="Valider">
            <input type="submit" name="BoutonRetour" value="Retour aux offres">
            <input type="hidden" name="selectedOffer" value="<?php echo $nomOffre; ?>">
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
    if (isset($_POST['selectedStudents'])) {
        foreach ($_POST['selectedStudents'] as $selectedStudentIne) {
            $sqlEtudiant = $conn->prepare('SELECT idetudiant FROM Etudiant WHERE ine = :ine');
            $sqlEtudiant->bindParam(':ine', $selectedStudentIne, PDO::PARAM_STR);

            if ($sqlEtudiant->execute()) {
                $selectedStudentData = $sqlEtudiant->fetch(PDO::FETCH_ASSOC);

                if ($selectedStudentData && isset($selectedStudentData['idetudiant'])) {
                    $selectedStudentId = $selectedStudentData['idetudiant'];
                } else {
                    echo "Erreur: Étudiant non trouvé ou champ 'idetudiant' manquant.";
                }
            }

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
                            echo "Aucun résultat trouvé pour 'L idoffre + $resultatSelect";
                        }
                    } else {
                        echo "Erreur lors de l'exécution de la requête SQL pour rechercher l'ID de l'offre : " . $sqlRecherceID->errorInfo()[2];
                    }


                    // Ajouter le nom et prénom de l'étudiant à la variable de session
                    echo "<br>" . 'Le résumé de l\'élève ou des élèves choisis :' . "<br>";
                    $_SESSION['selectedStudents'][] = $etudiant['nom'] . ' ' . $etudiant['prenom'];
                    echo "-" . $etudiant['nom'] . ' ' . $etudiant['prenom'] . "<br>";
                    $sqlInsert = $conn->prepare('INSERT INTO Postule (idoffre,idetudiant) VALUES (:idoffre, :idetudiant)');
                    $sqlInsert->bindParam(':idoffre', $idOffre, PDO::PARAM_INT);
                    $sqlInsert->bindParam(':idetudiant', $selectedStudentId, PDO::PARAM_INT);

                    $sqlInsert->execute();
                } else {
                    echo "Étudiant non trouvé.";
                }
            } else {
                echo "Erreur lors de l'exécution de la requête SQL pour l'étudiant : " . $sqlEtudiant->errorInfo()[2];
            }
        }
    }
    else {
        echo 'Aucun étudiant sélectionné.';
    }
}
?>