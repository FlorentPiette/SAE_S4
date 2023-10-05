<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oubli Mot De Passe</title>
</head>
<body>
<form action="Controler/ControllerOubliMDPCode.php" method="POST">
    <ul>
        <li>
            <label for="code">Code de confirmation:</label>
            <input type="text" id="code" name="code" />
        </li>
    </ul>

    <div class="button">
        <button type="submit" id="confirmationCode" name="confirmationCode">Valider</button>
    </div>
</form>
</body>
</html>