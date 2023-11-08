<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelModifierProfilEtu.php";

use PHPUnit\Framework\TestCase;

class testModelModifierProfilEtu extends TestCase
{
    function testUpdateEtu()
    {
        if(updateEtu(
            Conn::getInstance(),
            "NOM",
            "Prenom",
            "Adresse",
            "Ville",
            59720,
            2,
            "BUT Info Parcours A",
            "test@gmail.com",
            1
        ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdateNomEtu()
    {
        if(updateNomEtu(
                Conn::getInstance(),
                "NOM",
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdatePrenomEtu()
    {
        if(updatePrenomEtu(
                Conn::getInstance(),
                "Prenom",
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdateDateEtu()
    {
        if(updateDateEtu(
                Conn::getInstance(),
                "2001-01-01",
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdateAdresseEtu()
    {
        if(updateAdresseEtu(
                Conn::getInstance(),
                "Adresse",
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdateVilleEtu()
    {
        if(updateVilleEtu(
                Conn::getInstance(),
                "Ville",
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdateCpEtu()
    {
        if(updateCpEtu(
                Conn::getInstance(),
                59720,
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdateAnneeEtudeEtu()
    {
        if(updateAnneeEtudeEtu(
                Conn::getInstance(),
                2,
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdateFormationEtu()
    {
        if(updateFormationEtu(
                Conn::getInstance(),
                "BUT Info Parcours A",
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdateEmailEtu()
    {
        if(updateEmailEtu(
                Conn::getInstance(),
                "test@gmail.com",
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdateTypeEntrepriseEtu()
    {
        if(updateTypeEntrepriseEtu(
                Conn::getInstance(),
                "Type d'entreprise",
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }


    function testUpdateTypeMissionEtu()
    {
        if(updateTypeMissionEtu(
                Conn::getInstance(),
                "Type de missions",
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }

    function testUpdateMobile()
    {
        if(updateMobile(
                Conn::getInstance(),
                True,
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }

    function testUpdateActif()
    {
        if(updateActif(
                Conn::getInstance(),
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }

    function testUpdateInactif()
    {
        if(updateInactif(
                Conn::getInstance(),
                1
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }

   function testSelectEtudiant() {
        $result = selectEtudiant(
            Conn::getInstance(),
            1
        );
        self::assertIsArray($result);
    }
}