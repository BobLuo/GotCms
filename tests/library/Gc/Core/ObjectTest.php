<?php
/**
 * This source file is part of GotCms.
 *
 * GotCms is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * GotCms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with GotCms. If not, see <http://www.gnu.org/licenses/lgpl-3.0.html>.
 *
 * PHP Version >=5.3
 *
 * @category Gc_Tests
 * @package  Library
 * @author   Pierre Rambaud (GoT) <pierre.rambaud86@gmail.com>
 * @license  GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link     http://www.got-cms.com
 */

namespace Gc\Core;

use Gc\Registry;
use ReflectionClass;
use stdClass;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:10.
 *
 * @group Gc
 * @category Gc_Tests
 * @package  Library
 */
class ObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Object
     *
     * @return void
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->object = $this->getMockForAbstractClass('Gc\Core\Object');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown()
    {
        unset($this->object);
    }

    /**
     * Test
     *
     * @return void
     */
    public function testInit()
    {
        $this->assertNull($this->object->init());
    }


    /**
     * Test
     *
     * @return void
     */
    public function testSetId()
    {
        $class         = $this->getMethod('setId');
        $class->invokeArgs($this->object, array('id' => 1));
        $this->assertEquals(1, $this->object->getId());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testAddData()
    {
        $this->object->addData(array('k' => 'v'));
        $this->assertEquals('v', $this->object->getData('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSetData()
    {
        $this->object->setK('v');
        $this->assertEquals('v', $this->object->getData('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSetAllData()
    {
        $this->object->setData(array('k' => 'v', 'k2' => 'v2'));
        $this->assertEquals('v', $this->object->getData('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testUnsetData()
    {
        $this->object->setData('k', 'v');
        $this->object->unsK();
        $this->assertNull($this->object->getData('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testUnsetAllData()
    {
        $this->object->setData('k', 'v');
        $this->object->unsetData();
        $this->assertNull($this->object->getData('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetData()
    {
        $this->object->setData('k', 'v');
        $this->assertEquals('v', $this->object->getK());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testFakeMethod()
    {
        $this->setExpectedException('Gc\Exception');
        $this->object->fakeMethodToLaunchException();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetDataWithIndex()
    {
        $this->object->setData('a', array('b', 'c'));
        $this->assertEquals('b', $this->object->getData('a', 0));
        $this->assertNull($this->object->getData('a', 3));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetDataWithFakeIndex()
    {
        $this->object->setData('a', array('b', 'c'));
        $this->assertNull($this->object->getData('a', 3));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetDataWithIndexAndStringValue()
    {
        $this->object->setData('a', 'b');
        $this->assertEquals('b', $this->object->getData('a', 0));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetDataWithIndexAndObjectValue()
    {
        $newObject = $this->getMockForAbstractClass('Gc\Core\Object');
        $newObject->setData('b', 'c');
        $this->object->setData('a', $newObject);
        $this->assertEquals('c', $this->object->getData('a', 'b'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetDataWithIndexAndDifferentObjectValue()
    {
        $newObject    = new stdClass();
        $newObject->b = 'c';
        $this->object->setData('a', $newObject);
        $this->assertNull($this->object->getData('a', 'b'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetDataWithUndefinedKeyAndIndex()
    {
        $this->assertNull($this->object->getData('a', 'b'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetAllData()
    {
        $this->object->setData('k', 'v');
        $this->assertEquals(array('k' => 'v'), $this->object->getData());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetArrayData()
    {
        $this->object->setData(array('a' => array('b' => '1', 'c' => '2')));
        $this->assertEquals('1', $this->object->getData('a/b'));
        $this->assertNull($this->object->getData('b/c'));
        $this->assertNull($this->object->getData('a/b/'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testHasData()
    {
        $this->object->setData('k', 'v');
        $this->assertTrue($this->object->hasData('k'));
        $this->assertTrue($this->object->hasK());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testHasFakeData()
    {
        $this->assertFalse($this->object->hasData(''));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testToArray()
    {
        $this->object->setData('k', 'v');
        $this->assertArrayHasKey('k', $this->object->toArray());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testToArrayWithParameters()
    {
        $this->object->setData('k', 'v');
        $this->assertArrayHasKey('k2', $this->object->toArray(array('k', 'k2')));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testToXml()
    {
        $this->object->setData(array('k' => 'v'));
        $xml = '<?xml version="1.0" encoding="UTF-8"?><items><k><![CDATA[v]]></k></items>';
        $this->assertXmlStringEqualsXmlString($xml, $this->object->toXml(array(), 'items', true, true));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testToXmlWithoutParameters()
    {
        $this->object->setData(array('k' => 'v'));
        $this->object->toXml(array(), 'items', true, true);
        $this->object->toXml(array(), 'items', false, false);
        $xml = '<item><k><![CDATA[v]]></k></item>';
        $this->assertXmlStringEqualsXmlString($xml, $this->object->toXml());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testToJson()
    {
        $this->object->setData(array('k' => 'v'));
        $this->assertEquals(json_encode(array('k' => 'v')), $this->object->toJson());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testToString()
    {
        $this->object->setData(array('k' => 'v'));
        $this->assertEquals('v', $this->object->toString());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testToStringWithFormat()
    {
        $this->object->setData(array('a' => 'b', 'c' => 'd'));
        $this->assertEquals('b d', $this->object->toString('{{a}} {{c}}'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testOffsetSet()
    {
        $this->object->offsetSet('k', 'v');
        $this->assertEquals('v', $this->object->getData('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testOffsetExists()
    {
        $this->object->setData('k', 'v');
        $this->assertTrue($this->object->OffsetExists('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testOffsetUnset()
    {
        $this->object->setData('k', 'v');
        $this->object->offsetUnset('k');
        $this->assertNull($this->object->getData('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetOrigData()
    {
        $this->object->setOrigData('k', 'v');
        $this->assertEquals('v', $this->object->getOrigData('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetAllOrigData()
    {
        $this->object->setOrigData('k', 'v');
        $this->assertEquals(array('k' => 'v'), $this->object->getOrigData());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testHasDataChangedFor()
    {
        $this->object->setData('k', 'v');
        $this->object->setOrigData();
        $this->assertFalse($this->object->hasDataChangedFor('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSetOrigData()
    {
        $this->object->setOrigData('k', 'v');
        $this->assertEquals('v', $this->object->getOrigData('k'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSetAllOrigData()
    {
        $this->object->setData(array('k' => 'v', 'k2' => 'v2'));
        $this->object->setOrigData();
        $this->assertEquals('v', $this->object->getOrigData('k'));
    }


    /**
     * Test
     *
     * @return void
     */
    public function testOffsetGet()
    {
        $this->object->setData('k', 'v');
        $this->assertEquals('v', $this->object->offsetGet('k'));
    }

    /**
     * Retrieve protected method
     *
     * @param string $name Name
     *
     * @return mixed
     */
    protected function getMethod($name)
    {
        $class  = new ReflectionClass('Gc\Core\Object');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
}
