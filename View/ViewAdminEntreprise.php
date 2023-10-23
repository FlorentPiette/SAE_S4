<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="/asserts/css/adminEntreprise.css">

    <script>
        function afficherEntreprises() {
            document.getElementById("donneesEntreprise").style.display = "block";
            document.getElementById("donneesOffre").style.display = "none";
        }

        function afficherOffres() {
            document.getElementById("donneesEntreprise").style.display = "none";
            document.getElementById("donneesOffre").style.display = "block";
        }
    </script>
</head>
<body class="body">

<header class="header">
    <div class="menu-container">
        <div class="menu-header">
            <nav>
                <form method="post">
                    <ul class="vertical-menu">
                        <li><button type="button" onclick="window.location.href ='ViewAdminMain.html" name="accueil"  class="btnCreation"> Accueil </button></li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminEtu.php" name="etudiant" class="btnCreation"> Etudiant </button> </li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminEntreprise.php" name="entreprise"  class="btnCreation"> Entreprise </button></li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminAdministration.php" name="adminitrsation"  class="btnCreation"> Administration </button></li></li>
                    </ul>
                </form>
            </nav>
        </div>

        <div class="header-content">
            <h1 class="title">Gestionnaire des apprentis</h1>
            <img src="/asserts/img/logo.png" class="logo">
            <form method="post" action="/Controller/ControllerBtnDeco.php">

                <input class="btnDeco" value="Déconnexion" type="submit" name="btnDeco">

            </form>

        </div>
    </div>
</header>

<div class="body-container">

    <div class="rectangle-haut">
        <div class="all-text">
            <h3 class="nbrEtu">Nombre d'étudiants</h3>
            <h3 class="nbrEnt">Nombre d'entreprises</h3>
            <h3 class="nbrOff">Nombre d'offres</h3>
            <h3 class="nbrPers">Nombre de personnel</h3>
        </div>
    </div>

    <div class="rectangle-mid">
        <form action="" method="post">
            <button name="btnAjoutEntreprise" onclick="window.location.href ='ViewAjoutEntreprise.php'" class="btnAjoutEntreprise" type="button" > Ajouter une entreprise </button>
            <button name="btnAjoutOffre" onclick="window.location.href ='ViewDemandeAjoutOffre.php'" class="btnAjoutOffre" type="button" > Ajouter une offre </button>
        </form>
        <form method="post" action="">

            <input type="button" value="Afficher les Offres" name="btnAfficherOffre" class="btnAfficherOffre" onclick="afficherOffres()">
            <input type="button" value="Afficher les Entreprises" name="btnAfficherEntreprise" class="btnAfficherEntreprise" onclick="afficherEntreprises()">

        </form>

        <!-- Affichez les données des offres par défaut -->
        <ul id="donneesOffre" class="offres-container">
            <?php
            session_start();

            include '../Model/ConnexionBDD.php';
            $db = Conn::getInstance();



            // Effectuez une requête SQL pour récupérer les données des offres
            $sql2 = "SELECT * FROM Offre";
            $req2 = $db->prepare($sql2);
            $req2->execute();

            $resultat2 = $req2->fetchAll(PDO::FETCH_ASSOC);
            $count = 0;
            foreach ($resultat2 as $res2):
                if ($count % 2 == 0) {
                    echo '<li>';
                }?>
                <li class="offre">
                    Nom : <?php echo $res2['nom']; ?><br>
                    Domaine : <?php echo $res2['domaine']; ?><br>
                    Mission : <?php echo $res2['mission']; ?><br>
                    Nombre d'étudiants : <?php echo $res2['nbetudiant']; ?><br>
                    <!-- Ajoutez ce code à votre formulaire dans la section pour afficher les offres -->
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="file" name="fichier" accept=".pdf, .doc, .docx"> <!-- Permet d'accepter les fichiers PDF, DOC et DOCX -->
                        <input type="submit" value="Déposer le fichier">
                    </form>
                    <br>

                </li>
                <?php if ($count % 2 == 1) {
                echo '</li>';
            }
                $count++;
            endforeach;

            if ($count % 2 == 1) {
                echo '</li>';
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_FILES['fichier'])) {
                    $file = $_FILES['fichier'];

                    if ($file['error'] === 0) {
                        // Le téléchargement du fichier s'est bien déroulé.
                        $uploadDir = 'dossier_de_stockage/'; // Répertoire de stockage des fichiers

                        // Assurez-vous que le répertoire de stockage existe et est accessible en écriture.
                        if (!is_dir($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }

                        $fileName = $file['name'];
                        $uploadPath = $uploadDir . $fileName;

                        // Déplacez le fichier téléchargé vers le répertoire de stockage.
                        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                            // Le fichier a été téléchargé avec succès.

                            // Obtenez l'ID de l'offre à laquelle vous souhaitez associer le fichier (remplacez par votre propre logique pour obtenir l'ID de l'offre).
                            $offreId = 1; // Remplacez ceci par l'ID de l'offre.

                            // Maintenant, ajoutez les informations du fichier dans la table Postule.
                            $nomFichier = $fileName;

                            // Vous devez également obtenir l'ID de l'étudiant à partir de votre session ou d'autres méthodes, et remplacez '1' par l'ID de l'étudiant approprié.
                            $etudiantId = 1; // Remplacez ceci par l'ID de l'étudiant.

                            // Insérez le fichier téléchargé dans la table Postule.
                            $sqlInsert = "INSERT INTO Postule (IdEtudiant, IdOfffre, cv) VALUES (?, ?, ?)";
                            $stmt = $db->prepare($sqlInsert);
                            $stmt->execute([$etudiantId, $offreId, file_get_contents($uploadPath)]);

                            echo 'Fichier téléchargé et ajouté à la table Postule avec succès.';
                        } else {
                            echo 'Erreur lors du téléchargement du fichier.';
                        }
                    } else {
                        echo 'Erreur lors du téléchargement du fichier.';
                    }
                }
            }



            ?>
        </ul>

        <!-- Ajoutez un conteneur similaire pour les données des entreprises et masquez-le par défaut -->
        <ul id="donneesEntreprise" style="display: none;">
            <?php


            $sql = "SELECT * FROM entreprise";
            $req = $db->prepare($sql);
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($resultat as $res): ?>
                <li>
                    Nom : <?php echo $res['nom']; ?><br>
                    Adresse : <?php echo $res['adresse']; ?><br>
                    Ville : <?php echo $res['ville']; ?><br>
                    Téléphone : <?php echo $res['numtel']; ?><br>
                    Email : <?php echo $res['email']; ?><br>
                    Secteur d'activité : <?php echo $res['secteuractivite']; ?><br>

                </li>

            <?php endforeach;

            ?>
        </ul>
    </div>
</div>

</body>
</html>
