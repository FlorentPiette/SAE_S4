<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Principale</title>

    <link rel="stylesheet" type="text/css" href="../asserts/css/nouCompteEtu.css" />
</head>
<body class="body">

<header class="header">

    <div class="cercle">

        <div class="perso">

            <img src="../asserts/img/perso.png" class="perso" alt="Perso en haut du rectangle principale">


        </div>

    </div>



    <div class="princi-rectangle">

        <form action="../Controler/controllerCreation.php" method="post">
            <div class="nom-rectangle">

                <input type="text" name="nom" class="input-nom" placeholder="Nom">

            </div>

            <div class="prenom-rectangle">


                <input type="text" name="prenom" class="input-prenom" placeholder="Prenom">

            </div>

            <div class="formation-rectangle">

                <select id="formation-select" name="formation">
                    <option value="informatique">BUT informatique</option>
                    <option value="marketing">Responsable pédagogique</option>
                    <option value="finance">Chargés de développement</option>
                    <option value="finance">Responsable du service</option>
                </select>

            </div>

            <div class="mail-rectangle">

                <input type="email" name="email" class="input-mail" placeholder="Email">

            </div>

            <div class="mdp-rectangle">

                <input type="password" name="mdp" class="input-mdp" placeholder="Mot de Passe">
            </div>

            <div class="adresse-rectangle">

                <input type="text" name="adresse" class="input-adresse" placeholder="Adresse">
            </div>

            <div class="ville-rectangle">

                <input type="text" name="ville" class="input-ville" placeholder="Ville">
            </div>

            <div class="cp-rectangle">

                <input type="text" name="cp" class="input-cp" placeholder="Code Postale">
            </div>

            <div class="date-rectangle">

                <input type="date" name="date" class="input-date" placeholder="Date de naissance">
            </div>

            <div class="cv-rectangle">

                <input type="file" name="cv" class="input-cv" placeholder="CV">
            </div>

            <div class="anneeetude-rectangle">

                <input type="int" name="anneeetude" class="input-anneeetude" placeholder="Année d'étude">
            </div>

            <div class="ine-rectangle">

                <input type="text" name="ine" class="input-ine" placeholder="INE">
            </div>

            <div>

                <input type="submit" name="valider" value="Création" class="btnCreation">

            </div>




        </form>

    </div>

    <p class="info">Si vous possédez déjà un compte veuillez vous connecter en appuyant ici :</p>
    <a href="connection.html" class="lien"><p class="lien-info">Connexion</p></a>





</header>



</body>




</html>