function chargerDonnees(role) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Controler/ControllerAdminbtnRole.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var rolesData = JSON.parse(xhr.responseText);
                var tableBody = document.querySelector('#dataTable tbody');
                tableBody.innerHTML = '';

                var isAdmin = (role === 'administrateur'); // Vérifiez si l'utilisateur est un administrateur

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

                    if (role.role === 'cd') {
                        roleCell.textContent = 'Chargé de développement';
                    } else {
                        roleCell.textContent = role.role;
                    }

                    emailCell.textContent = role.email;

                    // Ajoutez un bouton "Accéder au compte" avec un lien vers la page du compte de l'utilisateur
                    var accessButton = document.createElement('button');
                    accessButton.textContent = 'Accéder au compte';
                    accessButton.addEventListener('click', function () {
                        // Récupérez l'URL correspondant au rôle de l'utilisateur
                        var accountURL = roleURLs[role.role];

                        // Redirigez l'utilisateur vers l'URL du compte
                        if (accountURL) {
                            window.location.href = accountURL;
                        } else {
                            // Gérez le cas où l'URL n'est pas définie pour ce rôle
                            console.error("L'URL n'est pas définie pour ce rôle.");
                        }
                    });
                    accessCell.appendChild(accessButton);
                });

                // Ajoutez un bouton de retour visible uniquement pour l'administrateur
                if (isAdmin) {
                    var retourAdminButton = document.createElement('button');
                    retourAdminButton.textContent = 'Retour au menu de l\'administrateur';
                    retourAdminButton.addEventListener('click', function () {
                        window.location.href = originalURL;
                    });
                    // Ajoutez le bouton de retour en bas de la page
                    document.body.appendChild(retourAdminButton);
                }
            } else {
                console.error("Erreur de la requête : " + xhr.status);
            }
        }
    };

    // Préparez les données pour la requête POST
    var data = "role=" + role;

    xhr.send(data);
}
// Objet associant les rôles aux URLs correspondantes
var roleURLs = {
    'cd': '../View/ViewCdmain.php', // Remplacez par l'URL du chargé de développement
    'secretaire': '../View/ViewSecretairemain.php', // Remplacez par l'URL du secrétaire
    // Ajoutez d'autres rôles et leurs URLs ici si nécessaire
};

// URL d'origine (la page de l'administrateur)
var originalURL = 'AdminMain.php'; // Remplacez par l'URL de la page de l'administrateur

// Fonction pour charger les données en fonction du rôle


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
