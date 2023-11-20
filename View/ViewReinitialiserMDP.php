
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
            <label for="mdp">Nouveau mot de passe:</label>
            <input type="password" id="mdp" name="mdp">
        </li>
    </ul>

    <div class="button">
        <button type="submit" id="nouveauMDP" name="nouveauMDP">Valider</button>
    </div>
</form>
</body>
</html>