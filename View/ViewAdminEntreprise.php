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
        <form action="Controler/controlerBtnAjout.php" method="post">
            <input name="btnAjoutEntreprise" class="btnAjoutEntreprise" type="submit" value="Ajouter une entreprise">
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

            include '../Controller/ConnexionBDD.php';

            $db = conn('localhost', 'td', 'emeline', 'root');



                // Effectuez une requête SQL pour récupérer les données des offres
                $sql2 = "SELECT * FROM Offre";
                $req2 = $db->prepare($sql2);
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
