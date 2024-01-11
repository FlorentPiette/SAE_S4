function afficherEntreprises() {
    document.getElementById("donneesEntreprise").style.display = "block";
    document.getElementById("donneesOffre").style.display = "none";
}

function afficherOffres(page) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);

            // Remplacez le contenu de l'élément donneesOffre par les nouvelles données.
            document.getElementById("donneesOffre").innerHTML = response.offres;

            // Gérez la pagination
            const paginationContainer = document.getElementById('pagination-container');
            paginationContainer.innerHTML = ''; // Effacez les anciens liens de pagination

            for (let i = 1; i <= response.totalPages; i++) {
                const link = document.createElement('a');
                link.href = '#';
                link.textContent = i;
                link.onclick = function () {
                    afficherOffres(i);
                };

                if (i === page) {
                    link.classList.add('active');
                }

                paginationContainer.appendChild(link);
            }

        }
    };

    xhr.open("GET", "../Controller/ControllerAfficherOffres.php?page=" + page, true);
    xhr.send();

    document.getElementById("donneesEntreprise").style.display = "none";
    document.getElementById("donneesOffre").style.display = "block";
}



var formulaire = document.getElementById("formulaire");
var message = document.getElementById("message");
var brouillon = document.getElementById("brouillon");
var visible = document.getElementById("visible");

formulaire.addEventListener("submit", function (event) {
    var offre = document.getElementById("offre").value;
    var domaine = document.getElementById("domaine").value;
    var mission = document.getElementById("mission").value;
    var nbetudiant = document.getElementById("nbetudiant").value;
    var parcours = document.getElementById("parcours").value;

    if (!brouillon.checked) { // Validez uniquement si la case "Brouillon" n'est pas cochée
        if (isNaN(nbetudiant)) {
            event.preventDefault(); // Empêche l'envoi du formulaire
            message.innerText = "Erreur, le nombre d'étudiant doit être un nombre valide.";
        }

        if (offre === "" || domaine === "" || mission === "" || nbetudiant === "" || parcours ==="") {
            event.preventDefault(); // Empêche l'envoi du formulaire
            message.innerText = "Erreur, veuillez remplir tous les champs de saisie.";
        }
    }
});

function chargerEntreprises() {
    // Récupérer l'élément select
    const selectEntreprise = document.getElementById("entreprise");

    // Faites une requête GET à votre API PHP pour récupérer la liste des entreprises
    fetch("../../Controller/ControllerAjouOffre.php")
        .then(response => response.json())
        .then(data => {

            data.forEach(entreprise => {
                const option = document.createElement("option");
                option.value = entreprise.nomentreprise;
                option.textContent = entreprise.nomentreprise;
                selectEntreprise.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Erreur lors de la récupération des entreprises : " + error);
        });
}

chargerEntreprises();

// Récupération des éléments du formulaire
var formulaire = document.getElementById("formulaire");
var brouillon = document.getElementById("brouillon");

// Récupération de l'élément pour les messages d'erreur
var message = document.getElementById("message");

// Écouteur d'événement pour la soumission du formulaire
formulaire.addEventListener("submit", function (event) {
    var offre = document.getElementById("offre").value;
    var domaine = document.getElementById("domaine").value;
    var mission = document.getElementById("mission").value;
    var nbetudiant = document.getElementById("nbetudiant").value;

    if (!brouillon.checked) { // Validez uniquement si la case "Brouillon" n'est pas cochée
        if (isNaN(nbetudiant)) {
            event.preventDefault(); // Empêche l'envoi du formulaire
            afficherMessageErreur("Erreur, le nombre d'étudiant doit être un nombre valide.");
        }

        if (offre === "" || domaine === "" || mission === "" || nbetudiant === "") {
            event.preventDefault(); // Empêche l'envoi du formulaire
            afficherMessageErreur("Erreur, veuillez remplir tous les champs de saisie.");
        }
    }
});

// Fonction pour afficher les messages d'erreur
function afficherMessageErreur(messageText) {
    message.innerText = messageText;
    message.style.color = "red"; // Couleur du texte en rouge
    message.style.fontSize = "14px"; // Taille de la police
    message.style.marginTop = "5px"; // Marge supérieure
}

document.addEventListener("DOMContentLoaded", function() {
    var popup = document.getElementById("popup");

    function afficherPopup() {
        popup.style.display = "block";
        setTimeout(function() {
            popup.style.display = "none";
        }, 3000); // La popup disparaîtra après 3 secondes (3000 ms)
    }

    // Vous pouvez appeler cette fonction après avoir ajouté une offre avec succès.
    // Par exemple, après une redirection vers cette page ou après une requête réussie.
    afficherPopup();
});



function limiterElements(elementSelector) {
    const elements = document.querySelectorAll(elementSelector);
    for (let i = 3; i < elements.length; i++) {
        elements[i].style.display = 'none';
    }
}

limiterElements('.offre');
limiterElements('.entreprise');


function afficherPopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "block";

    setTimeout(function () {
        popup.style.display = "none";
    }, 3000); // La popup disparaîtra automatiquement après 3 secondes (3000 millisecondes)
}

    document.getElementById('redirigerVersAjoutEntreprise').addEventListener('click', function() {
    window.location.href = '../View/ViewAjoutEntreprise.php';
});



function afficherPopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "block";

    setTimeout(function () {
        popup.style.display = "none";
    }, 3000); // La popup disparaîtra automatiquement après 3 secondes (3000 millisecondes)

}

// Remplacez le script JavaScript existant par celui-ci






// Ajouter cet écouteur d'événements pour gérer les clics de navigation entre les pages


function adjustRectangleHeight() {
    const offreList = document.getElementById('donneesOffre');
    const entrepriseList = document.getElementById('donneesEntreprise');
    const dynamicRectangle = document.querySelector('.rectangle-mid');

    const maxListHeight = Math.max(offreList.clientHeight, entrepriseList.clientHeight);
    const margin = 20;

    dynamicRectangle.style.height = maxListHeight + margin + 'px';

    const elementsToMove = document.getElementsByClassName('move-down');
    for (const element of elementsToMove) {
        element.style.transform = 'translateY(' + (maxListHeight + margin) + 'px)';
    }
}

adjustRectangleHeight();

function updateRectangleHeight() {
    adjustRectangleHeight();
}

function limiterElements(elementSelector) {
    const elements = document.querySelectorAll(elementSelector);
    for (let i = 3; i < elements.length; i++) {
        elements[i].style.display = 'none';
    }
}




document.addEventListener('DOMContentLoaded', function () {
    adjustRectangleHeight();
});



