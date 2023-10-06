<?php


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix</title>

    <link rel="stylesheet" type="text/css" href="asserts/css/choix.css" />
</head>
<body class="body">

    <header class="header">

        <h1 class="title"> Je suis</h1>

    </header>


    <div class="choix">

        <div class="rec-etudiant">
            <form class="formulaireEtu" action="Controler/controlerChoix.php" method="post">

                <input type="submit" name="choixEtudiant" value="Etudiant" class="btnEtu">
            </form>
        </div>

        <div class="rec-administration">
            <form class="formulaireAdmin" action="Controler/controlerChoix.php" method="post">

                <input type="submit" name="choixAdmin" value="Administration" class="btnAdmin">
            </form>
        </div>

    </div>

    <button class="btnFermer" id="btnFermer">Quitter</button>


    <script>
        function fermerFenetre() {
            window.close();
        }


        document.getElementById("btnFermer").addEventListener("click", fermerFenetre);
    </script>


</body>




</html>