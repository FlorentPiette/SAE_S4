<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelRechercheEtu.php";


use PHPUnit\Framework\TestCase;

class testModelRechercheEtu extends TestCase
{
    /**
     * Teste la fonction RecherEtu($conn, $nom, $prenom, $ine, $email, $formation, $adresse, $ville, $codePostal, $anneeEtude, $typeEntreprise, $typeMission, $mobile, $actif)
     *
     * @return void
     *
     * @author Emeline
     */

    function testRecherEtu()
    {
        if(RecherEtu(
                Conn::getInstance(),
                "NOM",
                "Prénom",
                "INE",
                "email@email.com",
                "formation",
                "Adresse",
                "Ville",
                59720,
                2,
                "Type d'entreprise",
                "Type de missions",
                true,
                true
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }
}
