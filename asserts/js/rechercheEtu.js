function rechercherEtudiants() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var ine = document.getElementById('ine').value;

    console.log("reussis");
    var apiUrl = '../Controler/ControllerRechercheEtudiant.php?nom=' + nom + '&prenom=' + prenom + '&ine=' + ine;

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
                            resultatsHTML += 'Adresse : ' + (etudiant.adresse || '') + '<br>';
                            resultatsHTML += 'Ville : ' + (etudiant.ville || '') + '<br>';
                            resultatsHTML += 'Code Postal : ' + (etudiant.codepostal || '') + '<br>';
                            resultatsHTML += 'Année d`étude : ' + (etudiant.anneeetude || '') + '<br>';
                            resultatsHTML += 'Type d`entreprise : ' + (etudiant.typeentreprise || '') + '<br>';
                            resultatsHTML += 'Type de mission : ' + (etudiant.typedemission || '') + '<br>';
                            resultatsHTML += 'Mobile : ' + (etudiant.mobile || '') + '<br>';
                            resultatsHTML += 'Actif : ' + (etudiant.actif || '') + '<br>';
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