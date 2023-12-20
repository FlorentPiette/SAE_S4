<?php
            include '../Model/ConnexionBDD.php';
            $db = Conn::getInstance();


            $sql2 = "SELECT * FROM Offre ORDER BY idoffre DESC LIMIT 2";
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
                <form action="../Controller/ControllerAjoutEtudiantOffre.php" method="post" name="formAjoutEtu_<?php echo $count; ?>">
                    <ul class="offres-container">
                        <li class="offre">
                            Nom : <?php echo $res2['nom']; ?><br>
                            Domaine : <?php echo $res2['domaine']; ?><br>
                            Mission : <?php echo $res2['mission']; ?><br>
                            Nombre d'étudiants : <?php echo $res2['nbetudiant']; ?><br>
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
