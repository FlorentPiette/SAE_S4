<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelInscriptionEtu.php";
use PHPUnit\Framework\TestCase;

class testModelInscriptionEtu extends TestCase {
    function testGenerationToken() {
        $result = generationToken();
        self::assertIsString($result);
    }
}
