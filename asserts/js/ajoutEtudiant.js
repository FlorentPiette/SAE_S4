
document.getElementById("ajoutEtudiant").addEventListener("click", function (event) {
    const nom = document.getElementById("nom").value;
    const prenom = document.getElementById("prenom").value;
    const email = document.getElementById("email").value;
    const mdp = document.getElementById("mdp").value;

    if (nom === "" || prenom === "" || email === "" || mdp === "") {
        event.preventDefault(); // Prevent form submission
        alert("Veuillez remplir tous les champs obligatoires.");
    }
});

function validateForm() {
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var dateDeNaissance = document.getElementById("dateDeNaissance").value;
    var adresse = document.getElementById("adresse").value;
    var ville = document.getElementById("ville").value;
    var codePostal = document.getElementById("codePostal").value;
    var ine = document.getElementById("ine").value;
    var anneeEtude = document.getElementById("anneeEtude").value;
    var formation = document.getElementById("formation").value;
    var entreprise = document.getElementById("entreprise").value;
    var mission = document.getElementById("mission").value;
    var mobile = document.getElementById("mobile").value;
    var email = document.getElementById("email").value;
    var cv = document.getElementById("cv").value;

    // Réinitialiser les messages d'erreur
    document.getElementById("nom-error").innerHTML = "";
    document.getElementById("prenom-error").innerHTML = "";
    document.getElementById("dateDeNaissance-error").innerHTML = "";
    document.getElementById("adresse-error").innerHTML = "";
    document.getElementById("ville-error").innerHTML = "";
    document.getElementById("codePostal-error").innerHTML = "";
    document.getElementById("ine-error").innerHTML = "";
    document.getElementById("anneeEtude-error").innerHTML = "";
    document.getElementById("formation-error").innerHTML = "";
    document.getElementById("entreprise-error").innerHTML = "";
    document.getElementById("mission-error").innerHTML = "";
    document.getElementById("mobile-error").innerHTML = "";
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("cv-error").innerHTML = "";

    var isValid = true;
    if (nom.trim() === "") {
        document.getElementById("nom-error").innerHTML = "Le champ Nom est obligatoire";
        isValid = false;
    }
    if (prenom.trim() === "") {
        document.getElementById("prenom-error").innerHTML = "Le champ Prénom est obligatoire";
        isValid = false;
    }
    if (dateDeNaissance.trim() === "") {
        document.getElementById("dateDeNaissance-error").innerHTML = "Le champ Date de Naissance est obligatoire";
        isValid = false;
    }
    if (adresse.trim() === "") {
        document.getElementById("adresse-error").innerHTML = "Le champ Adresse est obligatoire";
        isValid = false;
    }
    if (ville.trim() === "") {
        document.getElementById("ville-error").innerHTML = "Le champ Ville est obligatoire";
        isValid = false;
    }
    if (codePostal.trim() === "") {
        document.getElementById("codePostal-error").innerHTML = "Le champ Code Postal est obligatoire";
        isValid = false;
    }
    if (ine.trim() === "") {
        document.getElementById("ine-error").innerHTML = "Le champ INE est obligatoire";
        isValid = false;
    }
    if (anneeEtude.trim() === "") {
        document.getElementById("anneeEtude-error").innerHTML = "Le champ Année d'Etude est obligatoire";
        isValid = false;
    }
    if (formation.trim() === "") {
        document.getElementById("formation-error").innerHTML = "Le champ Formation est obligatoire";
        isValid = false;
    }
    if (entreprise.trim() === "") {
        document.getElementById("entreprise-error").innerHTML = "Le champ Entreprise est obligatoire";
        isValid = false;
    }
    if (mission.trim() === "") {
        document.getElementById("mission-error").innerHTML = "Le champ Mission est obligatoire";
        isValid = false;
    }
    if (mobile.trim() === "") {
        document.getElementById("mobile-error").innerHTML = "Le champ Mobile est obligatoire";
        isValid = false;
    }
    if (email.trim() === "") {
        document.getElementById("email-error").innerHTML = "Le champ Email est obligatoire";
        isValid = false;
    }
    if (cv.trim() === "") {
        document.getElementById("cv-error").innerHTML = "Le champ CV est obligatoire";
        isValid = false;
    }

    var regex = /^[a-zA-Z0-9\s\-']+$/; l
    if (!regex.test(nom)) {
        document.getElementById("nom-error").innerHTML = "Le champ Nom contient des caractères non autorisés.";
        isValid = false;
    }
    if (!regex.test(prenom)) {
        document.getElementById("prenom-error").innerHTML = "Le champ Prénom contient des caractères non autorisés.";
        isValid = false;
    }
    if (!regex.test(ville)) {
        document.getElementById("ville-error").innerHTML = "Le champ Ville contient des caractères non autorisés.";
        isValid = false;
    }
    if (!regex.test(formation)) {
        document.getElementById("formation-error").innerHTML = "Le champ Formation contient des caractères non autorisés.";
        isValid = false;
    }
    if (!regex.test(entreprise)) {
        document.getElementById("entreprise-error").innerHTML = "Le champ Entreprise contient des caractères non autorisés.";
        isValid = false;
    }
    if (!regex.test(mission)) {
        document.getElementById("mission-error").innerHTML = "Le champ Mission contient des caractères non autorisés.";
        isValid = false;
    }

    // Vérification du format de l'email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById("email-error").innerHTML = "Veuillez saisir une adresse email valide.";
        isValid = false;
    }

    return isValid;
}

document.getElementById("formulaireAjoutEtudiant").addEventListener("submit", function(event) {
    if (!validateForm()) {
        event.preventDefault();
    }
    else{
        document.getElementById("formulaireAjoutEtudiant").submit();
    }
})