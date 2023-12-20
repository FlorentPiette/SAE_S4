<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix</title>

    <link rel="stylesheet" type="text/css" href="/asserts/css/choix.css" />
</head>
<body class="body">

    <header class="header">

        <h1 class="title"> Je suis</h1>

    </header>


    <div class="choix">

        <div class="rec-etudiant">
            <form class="formulaireEtu"  method="post">

                <button type="button" onclick="window.location.href = 'View/ViewAvConnexion.html'" name="choixEtudiant" class="btnEtu"> Etudiant </button>
            </form>
        </div>

        <div class="rec-administration">
            <form class="formulaireAdmin"  method="post">

                <button type="button" onclick="window.location.href = 'View/ViewConnexion.html'" name="choixAdmin" class="btnAdmin"> Admin </button>
            </form>
        </div>

    </div>

    <button class="btnFermer" id="btnFermer">Quitter</button>


</body>

</html>