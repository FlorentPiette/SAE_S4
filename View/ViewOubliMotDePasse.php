<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oubli Mot De Passe</title>
</head>
<body>
<form action="../Controller/ControllerReinistialiserMDP.php" method="POST">
    <ul>
        <li>
            <label for="email">Votre e-mail:</label>
            <input type="email" id="email" name="email" />
        </li>
    </ul>

    <div class="button">
        <button type="submit" id="envoieCode" name="envoieCode">Recevoir le code</button>
    </div>
</form>
</body>
</html>