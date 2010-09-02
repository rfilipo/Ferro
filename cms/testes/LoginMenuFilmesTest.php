<?php

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://ricardo.local/");
  }

  function testMyTestCase()
  {
    $this->open("/cms_blinkx2/index.php");
    $this->type("login", "admin");
    $this->type("password", "admin");
    $this->type("captcha", "666");
    $this->click("access");
    $this->select("selectCanal", "label=ELO Cinema");
    $this->click("menuItemA_0_1");
    $this->click("menuItemA_1_1");
    $this->click("menuItemA_2_1");
    $this->click("menuItemA_3_1");
    $this->click("menuItemA_4_1");
  }
}
?>