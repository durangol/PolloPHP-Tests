<?php

require __DIR__ . '/library/Pollo/Autoloader.php';
require __DIR__ . '/library/Pollo/Autoloader/StandardAutoloader.php';

define('LIBRARY_PATH', __DIR__ . '/library');
define('TESTS_PATH', __DIR__ . '/tests/library');

set_include_path(
	implode(
		PATH_SEPARATOR,
		array(
			LIBRARY_PATH,
			TESTS_PATH,
			get_include_path()
		)
	)
);

$namespacePaths = array(
    'Pollo' => LIBRARY_PATH . '/Pollo'
);
$autoloader = new Pollo\Autoloader(array(new Pollo\Autoloader\StandardAutoloader($namespacePaths)));

