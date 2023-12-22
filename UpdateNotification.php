<?php
include 'Model/ConnexionBDD.php';
$conn = Conn::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous de traiter les données reçues depuis JavaScript
    $idnotif = $_POST['idnotif'] ?? null;
    $idetudiant = $_POST['idetudiant'] ?? null;

    if ($idnotif !== null && $idetudiant !== null) {
        // Établir votre connexion à la base de données ici ($conn)

        function semaine($conn, $idnotif, $idetudiant, $lu)
        {
            $req = "UPDATE notification SET lu = ? WHERE idnotif = ? AND idetudiant = ?";
            $req2 = $conn->prepare($req);
            $req2->execute(array($lu,$idnotif, $idetudiant ));
        }
        $idoffre = $_POST['idnotif'];
        $idetudiant = $_POST['idetudiant'];
        $lu = $_POST['lu'];

        // Appel de la fonction semaine avec les paramètres reçus
        semaine($conn, $idoffre, $idetudiant, $lu);

        // Vous pouvez renvoyer une réponse JSON pour indiquer le succès de la mise à jour
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }
}
$idoffre = $_POST['idnotif'];
$idetudiant = $_POST['idetudiant'];

// Si aucun POST n'est reçu ou si les données sont incorrectes, renvoyez une réponse d'erreur
http_response_code(400);
echo json_encode( $idetudiant  );