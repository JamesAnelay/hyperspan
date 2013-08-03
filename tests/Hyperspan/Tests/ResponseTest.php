<?php
namespace Hyperspan\Tests;
use Hyperspan\Response;

/**
 * @backupGlobals disabled
 */
class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testSetProperties()
    {
        $res = new Response();
        $res->setProperties(array(
            'title' => 'Add Item',
            'foo' => 'bar',
            'bar' => 'baz'
        ));

        $expected = array(
            'properties' => array(
                'title' => 'Add Item',
                'foo' => 'bar',
                'bar' => 'baz'
            )
        );
        $this->assertEquals($res->toArray(), $expected);
    }

    public function testAddLink()
    {
        $res = new Response();
        $res->addLink('self', 'http://localhost/foo/bar');

        $expected = array(
            'links' => array(
                array(
                    'rel' => 'self',
                    'href' => 'http://localhost/foo/bar'
                )
            )
        );
        $this->assertEquals($res->toArray(), $expected);
    }

    public function testAddAction()
    {
        $res = new Response();
        $res->addAction('add-item', array(
            'title' => 'Add Item',
            'method' => 'POST',
            'href' => '/post'
        ));

        $expected = array(
            'actions' => array(
                array(
                    'name' => 'add-item',
                    'title' => 'Add Item',
                    'method' => 'POST',
                    'href' => '/post'
                )
            )
        );
        $this->assertEquals($res->toArray(), $expected);
    }

    public function testAddItem()
    {
        $res = new Response();
        $res->addItem(array(
            'some' => 'value',
            'something' => 'else',
            'another' => 'one'
        ));

        $expected = array(
            'entities' => array(
                array(
                    'some' => 'value',
                    'something' => 'else',
                    'another' => 'one'
                )
            )
        );
        $this->assertEquals($res->toArray(), $expected);
    }
}

