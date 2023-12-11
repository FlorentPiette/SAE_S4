<?php
//include '../Controller/ControllerVerificationDroit.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/adminEntreprise.css">

    <script src="../asserts/js/AdminEntreprise.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .menu-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333; /* You can change the background color */
            padding: 10px;
        }

        .menu-header ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu-header li {
            margin-right: 15px;
        }

        .header-content {
            display: flex;
            align-items: center;
        }

        .header-content h1 {
            margin-right: auto; /* Push the logo to the right */
            color: white; /* You can change the text color */
        }

        .logo {
            max-height: 50px; /* Set the max height of the logo */
        }

        .body-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px; /* Add margin to separate the menu from the content */
        }

        /* Add other styles as needed */
    </style>
</head>

<body class="body">

<header class="header">

    <div class="menu-container">
        <div class="menu-header">
            <nav>
                <ul class="horizontal-menu">
                    <li><button type="button" onclick="window.location.href ='ViewAdminMain.html'" name="accueil" class="btnCreation"> Acceuil </button></li>
                    <li><button type="button" onclick="window.location.href ='ViewAdminEtu.php'" name="etudiant" class="btnCreation"> Etudiant </button></li>
                    <li><button type="button" onclick="window.location.href ='ViewAdminEntreprise.php'" name="entreprise" class="btnCreation"> Entreprise </button> </li>
                    <li><button type="button" onclick="window.location.href ='ViewAdminAdministration.php'" name="adminitrsation" class="btnCreation"> Administration </button> </li>
                    <li> <button type="submit" name="deco" class="btnCreation"> Déconnexion </button> </li>
                </ul>
            </nav>
        </div>

        <div class="header-content">
            <div class="header-content">
                <h1 class="title">Gestionnaire des apprentis</h1>
                <img src="../asserts/img/logo.png" class="logo">
            </div>
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
            <button name="btnAjoutOffre" onclick="window.location.href ='ViewAjoutOffre.php'" class="btnAjoutOffre" type="button">Ajouter une offre</button>
        </form>

        <form method="post" action="">
            <input type="button" value="Afficher les Offres" name="btnAfficherOffre" class="btnAfficherOffre" onclick="afficherOffres()">
            <input type="button" value="Afficher les Entreprises" name="btnAfficherEntreprise" class="btnAfficherEntreprise" onclick="afficherEntreprises()">
        </form>

        <!-- Affichez les données des offres par défaut -->
        <ul id="donneesOffre" class="offres-container">
            <form id="rechercheOffre">
                <label for="nomCheckbox">
                    <input type="checkbox" id="nomCheckbox"> Nom
                </label>
                <label for="domaineCheckbox">
                    <input type="checkbox" id="domaineCheckbox"> Domaine
                </label>
                <label for="missionCheckbox">
                    <input type="checkbox" id="missionCheckbox"> Missions
                </label>
                <label for="nbEtudiantCheckbox">
                    <input type="checkbox" id="nbEtudiantCheckbox"> Nombre d'étudiants recherché
                </label>



                <div id="nomDiv" style="display: none">
                    <input type="text" name="nom" id="nom" placeholder="Nom">
                </div>
                <div id="domaineDiv" style="display: none">
                    <input type="text" name="domaine" id="domaine" placeholder="Domaine">
                </div>
                <div id="missionDiv" style="display: none">
                    <input type="text" name="mission" id="mission" placeholder="Missions">
                </div>
                <div id="nbEtudiantDiv" style="display: none">
                    <input type="number" name="nbEtudiant" id="nbEtudiant" placeholder="Nombre d'étudiants">
                </div>

                <input type="button" value="Rechercher une offre" onclick="rechercherOffres()">
            </form>

            <ul id="resultatsOffre" class="result">
            </ul>

            <script>
                /**
                 * Rechercher des offres
                 *
                 * @author Emeline
                 *
                 * @return void
                 */

                function rechercherOffres() {
                    // Ces variables récupèrent les éléments de recherche
                    var nom = document.getElementById('nom').value;
                    var domaine = document.getElementById('domaine').value;
                    var mission = document.getElementById("mission").value;
                    var nbEtudiant = document.getElementById('nbEtudiant').value;

                    console.log("reussis");

                    var apiUrl = '../Controller/ControllerRechercherOffre.php?' +
                        'nom=' + nom +
                        '&domaine=' + domaine +
                        '&mission=' + mission +
                        '&nbEtudiant=' + (nbEtudiant !== '' ? parseInt(nbEtudiant) : '');

                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', apiUrl, true);

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                console.log("Réponse du serveur : " + xhr.responseText);
                                try {
                                    var resultats = JSON.parse(xhr.responseText);

                                    if (resultats.length > 0) {
                                        var resultatsHTML = '<form id="ajoutEtudiantForm" action="../Controller/ControllerAjoutEtudiantOffre.php" method="post"><ul>';

                                        resultats.forEach(function (offre) {
                                            resultatsHTML += '<li class="offre">';
                                            resultatsHTML += 'Nom : ' + (offre.nom || '') + '<br>';
                                            resultatsHTML += 'Domaine : ' + (offre.domaine || '') + '<br>';
                                            resultatsHTML += 'Missions : ' + (offre.mission || '') + '<br>';
                                            resultatsHTML += 'Nombre d\'étudiants recherchés : ' + (offre.nbetudiant || '') + '<br>';

                                            resultatsHTML += '<input type="submit" name="BtAjoutEtudiant" value="Ajouter un étudiant à cette offre">' + '<br>';
                                            resultatsHTML += '<input type="hidden" name="nomOffre_' + offre.idoffre + '" value="' + offre.nom + '">';

                                            if (offre.offreEtudiants && offre.offreEtudiants.length > 0) {
                                                resultatsHTML += '<label> Les étudiants qui ont déjà postulés :</label><br>';
                                                offre.offreEtudiants.forEach(function (etudiant) {
                                                    resultatsHTML += etudiant.nom + ' ' + etudiant.prenom + '<br>';
                                                });
                                            } else {
                                                resultatsHTML += '<label>Aucun étudiant n\'a encore postulé à cette offre.</label>';
                                            }

                                            resultatsHTML += '</li>';
                                        });

                                        // Single hidden input for the selected offer
                                        resultatsHTML += '<input type="hidden" id="selectedOffer" name="selectedOffer" value="">';

                                        resultatsHTML += '</ul></form>';

                                        document.getElementById('resultatsOffre').innerHTML = resultatsHTML;

                                        // Add event listener to dynamically update the hidden input value
                                        document.getElementById('ajoutEtudiantForm').addEventListener('submit', function () {
                                            var selectedOffer = document.querySelector('input[name="BtAjoutEtudiant"]:checked');
                                            if (selectedOffer) {
                                                document.getElementById('selectedOffer').value = selectedOffer.previousSibling.value;
                                            }
                                        });
                                    } else {
                                        document.getElementById('resultatsOffre').innerHTML = "Aucun résultat trouvé.";
                                    }
                                } catch (e) {
                                    console.error("Erreur d'analyse JSON : " + e);
                                }
                            } else {
                                console.error("Erreur de la requête : " + xhr.status);
                            }
                        }
                    };

                    xhr.send();

                }


                /**
                 * Affiche les zones de texte ou les checkbox lorsque la catégorie est cochée
                 *
                 * @author Emeline
                 *
                 * @return void
                 */
                function afficherChamps() {
                    if (document.getElementById("nomCheckbox").checked) {
                        document.getElementById("nomDiv").style.display = "block";
                    } else {
                        document.getElementById("nomDiv").style.display = "none";
                    }

                    if (document.getElementById("domaineCheckbox").checked) {
                        document.getElementById("domaineDiv").style.display = "block";
                    } else {
                        document.getElementById("domaineDiv").style.display = "none";
                    }

                    if (document.getElementById("missionCheckbox").checked) {
                        document.getElementById("missionDiv").style.display = "block";
                    } else {
                        document.getElementById("missionDiv").style.display = "none";
                    }

                    if (document.getElementById("nbEtudiantCheckbox").checked) {
                        document.getElementById("nbEtudiantDiv").style.display = "block";
                    } else {
                        document.getElementById("nbEtudiantDiv").style.display = "none";
                    }
                }

                document.getElementById("nomCheckbox").addEventListener("change", afficherChamps);
                document.getElementById("domaineCheckbox").addEventListener("change", afficherChamps);
                document.getElementById("missionCheckbox").addEventListener("change", afficherChamps);
                document.getElementById("nbEtudiantCheckbox").addEventListener("change", afficherChamps);

                afficherChamps();
            </script>




            <ul id="donneesEntreprise" style="display: none;" class="affichEntreprise">
                <form id="rechercheEntreprise">
                    <label for="nomEntrepriseCheckbox">
                        <input type="checkbox" id="nomEntrepriseCheckbox"> Nom
                    </label>
                    <label for="villeCheckbox">
                        <input type="checkbox" id="villeCheckbox"> Ville
                    </label>
                    <label for="codepostalCheckbox">
                        <input type="checkbox" id="codepostalCheckbox"> Code Postal
                    </label>
                    <label for="secteurActiviteCheckbox">
                        <input type="checkbox" id="secteurActiviteCheckbox"> Secteur d'activité
                    </label>



                    <div id="nomEntrepriseDiv" style="display: none">
                        <input type="text" name="nomEntreprise" id="nomEntreprise" placeholder="Nom">
                    </div>
                    <div id="villeDiv" style="display: none">
                        <input type="text" name="ville" id="ville" placeholder="Ville">
                    </div>
                    <div id="codepostalDiv" style="display: none">
                        <input type="text" name="codepostal" id="codepostal" placeholder="Code Postal">
                    </div>
                    <div id="secteurActiviteDiv" style="display: none">
                        <input type="text" name="secteurActivite" id="secteurActivite" placeholder="Secteur d'activité">
                    </div>

                    <input type="button" value="Rechercher une entreprise" onclick="rechercherEntreprises()">
                </form>

                <ul id="resultatsEntreprise" class="result">
                </ul>

                <script src="../asserts/js/rechercherEntreprise.js"></script>

                <?php
                include '../Model/ConnexionBDD.php';
                $db = Conn::getInstance();

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



    </div>
</div>


</body>
</html>