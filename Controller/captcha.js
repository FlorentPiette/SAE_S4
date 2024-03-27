const express = require('express');
const fetch = require('node-fetch');
const bodyParser = require('body-parser');
const app = express();

// Middleware pour parser les données POST
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Route pour la vérification du token reCAPTCHA
app.post('/verify-captcha', async (req, res) => {
    const { token } = req.body;

    // Clé secrète reCAPTCHA (votre clé secrète)
    const secretKey = '6LfQFKApAAAAAOVZl5VEpQYylKhySkf07PdeY1HF';

    try {
        // Effectuer une requête POST à l'API reCAPTCHA pour vérifier le token
        const response = await fetch('https://www.google.com/recaptcha/api/siteverify', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `secret=${secretKey}&response=${token}`
        });

        const data = await response.json();

        // Vérifier si la réponse est valide
        if (data.success) {
            res.json({ success: true, message: 'Token reCAPTCHA valide.' });
        } else {
            res.status(400).json({ success: false, message: 'Token reCAPTCHA invalide.' });
        }
    } catch (error) {
        console.error('Erreur lors de la vérification du token reCAPTCHA :', error.message);
        res.status(500).json({ success: false, message: 'Une erreur s\'est produite lors de la validation du token reCAPTCHA.' });
    }
});

// Serveur statique pour servir le fichier HTML
app.use(express.static('public'));

// Démarrer le serveur sur le port 3000
app.listen(3000, () => {
    console.log('Serveur démarré sur le port 3000');
});
