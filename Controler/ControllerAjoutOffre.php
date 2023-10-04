<?php
try {
    $host = 'localhost';
    $dbname = 'postgres';
    $username = 'postgres';
    $password = '31lion2004';

    $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    if(isset($_POST["Ajouteroffre"])) {
        $nom = $_POST['Nom'];
        $domaine = $_POST['Domaine'];
        $mission = $_POST['Mission'];
        $nbetudiant = $_POST['NbEtudiant'];

        // Préparez la requête avec des paramètres nommés
        $stmt = $db->prepare("INSERT INTO Offre (nom, domaine, mission, nbetudiant) VALUES (:nom, :domaine, :mission, :nbetudiant)");

        // Liez les valeurs aux paramètres nommés
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':domaine', $domaine);
        $stmt->bindParam(':mission', $mission);
        $stmt->bindParam(':nbetudiant', $nbetudiant);

        // Exécutez la requête
        $stmt->execute();

        echo "Ajout réussi";
    }
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
