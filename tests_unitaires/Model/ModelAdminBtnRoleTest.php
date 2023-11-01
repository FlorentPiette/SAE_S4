<?php

require "..\..\Model\ConnexionBDD.php ";
require "..\..\Model\ModelAdminBtnRole.php";
use PHPUnit\Framework\TestCase;

class ModelAdminBtnRoleTest extends TestCase {
    function testGetAdminDataByRoleAndReturnJSON() {
        $result = getAdminDataByRoleAndReturnJSON('tous');
        self::assertJson($result);
    }
}
