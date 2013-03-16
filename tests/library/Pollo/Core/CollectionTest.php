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

    public function testCount()
    {
        $this->assertCount($this->_collection->count(),$this->_collection->toArray());
        $this->assertCount(4,$this->_collection->toArray());
    }

    public function testCurrent()
    {
        $this->assertEquals(1, $this->_collection->current());
        $this->assertEquals(2, $this->_collection->current());
    }

   public function testGetIterator()
    {
        $this->assertInstanceOf('Object',$this->_collection->getIterator());
        $this->assertInstanceOf('ArrayIterator',$this->_collection->getIterator());
    }

   public function testKey()
    {
        $this->assertArrayHasKey(0, $this->_collection->toArray());
        $this->assertArrayHasKey(5, $this->_collection->toArray());
    }

   public function testNext()
    {
        $this->assertEquals(1, $this->_collection->next());
        $this->assertEquals(2, $this->_collection->next());

    }

   public function testOffsetExists()
    {
        $this->assertTrue($this->_collection->offsetExists(1));
        $this->assertFalse($this->_collection->offsetExists(4));
        $this->assertTrue($this->_collection->offsetExists(4));
    }

   public function testOffsetGet()
    {
        $this->assertEquals(1, $this->_collection->offsetGet(2));
        $this->assertEquals(2, $this->_collection->offsetGet(1));
    }

   public function testOffsetSet()
    {
        $this->_collection->offsetSet(1,5);
        $this->assertEquals(2, $this->_collection->offsetGet(1));
        $this->assertEquals(5, $this->_collection->offsetGet(1));
    }

   public function testOffsetUnset()
    {
        $this->_collection->offsetUnset(1);
        $this->assertArrayHasKey(1, $this->_collection->toArray());
        $this->assertArrayHasKey(0, $this->_collection->toArray());
    }

}