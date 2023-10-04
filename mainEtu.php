<?php ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Principale</title>

    <link rel="stylesheet" type="text/css" href="asserts/css/main.css" />
</head>
<body class="body">

<header class="header">

</header>

<div class="message">
    <h1>Bienvenue dans notre<br> gestionnaire des candidats<br> en alternance</h1>
</div>

<form class="formulaire" action="Controler/validationConnection.php" method="post">

    <input type="submit" name="connectionEtu" value="Se connecter">
</form>

<form class="formulaire" action="Controler/validationConnection.php" method="post">

    <input type="submit" name="creationEtu" value="Créer un compte">

</form>


</body>




</html>
