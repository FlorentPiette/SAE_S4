<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelConnexionAdmin.php";
use PHPUnit\Framework\TestCase;

class testModelConexionAdmin extends TestCase {
    function testselectEmailMDPRoleAdmin() {
        $result = selectEmailMDPRoleAdmin(Conn::getInstance());
        self::assertIsArray($result);
    }
}
