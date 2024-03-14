// Fonction pour charger les données depuis le serveur
function chargerDonnees(role) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/ControllerAdminBtnRole.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    var rolesData = JSON.parse(xhr.responseText);

                    var tableBody = document.querySelector('#dataTable tbody');
                    tableBody.innerHTML = '';

                    rolesData.forEach(function (role) {
                        var row = tableBody.insertRow();
                        var nomCell = row.insertCell(0);
                        var prenomCell = row.insertCell(1);
                        var formationCell = row.insertCell(2);
                        var roleCell = row.insertCell(3);
                        var emailCell = row.insertCell(4);
                        var deleteCell = row.insertCell(5);

                        nomCell.textContent = role.nom;
                        prenomCell.textContent = role.prenom;
                        formationCell.textContent = role.formation;
                        roleCell.textContent = role.role;
                        emailCell.textContent = role.email;

                        var deleteButton = document.createElement('button');
                        deleteButton.textContent = 'Supprimer';
                        deleteButton.addEventListener('click', function () {
                            // Appeler la fonction pour supprimer l'élément
                            supprimerElement(role.email, row);
                        });

                        deleteCell.appendChild(deleteButton);
                    });
                } catch (error) {
                    console.error("Erreur lors de la conversion JSON :", error);
                    console.log("Réponse du serveur :", xhr.responseText);
                }
            } else {
                console.error("Erreur de la requête : " + xhr.status);
            }
        }
    };

    var data = "role=" + role;
    xhr.send(data);
}

function supprimerElement(email, row) {
    var deleteXHR = new XMLHttpRequest();
    deleteXHR.open('POST', '../Controller/ControllerSupprimerRole.php', true);
    deleteXHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    deleteXHR.onreadystatechange = function () {
        if (deleteXHR.readyState === 4) {
            if (deleteXHR.status === 200) {
                var response = deleteXHR.responseText;
                if (response.includes('succès')) {
                    console.log('Élément avec l\'email ' + email + ' supprimé avec succès.');
                    row.remove();
                } else {
                    console.error("Erreur lors de la suppression de l'élément :", response);
                }
            } else {
                console.error("Erreur lors de la suppression de l'élément : " + deleteXHR.status);
            }
        }
    };
    // Envoyer l'email de l'élément à supprimer
    var deleteData = "email=" + encodeURIComponent(email);
    deleteXHR.send(deleteData);
}

// Charger les données au chargement de la page
document.addEventListener('DOMContentLoaded', function () {
    chargerDonnees('tous'); // Charger les données par défaut
});

document.getElementById('tous').addEventListener('click', function (e) {
    e.preventDefault();
    chargerDonnees('tous');
});

document.getElementById('secretaire').addEventListener('click', function (e) {
    e.preventDefault();
    chargerDonnees('sec');
});

document.getElementById('cd').addEventListener('click', function (e) {
    e.preventDefault();
    chargerDonnees('cd');
});

document.getElementById('rp').addEventListener('click', function (e) {
    e.preventDefault();
    chargerDonnees('rp');
});

document.addEventListener('DOMContentLoaded', function () {
    var accountPhoto = document.getElementById("account-photo");
    var accountDropdown = document.getElementById("account-dropdown");

    // Afficher le menu lors du survol de l'image utilisateur
    accountPhoto.addEventListener("mouseover", function () {
        accountDropdown.style.display = "block";
    });

    // Masquer le menu lorsque le curseur quitte la zone de l'image utilisateur
    accountPhoto.addEventListener("mouseout", function () {
        accountDropdown.style.display = "none";
    });
});
