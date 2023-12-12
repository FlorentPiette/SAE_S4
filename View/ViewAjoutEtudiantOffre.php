<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../asserts/css/adminEtu.css">
    </head>

    <body>
        <form id="rechercheForm">
            <label for="nomCheckbox">
                <input type="checkbox" id="nomCheckbox"> Nom
            </label>
            <label for="prenomCheckbox">
                <input type="checkbox" id="prenomCheckbox"> Prénom
            </label>
            <label for="ineCheckbox">
                <input type="checkbox" id="ineCheckbox"> INE
            </label>
            <label for="codepostalCheckbox">
                <input type="checkbox" id="codepostalCheckbox"> Code Postal
            </label>
            <label for="formationCheckbox">
                <input type="checkbox" id="formationCheckbox"> Formation
            </label>
            <label for="anneeEtudeCheckbox">
                <input type="checkbox" id="anneeEtudeCheckbox"> Année d'étude
            </label>
            <label for="autresCheckbox">
                <input type="checkbox" id="autresCheckbox"> Autres
            </label>



            <div id="nomDiv" style="display: none">
                <label for="nom"></label><input type="text" name="nom" id="nom" placeholder="Nom">
            </div>
            <div id="prenomDiv" style="display: none">
                <label for="prenom"></label><input type="text" name="prenom" id="prenom" placeholder="Prénom">
            </div>
            <div id="ineDiv" style="display: none">
                <label for="ine"></label><input type="text" name="ine" id="ine" placeholder="INE">
            </div>
            <div id="codepostalDiv" style="display: none">
                <label for="codepostal"></label><input type="number" name="codePostal" id="codePostal" placeholder="Code Postal">
            </div>
            <div id="formationDiv" style="display: none">
                <label for="formation"></label><input type="text" name="formation" id="formation" placeholder="Formation">
            </div>
            <div id="anneeEtudeDiv" style="display: none">
                <label for="anneeEtude"></label><input type="number" name="anneeEtude" id="anneeEtude" placeholder="Année d'étude">
            </div>
            <div id="autresDiv" style="display: none">
                <label for="email">
                    <input type="text" name="email" id="email" placeholder="Adresse Email">
                </label>
                <label for="adresse">
                    <input type="text" name="adresse" id="adresse" placeholder="Adresse">
                </label>
                <label for="ville">
                    <input type="text" name="ville" id="ville" placeholder="Ville">
                </label>
                <label for="typeEntreprise">
                    <input type="text" name="typeEntreprise" id="typeEntreprise" placeholder="Type d'entreprise">
                </label>
                <label for="typeMission">
                    <input type="text" name="typeMission" id="typeMission" placeholder="Type de missions">
                </label>
                <label for="mobileSelect">
                    Mobile:
                    <select id="mobileSelect">
                        <option value="peuimporte">Peu importe</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </label>
                <label for="actifSelect">
                    Actif:
                    <select id="actifSelect">
                        <option value="peuimporte">Peu importe</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </label>
            </div>

            <input type="button" value="Rechercher un étudiant" onclick="rechercherEtudiants()" class="btnRechercheEtu">
        </form>

        <form action="../Controller/ControllerAjoutEtudiantOffre.php" method="post">
            <div class="result" id="result"> </div>
            <input type="submit" name="buttonValider" value="Valider">
            <input type="submit" name="BoutonRetour" value="Retour aux offres">
        </form>

        <script src="../asserts/js/rechercheEtuOffre.js"></script>
    </body>
</html>