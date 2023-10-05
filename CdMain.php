<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="asserts/css/Cdmain.css">
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

            <h3 class = "nbrEtu">Nombre d'étudiant</h3>

            <h3 class = "nbrEnt">Nombre d'entreprise</h3>

            <h3 class = "nbrOff">Nombre d'offre</h3>

            <h3 class = "nbrPers">Nombre de personnel</h3>

        </div>

    </div>

    <div class="rectangle-mid">


    </div>

    <div class="rectangle-bas">





    </div>


</div>



</body>
</html>
