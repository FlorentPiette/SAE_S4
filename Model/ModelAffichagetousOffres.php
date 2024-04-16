<?php
include '../Model/ConnexionBDD.php';
session_start();
$db = Conn::getInstance();

if ($_SESSION['role'] != 'cd'){
// Récupérer les données pour la page spécifiée
$sql2 = "SELECT * FROM Offre where visible = true ORDER BY idOffre DESC";
$req = $db->prepare($sql2);
$req->execute();
$resultat2 = $req->fetchAll(PDO::FETCH_ASSOC);

$count = 0;
foreach ($resultat2 as $res2):
    $nomOffre = $res2['nom'];
    $selectIDoffre = $db->prepare('SELECT idOffre FROM Offre WHERE nom = :nom');
    $selectIDoffre->bindParam(':nom', $nomOffre);
    $selectIDoffre->execute();
    $resultatID = $selectIDoffre->fetch(PDO::FETCH_ASSOC);
    $idOffre = $resultatID['idoffre'];

    $selectnom = $db->prepare('SELECT DISTINCT postule.nom, postule.prenom FROM postule join etudiant e on e.idetudiant = postule.idetudiant WHERE idoffre = :idoffre');
    $selectnom->bindParam(':idoffre', $idOffre, PDO::PARAM_INT);
    $selectnom->execute();
    $etudiants = $selectnom->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <form action="../Controller/ControllerAjoutEtudiantOffre.php?nomOffre=<?php echo $res2['nom'];?> " method="post" name="formAjoutEtu_<?php echo $count; ?>">
        <ul class="offres-container">
            <li class="offre">
                <strong>Nom :</strong> <?php echo $res2['nom']; ?><br>
                <strong>Domaine : </strong><?php echo $res2['domaine']; ?><br>
                <strong>Missions : </strong><?php echo $res2['mission']; ?><br>
                <strong>Nombre d'étudiants :</strong> <?php echo $res2['nbetudiant']; ?><br>
                <strong>Parcours :</strong> <?php echo $res2['parcours']; ?><br>
                <input type="hidden" name="nomOffre" value="<?php echo $nomOffre; ?>">
                <input type="submit" name="BtAjoutEtudiant" value="Ajouter un étudiant à cette offre">
                <label> Les étudiants qui ont déjà postulés :</label><br>
                <?php
                if ($etudiants) {
                    foreach ($etudiants as $etudiant) {
                        echo " - " . $etudiant['nom'] . ' ' . $etudiant['prenom'] . '<br>';
                    }
                }
                ?>
            </li>
        </ul>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    </form>
    <?php
    $count++;
endforeach;
}
else {

// Récupérer les données pour la page spécifiée
$sql2 = "SELECT * FROM Offre where visible = true ORDER BY idOffre DESC";
$req = $db->prepare($sql2);
$req->execute();
$resultat2 = $req->fetchAll(PDO::FETCH_ASSOC);

$count = 0;
foreach ($resultat2 as $res2):
    $nomOffre = $res2['nom'];
    $selectIDoffre = $db->prepare('SELECT idOffre FROM Offre WHERE nom = :nom');
    $selectIDoffre->bindParam(':nom', $nomOffre);
    $selectIDoffre->execute();
    $resultatID = $selectIDoffre->fetch(PDO::FETCH_ASSOC);
    $idOffre = $resultatID['idoffre'];

    $selectnom = $db->prepare('SELECT DISTINCT nom, prenom FROM postule join etudiant e on e.idetudiant = postule.idetudiant WHERE idoffre = :idoffre');
    $selectnom->bindParam(':idoffre', $idOffre, PDO::PARAM_INT);
    $selectnom->execute();
    $etudiants = $selectnom->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <meta charset="UTF-8">
    <title>Offres</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/adminMenuTest.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/AffichageOffre.css">
    <script src="../assets/js/Offres.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">


    <link rel="stylesheet" type="text/css" href="../assets/css/Cloche.css">
    <script src="../assets/js/script.js"></script>

    <form action="../Controller/ControlleurCdSelectionEtu.php?nomOffre=<?php echo $res2['nom'];?> " method="post" name="formAjoutEtu_<?php echo $count; ?>">
        <ul class="offres-container">
            <li class="offre">
                <strong>Nom :</strong> <?php echo $res2['nom']; ?><br>
                <strong>Domaine : </strong><?php echo $res2['domaine']; ?><br>
                <strong>Mission : </strong><?php echo $res2['mission']; ?><br>
                <strong>Nombre d'étudiants :</strong> <?php echo $res2['nbetudiant']; ?><br>
                <strong>Parcours :</strong> <?php echo $res2['parcours']; ?><br>
                <input type="hidden" name="nomOffre" value="<?php echo $nomOffre; ?>">
                <input type="submit" name="BtAjoutEtudiant" value="voir les etudiant qui ont postulés">
                <label> Les étudiants qui ont déjà postulés :</label><br>
                <?php
                if ($etudiants) {
                    foreach ($etudiants as $etudiant) {
                        echo " - " . $etudiant['nom'] . ' ' . $etudiant['prenom'] . '<br>';
                    }
                }
                ?>
            </li>
        </ul>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    </form>


    <?php
    $count++;
endforeach;

}
