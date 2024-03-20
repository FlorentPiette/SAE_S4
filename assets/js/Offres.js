function offres() {
    $.ajax({
        url: '../Model/ModelAffichagetousOffres.php',
        type: 'GET',
        dataType: 'html',
        data: {
            page: 1
        },
        success: function (result) {
            // Met à jour le contenu du conteneur des entreprises
            $('#offres-container').html(result);
        },
        error: function (error) {
            console.error('Erreur lors du chargement des entreprises :', error);
        }
    });
}


    document.addEventListener('DOMContentLoaded', function () {
    offres(); // Appeler la fonction pour charger les offres au chargement de la page
});

