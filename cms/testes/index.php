<h1>Testes para cms_blinkx</h1>
<li>Comportamento
<?php


require_once 'PHPSpec.php';

$options = new stdClass;
$options->recursive = true;
$options->specdocs = true;
$options->reporter = 'html';

PHPSpec_Runner::run($options);

?>
<li>Navega&ccedil;&atilde;o e Units</li>
<iframe width='95%' src='phpunitwebui'></iframe>

