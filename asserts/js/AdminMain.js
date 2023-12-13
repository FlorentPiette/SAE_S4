// Fonction pour ouvrir la popup
function openPopup(popupId) {
    closeAllPopups(); // Ferme toutes les popups
    var popup = document.getElementById(popupId);
    if (popup) {
        popup.style.display = 'block';
    }
}

// Fonction pour fermer toutes les popups
function closeAllPopups() {
    closePopup('popUpEtu');
    closePopup('popUpOffre');
    closePopup3('popUpPerso');
}

// Fonction pour fermer la popup
function closePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup) {
        popup.style.display = 'none';
    }
}

function closePopup2() {
    document.getElementById('popUpOffre').style.display = 'none';
}

// Fonction pour ouvrir la popup 3
function openPopup3() {
    closeAllPopups(); // Ferme toutes les popups
    document.getElementById('popUpPerso').style.display = 'block';
}

// Fonction pour fermer la popup 3
function closePopup3() {
    document.getElementById('popUpPerso').style.display = 'none';
}

// Écouteur d'événements pour le bouton d'ouverture
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('AjEtu').addEventListener('click', function () {
        openPopup('popUpEtu');
    });

    document.getElementById('AjOffre').addEventListener('click', function () {
        openPopup('popUpOffre');
    });

    document.getElementById('AjPerso').addEventListener('click', function () {
        openPopup3('popUpPerso');
    });
});

// Vous pouvez également ajouter des écouteurs pour les boutons de fermeture
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('closeEtu').addEventListener('click', function () {
        closePopup('popUpEtu');
    });

    document.getElementById('closeOffre').addEventListener('click', function () {
        closePopup('popUpOffre');
    });

    document.getElementById('closePerso').addEventListener('click', function () {
        closePopup3();
    });

});

// AdminMain.js

// Écouteur d'événements pour le chargement du document
document.addEventListener('DOMContentLoaded', function () {
    // Appel de la fonction pour afficher les étudiants lors du chargement initial
    loadStudents();

    // Appel de la fonction pour afficher les offres lors du chargement initial
    loadOffers();

    loadCompanies();

    // Écouteur d'événements pour le bouton "Afficher Plus" des étudiants
    document.getElementById('afficherEtudiants').addEventListener('click', function () {
        loadStudents();
    });

    // Écouteur d'événements pour le bouton "Afficher Plus" des offres
    document.getElementById('afficherOffres').addEventListener('click', function () {
        loadOffers();
    });

    // Écouteur d'événements pour le bouton "Afficher Plus" des entreprises
    document.getElementById('afficherEntreprises').addEventListener('click', function () {
        loadCompanies();
    });
});

// Fonction pour charger les étudiants via AJAX
function loadStudents() {
    $.ajax({
        url: '../Model/ModelAfficherTousEtu.php',
        type: 'GET',
        dataType: 'html',
        data: {
            page: 1
        },
        success: function (result) {
            // Met à jour le contenu du conteneur des étudiants
            $('#etudiants-container').html(result);
        },
        error: function (error) {
            console.error('Erreur lors du chargement des étudiants :', error);
        }
    });
}

// Fonction pour charger les offres via AJAX
function loadOffers() {
    $.ajax({
        url: '../Model/ModelAffichageOffreMain.php',
        type: 'GET',
        dataType: 'html',
        data: {
            page: 1
        },
        success: function (result) {
            // Met à jour le contenu du conteneur des offres
            $('#offres-container').html(result);
        },
        error: function (error) {
            console.error('Erreur lors du chargement des offres :', error);
        }
    });
}

// Fonction pour charger les entreprises via AJAX
function loadCompanies() {
    $.ajax({
        url: '../Model/ModelAfficherTousEntreprise.php',
        type: 'GET',
        dataType: 'html',
        data: {
            page: 1
        },
        success: function (result) {
            // Met à jour le contenu du conteneur des entreprises
            $('#entreprises-container').html(result);
        },
        error: function (error) {
            console.error('Erreur lors du chargement des entreprises :', error);
        }
    });
}



