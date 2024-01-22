<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oubli Mot De Passe</title>
    <link rel="stylesheet" type="text/css" href="../asserts/css/OubliMDP.css">
    <link rel="icon" href="../asserts/img/logo.png" type="image/x-icon">
</head>
<body>
<form action="../Controller/ControllerReinistialiserMDP.php" method="POST">
    <ul>
        <li>
            <label for="email">Votre e-mail:</label>
            <input type="email" id="email" name="email">
        </li>
    </ul>

    <div class="button">
        <button type="submit" id="envoieCode" name="envoieCode">Recevoir le code</button>
    </div>
</form>
</body>
</html>