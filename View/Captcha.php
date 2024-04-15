<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha avec Images PHP</title>
</head>
<body>
<h2>Entrez le code captcha affiché dans l'image :</h2>
<form action="../Controller/ControllerCaptcha.php" method="post">
    <img src="captcha.php" alt="Captcha"><br>
    <input type="text" name="captcha_input" placeholder="Entrez le code captcha"><br>
    <input type="submit" value="Valider">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
</form>
</body>
</html>
