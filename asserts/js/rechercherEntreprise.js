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
        document.getElementById("nomEntrepriseDiv").style.display = "block";
    } else {
        document.getElementById("nomEntrepriseDiv").style.display = "none";
    }

    if (document.getElementById("villeCheckbox").checked) {
        document.getElementById("villeDiv").style.display = "block";
    } else {
        document.getElementById("villeDiv").style.display = "none";
    }

    if (document.getElementById("codepostalCheckbox").checked) {
        document.getElementById("codepostalDiv").style.display = "block";
    } else {
        document.getElementById("codepostalDiv").style.display = "none";
    }

    if (document.getElementById("secteurActiviteCheckbox").checked) {
        document.getElementById("secteurActiviteDiv").style.display = "block";
    } else {
        document.getElementById("secteurActiviteDiv").style.display = "none";
    }
}

document.getElementById("nomEntrepriseCheckbox").addEventListener("change", afficherChamps);
document.getElementById("villeCheckbox").addEventListener("change", afficherChamps);
document.getElementById("codepostalCheckbox").addEventListener("change", afficherChamps);
document.getElementById("secteurActiviteCheckbox").addEventListener("change", afficherChamps);

afficherChamps();

function obtenirToutesLesInformationsEntreprise(idEntreprise) {
    // Construction de l'URL de l'API pour obtenir toutes les informations de l'entreprise
    var toutesLesInfosEntrepriseUrl = '../Controller/ControllerRechercheEntreprise.php?id=' + idEntreprise;

    console.log("URL de l'API (Obtenir toutes les infos de l'entreprise):", toutesLesInfosEntrepriseUrl);

    var xhrToutesLesInfosEntreprise = new XMLHttpRequest();
    xhrToutesLesInfosEntreprise.open('GET', toutesLesInfosEntrepriseUrl, true);
    xhrToutesLesInfosEntreprise.onreadystatechange = function () {
        if (xhrToutesLesInfosEntreprise.readyState === 4) {
            if (xhrToutesLesInfosEntreprise.status === 200) {
                try {
                    var response = JSON.parse(xhrToutesLesInfosEntreprise.responseText);

                    // Utiliser les données pour afficher toutes les informations de l'entreprise
                    console.log("Informations de l'entreprise:", response);

                    // Vous pouvez utiliser ces données pour afficher les informations de l'entreprise où vous en avez besoin dans votre application
                    // Assurez-vous que les clés utilisées correspondent à celles dans votre réponse JSON

                    // Affichez les informations dans le menu burger ou faites ce que vous voulez avec les données.
                } catch (e) {
                    console.error("Erreur d'analyse JSON (Obtenir toutes les infos de l'entreprise) : " + e);
                }
            } else {
                console.error("Erreur de la requête (Obtenir toutes les infos de l'entreprise) : " + xhrToutesLesInfosEntreprise.status);
            }
        }
    };

    xhrToutesLesInfosEntreprise.send();
}


function afficherEntreprises() {
    // Supprimez les résultats précédents de la table
    var tableBody = document.getElementById('resultatsEntreprises');
    while (tableBody.firstChild) {
        tableBody.removeChild(tableBody.firstChild);
    }

    // Récupérez les résultats de la recherche des entreprises (assurez-vous d'avoir ces données)
    var resultats = obtenirResultatsEntreprises();

    // Affichez les résultats dans la table
    resultats.forEach(function (entreprise) {
        var newRow = tableBody.insertRow(tableBody.rows.length);
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        // ... (ajoutez d'autres cellules ici)

        cell1.innerHTML = entreprise.nom || '';
        cell2.innerHTML = entreprise.ville || '';
        cell3.innerHTML = entreprise.codepostal || '';

        // Bouton "Voir Profil"
        var btnVoirProfil = document.createElement('button');
        btnVoirProfil.style.textDecoration = "none";
        btnVoirProfil.style.color = "black";
        btnVoirProfil.style.background = "transparent";
        btnVoirProfil.style.border = "none";
        btnVoirProfil.style.fontWeight = "bold";
        btnVoirProfil.style.fontSize = "16px";
        btnVoirProfil.innerHTML = 'Voir Profil';
        btnVoirProfil.addEventListener('click', function () {
            // Lorsque le bouton "Voir Profil" est cliqué,
            // appeler la fonction pour obtenir toutes les infos de l'entreprise
            obtenirToutesLesInformationsEntreprise(entreprise.id);
            // Ensuite, ouvrir le menu burger
            ouvrirMenuBurgerEntreprise(entreprise);
        });
        newRow.appendChild(btnVoirProfil);
    });
}




function ouvrirMenuBurgerEntreprise(entreprise) {
    // Afficher le menu burger
    var menuBurger = document.getElementById('menuBurgerEntreprise');
    menuBurger.style.display = 'block';

    // Afficher les informations spécifiques de l'entreprise
    document.getElementById('infoNomEntreprise').innerText = 'Nom: ' + (entreprise.nom || '');
    document.getElementById('infoVilleEntreprise').innerText = 'Ville: ' + (entreprise.ville || '');
    document.getElementById('infoCodePostalEntreprise').innerText = 'Code Postal: ' + (entreprise.codepostal || '');

    // ... (ajoutez d'autres informations de l'entreprise ici)
}



function fermerMenuBurgerEntreprise() {
    var menuBurger = document.getElementById('menuBurgerEntreprise');
    menuBurger.style.display = 'none';
}
