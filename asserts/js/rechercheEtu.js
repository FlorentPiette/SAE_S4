/**
 * Rechercher des étudiants
 *
 * @return void
 */
function rechercherEtudiants() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var ine = document.getElementById('ine').value;
    var email = document.getElementById('email').value;
    var ville = document.getElementById('ville').value;
    var adresse = document.getElementById('adresse').value;
    var codepostal = document.getElementById('codepostal').value;
    var formation = document.getElementById('formation').value;
    var anneeEtude = document.getElementById('anneeEtude').value;
    var typeEntreprise = document.getElementById("typeEntreprise").value;
    var typeMission = document.getElementById("typeMission").value;
    if (document.getElementById("mobileCheckbox").checked){
        var mobile = document.getElementById("mobile").checked;
        if (mobile) {
            mobile = true;
        } else {
            mobile = false;
        }
    }
    else {
        var mobile = "";
    }

    if(document.getElementById("actifCheckbox").checked){
        var actif = document.getElementById("actif").checked;
        if (actif) {
            actif = true;
        } else {
            actif = false;
        }
    }
    else{
        var actif = "";
    }

    // ... (ajoutez d'autres variables pour les options que vous souhaitez inclure) ...

    var apiUrl = '../Controller/ControllerRechercheEtudiant.php?nom=' +
        '&nom=' + nom +
        '&prenom=' + prenom +
        '&ine=' + ine
        '&email=' + email +
        '&ville=' + ville +
        '&adresse=' + adresse +
        '&codepostal=' + codepostal +
        '&formation=' + formation +
        '&typeEntreprise=' + typeEntreprise +
        '&typeMission=' + typeMission +
        '&anneeEtude=' + (anneeEtude !== '' ? parseInt(anneeEtude) : '') +
        '&mobile=' + mobile +
        '&actif=' + actif;

    // ... (ajoutez d'autres paramètres à apiUrl pour les options que vous souhaitez inclure) ...

    var xhr = new XMLHttpRequest();
    xhr.open('GET', apiUrl, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
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

                            // ... (ajoutez d'autres cellules ici) ...

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
                            btnVoirProfil.innerHTML = 'Voir Profil';
                            btnVoirProfil.addEventListener('click', function () {
                                // Lorsque le bouton "Voir Profil" est cliqué,
                                // appeler la fonction pour obtenir toutes les infos de l'étudiant
                                obtenirTousLesEtudiants(etudiant);
                                // Ensuite, ouvrir le menu burger
                                ouvrirMenuBurger(etudiant);
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
        document.getElementById("nomDiv").style.display = "block";
    } else {
        document.getElementById("nomDiv").style.display = "none";
    }

    if (document.getElementById("prenomCheckbox").checked) {
        document.getElementById("prenomDiv").style.display = "block";
    } else {
        document.getElementById("prenomDiv").style.display = "none";
    }

    if (document.getElementById("ineCheckbox").checked) {
        document.getElementById("ineDiv").style.display = "block";
    } else {
        document.getElementById("ineDiv").style.display = "none";
    }
    if (document.getElementById("emailCheckbox").checked) {
        document.getElementById("emailDiv").style.display = "block";
    } else {
        document.getElementById("emailDiv").style.display = "none";
    }

    if (document.getElementById("villeCheckbox").checked) {
        document.getElementById("villeDiv").style.display = "block";
    } else {
        document.getElementById("villeDiv").style.display = "none";
    }

    if (document.getElementById("adresseCheckbox").checked) {
        document.getElementById("adresseDiv").style.display = "block";
    } else {
        document.getElementById("adresseDiv").style.display = "none";
    }

    if (document.getElementById("codepostalCheckbox").checked) {
        document.getElementById("codepostalDiv").style.display = "block";
    } else {
        document.getElementById("codepostalDiv").style.display = "none";
    }

    if (document.getElementById("formationCheckbox").checked) {
        document.getElementById("formationDiv").style.display = "block";
    } else {
        document.getElementById("formationDiv").style.display = "none";
    }

    if (document.getElementById("anneeEtudeCheckbox").checked) {
        document.getElementById("anneeEtudeDiv").style.display = "block";
    } else {
        document.getElementById("anneeEtudeDiv").style.display = "none";
    }

    if (document.getElementById("typeEntrepriseCheckbox").checked) {
        document.getElementById("typeEntrepriseDiv").style.display = "block";
    } else {
        document.getElementById("typeEntrepriseDiv").style.display = "none";
    }

    if (document.getElementById("typeMissionCheckbox").checked) {
        document.getElementById("typeMissionDiv").style.display = "block";
    } else {
        document.getElementById("typeMissionDiv").style.display = "none";
    }

    if (document.getElementById("mobileCheckbox").checked) {
        document.getElementById("mobileDiv").style.display = "block";
    } else {
        document.getElementById("mobileDiv").style.display = "none";
    }

    if (document.getElementById("actifCheckbox").checked) {
        document.getElementById("actifDiv").style.display = "block";
    } else {
        document.getElementById("actifDiv").style.display = "none";
    }

}

// Écouteurs d'événements pour les cases à cocher
document.getElementById("nomCheckbox").addEventListener("change", afficherChamps);
document.getElementById("prenomCheckbox").addEventListener("change", afficherChamps);
document.getElementById("ineCheckbox").addEventListener("change", afficherChamps);
document.getElementById("emailCheckbox").addEventListener("change", afficherChamps);
document.getElementById("villeCheckbox").addEventListener("change", afficherChamps);
document.getElementById("adresseCheckbox").addEventListener("change", afficherChamps);
document.getElementById("codepostalCheckbox").addEventListener("change", afficherChamps);
document.getElementById("formationCheckbox").addEventListener("change", afficherChamps);
document.getElementById("anneeEtudeCheckbox").addEventListener("change", afficherChamps);
document.getElementById("typeEntrepriseCheckbox").addEventListener("change", afficherChamps);
document.getElementById("typeMissionCheckbox").addEventListener("change", afficherChamps);
document.getElementById("mobileCheckbox").addEventListener("change", afficherChamps);
document.getElementById("actifCheckbox").addEventListener("change", afficherChamps);

// ... (ajoutez d'autres écouteurs d'événements pour les options que vous souhaitez inclure) ...

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

                    // Utiliser les données pour afficher toutes les informations de l'étudiant
                    console.log("Informations de l'étudiant:", response);

                    // Vous pouvez utiliser ces données pour afficher les informations de l'étudiant où vous en avez besoin dans votre application
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

/**
 * Fonction pour ouvrir le menu burger avec les informations de l'étudiant
 *
 * @param {Object} etudiant - Objet contenant les informations de l'étudiant
 * @return void
 */
// Ajoutez ce code à votre fichier JavaScript (rechercheEtu.js)

function ouvrirMenuBurger(etudiant) {
    // Afficher le menu burger
    var menuBurger = document.getElementById('menuBurger');
    menuBurger.style.display = 'block';

    // Afficher les informations spécifiques de l'étudiant
    document.getElementById('infoNom').innerText = 'Nom: ' + (etudiant.nom || '');
    document.getElementById('infoPrenom').innerText = 'Prénom: ' + (etudiant.prenom || '');
    document.getElementById('infoIne').innerText = 'INE: ' + (etudiant.ine || '');
    document.getElementById('infoDate').innerText = 'Date de naissance: ' + (etudiant.datedenaissance || '');
    document.getElementById('infoAdresse').innerText = 'Adresse: ' + (etudiant.adresse || '');
    document.getElementById('infoVille').innerText = 'Ville: ' + (etudiant.ville || '');
    document.getElementById('infoCP').innerText = 'Code Postal: ' + (etudiant.codepostal || '');
    document.getElementById('infoAnnee').innerText = 'Année d\'étude: ' + (etudiant.anneeetude || '');
    document.getElementById('infoFormation').innerText = 'Formation: ' + (etudiant.formation || '');
    document.getElementById('infoEmail').innerText = 'Email: ' + (etudiant.email || '');
    document.getElementById('infoActif').innerText = 'Actif: ' + (etudiant.actif || '');
    document.getElementById('infoTypeEntreprise').innerText = 'Type d\'entreprise: ' + (etudiant.typeentreprise || '');
    document.getElementById('infoTypeMission').innerText = 'Type de Mission: ' + (etudiant.typemission || '');
    document.getElementById('infoMobile').innerText = 'Mobile: ' + (etudiant.mobile || '');
}


function fermerMenuBurger() {
    // Cacher le menu burger
    var menuBurger = document.getElementById('menuBurger');
    menuBurger.style.display = 'none';
}

