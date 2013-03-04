<?php

namespace Pollo;

class AutoloaderTest extends \PHPUnit_Framework_TestCase
{
	public function testAutoloaderInstance()
	{
		$mockAutoloader = $this->getMock('Pollo\\Autoloader\\StandardAutoloader', array('autoload'));
		$mockAutoloader->expects($this->once())
					   ->method('autoload')
					   ->with($this->stringContains('Pollo\\Core\\Collection'));
					   
		$autoloader = new Autoloader(array($mockAutoloader));
		$autoloader->autoload('Pollo\\Core\\Collection');
		spl_autoload_unregister($autoloader);
	}

	public function testAutoloaderFunction()
	{
		$autoloadFunction = function($class) {
			require_once(str_replace('\\', '/', $class) . '.php');
		};
		$autoloader = new Autoloader(array($autloadFunction));
		$autoloader->autoload('Pollo\\Core\\Collection');
		$this->assertTrue(class_exists('Pollo\\Core\\Collection'));
		spl_autoload_unregister($autoloader);
	}
}