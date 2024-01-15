<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oubli Mot De Passe</title>
    <link rel="icon" href="../asserts/img/logo.png" type="image/x-icon">
</head>
<body>
<form action="../Controller/ControllerReinistialiserMDP.php" method="POST">
    <ul>
        <li>
            <label for="code">Code de confirmation:</label>
            <input type="text" id="code" name="code">
        </li>
    </ul>

    <div class="button">
        <button type="submit" id="confirmationCode" name="confirmationCode">Valider</button>
    </div>
</form>
</body>
</html>