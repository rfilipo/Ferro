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
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("left-menu")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("link=Importar planilha");
    $this->waitForPageToLoad("30000");
    try {
        $this->assertTrue($this->isTextPresent("Passo 1 - Selecione o arquivo"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->click("menuItemA_1_1");
    $this->click("menuItemA_2_1");
    $this->click("menuItemA_3_1");
    $this->click("menuItemA_4_1");
    $this->click("menuItemA_5_1");
    $this->click("menuItemA_6_1");
    $this->click("menuItemA_7_1");
    $this->click("menuItemA_8_1");
    $this->click("menuItemA_9_1");
    $this->click("menuItemA_10_1");
    $this->click("menuItemA_11_1");
    $this->click("menuItemA_12_1");
    $this->click("menuItemA_13_1");
    $this->click("menuItemA_14_1");
    $this->click("menuItemA_15_1");
    $this->click("menuItemA_4_0");
    try {
        $this->assertTrue($this->isTextPresent("Login"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
  }
}
?>
