<?php

// Enable error reporting for debugging
error_reporting(E_ALL);

include_once '../Model/ConnexionBDD.php';

$conn = Conn::getInstance();

// Retrieve email from POST data
$email = $_POST['email'] ?? null;  // Check for existence

// Check for missing email
if (!$email) {
    http_response_code(400);
    echo "Error: Missing email parameter.";
    exit();
}

// Prepare the DELETE statement
$stmt = $conn->prepare("DELETE FROM Administration WHERE email = :email");

// Bind the email parameter
$stmt->bindParam(':email', $email);

// Execute the query
if ($stmt->execute()) {

    // Check if a row was actually deleted
    if ($stmt->rowCount() === 1) {
        http_response_code(200);
        echo "Élément supprimé avec succès.";
    } else {
        http_response_code(404);
        echo "Aucun élément trouvé avec l'email fourni.";
    }

} else {
    // Error during execution
    http_response_code(500);
    echo "Erreur lors de la suppression de l'élément.";
    // Access error information through $stmt->errorInfo() for debugging
}

