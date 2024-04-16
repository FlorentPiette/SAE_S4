<?php
session_start();

if (!isset($_SESSION['captcha_verified']) || $_SESSION['captcha_verified'] !== true) {
    header("Location: ../View/VerificationCaptcha.php");
    exit();
}
?>
<?php require_once '../Controller/CSRF.php'?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/connexionEtu.css">
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body class="body">
    <div class="cercle">
        <img src="../assets/img/perso.png" class="perso" alt="Perso en haut du rectangle principal">
    </div>
    <div class="princi-rectangle">
        <form action="../Controller/ControllerConnexion.php" method="post" id="form" onsubmit="return ValideF()">
        <div class="id-rectangle">
                <div class="petit-rectangle">
                    <img src="../assets/img/perso2.png" class="perso2" alt="Petit perso id">
                </div>
                <label>
                    <input type="text" name="Email" id="email" placeholder="Email" class="input-mail">
                </label>
            </div>
            <p class="error"></p>
            <div class="mdp-rectangle">
                <div class="petit2-rectangle">
                    <img src="../assets/img/cadena.png" class="cadena" alt="Petit cadenas mdp">
                </div>
                <label>
                    <input type="password" name="MotDePasse" id="password" placeholder="Mot de passe" class="input-mdp">
                    <span class="error-message" id="mdp-error"></span>
                </label>
            </div>
            <a href="ViewOubliMotDePasse.php" class="link-p">
                <p class="mdp-oublie">Mot de passe oublié ?</p>
            </a>
            <input type="submit" name="valider" value="Connexion" class="btnConnexion">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>
<button name="btnRetour" onclick="window.location.href= 'ViewAvConnexion.html'" class="btnRetour"> Retour </button>
<script src="../assets/js/ValidationMdp.js"></script>
</body>
</html>
