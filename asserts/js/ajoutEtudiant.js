
document.getElementById("ajoutEtudiant").addEventListener("click", function (event) {
    const nom = document.getElementById("nom").value;
    const prenom = document.getElementById("prenom").value;
    const email = document.getElementById("email").value;
    const mdp = document.getElementById("mdp").value;

    if (nom === "" || prenom === "" || email === "" || mdp === "") {
        event.preventDefault(); // Prevent form submission
        alert("Veuillez remplir tous les champs obligatoires.");
    }
});
