window.onload = function() {
    var infoBulle = document.getElementById('infoBulle');
    infoBulle.style.display = 'none';
}

document.getElementById("myForm").addEventListener("submit", function(event) {
    var nomValue = document.getElementById("nom").value;
    var prenomValue = document.getElementById("prenom").value;
    var formationValue = document.getElementById("formation-select").value;
    var emailValue = document.getElementById("email").value;
    var passwordValue = document.getElementById("mdp").value;
    var addressValue = document.getElementById("adresse").value;
    var cityValue = document.getElementById("ville").value;
    var zipValue = document.getElementById("cp").value;
    var dateValue = document.getElementById("date").value;
    var yearValue = document.getElementById("anneeetude").value;
    var ineValue = document.getElementById("ine").value;
    
    var infoBulle = document.getElementById("infoBulle");
    
    if (nomValue.trim() === "") {
        placeInfoBulle("nom", 2, 1);
        event.preventDefault();
    } else if (prenomValue.trim() === "") {
        placeInfoBulle("prenom", 3, 1);
        event.preventDefault();
    } else if (formationValue.trim() === "") {
        placeInfoBulle("formation-select", 4, 1);
        event.preventDefault();
    } else if (addressValue.trim() === "") {
        placeInfoBulle("adresse", 5, 1);
        event.preventDefault();
    } else if (cityValue.trim() === "") {
        placeInfoBulle("ville", 6, 1);
        event.preventDefault();
    } else if (ineValue.trim() === "") {
        placeInfoBulle("ine", 7, 1);
        event.preventDefault();
    } else if (emailValue.trim() === "") {
        placeInfoBulle("email", 2, 7);
        event.preventDefault();
    } else if (passwordValue.trim() === "") {
        placeInfoBulle("mdp", 3, 7);
        event.preventDefault();
    } else if (zipValue.trim() === "") {
        placeInfoBulle("cp", 4, 7);
        event.preventDefault();
    } else if (dateValue.trim() === "") {
        placeInfoBulle("date", 5, 7);
        event.preventDefault();
    } else if (yearValue.trim() === "") {
        placeInfoBulle("anneeetude", 6, 7);
        event.preventDefault();
    } else {
        infoBulle.style.display = 'none';
    }
});

function placeInfoBulle(champ, ligne, colonne) {
    var inputElement = document.getElementById(champ);
    var infoBulle = document.getElementById("infoBulle");
    
    infoBulle.style.display = "block";
    infoBulle.style.position = "absolute";
    infoBulle.style.left = (inputElement.offsetLeft + (inputElement.offsetWidth - infoBulle.offsetWidth) / 2) * colonne + "px";
    infoBulle.style.top = (inputElement.offsetTop + inputElement.offsetHeight) * ligne + "px";
}

document.addEventListener('click', function(event) {
    var infoBulle = this.getElementById("infoBulle");
    if (event.target != infoBulle) {
        infoBulle.style.display = 'none';
    }
});