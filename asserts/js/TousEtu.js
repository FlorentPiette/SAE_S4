function etu() {
    $.ajax({
        url: '../Model/ModelAfficherPlusEtu.php',
        type: 'GET',
        dataType: 'html',
        data: {
            page: 1
        },
        success: function (result) {
            // Met à jour le contenu du conteneur des entreprises
            $('#etudiants-container').html(result);

        },
        error: function (error) {
            console.error('Erreur lors du chargement des entreprises :', error);
        }
    });
}


document.addEventListener('DOMContentLoaded', function () {
    etu(); // Appeler la fonction pour charger les offres au chargement de la page
});

