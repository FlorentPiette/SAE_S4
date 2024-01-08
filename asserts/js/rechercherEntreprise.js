/**
 * Rechercher des entreprises
 *
 * @author Emeline
 *
 * @return void
 */

function rechercherEntreprises() {

    //Ces variables récuperent les éléments de recherche

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
                            resultatsHTML += 'Secteur d activité : ' + (entreprise.secteuractivite || '') + '<br>';
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


/**
 * Affiche les zones de texte ou les checkbox lorsque la catégorie est cochée
 *
 * @author Emeline
 *
 * @return void
 */
function afficherChamps() {
    if (document.getElementById("nomEntrepriseCheckbox").checked) {
        document.getElementById("nomEntrepriseDiv").style.display = "inline-block";
    } else {
        document.getElementById("nomEntrepriseDiv").style.display = "none";
    }

    if (document.getElementById("villeCheckbox").checked) {
        document.getElementById("villeDiv").style.display = "inline-block";
    } else {
        document.getElementById("villeDiv").style.display = "none";
    }

    if (document.getElementById("codepostalCheckbox").checked) {
        document.getElementById("codepostalDiv").style.display = "inline-block";
    } else {
        document.getElementById("codepostalDiv").style.display = "none";
    }

    if (document.getElementById("secteurActiviteCheckbox").checked) {
        document.getElementById("secteurActiviteDiv").style.display = "inline-block";
    } else {
        document.getElementById("secteurActiviteDiv").style.display = "none";
    }
}

document.getElementById("nomEntrepriseCheckbox").addEventListener("change", afficherChamps);
document.getElementById("villeCheckbox").addEventListener("change", afficherChamps);
document.getElementById("codepostalCheckbox").addEventListener("change", afficherChamps);
document.getElementById("secteurActiviteCheckbox").addEventListener("change", afficherChamps);

afficherChamps();