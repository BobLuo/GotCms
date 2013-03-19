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
 * @author   Pierre Rambaud (GoT) http://rambaudpierre.fr
 * @license  GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link     http://www.got-cms.com
 */

namespace Gc\Db;

use Gc\User\Model;
use Zend\Db\Sql\Select;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:11.
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 * @group Gc
 * @category Gc_Tests
 * @package  Library
 */
class AbstractTableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractTable
     *
     * @return void
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @covers Gc\Db\AbstractTable::__construct
     *
     * @return void
     */
    protected function setUp()
    {
        $this->object = Model::fromArray(
            array(
                'lastname' => 'Test',
                'firstname' => 'Test',
                'email' => 'test@test.com',
                'login' => 'test',
                'user_acl_role_id' => 1,
            )
        );

        $this->object->setPassword('test');
        $this->object->save();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown()
    {
        $this->object->delete();
        unset($this->object);
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::__call
     *
     * @return void
     */
    public function testCall()
    {
        $this->assertInstanceOf('Zend\Db\ResultSet\ResultSet', $this->object->select());
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::fetchRow
     *
     * @return void
     */
    public function testFetchRow()
    {
        $result = $this->object->fetchRow($this->object->select());
        $this->assertInternalType('array', $result);
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::fetchRow
     *
     * @return void
     */
    public function testFetchRowFromQuery()
    {
        $select = new Select();
        $select->from('user');
        $result = $this->object->fetchAll($select);
        $this->assertInternalType('array', $result);
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::fetchAll
     *
     * @return void
     */
    public function testFetchAll()
    {
        $result = $this->object->fetchAll($this->object->select());
        $this->assertInternalType('array', $result);
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::fetchAll
     *
     * @return void
     */
    public function testFetchAllFromQuery()
    {
        $select = new Select();
        $select->from('user');
        $result = $this->object->fetchAll($select);
        $this->assertInternalType('array', $result);
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::fetchOne
     *
     * @return void
     */
    public function testFetchOneFromQuery()
    {
        $select = new Select();
        $select->from('user');
        $select->columns(array('email'));
        $select->where->equalTo('login', 'test');

        $result = $this->object->fetchOne($select);
        $this->assertEquals('test@test.com', $result);
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::fetchOne
     * @covers Gc\Db\AbstractTable::__call
     *
     * @return void
     */
    public function testFetchOne()
    {
        $result = $this->object->fetchOne($this->object->select());
        $this->assertInternalType('integer', $result);
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::fetchOne
     * @covers Gc\Db\AbstractTable::__call
     *
     * @return void
     */
    public function testFetchOneWitthFakeOption()
    {
        $result = $this->object->fetchOne($this->object->select(array('id' => 42)));
        $this->assertFalse($result);
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::execute
     *
     * @return void
     */
    public function testExecute()
    {
        $select = new Select();
        $select->from('user');
        $result = $this->object->execute($select);
        $this->assertInstanceOf('Zend\Db\Adapter\Driver\Pdo\Result', $result);
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::getLastInsertId
     *
     * @return void
     */
    public function testGetLastInsertId()
    {
        $this->assertInternalType('integer', $this->object->getLastInsertId());
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::events
     *
     * @return void
     */
    public function testEvents()
    {
        $this->assertInstanceOf('Gc\Event\StaticEventManager', $this->object->events());
    }

    /**
     * Test
     *
     * @covers Gc\Db\AbstractTable::getDriverName
     *
     * @return void
     */
    public function testGetDriverName()
    {
        $this->assertInternalType('string', $this->object->getDriverName());
    }
}
