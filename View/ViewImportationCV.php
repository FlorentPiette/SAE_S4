<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../asserts/css/importationCV.css">
    <title>Formulaire d'importation de fichier PDF</title>
</head>
<body>
<button onclick="retourPage()" class="btnRetour">Retour</button>


<script>
    function retourPage() {
        window.history.back();
    }
</script>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="rectangle">
        <label for="fichier">Sélectionnez un fichier PDF à importer :</label>
        <input type="file" name="fichier" id="fichier" accept="application/pdf">
        <br>
        <input type="submit" value="Importer">
    </div>
</form>
</body>
</html>