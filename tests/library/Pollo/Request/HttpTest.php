<?php

namespace Pollo\Request;

use Pollo\Application\Mvc\Router\Route\Regex;

class HttpTest
{
    protected $_httpRequest;

    protected function setUp()
    {
        parent::setUp();
        $this->_httpRequest = new Http();
    }

    public function testGetRoute()
    {

    }

    public function testSetRoute()
    {
        $route = new Regex('test/route');
        $this->_httpRequest->setRoute($route);
        $this->assertEquals($route, $this->_httpRequest->getRoute());
        $this->assertInstanceOf('Pollo\\Application\\Mvc\\Router\\Route\\RouteInterface', $this->_httpRequest->getRoute());
    }

    public function testGetParams()
    {
        $this->assertEquals($_GET, $this->_httpRequest->getParams());
    }

    public function testGetParam()
    {
        $_GET['foo'] = 'bar';
        $this->assertEquals($_GET['foo'], $this->_httpRequest->getGetParam('foo'));
    }

    public function testSetParam()
    {
        $this->_httpRequest->setParam('foo', 'bar');
        $this->assertContains('foo', $_GET['foo']);
        $this->assertEquals('bar', $_GET['foo']);
    }

    public function testSetParams()
    {
        $params = array('foo' => 'bar', 'baz' => 'bat');
        $this->_httpRequest->setParams($params);
        $this->assertContains('foo', $_GET['foo']);
        $this->assertEquals('bar', $_GET['foo']);
        $this->assertContains('baz', $_GET['baz']);
        $this->assertEquals('bat', $_GET['baz']);
    }

    public function testGetPost()
    {
        $this->assertEquals($_POST, $this->_httpRequest->getPost());
    }

    public function testGetPostParam()
    {
        $_POST['foo'] = 'bar';
        $this->assertEquals($_POST['foo'], $this->_httpRequest->getPostParam('foo'));
    }

    public function testSetPostParam()
    {
        $this->_httpRequest->setPostParam('foo', 'bar');
        $this->assertContains('foo', $_POST['foo']);
        $this->assertEquals('bar', $_POST['foo']);
    }

    public function testSetPostParams()
    {
        $params = array('foo' => 'bar', 'baz' => 'bat');
        $this->_httpRequest->setPostParams($params);
        $this->assertContains('foo', $_POST['foo']);
        $this->assertEquals('bar', $_POST['foo']);
        $this->assertContains('baz', $_POST['baz']);
        $this->assertEquals('bat', $_POST['baz']);
    }

    public function testGetServer()
    {
        $this->assertEquals($_SERVER, $this->_httpRequest->getServer());
    }

    public function testGetCookie()
    {
        $this->assertEquals($_COOKIE, $this->_httpRequest->getCookie());
    }

    public function testGetHeader()
    {
        header('Accept: text/plain');
        $this->assertEquals('text/plain', $this->_httpRequest->getHeader('Accept'));
    }

    public function testGetHeaders()
    {

    }
}