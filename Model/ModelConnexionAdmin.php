<?php

/**
 * Récuperer de la base de donnée, les email, mot de passes et roles de toutes les personnes de l'administration
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 *
 * @return array $result
 */
function selectEmailMDPRoleAdmin($conn){
    $req = "SELECT email, motdepasse, role FROM Administration";
    $req2 = $conn->prepare($req);
    $req2->execute();
    $result = $req2->fetch(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Vérifier si les identifiants correspondent à une personne de la base de donnée et rediriger vers la bonne page selon le role
 *
 * @param array $user liste de tous les utilisateurs de la base de donnée
 * @param string $email sert à chercher cette email dans la base de donnée
 * @param string $motDePasse sert à vérifier si ce mot de passe correspond à cette email dans la base de donnée
 *
 * @return void
 */
function authenticatedAdmin ($user,$email,$motDePasse)
{
    if ($user['email'] === $email && password_verify($motDePasse, $user['motdepasse'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $userRole = $user['role'];
        switch ($userRole) {
            case 'cd':
                header('Location: ../View/ViewCdMain.php');
                break;
            case 'rp':
                header('Location: RpMain.php');
                break;
            case 'rs':
                header('Location: RsMain.php');
                break;
            case 'Administrateur':
                header('Location: /View/ViewAdminAdministration.php');
                break;
            // Ajoutez d'autres cas selon les rôles et les pages correspondantes
            default:
                echo 'Rôle non reconnu';
        }
        exit();
    } else {
        echo 'Connexion refusée' . password_hash('testModelRechercheEtu@456', PASSWORD_BCRYPT);
    }
}