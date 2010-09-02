<?php
require_once 'testes/comportamento/ImportaPlanilhaSpec.php';
require_once 'testes/comportamento/PlanilhaStoreSpec.php';
 
class BehaviorTests extends PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        $suite = new BehaviorTests('Testes de comportamento cms_blinkx');
        $suite ->addTesteSuite('ImportaPlanilhaSpec');
        $suite ->addTesteSuite('PlanilhaStoreSpec');
        return $suite;
    }
 
    protected function setUp()
    {
        print __METHOD__ . "\n";
    }
 
    protected function tearDown()
    {
        print __METHOD__ . "\n";
    }
}
?>
