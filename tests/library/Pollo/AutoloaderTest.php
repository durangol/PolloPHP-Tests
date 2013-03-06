<?php

namespace Pollo;

class AutoloaderTest extends \PHPUnit_Framework_TestCase
{
	public function testAutoloaderInstance()
	{
		$mockAutoloader = $this->getMock('Pollo\\Autoloader\\StandardAutoloader', array('__construct', 'autoload'));
		$mockAutoloader->expects($this->atLeastOnce())
					   ->method('autoload');
		$autoloader = new Autoloader(array($mockAutoloader));
		$autoloader->autoload('Pollo\\Core\\Collection');
		spl_autoload_unregister(array($autoloader, 'autoload'));
	}

	public function testAutoloaderFunction()
	{
		$autoloadFunction = function($class) {
			return true;
		};
		$autoloader = new Autoloader(array($autoloadFunction));
		$autoloader->autoload('Pollo\\Core\\Collection');
		spl_autoload_unregister(array($autoloader, 'autoload'));
	}
}