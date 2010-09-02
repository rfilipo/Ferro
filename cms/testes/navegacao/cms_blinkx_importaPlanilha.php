<?php

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  function setUp()
  {
    $this->setBrowser("*custom /usr/bin/google-chrome");
    $this->setBrowserUrl("http://ricardo.local/");
  }

  function testMyTestCase()
  {
    $this->open("/cms_blinkx2/index.php");
    $this->type("login", "admin");
    $this->type("password", "admin");
    $this->type("captcha", "666");
    $this->click("access");
    $this->waitForPageToLoad("30000");
  }
}
?>
