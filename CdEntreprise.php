<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="asserts/css/adminEntreprise.css">
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
                <form action="Controler/controlerCdMenu.php" method="post">
                    <ul class="vertical-menu">
                        <li><input type="submit" name="accueil" value="Accueil" class="btnCreation"></li>
                        <li><input type="submit" name="etudiant" value="Etudiant" class="btnCreation"></li>
                        <li><input type="submit" name="entreprise" value="Entreprise" class="btnCreation"></li>
                    </ul>
                </form>
            </nav>
        </div>

        <div class="header-content">
            <h1 class="title">Gestionnaire des apprentis</h1>
            <img src="asserts/img/logo.png" class="logo">
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
        <form action="Controler/controlerBtnAjout.php" method="post">
            <input name="btnAjoutEntreprise" class="btnAjoutEntreprise" type="submit" value="Ajouter une Entreprise">
            <input name="btnAjoutOffre" class="btnAjoutOffre" type="submit" value="Ajouter une Offre">
        </form>
        <form method="post" action="">

            <input type="button" value="Afficher les Offres" name="btnAfficherOffre" class="btnAfficherOffre" onclick="afficherOffres()">
            <input type="button" value="Afficher les Entreprises" name="btnAfficherEntreprise" class="btnAfficherEntreprise" onclick="afficherEntreprises()">

        </form>

        <!-- Affichez les données des offres par défaut -->
        <ul id="donneesOffre">
            <?php
            session_start();

            $host = "localhost";
            $dbname = "postgres";
            $user = "postgres";
            $password = "31lion2004";

            try {
                $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }



            // Effectuez une requête SQL pour récupérer les données des offres
            $sql2 = "SELECT * FROM Offre";
            $req2 = $pdo->prepare($sql2);
            $req2->execute();

            $resultat2 = $req2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultat2 as $res2): ?>
                <li>
                    Nom : <?php echo $res2['nom']; ?><br>
                    Domaine : <?php echo $res2['domaine']; ?><br>
                    Mission : <?php echo $res2['mission']; ?><br>
                    Nombre d'étudiants : <?php echo $res2['nbetudiant']; ?><br>
                </li>
            <?php endforeach;

            ?>
        </ul>

        <!-- Ajoutez un conteneur similaire pour les données des entreprises et masquez-le par défaut -->
        <ul id="donneesEntreprise" style="display: none;">
            <?php


            $sql = "SELECT * FROM entreprise";
            $req = $pdo->prepare($sql);
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
