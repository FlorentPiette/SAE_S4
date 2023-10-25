<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelConnexionEtu.php";
use PHPUnit\Framework\TestCase;

class testModelConnexionEtu extends TestCase {
    function testselectEmailMDPEtu() {
        $result = selectEmailMDPRoleAdmin(Conn::getInstance());
        self::assertIsArray($result);
    }
}
