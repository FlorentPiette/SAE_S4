function chargerDonnees(role) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/ControllerAdminBtnRole.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
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

                    nomCell.textContent = role.nom;
                    prenomCell.textContent = role.prenom;
                    formationCell.textContent = role.formation;
                    roleCell.textContent = role.role;
                    emailCell.textContent = role.email;
                });
            } else {
                console.error("Erreur de la requête : " + xhr.status);
            }
        }
    };

    var data = "role=" + role;
    xhr.send(data);
}

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