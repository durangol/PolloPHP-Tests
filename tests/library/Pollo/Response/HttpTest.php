<?php

namespace Pollo\Response;

use Pollo\Application\Mvc\Response;

class HttpTest extends \PHPUnit_Framework_TestCase
{
	protected $_httpResponse;

	protected function setUp()
	{
		parent::setUp();
		$this->_httpResponse = new Http();
	}

	public function testGetSetBody()
	{
		$body = "{foo: 'bar'}";
		$this->_httpResponse->setBody($body);
		$this->assertEquals($body, $this->_httpResponse->getBody());	
	}

	public function testGetSetHeader()
	{
		$headers = array('Content-Type' => 'text/html; charset=utf-8');
		$this->_httpResponse->setHeader('Content-Type', $headers['Content-Type']);
		$this->assertEquals($headers, $this->_httpResponse->getHeaders());
	}


	public function testGetSetHeaders()
	{
		$headers = array('Content-Type' => 'text/html; charset=utf-8');
		$this->_httpResponse->setHeaders($headers);
		$this->assertEquals($headers, $this->_httpResponse->getHeaders());
	}

	public function testGetSetResponseCode()
	{
		$code = $this->_httpResponse->getResponseCode();
		$this->assertEquals($code, 200);
		$this->_httpResponse->setResponseCode(404);
		$this->assertSame($this->_httpResponse->getResponseCode(), 404);
	}

	public function testAppendToBody()
	{
		$content = "{footer: 'goes here'}";
		$body = $this->_httpResponse->getBody();
		$this->_httpResponse->appendToBody($content);
		$this->assertNotEquals($body, $this->_httpResponse->getBody());
	}

	public function testPrependToBody()
	{
		$content = "{head: 'goes here'}";
		$body = $this->_httpResponse->getBody();
		$this->_httpResponse->prependToBody($content);
		$this->assertNotEquals($body, $this->_httpResponse->getBody());	
	}

	public function testSend()
	{
		ob_start();
		$this->_httpResponse->setBody("{Anyhting: 'I want'}");
		$this->_httpResponse->send();
		$content = ob_get_contents();
		ob_end_clean();
		$this->assertEquals($content, "{Anyhting: 'I want'}");
	}
}