<?php

ini_set('display_errors', 1);
include ('../Model/ModelConnexion.php');
include ('../Model/ConnexionBDD.php');
include ('ControllerCaptcha.php');
error_reporting(E_ALL);


$essaiMaximal = 1;

$conn = Conn::getInstance();

if (!isset($_SESSION['essai'])) {
    $_SESSION['essai'] = 0;
}

$essaiMaximal = 2;

attente($essaiMaximal);

// Supprimer les balises HTML et PHP des données postées
$email =htmlspecialchars($_POST['Email']);
$motDePasse = htmlspecialchars($_POST['MotDePasse'], ENT_QUOTES, 'UTF-8');

error_reporting(E_ALL);
ini_set('display_errors', 1);

function isOver($timestamp1) {
    $timestamp1InSeconds = strtotime($timestamp1);

    $currentTimestampInSeconds = time();

    $timeDifferenceInSeconds = $currentTimestampInSeconds - $timestamp1InSeconds;

    return $timeDifferenceInSeconds >= 86400;
}

$users = selectEmailMDPEtu($conn,$email);
if ($users) {
    $req = "SELECT * FROM etudiant WHERE email = :email";
    $req2 = $conn->prepare($req);
    $req2->bindParam(':email', $email);
    $req2->execute();
    $user = $req2->fetch(PDO::FETCH_ASSOC);
    if (authenticatedEtu($users, $email, $motDePasse)) {
        $_SESSION['etu'] = true;
        $_SESSION['email'] = $users['email'];

        if ($user["canconnect"]) {
            header("location: ../View/ViewPageEtudiant.php");
        } else {
            echo "<script>alert('Votre compte est bloqué pendant 24 heures')</script>";
            header('location: ../View/ViewAvConnexion.html');
        }
    } else {
        if ($user['last_connection'] != null) {
            if (isOver($user['last_connection'])) {
                $req = "UPDATE etudiant SET tentatives_echouees = :tentatives WHERE email = :email";
                $req2 = $conn->prepare($req);
                $req2->bindParam(':email', $email);
                $req2->bindParam(':tentatives', 1);
                $req2->execute();
                $_SESSION['essai']++;

                $req = "UPDATE etudiant SET canconnect = true WHERE email = :email";
                $req2 = $conn->prepare($req);
                $req2->bindParam(':email', $email);
                $req2->execute();
                header('location: ../View/ViewAvConnexion.html');
            } else {
                $tentatives = $user['tentatives_echouees'] + 1;
                $req = "UPDATE etudiant SET tentatives_echouees = :tentatives WHERE email = :email";
                $req2 = $conn->prepare($req);
                $req2->bindParam(':email', $email);
                $req2->bindParam(':tentatives', $tentatives);
                $req2->execute();
                $_SESSION['essai']++;
                header('location: ../View/ViewAvConnexion.html');
            }
        } else {
            $req = "UPDATE etudiant SET last_connection = current_timestamp WHERE email = :email";
            $req2 = $conn->prepare($req);
            $req2->bindParam(':email', $email);
            $req2->execute();

            $tentatives = $user['tentatives_echouees'] + 1;
            $req = "UPDATE etudiant SET tentatives_echouees = :tentatives WHERE email = :email";
            $req2 = $conn->prepare($req);
            $req2->bindParam(':email', $email);
            $req2->bindParam(':tentatives', $tentatives);
            $req2->execute();
            $_SESSION['essai']++;

            if ($_SESSION['essai'] >= 1) {
                echo "Compte bloqué pendant 1 minute";
                $req = "UPDATE etudiant SET canconnect = false WHERE email = :email";
                $req2 = $conn->prepare($req);
                $req2->bindParam(':email', $email);
                $req2->execute();
            
                sleep(60);
            
                $req = "UPDATE etudiant SET canconnect = true WHERE email = :email";
                $req2 = $conn->prepare($req);
                $req2->bindParam(':email', $email);
                $req2->execute();
            }

            if ($user['tentatives_echouees'] >= 25) {
                $req = "UPDATE etudiant SET canconnect = false WHERE email = :email";
                $req2 = $conn->prepare($req);
                $req2->bindParam(':email', $email);
                $req2->execute();
            }
            header('location: ../View/ViewAvConnexion.html');
        }
    }

}

$users = selectEmailMDPRoleAdmin($conn, $email);
if ($users) {
    $req = "SELECT * FROM administration WHERE email = :email";
    $req2 = $conn->prepare($req);
    $req2->bindParam(':email', $email);
    $req2->execute();
    $user = $req2->fetch(PDO::FETCH_ASSOC);
    if (authenticatedAdmin($users, $email, $motDePasse)) {
        if ($user["canconnect"]) {
            $_SESSION['administration'] = true;
            $_SESSION['formation'] = selectFormationAdmin($conn, $users['email']);
            $_SESSION['email'] = $users['email'];
            role($users);
        } else {
            echo "<script>alert('Votre compte est bloqué pendant 24 heures')</script>";
            header('location: ../View/ViewAvConnexion.html');
        }
    } else {
        if ($user['last_connection'] != null) {
            if (isOver($user['last_connection'])) {
                $req = "UPDATE administration SET tentatives_echouees = :tentatives WHERE email = :email";
                $req2 = $conn->prepare($req);
                $req2->bindParam(':email', $email);
                $req2->bindParam(':tentatives', 1);
                $req2->execute();
                $_SESSION['essai']++;

                $req = "UPDATE administration SET canconnect = true WHERE email = :email";
                $req2 = $conn->prepare($req);
                $req2->bindParam(':email', $email);
                $req2->execute();
                header('location: ../View/ViewAvConnexion.html');
            } else {
                $tentatives = $user['tentatives_echouees'] + 1;
                $req = "UPDATE administration SET tentatives_echouees = :tentatives WHERE email = :email";
                $req2 = $conn->prepare($req);
                $req2->bindParam(':email', $email);
                $req2->bindParam(':tentatives', $tentatives);
                $req2->execute();
                $_SESSION['essai']++;

                if ($user['tentatives_echouees'] >= 25) {
                    $req = "UPDATE administration SET canconnect = false WHERE email = :email";
                    $req2 = $conn->prepare($req);
                    $req2->bindParam(':email', $email);
                    $req2->execute();
                }
                header('location: ../View/ViewAvConnexion.html');
            }
        } else {
            $req = "UPDATE administration SET last_connection = current_timestamp WHERE email = :email";
            $req2 = $conn->prepare($req);
            $req2->bindParam(':email', $email);
            $req2->execute();

            $tentatives = $user['tentatives_echouees'] + 1;
            $req = "UPDATE administration SET tentatives_echouees = :tentatives WHERE email = :email";
            $req2 = $conn->prepare($req);
            $req2->bindParam(':email', $email);
            $req2->bindParam(':tentatives', $tentatives);
            $req2->execute();
            $_SESSION['essai']++;

            if ($user['tentatives_echouees'] >= 25) {
                $req = "UPDATE administration SET canconnect = false WHERE email = :email";
                $req2 = $conn->prepare($req);
                $req2->bindParam(':email', $email);
                $req2->execute();
            }
            header('location: ../View/ViewAvConnexion.html');
        }
    }
}

