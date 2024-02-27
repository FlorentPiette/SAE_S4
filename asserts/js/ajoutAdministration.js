function validateForm() {
    document.getElementById("form-adm").addEventListener("submit", function(event) {
            event.preventDefault();})
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var formation = document.getElementById('formation-select').value;
    var email = document.getElementById('email').value;
    var mdp = document.getElementById('mdp').value;

    var erreur = true;


    if (nom.trim() === '') {
        document.getElementById('nom-error').innerHTML = 'Veuillez saisir votre nom.';
        erreur = false;
    } else if (/[^a-zA-ZÀ-ÿ\s'-]/.test(nom)) {
        document.getElementById('nom-error').innerHTML = 'Le nom ne doit contenir que des lettres, des espaces, des apostrophes et des accents.';
        erreur = false;
    } else {
        document.getElementById('nom-error').innerHTML = '';
    }

    if (prenom.trim() === '') {
        document.getElementById('prenom-error').innerHTML = 'Veuillez saisir votre prénom.';
        erreur = false;
    } else if (/[^a-zA-ZÀ-ÿ\s'-]/.test(prenom)) {
        document.getElementById('prenom-error').innerHTML = 'Le prénom ne doit contenir que des lettres, des espaces, des apostrophes et des accents.';
        erreur = false;
    } else {
        document.getElementById('prenom-error').innerHTML = '';
    }

    if (formation === '') {
        document.getElementById('formation-error').innerHTML = 'Veuillez sélectionner votre formation.';
        erreur = false;
    } else {
        document.getElementById('formation-error').innerHTML = '';
    }
    if (email.trim() === '') {
        document.getElementById('email-error').innerHTML = 'Veuillez saisir votre email.';
        erreur = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById('email-error').innerHTML = 'Veuillez saisir une adresse email valide.';
        erreur = false;
    } else {
        document.getElementById('email-error').innerHTML = '';
    }

    if (mdp.trim() === '') {
        document.getElementById('mdp-error').innerHTML = 'Veuillez saisir votre mot de passe.';
        erreur = false;
    } else {
        document.getElementById('mdp-error').innerHTML = '';
    }
    return erreur;
}


document.getElementById("form-adm").addEventListener("submit", function(event) {
    if (!validateForm()) {
        event.preventDefault();
    }
    else{
        document.getElementById("form-adm").submit();
    }
})