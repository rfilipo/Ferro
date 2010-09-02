<?php
/**
 * PHPUnit Test Runner WUI Sample config file.
 */
// excluded folders patterns
$exclude = array('/PHPUnit/','navegacao/','comportamento/');
$exclude = array('navegacao/');


// the root directory of the tests
//define('ROOT_DIR', realpath(dirname(__FILE__)).'/../');

define('ROOT_DIR', '/home/filipo/Projects/elocompany/prototipos/0.4/testes/');

// excluded folders patterns
$exclude = array('/PHPUnit/');

// test file suffix (used to determine test files from other files)
define('TEST_SUFFIX', 'Test');

// the directory where the code coverage reports will be generated
define('CODE_COVERAGE_DIR', dirname(__FILE__) . '/CodeCoverageReports');

// location of the PHPUnit command line script
//define('PHPUNIT', dirname(dirname(__FILE__)) . '/phpunit');
define('PHPUNIT', '/usr/bin/phpunit');

// location of the PHPUnit framework folder
// define this if PHPUnit is not in the include path
//define('PHPUNIT_DIR', dirname(dirname(__FILE__)) . '/PHPUnit');

// used for running single test cases
define('TEST_CASE_PREFIX', 'test');

// used for variable decorator
define('TAB_WIDTH', '4');

// set this to true if you want to use Ajax requests with progressive test loading status
define('USE_AJAX', true);

/*EOF*/
