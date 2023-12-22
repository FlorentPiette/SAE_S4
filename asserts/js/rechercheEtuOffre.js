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
    var codePostal = document.getElementById('codePostal').value;
    var formation = document.getElementById('formation').value;
    var anneeEtude = document.getElementById('anneeEtude').value;
    var typeEntreprise = document.getElementById("typeEntreprise").value;
    var typeMission = document.getElementById("typeMission").value;

    var mobile = "";
    var actif = "";

    if (document.getElementById("autresCheckbox").checked) {
        email = document.getElementById('email').value;
        adresse = document.getElementById("adresse").value;
        ville = document.getElementById("ville").value;
        typeEntreprise = document.getElementById("typeEntreprise").value;
        typeMission = document.getElementById("typeMission").value;
        mobile = document.getElementById("mobileSelect").value;
        if (mobile === "oui"){
            mobile = true;
        }
        else if (mobile === "non"){
            mobile = false;
        }
        else{
            mobile = "";
        }
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
                try {
                    var resultats = JSON.parse(xhr.responseText);

                    if (resultats.length > 0) {
                        var resultatsHTML = '<ul>';
                        resultats.forEach(function (etudiant) {
                            resultatsHTML += '<li>';
                            resultatsHTML += '<input type="checkbox" name="selectedStudents[]" value="' + etudiant.ine +  '"/>';
                            resultatsHTML += 'Nom : ' + (etudiant.nom || '') + '   ';
                            resultatsHTML += 'Prénom : ' + (etudiant.prenom || '') + '   ';
                            resultatsHTML += 'INE : ' + (etudiant.ine || '') + '   ';
                            resultatsHTML += '</li>';
                        });
                        resultatsHTML += '</ul>';
                        document.getElementById('result').innerHTML = resultatsHTML;
                    } else {
                        document.getElementById('result').innerHTML = "Aucun résultat trouvé.";
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

    if (document.getElementById("autresCheckbox").checked) {
        document.getElementById("autresDiv").style.display = "block";
        document.getElementById("emailDiv").style.display = "block";
        document.getElementById("adresseDiv").style.display = "block";
        document.getElementById("villeDiv").style.display = "block";
        document.getElementById("typeEntrepriseDiv").style.display = "block";
        document.getElementById("typeMissionDiv").style.display = "block";
        document.getElementById("mobileSelect").style.display = "block";
        document.getElementById("actifSelect").style.display = "block";
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