function validateForm() {
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var formation = document.getElementById("formation-select").value;
    var email = document.getElementById("email").value;
    var mdp = document.getElementById("mdp").value;

    // Réinitialiser les messages d'erreur
    document.getElementById("nom-error").innerHTML = "";
    document.getElementById("prenom-error").innerHTML = "";
    document.getElementById("formation-error").innerHTML = "";
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("mdp-error").innerHTML = "";

    // Vérifier si les champs sont vides
    var isValid = true;
    if (nom.trim() === "") {
        document.getElementById("nom-error").innerHTML = "Le champ Nom est obligatoire.";
        isValid = false;
    }
    if (prenom.trim() === "") {
        document.getElementById("prenom-error").innerHTML = "Le champ Prenom est obligatoire.";
        isValid = false;
    }
    if (formation === "") {
        document.getElementById("formation-error").innerHTML = "Le champ Formation est obligatoire.";
        isValid = false;
    }
    if (email.trim() === "") {
        document.getElementById("email-error").innerHTML = "Le champ Email est obligatoire.";
        isValid = false;
    }
    if (mdp.trim() === "") {
        document.getElementById("mdp-error").innerHTML = "Le champ Mot De Passe est obligatoire.";
        isValid = false;
    }

    return isValid;
}