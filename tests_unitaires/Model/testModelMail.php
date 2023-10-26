<?php

require "..\..\Model\ConnexionBDD.php";
require "..\..\Model\ModelMail.php";
use PHPUnit\Framework\TestCase;

class testModelMail extends TestCase {
    function testEnvoieMail() {
        $result = envoieMail();
    }
}
