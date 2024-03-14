function ValidationMdp() {
    var mdp = document.getElementById('password').value;
    var mdpConfirm = document.getElementById('passwordVerif').value;
    var errorElement = document.getElementById('mdp_error');

    if (mdp !== mdpConfirm) {
        errorElement.textContent = "Les mots de passe ne correspondent pas.";
        return false;
    } else {
        errorElement.textContent = "";
        return true;
    }
}

function validateEmail() {
    const emailInput = document.querySelector('.input-mail');
    const emailError = document.getElementById('email-error');
    const email = emailInput.value.trim();

    if (email === '') {
        emailError.textContent = 'Veuillez saisir votre adresse email.';
        emailError.style.color = 'red';
        return false;
    } else if (!isValidEmail(email)) {
        emailError.textContent = 'Veuillez saisir une adresse email valide.';
        emailError.style.color = 'red';
        return false;
    } else {
        emailError.textContent = '';
        return true;
    }
}

function validatePassword() {
    const passwordInput = document.querySelector('.input-mdp');
    const passwordError = document.getElementById('password-error');
    const password = passwordInput.value.trim();

    if (password === '') {
        passwordError.textContent = 'Veuillez saisir votre mot de passe.';
        passwordError.style.color = 'red';
        return false;
    } else if (password.length < 8) { // Par exemple, vérification de la longueur minimale
        passwordError.textContent = 'Le mot de passe doit contenir au moins 8 caractères.';
        passwordError.style.color = 'red';
        return false;
    } else {
        passwordError.textContent = '';
        return true;
    }
}

function isValidEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

const emailInput = document.querySelector('.input-mail');
emailInput.addEventListener('input', validateEmail);

const passwordInput = document.querySelector('.input-mdp');
passwordInput.addEventListener('input', validatePassword);


function ValideF() {
    const emailValid = validateEmail(); // Vérifie la validité de l'email
    const passwordValid = validatePassword(); // Vérifie la validité du mot de passe

    // Récupère les valeurs des champs email et mot de passe
    const emailValue = emailInput.value.trim();
    const passwordValue = passwordInput.value.trim();

    // Vérifie si les champs email et mot de passe sont vides
    if (emailValue === '' || passwordValue === '') {
        // Affiche un message d'erreur et empêche la soumission du formulaire
        alert("Veuillez remplir tous les champs.");
        return false;
    }

    // Vérifie si les champs email et mot de passe sont valides
    if (emailValid && passwordValid) {
        // Si les champs sont valides, autorise la soumission du formulaire
        return true;
    } else {
        // Sinon, empêche la soumission du formulaire
        return false;
    }
}

