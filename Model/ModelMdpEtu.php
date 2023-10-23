<?php
function recuptoken($conn,$email){
    $req = "SELECT codemail FROM Etudiant where email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));
    $result = $req2->fetch(PDO::FETCH_ASSOC);

    return $result;
}
function mdpEtu($conn,$token,$mdp)
{
    $req = "UPDATE etudiant SET motdepasse = ? WHERE codemail = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($mdp,$token));

}

function suppEtu($conn,$email)
{
    $req = "DELETE FROM etudiant WHERE email = ?";
    $req2 = $conn->prepare($req);
    $req2->execute(array($email));

}
?>