<?php

require "..\..\Model\ModelAdminBtnRole.php";
require "..\..\Model\ConnexionBDD.php ";
use PHPUnit\Framework\TestCase;

class ModelAdminBtnRoleTest extends TestCase {
    function testGetAdminDataByRoleAndReturnJSON() {
        $result = getAdminDataByRoleAndReturnJSON('tous');
        self::assertJson($result);
    }
}
