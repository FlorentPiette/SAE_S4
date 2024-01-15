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

});

// Fonction pour charger les étudiants via AJAX
function loadStudents() {
    $.ajax({
        url: '../../Model/ModelAfficherEtuMain.php',
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
        url: '../../Model/ModelAffichageOffreMain.php',
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
        url: '../../Model/ModelAfficherEntrepriseMain.php',
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



function redirectWithAjax(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'html',
        success: function () {
            // Redirection après le succès de la requête AJAX
            window.location.replace(url);
        },
        error: function (error) {
            console.error('Erreur AJAX :', error);
            // Gérer les erreurs si nécessaire
        }
    });
}


    document.addEventListener("DOMContentLoaded", function () {
    // Ajoutez un écouteur d'événements au bouton "Afficher Plus" des offres
    document.getElementById('afficherOffres').addEventListener('click', function () {
        var urlOffres = 'ViewAfficherPlusOffre.php';
        redirectWithAjax(urlOffres);
    });

    document.getElementById('afficherEtudiants').addEventListener('click', function () {
        var urlOffres = 'ViewAfficherPlusEtu.php';
        redirectWithAjax(urlOffres);
    });

    document.getElementById('afficherEntreprises').addEventListener('click', function () {
        var urlOffres = 'ViewAfficherPlusEntreprise.php';
        redirectWithAjax(urlOffres);
        });

    document.getElementById('redirigerVersAjoutEntreprise').addEventListener('click', function () {
        var urlOffres = 'ViewAjoutEntreprise.php';
        redirectWithAjax(urlOffres);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var photo = document.getElementById("photo");
    var dropdown = document.getElementById("account-dropdown");

    photo.addEventListener("click", function (event) {
        event.stopPropagation(); // Empêche la propagation du clic à d'autres éléments parents
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    });

    // Ajout d'un écouteur d'événements sur le document pour fermer le menu s'il est ouvert et que l'on clique en dehors
    document.addEventListener("click", function (event) {
        if (dropdown.style.display === "block" && !event.target.closest('#account-photo')) {
            dropdown.style.display = "none";
        }
    });
});



