<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ajout Etudiant</title>
    </head>
    <body>
        <form action="../Controler/ControllerAjoutEtudiant.php" method="post">
            <ul>
                <li>
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" />
                </li>
                <li>
                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" />
                </li>
                <li>
                    <label for="dateDeNaissance">Date de naissance:</label>
                    <input type="date" id="dateDeNaissance" name="dateDeNaissance" />
                </li>
                <li>
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" name="adresse" />
                </li>
                <li>
                    <label for="ville">Ville:</label>
                    <input type="text" id="ville" name="ville" />
                </li>
                <li>
                    <label for="codePostal">Code postal:</label>
                    <input type="number" id="codePostal" name="codePostal" />
                </li>
                <li>
                    <label for="ine">INE:</label>
                    <input type="text" id="ine" name="ine" />
                </li>
                <li>
                    <label for="anneeEtude">Année d'étude:</label>
                    <input type="number" id="anneeEtude" name="anneeEtude" />
                </li>
                <li>
                    <label for="formation">Formation:</label>
                    <select name="formation" id="formation">
                        <option value="BUT Info Parcours A">BUT Info Parcours A</option>
                        <option value="BUT Info Parcours B">BUT Info Parcours B</option>
                    </select>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" />
                </li>
                <li>
                    <label for="mdp">Mot de passe:</label>
                    <input type="password" id="mdp" name="mdp" />
                </li>
            </ul>

            <div class="button">
                <button type="submit" id="ajoutEtudiant" name="ajoutEtudiant">Valider</button>
            </div>
        </form>
    </body>
</html>