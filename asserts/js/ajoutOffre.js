function validateForm() {
    var offre = document.getElementById("offre").value;
    var domaine = document.getElementById("domaine").value;
    var mission = document.getElementById("mission").value;
    var nbetudiant = document.getElementById("nbetudiant").value;
    var entreprise = document.getElementById("entreprise").value;
    var parcours = document.getElementById("parcours").value;

    // Réinitialiser les messages d'erreur
    document.getElementById("offre-error").innerHTML = "";
    document.getElementById("domaine-error").innerHTML = "";
    document.getElementById("mission-error").innerHTML = "";
    document.getElementById("nbetudiant-error").innerHTML = "";
    document.getElementById("entreprise-error").innerHTML = "";
    document.getElementById("parcours-error").innerHTML = "";

    // Vérifier si les champs sont vides
    var isValid = true;
    if (offre.trim() === "") {
        document.getElementById("offre-error").innerHTML = "Le champ Offre est obligatoire";
        isValid = false;
    }
    if (domaine.trim() === "") {
        document.getElementById("domaine-error").innerHTML = "Le champ Domaine est obligatoire";
        isValid = false;
    }
    if (mission.trim() === "") {
        document.getElementById("mission-error").innerHTML = "Le champ Mission est obligatoire";
        isValid = false;
    }
    if (nbetudiant.trim() === "") {
        document.getElementById("nbetudiant-error").innerHTML = "Le champ Nombre d'étudiants est obligatoire";
        isValid = false;
    }
    if (entreprise.trim() === "") {
        document.getElementById("entreprise-error").innerHTML = "Le champ Entreprise est obligatoire";
        isValid = false;
    }
    if (parcours.trim() === "") {
        document.getElementById("parcours-error").innerHTML = "Le champ Parcours est obligatoire";
        isValid = false;
    }

    return isValid;
}
