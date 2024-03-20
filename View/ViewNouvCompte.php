<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Principale</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/nouCompteEtu.css">
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">

</head>
<body class="body">

<button onclick="retourPage()" class="btnRetour">Retour</button>


<script>
    function retourPage() {
        window.history.back();
    }
</script>

<header class="header">

    <div class="princi-rectangle">

        <form action="../Controller/ControllerInscriptionEtu.php" method="post">
            <div class="nom-rectangle">

                <input type="text" name="nom" class="input-nom" placeholder="NOM">

            </div>

            <div class="prenom-rectangle">


                <input type="text" name="prenom" class="input-prenom" placeholder="Prenom">

            </div>

            <div class="formation-rectangle">

                <label for="formation-select"></label>
                <select id="formation-select" name="formation">
                    <option value="GEII">GEII</option>
                    <option value="GIM">GIM</option>
                    <option value="GMP">GMP</option>
                    <option value="GEA">GEA</option>
                    <option value="TCV">TCV</option>
                    <option value="QLIQ">QLIQ</option>
                    <option value="TCc">TCc</option>
                    <option value="INFO">INFO</option>
                    <option value="Mph">Mph</option>
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

                <input type="text" name="cp" class="input-cp" placeholder="Code Postal">
            </div>

            <div class="date-rectangle">
                <input type="date" name="date" class="input-date" placeholder="Date de naissance">
            </div>

            <div class="anneeetude-rectangle">

                <input type="number" name="anneeetude" class="input-anneeetude" placeholder="Année d'étude">
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
    <a href="ViewConnexion.html" class="lien"><p class="lien-info">Connexion</p></a>





</header>



</body>




</html>