<?php
//include '../Controller/ControllerVerificationDroit.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/adminEntreprise.css">
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
                <form  method="post" action="../Controller/ControllerBtnDeco.php">
                    <ul class="vertical-menu">
                        <li><button type="button" onclick="window.location.href ='ViewAdminMain.html'" name="accueil"class="btnCreation"> Acceuil </button></li>
                        <li><button type="button"  onclick="window.location.href ='ViewAdminEtu.php'" name="etudiant"  class="btnCreation"> Etudiant </button></li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminEntreprise.php'" name="entreprise" class="btnCreation"> Entreprise </button> </li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminAdministration.php'" name="adminitrsation"  class="btnCreation"> Administration </button> </li>
                        <li> <button type="submit" name="deco" class="btnCreation"> Déconnexion </button> </li>
                    </ul>
                </form>
            </nav>
        </div>

        <div class="header-content">
            <h1 class="title">Gestionnaire des apprentis</h1>
            <img src="../asserts/img/logo.png" class="logo">
            <form method="post" action="../Controller/ControllerBtnDeco.php">
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
            <button name="btnAjoutEntreprise" onclick="window.location.href ='ViewAjoutEntreprise.php'" class="btnAjoutEntreprise" type="button">Ajouter une entreprise</button>
            <button name="btnAjoutOffre" onclick="window.location.href ='ViewDemandeAjoutOffre.php'" class="btnAjoutOffre" type="button">Ajouter une offre</button>
        </form>
        <form method="post" action="">
            <input type="button" value="Afficher les Offres" name="btnAfficherOffre" class="btnAfficherOffre" onclick="afficherOffres()">
            <input type="button" value="Afficher les Entreprises" name="btnAfficherEntreprise" class="btnAfficherEntreprise" onclick="afficherEntreprises()">
        </form>

        <!-- Affichez les données des offres par défaut -->
        <ul id="donneesOffre" class="offres-container">
            <?php
            include '../Model/ConnexionBDD.php';
            $db = Conn::getInstance();

            // requête SQL pour récupérer les données des offres
            $sql2 = "SELECT * FROM Offre";
            $req2 = $db->prepare($sql2);
            $req2->execute();
            $resultat2 = $req2->fetchAll(PDO::FETCH_ASSOC);

            $count = 0;
            foreach ($resultat2 as $res2):
                $nomOffre = $res2['nom'];
            $selectIDoffre = $db->prepare('SELECT idOffre FROM Offre WHERE nom = :nom');
            $selectIDoffre->bindParam(':nom', $nomOffre);
            $selectIDoffre->execute();
            $resultatID = $selectIDoffre->fetch(PDO::FETCH_ASSOC);
            $idOffre = $resultatID['idoffre'];

            $selectnom = $db->prepare('SELECT DISTINCT nom, prenom FROM postule WHERE idoffre = :idoffre');
            $selectnom->bindParam(':idoffre', $idOffre, PDO::PARAM_INT);
            $selectnom->execute();
            $etudiants = $selectnom->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <form action="../Controller/ControllerAjoutEtudiantOffre.php" method="post" name="formAjoutEtu_<?php echo $count; ?>">
                    <ul id="donneesOffre" class="offres-container">
                        <li class="offre">
                            Nom : <?php echo $res2['nom']; ?><br>
                            Domaine : <?php echo $res2['domaine']; ?><br>
                            Mission : <?php echo $res2['mission']; ?><br>
                            Nombre d'étudiants : <?php echo $res2['nbetudiant']; ?><br>
                            <input type="hidden" name="nomOffre" value="<?php echo $nomOffre; ?>">
                            <input type="submit" name="BtAjoutEtudiant" value="Ajouter un étudiant à cette offre">
                            <label> Les étudiants qui ont déjà postulés :</label><br>
                            <?php
                            if ($etudiants){
                            foreach ($etudiants as $etudiant) {
                                echo $etudiant['nom'] . ' ' . $etudiant['prenom'] . '<br>';
                            }}
                            ?>
                            <br>
                        </li>
                    </ul>
                </form>
                <?php
                $count++;
            endforeach;
            ?>



            <!-- Ajoutez un conteneur similaire pour les données des entreprises et masquez-le par défaut -->
        <ul id="donneesEntreprise" style="display: none;" class="affichEntreprise">
            <?php
            $sql = "SELECT * FROM entreprise";
            $req = $db->prepare($sql);
            $req->execute();
            $resultat2 = $req->fetchAll(PDO::FETCH_ASSOC);

            $count = 0;
            foreach ($resultat2 as $resultat):
                if ($count % 2 == 0) {
                    echo '<li>';
                } ?>
                <li class="entreprise">
                    Nom : <?php echo $resultat['nomentreprise']; ?><br>
                    Adresse : <?php echo $resultat['adresse']; ?><br>
                    Ville : <?php echo $resultat['ville']; ?><br>
                    Code postal : <?php echo $resultat['codepostal']; ?><br>
                    Numéro de téléphone : <?php echo $resultat['numtel']; ?><br>
                    Secteur d'activité : <?php echo $resultat['secteuractivite']; ?><br>
                    Email : <?php echo $resultat['email']; ?><br>
                    <!-- Ajoutez ce code à votre formulaire dans la section pour afficher les offres -->

                </li>
                <?php if ($count % 2 == 1) {
                echo '</li>';
            }
                $count++;
            endforeach;

            if ($count % 2 == 1) {
                echo '</li>';
            }

            ?>
        </ul>

        <script>
            function adjustRectangleHeight() {
                const offreList = document.getElementById('donneesOffre');
                const entrepriseList = document.getElementById('donneesEntreprise');
                const dynamicRectangle = document.querySelector('.rectangle-mid');

                const maxListHeight = Math.max(offreList.clientHeight, entrepriseList.clientHeight);
                const margin = 20;

                dynamicRectangle.style.height = maxListHeight + margin + 'px';

                const elementsToMove = document.getElementsByClassName('move-down');
                for (const element of elementsToMove) {
                    element.style.transform = 'translateY(' + (maxListHeight + margin) + 'px)';
                }
            }

            adjustRectangleHeight();

            function updateRectangleHeight() {
                adjustRectangleHeight();
            }

            function limiterElements(elementSelector) {
                const elements = document.querySelectorAll(elementSelector);
                for (let i = 3; i < elements.length; i++) {
                    elements[i].style.display = 'none';
                }
            }

            limiterElements('.offre');
            limiterElements('.entreprise');
        </script>



    </div>
</div>

<div id="popup" class="popup">
    L'offre a été ajoutée avec succès !
</div>

<script>

    <!-- Incluez ce script JavaScript dans votre vue -->

    // Dès que la page est chargée, vérifiez la session pour afficher la popup
    window.addEventListener('load', function () {
        <?php
        // Vérifiez la session pour afficher la popup
        session_start();
        if (isset($_SESSION['afficher_popup']) && $_SESSION['afficher_popup'] === true) {
            echo 'afficherPopup();';
            // Réinitialisez l'indicateur pour qu'il ne s'affiche qu'une fois.
            $_SESSION['afficher_popup'] = false;
        }
        ?>
    });

    function afficherPopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "block";

        setTimeout(function () {
            popup.style.display = "none";
        }, 3000); // La popup disparaîtra automatiquement après 3 secondes (3000 millisecondes)

    }
</script>


</body>
</html>