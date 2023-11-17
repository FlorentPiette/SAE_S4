<?php

/**
 * Récuperer de la base de donnée, les email, mot de passes et roles de toutes les personnes de l'administration
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 *
 * @return array $result
 */
function selectEmailMDPRoleAdmin($conn,$email){
    $req = "SELECT email, motdepasse, role FROM Administration WHERE email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
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
 * @return bool
 */
function authenticatedAdmin ($user,$email,$motDePasse)
{
    return $user['email'] === $email && password_verify($motDePasse, $user['motdepasse']);
}

function role($user) {
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];

    switch ($user['role']) {
        case 'cd':
            header('Location: ../View/ViewCdMain.php');
            exit; // Ajoutez exit pour arrêter l'exécution après la redirection
        case 'rp':
            header('Location: RpMain.php');
            exit;
        case 'rs':
            header('Location: RsMain.php');
            exit;
        case 'Administrateur':
            header('Location: /View/ViewAdminAdministration.php'); // Utilisation d'une URL absolue
            exit;
        // Ajoutez d'autres cas selon les rôles et les pages correspondantes
        default:
            echo $user['role'];
    }
}








/**
 * Récuperer de la base de donnée, les email et mot de passes de tous les étudiants
 *
 * @param PDO $conn sert à se connecter à la base de donnée
 *
 * @return array $result
 */
function selectEmailMDPEtu($conn,$email){
    $req = "SELECT email, motdepasse FROM Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Vérifier si les identifiants correspondent à une personne de la base de donnée
 *
 * @param array $etudiants liste de tous les étudiants de la base de donnée
 * @param string $email sert à chercher cette email dans la base de donnée
 * @param string $motDePasse sert à vérifier si ce mot de passe correspond à cette email dans la base de donnée
 *
 * @return boolean true si le mot de passe et l'email sont associé à un étudiant, sinon false
 */
function authenticatedEtu($etudiants,$email,$motDePasse){
    foreach ($etudiants as $etudiant) {
        if ($etudiant['email'] === $email && password_verify($motDePasse,$etudiant['motdepasse'])) {
            return true;
        }

    }
    return false;

}

function attente($essaiMaximal){
    if ($_SESSION['essai'] >= $essaiMaximal) {
        // L'utilisateur a dépassé le nombre maximal d'échecs de connexion
        // Enregistrez l'heure de début de l'attente dans la session
        if (!isset($_SESSION['temps'])) {
            $_SESSION['temps'] = time();
        }

        $temps = 300; // 5 minutes en secondes (5 minutes * 60 secondes)
        $tempsEcoule = time() - $_SESSION['temps'];

        // Vérifiez si l'utilisateur a attendu suffisamment longtemps
        if ($tempsEcoule < $temps) {
            // L'utilisateur doit encore attendre
            echo "Vous devez attendre " . ($temps - $tempsEcoule) . " secondes avant de réessayer.";
            exit;
        } else {
            // Réinitialisez les tentatives de connexion et l'heure de début d'attente
            $_SESSION['essai'] = 0;
            unset($_SESSION['temps']);
            return true;
        }
    }
}

?>