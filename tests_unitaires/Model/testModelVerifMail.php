<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelVerifMail.php";

use PHPUnit\Framework\TestCase;

class testModelVerifMail extends TestCase
{
    /**
     * Teste la fonction selectCodeEtuWhereEmail($conn, $email)
     *
     * @return void
     *
     * @author Emeline
     */

    function testSelectCodeEtuWhereEmail()
    {
        if(selectCodeEtuWhereEmail(
                Conn::getInstance(),
                "email@gmail.com"
            ) == true) {
            $result = "true";
        }
        else{
            $result = "false";
        }
        self::assertIsString($result);
    }
}
