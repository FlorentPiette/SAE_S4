<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelMdpEtu.php";
use PHPUnit\Framework\TestCase;

class testModelMdpEtu extends TestCase {
    function testRecuptoken() {
        $result = recuptoken(
            Conn::getInstance(),
            "test@gmail.com"
        );
        self::assertIsString($result);
    }
}
