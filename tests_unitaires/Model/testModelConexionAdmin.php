<?php

require "..\..\Model\ModelConnexionAdmin.php";
require "..\..\Model\ConnexionBDD.php";
use PHPUnit\Framework\TestCase;

class testModelConexionAdmin extends TestCase {
    function testselectEmailMDPRoleAdmin() {
        $result = selectEmailMDPRoleAdmin(Conn::getInstance());
        self::assertIsArray($result);
    }
}
