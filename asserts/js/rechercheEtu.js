/**
 * Rechercher des étudiants
 *
 * @return void
 */
function rechercherEtudiants() {

    document.getElementById("footer").style.display = "none";

    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var ine = document.getElementById('ine').value;
    var email = document.getElementById('email').value;
    var ville = document.getElementById('ville').value;
    var adresse = document.getElementById('adresse').value;
    var codePostal = document.getElementById('codePostal').value;
    var formation = document.getElementById('formation').value;
    var anneeEtude = document.getElementById('anneeEtude').value;
    var typeEntreprise = document.getElementById("typeEntreprise").value;
    var typeMission = document.getElementById("typeMission").value;
    var mobile = document.getElementById("mobileSelect").value;
    var actif = "";

    if (document.getElementById("autresCheckbox").checked) {
        email = document.getElementById('email').value;
        adresse = document.getElementById("adresse").value;
        ville = document.getElementById("ville").value;
        typeEntreprise = document.getElementById("typeEntreprise").value;
        typeMission = document.getElementById("typeMission").value;
        mobile = document.getElementById("mobileSelect").value;
        actif = document.getElementById("actifSelect").value;
        if (actif === "oui"){
            actif = true;
        }
        else if (actif === "non"){
            actif = false;
        }
        else{
            actif = "";
        }
    }


    var apiUrl = '../Controller/ControllerRechercheEtudiant.php?' +
        '&nom=' + nom +
        '&prenom=' + prenom +
        '&ine=' + ine +
        '&email=' + email +
        '&ville=' + ville +
        '&adresse=' + adresse +
        '&codePostal=' + (codePostal !== '' ? parseInt(codePostal) : '')  +
        '&formation=' + formation +
        '&typeEntreprise=' + typeEntreprise +
        '&typeMission=' + typeMission +
        '&anneeEtude=' + (anneeEtude !== '' ? parseInt(anneeEtude) : '') +
        '&mobile=' + mobile +
        '&actif=' + actif;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', apiUrl, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Ajoutez cette ligne
                try {
                    var isJson = xhr.getResponseHeader('content-type')?.includes('application/json');
                    if (!isJson) {
                        console.error("La réponse n'est pas au format JSON.");
                        return;
                    }
                    var resultats = JSON.parse(xhr.responseText);

                    if (resultats.length > 0) {
                        var tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
                        // Efface le contenu actuel de la table
                        tableBody.innerHTML = '';

                        resultats.forEach(function (etudiant) {
                            var newRow = tableBody.insertRow(tableBody.rows.length);
                            var cell1 = newRow.insertCell(0);
                            var cell2 = newRow.insertCell(1);
                            var cell3 = newRow.insertCell(2);

                            cell1.innerHTML = etudiant.nom || '';
                            cell2.innerHTML = etudiant.prenom || '';
                            cell3.innerHTML = etudiant.ine || '';

                            // Bouton "Voir Profil"
                            var btnVoirProfil = document.createElement('button');
                            btnVoirProfil.style.textDecoration = "none";
                            btnVoirProfil.style.color = "black";
                            btnVoirProfil.style.background = "transparent";
                            btnVoirProfil.style.border = "none";
                            btnVoirProfil.style.fontWeight = "bold";
                            btnVoirProfil.style.fontSize = "16px";
                            btnVoirProfil.style.margin = "10%";
                            btnVoirProfil.style.marginLeft = "25%";
                            btnVoirProfil.innerHTML = 'Voir Profil';
                            btnVoirProfil.addEventListener('click', function () {
                                // Lorsque le bouton "Voir Profil" est cliqué,
                                // appeler la fonction pour obtenir toutes les infos de l'étudiant
                                obtenirTousLesEtudiants(etudiant);
                                // Ensuite, ouvrir le menu burger
                                ouvrirMenuBurger(etudiant);
                                if (etudiant != null) {
                                    var studentId = etudiant.ine;
                                    var nouvelleURL = window.location.href.split('?')[0]
                                    console.log("ID de l'étudiant:", studentId);
                                    nouvelleURL += '?ine=' + studentId;
                                    history.pushState({}, '', nouvelleURL);

                                } else {
                                    console.error("La propriété 'idetudiant' est indéfinie dans la réponse ou la réponse est invalide.");
                                }
                            });
                            newRow.appendChild(btnVoirProfil);
                        });
                    } else {
                        document.getElementById('dataTable').innerHTML = "Aucun résultat trouvé.";
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
 * @return void
 */
function afficherChamps() {
    if (document.getElementById("nomCheckbox").checked) {
        document.getElementById("nomDiv").style.display = "inline-block";
    } else {
        document.getElementById("nomDiv").style.display = "none";
    }

    if (document.getElementById("prenomCheckbox").checked) {
        document.getElementById("prenomDiv").style.display = "inline-block";
    } else {
        document.getElementById("prenomDiv").style.display = "none";
    }

    if (document.getElementById("ineCheckbox").checked) {
        document.getElementById("ineDiv").style.display = "inline-block";
    } else {
        document.getElementById("ineDiv").style.display = "none";
    }

    if (document.getElementById("codepostalCheckbox").checked) {
        document.getElementById("codepostalDiv").style.display = "inline-block";
    } else {
        document.getElementById("codepostalDiv").style.display = "none";
    }

    if (document.getElementById("formationCheckbox").checked) {
        document.getElementById("formationDiv").style.display = "inline-block";
    } else {
        document.getElementById("formationDiv").style.display = "none";
    }

    if (document.getElementById("anneeEtudeCheckbox").checked) {
        document.getElementById("anneeEtudeDiv").style.display = "inline-block";
    } else {
        document.getElementById("anneeEtudeDiv").style.display = "none";
    }

    if (document.getElementById("autresCheckbox").checked) {
        document.getElementById("autresDiv").style.display = "inline-block";
        document.getElementById("emailDiv").style.display = "inline-block";
        document.getElementById("adresseDiv").style.display = "inline-block";
        document.getElementById("villeDiv").style.display = "inline-block";
        document.getElementById("typeEntrepriseDiv").style.display = "inline-block";
        document.getElementById("typeMissionDiv").style.display = "inline-block";
        document.getElementById("mobileSelect").style.display = "inline-block";
        document.getElementById("actifSelect").style.display = "inline-block";
    } else {
        document.getElementById("autresDiv").style.display = "none";
        document.getElementById("emailDiv").style.display = "none";
        document.getElementById("adresseDiv").style.display = "none";
        document.getElementById("villeDiv").style.display = "none";
        document.getElementById("typeEntrepriseDiv").style.display = "none";
        document.getElementById("typeMissionDiv").style.display = "none";
        document.getElementById("mobileSelect").style.display = "none";
        document.getElementById("actifSelect").style.display = "none";
    }
}

// Écouteurs d'événements pour les cases à cocher
document.getElementById("nomCheckbox").addEventListener("change", afficherChamps);
document.getElementById("prenomCheckbox").addEventListener("change", afficherChamps);
document.getElementById("ineCheckbox").addEventListener("change", afficherChamps);
document.getElementById("codepostalCheckbox").addEventListener("change", afficherChamps);
document.getElementById("formationCheckbox").addEventListener("change", afficherChamps);
document.getElementById("anneeEtudeCheckbox").addEventListener("change", afficherChamps);
document.getElementById("autresCheckbox").addEventListener("change", afficherChamps);


afficherChamps();

/**
 * Fonction pour obtenir toutes les informations de l'étudiant
 *
 * @param {string} ine - INE de l'étudiant
 * @return void
 */
function obtenirTousLesEtudiants(ine) {
    // Construction de l'URL de l'API pour obtenir toutes les informations de l'étudiant
    var tousLesEtudiantsUrl = '../Controller/ControllerRechercheEtudiant.php';

    console.log("URL de l'API (Obtenir tous les étudiants):", tousLesEtudiantsUrl);

    var xhrTousLesEtudiants = new XMLHttpRequest();
    xhrTousLesEtudiants.open('GET', tousLesEtudiantsUrl, true);
    xhrTousLesEtudiants.onreadystatechange = function () {
        if (xhrTousLesEtudiants.readyState === 4) {
            if (xhrTousLesEtudiants.status === 200) {
                try {
                    var response = JSON.parse(xhrTousLesEtudiants.responseText);
                    console.log("Informations de l'étudiant:", response);
                } catch (e) {
                    console.error("Erreur d'analyse JSON (Obtenir tous les étudiants) : " + e);
                }
            } else {
                console.error("Erreur de la requête (Obtenir tous les étudiants) : " + xhrTousLesEtudiants.status);
            }
        }
    };

    xhrTousLesEtudiants.send();
}

function redirectModifierProfil() {
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('ine');
    if (id !== null) {
        window.location.href = '../Controller/ControllerModifierProfilEtu.php?ine=' + id;
    }
}

/**
 * Fonction pour ouvrir le menu burger avec les informations de l'étudiant
 *
 * @param {Object} etudiant - Objet contenant les informations de l'étudiant
 * @return void
 */

function ouvrirMenuBurger(etudiant) {
    // Afficher le menu burger
    var menuBurger = document.getElementById('menuBurger');
    menuBurger.style.display = 'block';

    // Afficher les informations spécifiques de l'étudiant
    var nomInfo = document.getElementById('infoNom');
    nomInfo.innerHTML = '<strong style="color: #0f9bb4;">Nom:</strong> ' + (etudiant.nom || '');

    var prenomInfo = document.getElementById('infoPrenom');
    prenomInfo.innerHTML = '<strong style="color: #0f9bb4;">Prénom:</strong> ' + (etudiant.prenom || '');

    var ineInfo = document.getElementById('infoIne');
    ineInfo.innerHTML = '<strong style="color: #0f9bb4;">INE:</strong> ' + (etudiant.ine || '');

    var dateInfo = document.getElementById('infoDate');
    dateInfo.innerHTML = '<strong style="color: #0f9bb4;">Date de naissance:</strong> ' + (etudiant.datedenaissance || '');

    var adresseInfo = document.getElementById('infoAdresse');
    adresseInfo.innerHTML = '<strong style="color: #0f9bb4;">Adresse:</strong> ' + (etudiant.adresse || '');

    var villeInfo = document.getElementById('infoVille');
    villeInfo.innerHTML = '<strong style="color: #0f9bb4;">Ville:</strong> ' + (etudiant.ville || '');

    var cpInfo = document.getElementById('infoCP');
    cpInfo.innerHTML = '<strong style="color: #0f9bb4;">Code Postal:</strong> ' + (etudiant.codepostal || '');

    var anneeInfo = document.getElementById('infoAnnee');
    anneeInfo.innerHTML = '<strong style="color: #0f9bb4;">Année d\'étude:</strong> ' + (etudiant.anneeetude || '');

    var formationInfo = document.getElementById('infoFormation');
    formationInfo.innerHTML = '<strong style="color: #0f9bb4;">Formation:</strong> ' + (etudiant.formation || '');

    var emailInfo = document.getElementById('infoEmail');
    emailInfo.innerHTML = '<strong style="color: #0f9bb4;">Email:</strong> ' + (etudiant.email || '');

    var typeEntrepriseInfo = document.getElementById('infoTypeEntreprise');
    typeEntrepriseInfo.innerHTML = '<strong style="color: #0f9bb4;">Type d\'entreprise:</strong> ' + (etudiant.typeentreprise || '');

    var typeMissionInfo = document.getElementById('infoTypeMission');
    typeMissionInfo.innerHTML = '<strong style="color: #0f9bb4;">Type de Mission:</strong> ' + (etudiant.typemission || '');

// Modifier le style de l'élément 'infoMobile' uniquement
    var mobileInfo = document.getElementById('infoMobile');
    if (etudiant.mobile === 99999) {
        mobileInfo.innerHTML = '<strong style="color: #0f9bb4;">Mobilité:</strong> Internationale';
    } else {
        mobileInfo.innerHTML = '<strong style="color: #0f9bb4;">Mobilité:</strong> ' + (etudiant.mobile || '') + 'km';
        // Appliquer le style spécifique pour le texte en gras
    }

    var actifValue = etudiant.actif;
    var infoActifElement = document.getElementById('infoActif');

    if (actifValue === true) {
        infoActifElement.innerHTML = '<strong style="color: #0f9bb4;">Actif:</strong> Oui';
    } else if (actifValue === false) {
        infoActifElement.innerHTML = '<strong style="color: #0f9bb4;">Actif:</strong> Non';
    } else {
        infoActifElement.innerHTML = '<strong style="color: #0f9bb4;">Actif:</strong> (vide)';
    }



}


function fermerMenuBurger() {
    // Cacher le menu burger
    var menuBurger = document.getElementById('menuBurger');
    menuBurger.style.display = 'none';
}