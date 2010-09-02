<?php
require_once 'PHPUnit/Framework.php';
 
require_once 'testes/comportamento/BehaviorTests.php';

 
class AllTests
{
    public static function suite()
    {
        echo "

            ----------------------------------------
            Iniciando os testes CMS Blinkx Brasil ...
            
            ";

        $suite = new PHPUnit_Framework_TestSuite('comportamento');
        $suite->addTest(BehaviorTests::suite());
        return $suite;
    }
}
?>
