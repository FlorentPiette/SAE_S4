function rechercherEtudiants() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var ine = document.getElementById('ine').value;
    console.log("reussis");
    var apiUrl = '../Controller/ControllerRechercheEtudiant.php?nom=' + nom + '&prenom=' + prenom + '&ine=' + ine;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', apiUrl, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log("Réponse du serveur : " + xhr.responseText); // Ajoutez cette ligne pour le débogage
                try {
                    var resultats = JSON.parse(xhr.responseText);

                    if (resultats.length > 0) {
                        var resultatsHTML = '<ul>';
                        resultats.forEach(function (etudiant) {
                            resultatsHTML += '<li>';
                            resultatsHTML += 'Nom : ' + (etudiant.nom || '') + '<br>';
                            resultatsHTML += 'Prénom : ' + (etudiant.prenom || '') + '<br>';
                            resultatsHTML += 'INE : ' + (etudiant.ine || '') + '<br>';
                            resultatsHTML += 'Formation : ' + (etudiant.formation || '') + '<br>';

                            // Ajoutez d'autres champs que vous souhaitez afficher
                            resultatsHTML += '</li>';
                        });
                        resultatsHTML += '</ul>';
                        document.getElementById('resultats').innerHTML = resultatsHTML;
                    } else {
                        document.getElementById('resultats').innerHTML = "Aucun résultat trouvé.";
                    }
                } catch (e) {
                    console.error("Erreur d'analyse JSON : " + e);
                }
            } else {
                console.error("Erreur de la requête : " + xhr.status);
            }
        }
    };

    xhr.send();
}