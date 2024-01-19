<?php
    include '../Model/ConnexionBDD.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $conn = Conn::getInstance();

    $req = 'SELECT etudiant.nom as em,  prenom, ine, entreprise.nom as etm, offre.nom from recrute left join etudiant using(idetudiant) left join entreprise using(identreprise) left join poste using(identreprise) left join offre using(idoffre);';
    $req2 = $conn->prepare($req);
    $req2->execute();
    $res = $req2->fetchall(PDO::FETCH_ASSOC);

    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réponse des entreprises</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, rgba(0, 110, 135, 1), rgba(0, 140, 173, 0.75), rgba(0, 150, 186, 0.51), rgba(0, 163, 227, 0.19));
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh; /* Utilisation de la hauteur de la fenêtre pour centrer verticalement */
        }

        .body-container{
            width: 880px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 15px;
            position: absolute;
            top: calc(20% + 30px);
            left: 835px;
            margin-left: -450px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        /* Style pour le titre */
        h1 {
            text-align: center;
        }

        /* Style pour le tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Style pour les cellules du tableau */
        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        /* Style pour l'en-tête du tableau */
        th {
            background-color: rgba(0, 140, 173, 0.75);
            color: black;
        }

        tr {
            background-color: rgba(0, 150, 186, 0.51);
        }

        /* Style pour les lignes impaires du tableau */
        tr:nth-child(odd) {
            background-color: rgba(0, 163, 227, 0.19);
        }

        .btnRetour{

            text-decoration: none;
            position: absolute;
            top: 5%;
            left: 5%;
            transform: translate(-50%, -50%);
            background-color: #808080; /* Fond transparent */
            border: none; /* Supprimer le contour */
            font-family: Arial, sans-serif; /* Changer la police d'écriture en Arial */
            font-size: 16px; /* Taille de la police */
            color: white;
            cursor: pointer;
            padding: 10px;
            width: 110px;
            height: 45px;
            border-radius: 45px;
            transition: box-shadow 0.3s ease;
            font-weight: bold;
            z-index: 999;

        }

        .btnRetour:hover{

            text-decoration: none;
            position: absolute;
            top: 5%;
            left: 5%;
            transform: translate(-50%, -50%);
            background-color: #808080; /* Fond transparent */
            border: none; /* Supprimer le contour */
            font-family: Arial, sans-serif; /* Changer la police d'écriture en Arial */
            font-size: 16px; /* Taille de la police */
            color: black;
            cursor: pointer;
            border-radius: 45px;
            box-shadow: 0 0 10px #333333;
            transition: box-shadow 0.3s ease;
            font-weight: bold;
            z-index: 999;

        }
    </style>
</head>
<body>
<button onclick="retourPage()" class="btnRetour">Retour</button>


<script>
    function retourPage() {
        window.history.back();
    }
</script>
<div class="body-container">
<h1>Acceptation des entreprises</h1>
<div class="result-container">
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>INE</th>
            <th>Entreprise</th>
            <th>Offre</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($res as $row) {
            echo "<tr>";
            echo "<td>{$row['em']}</td>";
            echo "<td>{$row['prenom']}</td>";
            echo "<td>{$row['ine']}</td>";
            echo "<td>{$row['etm']}</td>";
            echo "<td>{$row['nom']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
