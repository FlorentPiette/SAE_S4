<?php
// Vérifiez si le CAPTCHA a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez la réponse du CAPTCHA envoyée par le formulaire
    $captcha_response = $_POST['g-recaptcha-response'];

    // Vérifiez la réponse du CAPTCHA
    $secret_key = "VOTRE_CLE_SECRETE";
    $verify_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret_key}&response={$captcha_response}");
    $response_data = json_decode($verify_response);

    // Vérifiez si la réponse du CAPTCHA est valide
    if ($response_data->success) {
        // CAPTCHA réussi, continuez avec le processus de connexion
        header("../View/View/ViewConnexion.html");
    } else {
        // CAPTCHA échoué, affichez un message d'erreur ou redirigez l'utilisateur
        echo "Veuillez vérifier que vous n'êtes pas un robot.";
    }
}

