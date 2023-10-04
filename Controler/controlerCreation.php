<?php

if (isset($_POST["valider"])) {
    $host = "localhost";
    $dbname = "postgres";
    $user = "postgres";
    $password = "31lion2004";

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $formation = $_POST["formation"]; // Récupérez la valeur du menu déroulant
    $mdp = $_POST["mdp"];
    $date = $_POST["date"];
    $ville = $_POST["ville"];
    $cp = $_POST["cp"];
    $adresse = $_POST["adresse"];
    $cv = $_POST["cv"];
    $anneeetude = $_POST["anneeetude"];
    $ine = $_POST["ine"];

    // Connexion à la base de données
    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    //$motDePasseHache = password_hash($mdp, PASSWORD_DEFAULT);

    // Requête SQL pour insérer les données dans la table
    $sql = "INSERT INTO etudiant (Nom, Prenom, Adresse, Codepostal, Ville, Datedenaissance, Formation, Anneeetude, Email, motdepasse, INE, cv ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    // Exécution de la requête avec les valeurs
    $stmt->execute([$nom, $prenom, $adresse, $cp, $ville, $date, $formation, $anneeetude, $email, $mdp, $ine, $cv]);

    // Redirection vers une page de confirmation ou autre
    header('Location: ../PagePrincipale.php');
    exit();
} else {
    // Le formulaire n'a pas été soumis, affichez un message d'erreur ou redirigez si nécessaire
    echo "Le formulaire n'a pas été soumis.";
}

?>
