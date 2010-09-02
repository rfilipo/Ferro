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
    $this->open("/cms_blinkx2/index.php?action=importaplanilha");
    try {
        $this->assertTrue($this->isTextPresent("Passo 1 - Selecione o arquivo"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->type("planilha", "/media/SQ004224P01/projetos/elocompany/prototipos/0.2/planilhas/cinema.csv");
    $this->click("enviar");
    $this->waitForPageToLoad("30000");
    try {
        $this->assertTrue($this->isTextPresent("Passo 2 - Setup da importação"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->click("enviar");
    $this->waitForPageToLoad("30000");
    try {
        $this->assertTrue($this->isTextPresent("Passo 3 - Confirma! Verifique o resultado"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->click("enviar");
    $this->waitForPageToLoad("30000");
    try {
        $this->assertTrue($this->isTextPresent("Passo 4 - Sucesso! Planilha importada."));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
  }
}
?>