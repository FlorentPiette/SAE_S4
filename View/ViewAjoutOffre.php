<?php
include '../Controller/ControllerVerificationDroit.php';
?>
<!DOCTYPE html>
<html lang="fr">

<body>
<form action="../Controller/ControllerAjouOffre.php" method="post" id="formulaire">

    <p>
        Nom de l'offre :
    </p>
    <input type="text" name="Nom" id="offre">

    <p>
        Domaine de l'offre :
    </p>
    <input type="text" name="Domaine" id="domaine">

    <p>
        Mission :
    </p>
    <input type="text" name="Mission" id="mission">

    <p>
        Nombre d'étudiant :
    </p>
    <input type="text" name="NbEtudiant" id="nbetudiant"><br>
    <p id="message"></p>

    <input type="checkbox" name="Visible" id="visible">
    <label>
        Voulez-vous rendre l'offre visible ?
    </label><br>

    <input type="submit" value="Ajouter l'offre" id="ajouteroffre" name="Ajouteroffre">

</form>

<script>
    var formulaire = document.getElementById("formulaire");
    var message = document.getElementById("message");

    formulaire.addEventListener("submit", function (event) {
        var offre = document.getElementById("offre").value;
        var domaine = document.getElementById("domaine").value;
        var mission = document.getElementById("mission").value;
        var nbetudiant = document.getElementById("nbetudiant").value;

        if (isNaN(nbetudiant)) {
            event.preventDefault(); // Empêche l'envoi du formulaire
            message.innerText = "Erreur, le nombre d'étudiant doit être un nombre valide.";
        }


        if (offre === "" || domaine === "" || mission === "" || nbetudiant === "") {
            event.preventDefault(); // Empêche l'envoi du formulaire
            message.innerText = "Erreur, veuillez remplir tous les champs de saisie.";


        }
    })
</script>
</body>
</html>
