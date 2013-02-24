<?php

require __DIR__ . '/library/Pollo/Autoloader.php';
require __DIR__ . '/library/Pollo/Autoloader/StandardAutoloader.php';

set_include_path(
	implode(
		PATH_SEPARATOR,
		array(
			__DIR__ . '/library/',
			__DIR__ . '/tests/library',
			get_include_path()
		)
	)
);

$autoloader = new Pollo\Autoloader(array(new Pollo\Autoloader\StandardAutoloader()));

