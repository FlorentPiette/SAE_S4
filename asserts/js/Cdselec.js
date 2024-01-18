document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour effectuer une requête AJAX et afficher les étudiants
    function afficherEtudiants() {
        var xhr = new XMLHttpRequest();
        var urlParams = new URLSearchParams(window.location.search);
        var nom = urlParams.get('nomOffre');
        xhr.open('POST', '../MCtest.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                try {
                    var data = JSON.parse(xhr.responseText);

                    if (data.error) {
                        console.error('Erreur serveur : ' + data.error);
                    } else {
                        afficherListeEtudiants(data);
                    }
                } catch (e) {
                    console.error("Erreur d'analyse JSON : " + e);
                }
            } else {
                console.error('Erreur de la requête : ' + xhr.status);
            }
        };

        xhr.send('nom=' + encodeURIComponent(nom));
    }

    function afficherListeEtudiants(etudiants) {
        var container = document.getElementById('result');
        if (etudiants.length > 0) {
            var html = '<ul>';
            etudiants.forEach(function(etudiant) {
                html += '<li>';
                html += '<input type="checkbox" name="selectedStudents[]" value="' + etudiant.idetudiant + '">';
                html += ' ' + etudiant.nom + ' ' + etudiant.prenom;
                html += '</li>';
            });

            html += '</ul>';
            container.innerHTML = html;
        } else {
            container.innerHTML = 'Aucun étudiant trouvé.';
        }
    }



    afficherEtudiants();
});

