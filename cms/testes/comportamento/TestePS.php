<?php
require_once 'PHPUnit/Extensions/Story/TestCase.php';
require_once 'includes/classes/PlanilhaStore.php';
require_once 'includes/config.inc.php';

$store = new PlanilhaStore('caca','tutut');
$store2 = new PlanilhaStore();
var_dump($store);
?>
