<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelModifierProfilEtu.php";

use PHPUnit\Framework\TestCase;

class testModelModifierProfilEtu extends TestCase
{
    /**
     * Teste la fonction updateEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateNomEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updatePrenomEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateDateEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateAdresseEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateVilleEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateCpEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateAnneeEtudeEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateFormationEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateEmailEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateTypeEntrepriseEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateTypeMissionEtu()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateMobile()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateActif()
     *
     * @author Emeline
     *
     * @return void
     */
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


    /**
     * Teste la fonction updateInactif()
     *
     * @author Emeline
     *
     * @return void
     */
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



    /**
     * Teste la fonction selectEtudiant()
     *
     * @author Emeline
     *
     * @return void
     */
   function testSelectEtudiant() {
        $result = selectEtudiant(
            Conn::getInstance(),
            1
        );
        self::assertIsArray($result);
    }
}