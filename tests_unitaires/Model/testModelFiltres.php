<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelFiltres.php";

use PHPUnit\Framework\TestCase;

class testModelFiltres extends TestCase
{
    /**
     * Teste la fonction FiltrerOffres($conn, $nom, $domaine, $mission, $nbetudiant)
     *
     * @return void
     *
     * @author Emeline
     */

    function testFiltrerOffres()
    {
        if(filtrerOffres(
                Conn::getInstance(),
                "NOM",
                "Domaine",
                "Missions",
                5
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }

    /**
     * Teste la fonction FiltrerEntreprises($conn, $nom, $ville, $codepostal, $secteurActivite)
     *
     * @return void
     *
     * @author Emeline
     */

    function testFiltrerEntreprises()
    {
        if(filtrerEntreprises(
                Conn::getInstance(),
                "NOM",
                "ville",
                59720,
                "Secteur"
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }
}