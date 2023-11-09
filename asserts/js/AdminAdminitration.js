// Fonction pour charger les données en fonction du rôle
function chargerDonnees(role) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/ControllerAdminBtnRole.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var rolesData = JSON.parse(xhr.responseText); // Récupérez les données JSON

                // Sélectionnez le corps du tableau dans la vue
                var tableBody = document.querySelector('#dataTable tbody');
                tableBody.innerHTML = ''; // Réinitialisez le contenu du tableau

                rolesData.forEach(function (role) {
                    var row = tableBody.insertRow();
                    var nomCell = row.insertCell(0);
                    var prenomCell = row.insertCell(1);
                    var formationCell = row.insertCell(2);
                    var roleCell = row.insertCell(3);
                    var emailCell = row.insertCell(4);
                    var accessCell = row.insertCell(5);

                    nomCell.textContent = role.nom;
                    prenomCell.textContent = role.prenom;
                    formationCell.textContent = role.formation;
                    roleCell.textContent = role.role;
                    emailCell.textContent = role.email;

                    // Ajoutez un bouton "Accéder au compte" avec un lien vers la page du compte de l'utilisateur
                    var accessButton = document.createElement('button');
                    accessButton.textContent = 'Accéder au compte';
                    accessButton.addEventListener('click', function () {
                        // Vous pouvez ajouter ici le code pour rediriger l'utilisateur vers le compte
                        // Cela dépendra de la structure de vos URL
                    });
                    accessCell.appendChild(accessButton);
                });
            } else {
                console.error("Erreur de la requête : " + xhr.status);
            }
        }
    };

    // Préparez les données pour la requête POST
    var data = "role=" + role;

    xhr.send(data);
}

// Écoutez les clics sur les boutons
document.getElementById('tous').addEventListener('click', function (e) {
    e.preventDefault();
    chargerDonnees('tous');
});

document.getElementById('secretaire').addEventListener('click', function (e) {
    e.preventDefault();
    chargerDonnees('secretaire');
});

document.getElementById('cd').addEventListener('click', function (e) {
    e.preventDefault();
    chargerDonnees('cd');
});

document.getElementById('rp').addEventListener('click', function (e) {
    e.preventDefault();
    chargerDonnees('rp');
});
