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

namespace Gc\Core\Updater\Adapter;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:11.
 *
 * @group Gc
 * @category Gc_Tests
 * @package  Library
 */
class AbstractAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractAdapter
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
        $this->object = $this->getMockForAbstractClass('Gc\Core\Updater\Adapter\AbstractAdapter');
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
    public function testGetLatestVersion()
    {
        $this->assertEquals(\Gc\Version::getLatest(), $this->object->getLatestVersion());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testAddMessage()
    {
        $this->assertInstanceOf('Gc\Core\Updater\Adapter\AbstractAdapter', $this->object->addMessage('test'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetMessages()
    {
        $this->assertInternalType('array', $this->object->getMessages());
    }
}
