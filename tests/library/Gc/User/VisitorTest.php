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

namespace Gc\User;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:08.
 *
 * @group Gc
 * @category Gc_Tests
 * @package  Library
 */
class VisitorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Visitor
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
        $this->object = new Visitor;
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
    public function testGetVisitorId()
    {
        $_SERVER['HTTP_USER_AGENT']      = 'Mozilla/5.0 (X11; Linux x86_64; ' .
            'rv:10.0.11) Gecko/20100101 Firefox/10.0.11 Iceweasel/10.0.11';
        $_SERVER['HTTP_ACCEPT_CHARSET']  = null;
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'en-us,en;q=0.5';
        $_SERVER['SERVER_ADDR']          = '127.0.0.1';
        $_SERVER['REMOTE_ADDR']          = '127.0.0.1';
        $_SERVER['REQUEST_URI']          = '/test';
        $_SERVER['HTTP_REFERER']         = '/';
        $this->assertInternalType('integer', (int) $this->object->getVisitorId('9135ejnhfiebe6u85qhmas7k12'));
    }
    /**
     * Test
     *
     * @return void
     */
    public function testGetVisitorIdWithWrongData()
    {
        $_SERVER['HTTP_USER_AGENT']      = null;
        $_SERVER['HTTP_ACCEPT_CHARSET']  = null;
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = null;
        $_SERVER['SERVER_ADDR']          = '127.0.0.1';
        $_SERVER['REMOTE_ADDR']          = '127.0.0.1';
        $_SERVER['REQUEST_URI']          = '/test';
        $_SERVER['HTTP_REFERER']         = '/';
        $this->assertInternalType('integer', (int) $this->object->getVisitorId('9135ejnhfiebe6u85qhmas7k12'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetUrlId()
    {
        $this->assertInternalType('integer', (int) $this->object->getUrlId('/something', null));
        //Existing url
        $this->assertInternalType('integer', (int) $this->object->getUrlId('/something', null));
        //with referer
        $this->assertInternalType('integer', (int) $this->object->getUrlId('/something', '/somewhat'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetTotalVisitors()
    {
        $this->assertInternalType('integer', (int) $this->object->getTotalVisitors());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetTotalPageViews()
    {
        $this->assertInternalType('integer', (int) $this->object->getTotalPageViews());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetNbPagesViews()
    {
        $this->assertInternalType('array', $this->object->getNbPagesViews('HOUR'));
        $this->assertInternalType('array', $this->object->getNbPagesViews('TEST'));
        $this->assertInternalType('array', $this->object->getNbPagesViews('DAY'));
        $this->assertInternalType('array', $this->object->getNbPagesViews('MONTH'));
        $this->assertInternalType('array', $this->object->getNbPagesViews('YEAR'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetNbVisitors()
    {
        $this->assertInternalType('array', $this->object->getNbVisitors('TEST'));
        $this->assertInternalType('array', $this->object->getNbVisitors('HOUR'));
        $this->assertInternalType('array', $this->object->getNbVisitors('DAY'));
        $this->assertInternalType('array', $this->object->getNbVisitors('MONTH'));
        $this->assertInternalType('array', $this->object->getNbVisitors('YEAR'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetUrlsViews()
    {
        $this->assertInternalType('array', $this->object->getUrlsViews('TEST'));
        $this->assertInternalType('array', $this->object->getUrlsViews('HOUR'));
        $this->assertInternalType('array', $this->object->getUrlsViews('DAY'));
        $this->assertInternalType('array', $this->object->getUrlsViews('MONTH'));
        $this->assertInternalType('array', $this->object->getUrlsViews('YEAR'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testGetReferers()
    {
        $this->assertInternalType('array', $this->object->getReferers('TEST'));
        $this->assertInternalType('array', $this->object->getReferers('HOUR'));
        $this->assertInternalType('array', $this->object->getReferers('DAY'));
        $this->assertInternalType('array', $this->object->getReferers('MONTH'));
        $this->assertInternalType('array', $this->object->getReferers('YEAR'));
    }
}
