<?php

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://change-this-to-the-site-you-are-testing/");
  }

  function testMyTestCase()
  {
    $this->open("/cms_blinkx2/index.php");
    $this->type("login", "admin");
    $this->type("password", "admin");
    $this->type("captcha", "666");
    $this->click("access");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("left-menu")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("menuItemA_1_1");
    try {
        $this->assertTrue($this->isTextPresent("Sincronizar Filme"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
  }
}
?>