<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelConnexion.php";
use PHPUnit\Framework\TestCase;

class testModelConnexion extends TestCase {
    function testselectEmailMDPRoleAdmin() {
        $result = selectEmailMDPRoleAdmin(Conn::getInstance(), "test@email.com");
        self::assertIsArray($result);
    }
}
