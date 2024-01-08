<?php include '../Controller/ControllerVerificationDroit.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil <?= $etu['nom'] ?> <?= $etu['prenom'] ?></title>
    <script src="../asserts/js/modifProfil.js"></script>
</head>

<body>
<div class="content">
<h1><?= $etu['nom'] ?> <?= $etu['prenom'] ?></h1>
    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Nom : </label>
    <input type="text" name="nouveau_nom" value="<?= $etu['nom'] ?>">
    <input type="submit" name="modifier_nom" value="Modifier"">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Prénom : </label>
    <input type="text" name="nouveau_prenom" value="<?= $etu['prenom'] ?>">
    <input type="submit" name="modifier_prenom" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Date de naissance : </label>
    <input type="date" name="modifier_date" value="<?= $etu['datedenaissance'] ?>">
    <input type="submit" name="modifier_date" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Adresse : </label>
    <input type="text" name="nouvelle_adresse" value="<?= $etu['adresse'] ?>">
    <input type="submit" name="modifier_adresse" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Ville : </label>
    <input type="text" name="nouvelle_ville" value="<?= $etu['ville'] ?>">
    <input type="submit" name="modifier_ville" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Code postal : </label>
    <input type="number" name="nouveau_cp" value="<?= $etu['codepostal'] ?>">
    <input type="submit" name="modifier_cp" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Année d'étude : </label>
    <input type="number" name="nouvelle_anneeEtude" value="<?= $etu['anneeetude'] ?>">
    <input type="submit" name="modifier_anneeEtude" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Formation : </label>
    <input type="text" name="nouvelle_formation" value="<?= $etu['formation'] ?>">
    <input type="submit" name="modifier_formation" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Email : </label>
    <input type="email" name="nouvel_email" value="<?= $etu['email'] ?>">
    <input type="submit" name="modifier_email" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Type d'entreprises recherchées : </label>
    <input type="text" name="nouveau_typeentreprise" value="<?= $etu['typeentreprise'] ?>">
    <input type="submit" name="modifier_typeentreprise" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Type de missions recherchées : </label>
    <input type="text" name="nouveau_typemission" value="<?= $etu['typemission'] ?>">
    <input type="submit" name="modifier_typemission" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
        <label for="mobile">
            Mobile:
            <select name="mobile" id="mobile">
                <option value="10" <?php if ($etu['mobile'] == 10) echo 'selected'; ?>>10km</option>
                <option value="50" <?php if ($etu['mobile'] == 50) echo 'selected'; ?>>50km</option>
                <option value="100" <?php if ($etu['mobile'] == 100) echo 'selected'; ?>>100km</option>
                <option value="500" <?php if ($etu['mobile'] == 500) echo 'selected'; ?>>500km</option>
                <option value="1000" <?php if ($etu['mobile'] == 1000) echo 'selected'; ?>>1000km</option>
                <option value="99999" <?php if ($etu['mobile'] == 99999) echo 'selected'; ?>>International</option>
            </select>
        </label>
    <input type="submit" name="modifier_mobile" value="Modifier">
</form>

    <form method="post" action="../Controller/ControllerModifierProfilEtu.php<?php echo isset($_GET['ine']) ? '?ine=' . $_GET['ine'] : ''; ?>">
    <label> Actif : </label>
    <input type="checkbox" name="actif" id="actif" value="actif" <?php if ($etu['actif']) echo 'checked'; ?>>
    <input type="submit" name="setActif" value="Modifier">
</form>
</div>
</body>
</html>
