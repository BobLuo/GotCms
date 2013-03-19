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

namespace Gc\Session\SaveHandler;

use Zend\Db\TableGateway\TableGateway;
use Zend\Session\SaveHandler\DbTableGatewayOptions;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 19:48:38.
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 * @group Gc
 * @category Gc_Tests
 * @package  Library
 */
class DbTableGatewayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DbTableGateway
     *
     * @return void
     */
    protected $object;

    /**
     * @var array
     *
     * @return void
     */
    protected $testArray;

    /**
     * @var TableGateway
     *
     * @return void
     */
    protected $adapter;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $tablegateway_config = new DbTableGatewayOptions(
            array(
                'idColumn'   => 'id',
                'nameColumn' => 'name',
                'modifiedColumn' => 'updated_at',
                'lifetimeColumn' => 'lifetime',
                'dataColumn' => 'data',
            )
        );

        $this->adapter = new TableGateway(
            'core_session',
            \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter()
        );
        $this->object  = new DbTableGateway($this->adapter, $tablegateway_config);

        $this->testArray = array('foo' => 'bar', 'bar' => array('foo' => 'bar'));
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
     * @covers Gc\Session\SaveHandler\DbTableGateway::read
     * @covers Gc\Session\SaveHandler\DbTableGateway::write
     *
     * @return void
     */
    public function testRead()
    {
        $this->object->open('savepath', 'sessionname');

        $id = '242';

        $this->assertTrue($this->object->write($id, serialize($this->testArray)));

        $data = unserialize($this->object->read($id));
        $this->assertEquals(
            $this->testArray,
            $data,
            'Expected ' . var_export($this->testArray, 1) . "\nbut got: " . var_export($data, 1)
        );
    }
    /**
     * Test
     *
     * @covers Gc\Session\SaveHandler\DbTableGateway::read
     * @covers Gc\Session\SaveHandler\DbTableGateway::write
     *
     * @return void
     */
    public function testReadWithLifetimeExpired()
    {
        $this->object->open('savepath', 'sessionname');

        $id = '242';

        $this->assertTrue($this->object->write($id, serialize($this->testArray)));

        $this->adapter->update(array('lifetime' => 0), array('id' => $id));

        $data = $this->object->read($id);
        $this->assertEquals('', $data);
    }

    /**
     * Test
     *
     * @covers Gc\Session\SaveHandler\DbTableGateway::write
     *
     * @return void
     */
    public function testWrite()
    {
        $this->object->open('savepath', 'sessionname');
        $id = '242';
        $this->assertTrue($this->object->write($id, serialize($this->testArray)));
    }
}
