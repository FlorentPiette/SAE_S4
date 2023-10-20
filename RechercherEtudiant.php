<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="asserts/css/adminEtu.css">
</head>
<body class="body">

<header class="header">
    <div class="menu-container">
        <div class="menu-header">
            <nav>
                <form  method="post">
                    <ul class="vertical-menu">
                        <li><button type="button" onclick="window.location.href ='ViewAdminAdministration.php" name="accueil"  class="btnCreation"> Accueil </button></li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminEtu.php" name="etudiant" class="btnCreation"> Etudiant </button> </li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminEntreprise.php" name="entreprise"  class="btnCreation"> Entreprise </button></li>
                        <li><button type="button" onclick="window.location.href ='ViewAdminAdministration.php" name="adminitrsation"  class="btnCreation"> Administration </button></li>
                    </ul>
                </form>
            </nav>
        </div>

        <div class="header-content">
            <h1 class="title">Gestionnaire des apprentis</h1>
            <img src="asserts/img/logo.png" class="logo">
            <form method="post" action="../Controler/controlerBtnDeco.php">

                <input class="btnDeco" value="Déconnexion" type="submit" name="btnDeco">

            </form>
        </div>
    </div>
</header>

<div class="body-container">
    <div class="rectangle-haut">
        <div class="all-text">
            <h3 class="nbrEtu">Nombre d'étudiant</h3>
            <h3 class="nbrEnt">Nombre d'entreprise</h3>
            <h3 class="nbrOff">Nombre d'offre</h3>
            <h3 class="nbrPers">Nombre de personnel</h3>
        </div>
    </div>

    <div class="rectangle-mid">
        <form >
            <button name="btnAjoutEtu"  onclick="window.location.href ='View/ViewAjoutEtudiant.html'" class="btnAjoutEtu" type="button" >  Ajouter </button>
            <button name="btnRechercheEtu" onclick="window.location.href ='RechercherEtudiant.php'" class="btnRechercheEtu" type="button" > Recherche Etudiant </button>
        </form>

        <ul id="resultats">
        </ul>
    </div>
</div>
 <!-- java script -->
<script>
    function rechercherEtudiants() {
        var nom = document.getElementById('nom').value;
        var prenom = document.getElementById('prenom').value;
        var ine = document.getElementById('ine').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controler/ControllerRechercheEtudiant.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var resultats = JSON.parse(xhr.responseText);

                if (resultats.length > 0) {
                    var resultatsHTML = '<ul>';
                    resultats.forEach(function (etudiant) {
                        resultatsHTML += '<li>';
                        resultatsHTML += 'Nom : ' + (etudiant.nom ?? '') + '<br>';
                        resultatsHTML += 'Prénom : ' + (etudiant.prenom ?? '') + '<br>';
                        resultatsHTML += 'INE : ' + (etudiant.ine ?? '') + '<br>';
                        resultatsHTML += 'Date de Naissance : ' + (etudiant.dateDeNaissance ?? '') + '<br>';
                        resultatsHTML += 'Adresse : ' + (etudiant.adresse ?? '') + '<br>';
                        // Ajoutez d'autres champs que vous souhaitez afficher
                        resultatsHTML += '</li>';
                    });
                    resultatsHTML += '</ul>';
                    document.getElementById('resultatsRecherche').innerHTML = resultatsHTML;
                } else {
                    document.getElementById('resultatsRecherche').innerHTML = "Aucun résultat trouvé.";
                }
            }
        };

        var data = 'nom=' + nom + '&prenom=' + prenom + '&ine=' + ine;
        xhr.send(data);
    }

</script>

</body>
</html>
