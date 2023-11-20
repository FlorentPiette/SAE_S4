<?php
include '../Controller/ControllerVerificationDroit.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil <?= $etu['nom'] ?> <?= $etu['prenom'] ?></title>
</head>

<body>
<h1><?= $etu['nom'] ?> <?= $etu['prenom'] ?></h1>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Nom : </label>
    <input type="text" name="nouveau_nom" value="<?= $etu['nom'] ?>">
    <input type="submit" name="modifier_nom" value="Modifier">
</form>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Prénom : </label>
    <input type="text" name="nouveau_prenom" value="<?= $etu['prenom'] ?>">
    <input type="submit" name="modifier_prenom" value="Modifier">
</form>

<label> Date de naissance : <?= $etu['datedenaissance'] ?></label>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Adresse : </label>
    <input type="text" name="nouvelle_adresse" value="<?= $etu['adresse'] ?>">
    <input type="submit" name="modifier_adresse" value="Modifier">
</form>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Ville : </label>
    <input type="text" name="nouvelle_ville" value="<?= $etu['ville'] ?>">
    <input type="submit" name="modifier_ville" value="Modifier">
</form>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Code postal : </label>
    <input type="number" name="nouveau_cp" value="<?= $etu['codepostal'] ?>">
    <input type="submit" name="modifier_cp" value="Modifier">
</form>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Année d'étude : </label>
    <input type="number" name="nouvelle_anneeEtude" value="<?= $etu['anneeetude'] ?>">
    <input type="submit" name="modifier_anneeEtude" value="Modifier">
</form>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Formation : </label>
    <input type="text" name="nouvelle_formation" value="<?= $etu['formation'] ?>">
    <input type="submit" name="modifier_formation" value="Modifier">
</form>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Email : </label>
    <input type="email" name="nouvel_email" value="<?= $etu['email'] ?>">
    <input type="submit" name="modifier_email" value="Modifier">
</form>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Type d'entreprises recherchées : </label>
    <input type="text" name="nouveau_typeentreprise" value="<?= $etu['typeentreprise'] ?>">
    <input type="submit" name="modifier_typeentreprise" value="Modifier">
</form>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Type de missions recherchées : </label>
    <input type="text" name="nouveau_typemission" value="<?= $etu['typemission'] ?>">
    <input type="submit" name="modifier_typemission" value="Modifier">
</form>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Mobile : </label>
    <input type="checkbox" name="mobile" id="mobile" value="mobile" <?php if ($etu['mobile']) echo 'checked'; ?>>
    <input type="submit" name="modifier_mobile" value="Modifier">
</form>

<form method="post" action="../Controller/ControllerModifierProfilEtu.php">
    <label> Actif : </label>
    <input type="checkbox" name="actif" id="actif" value="actif" <?php if ($etu['actif']) echo 'checked'; ?>>
    <input type="submit" name="setActif" value="Modifier">
</form>
</body>
</html>
