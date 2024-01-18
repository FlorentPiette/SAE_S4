<?php
include 'Model/ConnexionBDD.php';
$conn = Conn::getInstance();

function idoffre($conn, $nom) {
    $req = "SELECT idoffre FROM offre WHERE nom = ?;";
    $req2 = $conn->prepare($req);
    $req2->execute(array($nom));
    $result = $req2->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['idoffre'] : null;
}

function identrprise($conn,$idoffre){
    $req = "SELECT identreprise FROM poste WHERE idoffre = ?;";
    $req2 = $conn->prepare($req);
    $req2->execute(array($idoffre));
    $result = $req2->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['identreprise'] : null;
}
function voiretudiant($conn, $idoffre) {
    $req = "SELECT * FROM Etudiant JOIN postule USING(idetudiant) WHERE idoffre = ?;";
    $req2 = $conn->prepare($req);
    $req2->execute(array($idoffre));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function etuoffre($conn,$idetudiant,$identreprise) {
    $req = "insert into recutre values (?,?, current_date) ";
    $req2 = $conn->prepare($req);
    $req2->execute(array($idetudiant,$identreprise));
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $idoffre = idoffre($conn, $nom);
    $identreprise = identrprise($conn, $idoffre);

    header('Content-Type: application/json');

    if ($idoffre !== null) {
        $voiretudiant = voiretudiant($conn, $idoffre);
        echo json_encode($voiretudiant);
    } else {
        echo json_encode(['error' => 'Aucune offre trouvée pour le nom spécifié.']);
    }

    exit();
}
?>
