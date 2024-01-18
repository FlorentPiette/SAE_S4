function validateForm() {
    var nom = document.getElementById("nom").value;
    var adresse = document.getElementById("adresse").value;
    var ville = document.getElementById("ville").value;
    var codePostal = document.getElementById("codePostal").value;
    var num = document.getElementById("num").value;
    var email = document.getElementById("email").value;
    var secteur = document.getElementById("secteur").value;


    // Réinitialiser les messages d'erreur
    document.getElementById("nom-error").innerHTML = "";
    document.getElementById("adresse-error").innerHTML = "";
    document.getElementById("ville-error").innerHTML = "";
    document.getElementById("codePostal-error").innerHTML = "";
    document.getElementById("num-error").innerHTML = "";
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("secteur-error").innerHTML = "";

    // Vérifier si les champs sont vides
    var isValid = true;
    if (nom.trim() === "") {
        document.getElementById("nom-error").innerHTML = "Le champ Nom est obligatoire.";
        isValid = false;
    }
    if (adresse.trim() === "") {
        document.getElementById("adresse-error").innerHTML = "Le champ Adresse est obligatoire.";
        isValid = false;
    }
    if (ville.trim() === "") {
        document.getElementById("ville-error").innerHTML = "Le champ Ville est obligatoire.";
        isValid = false;
    }
    if (codePostal.trim() === "") {
        document.getElementById("codePostal-error").innerHTML = "Le champ Code Postal est obligatoire.";
        isValid = false;
    }
    if (num.trim() === "") {
        document.getElementById("num-error").innerHTML = "Le champ Numéro de Téléphone est obligatoire.";
        isValid = false;
    }
    if (email.trim() === "") {
        document.getElementById("email-error").innerHTML = "Le champ Email est obligatoire.";
        isValid = false;
    }
    if (secteur.trim() === "") {
        document.getElementById("secteur-error").innerHTML = "Le champ Secteur d'activité est obligatoire.";
        isValid = false;
    }

    return isValid;
}