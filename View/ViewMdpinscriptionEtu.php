<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Verification du Mail</title>
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
</head>
<body>

<form action="../Controller/ControllerMdpEtu.php" method="post" onsubmit="return ValidationMdp();">
    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
    <label for="mdp"></label><input type="password" name="mdp" id = "mdp" placeholder=" Veuillez saisir votre code">
    <label for="mdpVerif"></label><input type="password" name="mdpVerif" id = "mdpVerif" placeholder=" Veuillez saisir votre code" required>
    <span id="error_message" style="color: red;"></span>

    <input type="submit" name="Valider" >
    <br><br>
    <p>Vous avez 3 essais !</p>



</form>
<script src="../assets/js/ValidationMdp.js"> </script>

</body>
</html>