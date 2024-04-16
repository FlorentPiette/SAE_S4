<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification de l'offre</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/OffreBrouillon.css">
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <script>
        function verifierOffre(event) {
            event.preventDefault();

            var nomOffre = document.getElementById("nomOffre").value;

            console.log("Nom d'offre envoyé : " + nomOffre);

            var formData = new FormData();
            formData.append("nomOffre", nomOffre);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Controller/ControllerOffreBrouillon.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        console.log("Réponse du serveur : " + response);

                        if (response.trim() === "valide") {
                            console.log("L'offre est valide");
                            document.getElementById("nomOffreHidden").value = nomOffre;
                            document.getElementById("formulaire2").style.display = "block";
                        } else {
                            console.log("L'offre est invalide");
                            alert("Nom d'offre incorrect.");
                        }


                    } else {
                        console.error("La requête a échoué avec le statut : " + xhr.status);
                    }
                }
            };

            xhr.send(formData);
        }

    </script>
</head>
<body>
<h1>Vérification d'offre</h1>
<form action="../Controller/ControllerOffreBrouillon.php" id="formulaire1" name="formulaire1" method="post">
    <label for="nomOffre">Nom de l'offre :</label>
    <input type="text" id="nomOffre" name="nomOffre">
    <input type="button" name="SubmitForm1" value="Vérifier" onclick="verifierOffre(event)">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
</form>

<form action="../Controller/ControllerOffreBrouillon.php" method="post" id="formulaire2" name="formulaire2">
    <h2>Formulaire pour l'offre correcte</h2>
    <label for="nomDomaine">Nom de domaine :</label>
    <input type="text" id="nomDomaine" name="Domaine"><br>
    <label for="mission">Mission :</label>
    <input type="text" id="mission" name="Mission"><br>
    <label for="nombreEtudiant">Nombre d'étudiants :</label>
    <input type="number" id="nombreEtudiant" name="NbEtudiant"><br>
    <input type="checkbox" name="Brouillon" id="brouillon">
    <label for="brouillon">Enregistrer en tant que brouillon</label><br>
    <input type="checkbox" name="Visible" id="visible">
    <label for="visible">Voulez-vous que l'offre soit visible ?</label><br>
    <input type="submit" name="SubmitForm2" value="Enregistrer l'offre">
    <input type="hidden" name="nomOffre" id="nomOffreHidden">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
</form>
</body>
</html>
