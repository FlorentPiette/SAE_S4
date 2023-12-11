<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page avec Rectangle Adaptable</title>
    <style>
        /* Styles pour le tableau de données */
        #dataTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        #dataTable th, #dataTable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #dataTable th {
            background-color: #f2f2f2;
        }

        /* Styles pour le rectangle blanc */
        #rectangle-blanc {
            width: 900px;
            background-color: white;
            border-radius: 15px;
            position: relative;
            margin-top: 30px;
            overflow: hidden;
            transition: height 0.3s ease;
        }

        /* Styles pour le bouton de filtre */
        .button-filtre {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Boutons de filtre -->
<div class="button-filtre">
    <button onclick="afficherToutesDonnees()">Afficher Toutes les Données</button>
    <button onclick="afficherUnePartieDonnees()">Afficher Une Partie des Données</button>
</div>

<!-- Rectangle blanc contenant le tableau -->
<div id="rectangle-blanc">
    <table id="dataTable">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <!-- Données fictives -->
        <tr>
            <td>Nom1</td>
            <td>Prénom1</td>
            <td>email1@example.com</td>
        </tr>
        <!-- Ajoutez plus de lignes au besoin -->
        </tbody>
    </table>
</div>

<script>
    // Fonction pour afficher toutes les données dans le tableau
    function afficherToutesDonnees() {
        var rectangleBlanc = document.getElementById('rectangle-blanc');
        var dataTable = document.getElementById('dataTable');

        // Modifie la hauteur du rectangle pour qu'il s'ajuste à la hauteur du tableau
        rectangleBlanc.style.height = dataTable.offsetHeight + 'px';
    }

    // Fonction pour afficher une partie des données dans le tableau
    function afficherUnePartieDonnees() {
        var rectangleBlanc = document.getElementById('rectangle-blanc');

        // Modifie la hauteur du rectangle pour afficher seulement une partie des données
        rectangleBlanc.style.height = '150px'; // Changez cette valeur selon vos besoins
    }
</script>

</body>
</html>
