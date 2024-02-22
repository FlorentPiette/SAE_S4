function ValidationMdp() {
    var mdp = document.getElementById('mdp').value;
    var mdpConfirm = document.getElementById('mdpVerif').value;
    var errorElement = document.getElementById('error_message');

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