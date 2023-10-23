<?php

// il faut adapter ces 3 lignes de code pour que ça marche
//namespace src\phpunit_tests;
//use src\classes\controlerCreation;
require "SAE\controller\controllerCreation.php";

use PHPUnit\Framework\TestCase;

class controlerCreationAleatoireTest extends TestCase {
    function testAleatoire() {
        $result = aleatoire();
        $length = strlen($result);
        self::assertEquals(8, $length);
        self::assertTrue(is_numeric($result));
    }
}
