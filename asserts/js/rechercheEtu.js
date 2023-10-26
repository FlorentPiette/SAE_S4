function rechercherEtudiants() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var ine = document.getElementById('ine').value;
    var ville = document.getElementById('ville').value;
    var codepostal = document.getElementById('codepostal').value;
    var formation = document.getElementById('formation').value;
    var typeEntreprise = document.getElementById("typeEntreprise").value;
    var typeMission = document.getElementById("typeMission").value;

    console.log("reussis");
    var apiUrl = '../Controller/ControllerRechercheEtudiant.php?nom=' + nom + '&prenom=' + prenom + '&ine=' + ine + '&ville=' + ville + '&codepostal=' + codepostal + '&formation=' + formation + '&typeEntreprise=' + typeEntreprise + '&typeMission=' + typeMission;
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
                            resultatsHTML += 'Type de mission : ' + (etudiant.typemission || '') + '<br>';
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
}

// Écouteurs d'événements pour les cases à cocher
document.getElementById("nomCheckbox").addEventListener("change", afficherChamps);
document.getElementById("prenomCheckbox").addEventListener("change", afficherChamps);
document.getElementById("ineCheckbox").addEventListener("change", afficherChamps);
document.getElementById("villeCheckbox").addEventListener("change", afficherChamps);
document.getElementById("codepostalCheckbox").addEventListener("change", afficherChamps);
document.getElementById("formationCheckbox").addEventListener("change", afficherChamps);
document.getElementById("anneeEtudeCheckbox").addEventListener("change", afficherChamps);
document.getElementById("typeEntrepriseCheckbox").addEventListener("change", afficherChamps);
document.getElementById("typeMissionCheckbox").addEventListener("change", afficherChamps);
document.getElementById("mobileCheckbox").addEventListener("change", afficherChamps);

afficherChamps();