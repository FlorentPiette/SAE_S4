function rechercherEntreprises() {
    var nom = document.getElementById('nomEntreprise').value;
    var ville = document.getElementById('ville').value;
    var codepostal = document.getElementById("codepostal").value;
    var secteurActivite = document.getElementById('secteurActivite').value;

    console.log("reussis");
    var apiUrl = '../Controller/ControllerRechercherEntreprise.php?' +
        'nom=' + nom +
        '&ville=' + ville +
        '&codepostal=' + codepostal +
        '&secteurActivite=' + secteurActivite;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', apiUrl, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log("Réponse du serveur : " + xhr.responseText);
                try {
                    var resultats = JSON.parse(xhr.responseText);

                    if (resultats.length > 0) {
                        var resultatsHTML = '<ul>';
                        resultats.forEach(function (entreprise) {
                            resultatsHTML += '<li class="entreprise">';
                            resultatsHTML += 'Nom : ' + (entreprise.nom || '') + '<br>';
                            resultatsHTML += 'Ville : ' + (entreprise.ville || '') + '<br>';
                            resultatsHTML += 'Code Postal : ' + (entreprise.codepostal || '') + '<br>';
                            resultatsHTML += 'Secteur d activité : ' + (entreprise.secteurActivite || '') + '<br>';
                            resultatsHTML += '</li>';
                        });
                        resultatsHTML += '</ul>';
                        document.getElementById('resultatsEntreprise').innerHTML = resultatsHTML;
                    } else {
                        document.getElementById('resultatsEntreprise').innerHTML = "Aucun résultat trouvé.";
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

function afficherChamps() {
    if (document.getElementById("nomEntrepriseCheckbox").checked) {
        document.getElementById("nomEntrepriseDiv").style.display = "block";
    } else {
        document.getElementById("nomEntrepriseDiv").style.display = "none";
    }

    if (document.getElementById("domaineCheckbox").checked) {
        document.getElementById("domaineDiv").style.display = "block";
    } else {
        document.getElementById("domaineDiv").style.display = "none";
    }

    if (document.getElementById("missionCheckbox").checked) {
        document.getElementById("missionDiv").style.display = "block";
    } else {
        document.getElementById("missionDiv").style.display = "none";
    }

    if (document.getElementById("nbEtudiantCheckbox").checked) {
        document.getElementById("nbEtudiantDiv").style.display = "block";
    } else {
        document.getElementById("nbEtudiantDiv").style.display = "none";
    }
}

document.getElementById("nomEntrepriseCheckbox").addEventListener("change", afficherChamps);
document.getElementById("domaineCheckbox").addEventListener("change", afficherChamps);
document.getElementById("missionCheckbox").addEventListener("change", afficherChamps);
document.getElementById("nbEtudiantCheckbox").addEventListener("change", afficherChamps);

afficherChamps();