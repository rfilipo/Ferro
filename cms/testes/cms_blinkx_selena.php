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
    //$this->click("link=Importar planilha");
    $this->click("link=Sincronizar filme");
    $this->waitForPageToLoad("30000");
    $this->click("link=Lista de filmes por canal");
    $this->waitForPageToLoad("30000");
    $this->click("link=Filmes a sincronizar");
    $this->waitForPageToLoad("30000");
    $this->click("link=Filmes sincronizados");     
    $this->waitForPageToLoad("30000");
    $this->click("link=Lista de filmes");
    $this->waitForPageToLoad("30000");
    $this->click("link=Cadastrar filme");
    $this->waitForPageToLoad("30000");
    $this->click("link=Produtoras");
    $this->waitForPageToLoad("30000");
    $this->click("link=Diretores");
    $this->waitForPageToLoad("30000");
    $this->click("link=Canais");
    $this->waitForPageToLoad("30000");
    $this->click("link=Campos extras");   
    $this->waitForPageToLoad("30000");
    $this->click("link=Banners cadastrados");
    $this->waitForPageToLoad("30000");
    $this->click("link=Novo banner");
    $this->waitForPageToLoad("30000");
    $this->click("link=Visitação");           
    $this->waitForPageToLoad("30000");
    $this->click("link=Usuários cadastrados");
    $this->waitForPageToLoad("30000");
    $this->click("link=Novo usuário");         
    $this->waitForPageToLoad("30000");
    $this->click("menuItemA_4_0");
    $this->waitForPageToLoad("30000");
    try {
        $this->assertTrue($this->isTextPresent("Login"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
  }
}
?>
