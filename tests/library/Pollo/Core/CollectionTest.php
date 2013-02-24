<?php

namespace Pollo\Core;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
	protected $_collection;

	protected function setUp()
	{
		parent::setUp();
		$this->_collection = new Collection(array(1, 2, 3));
	}

	public function testToArray()
	{
		$this->assertEquals($this->_collection->toArray(), array(1, 2, 3));
	}
}