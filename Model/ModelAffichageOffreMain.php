<?php
include '../Model/ConnexionBDD.php';
$db = Conn::getInstance();

$sql2 = "SELECT * FROM Offre";
if (isset($_SESSION['formation'])) {
    $userFormation = $_SESSION['formation'];
    $sql2 .= " ORDER BY CASE WHEN formation LIKE :userFormation THEN 0 ELSE 1 END, idoffre DESC";
} else {
    $sql2 .= " ORDER BY idoffre DESC";
}
$sql2 .= " LIMIT 2";

$req = $db->prepare($sql2);
if (!empty($userFormation)) {
    $req->bindValue(':userFormation', "%$userFormation%", PDO::PARAM_STR);
}
$req->execute();
$resultat2 = $req->fetchAll(PDO::FETCH_ASSOC);

$count = 0;
foreach ($resultat2 as $res2):
    $nomOffre = $res2['nom'];

    $SQL = 'SELECT idOffre FROM Offre WHERE nom = :nom';
    if (isset($_SESSION['formation'])) {
        $SQL .= ' ORDER BY CASE WHEN formation LIKE :userFormation THEN 0 ELSE 1 END';
    }

    $selectIDoffre = $db->prepare($SQL);
    $selectIDoffre->bindParam(':nom', $nomOffre);
    if (!empty($userFormation)) {
        $selectIDoffre->bindValue(':userFormation', "%$userFormation%", PDO::PARAM_STR);
    }
    $selectIDoffre->execute();
    $resultatID = $selectIDoffre->fetch(PDO::FETCH_ASSOC);
    $idOffre = $resultatID['idoffre'];

                $selectnom = $db->prepare('SELECT DISTINCT nom, prenom FROM postule join etudiant e on e.idetudiant = postule.idetudiant WHERE idoffre = :idoffre');
                $selectnom->bindParam(':idoffre', $idOffre, PDO::PARAM_INT);
                $selectnom->execute();
                $etudiants = $selectnom->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <form action="../Controller/ControllerAjoutEtudiantOffre.php" method="post" name="formAjoutEtu_<?php echo $count; ?>">
                    <ul class="offres-container">
                        <li class="offre">
                            <strong>Nom :</strong> <?php echo $res2['nom']; ?><br>
                            <strong>Domaine : </strong><?php echo $res2['domaine']; ?><br>
                            <strong>Mission : </strong><?php echo $res2['mission']; ?><br>
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
                </form>
                <?php
                $count++;
            endforeach;
