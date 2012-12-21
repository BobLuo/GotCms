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

namespace Gc\View;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:08.
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 * @group Gc
 * @category Gc_Tests
 * @package  Library
 */
class StreamTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $existed = in_array("zend.view", stream_get_wrappers());
        if($existed)
        {
            stream_wrapper_unregister("zend.view");
        }
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Gc\View\Stream::stream_open
     * @covers Gc\View\Stream::stream_seek
     * @covers Gc\View\Stream::url_stat
     */
    public function testStream_open()
    {
        stream_wrapper_register('zend.view', '\Gc\View\Stream');
        $file = fopen('zend.view://Stream', 'r+');
        $this->assertInternalType(\PHPUnit_Framework_Constraint_IsType::TYPE_RESOURCE, $file);
    }

    /**
     * @covers Gc\View\Stream::stream_open
     * @covers Gc\View\Stream::stream_read
     * @covers Gc\View\Stream::stream_write
     * @covers Gc\View\Stream::stream_eof
     * @covers Gc\View\Stream::stream_stat
     * @covers Gc\View\Stream::stream_seek
     * @covers Gc\View\Stream::url_stat
     */
    public function testStream_read()
    {
        stream_wrapper_register('zend.view', '\Gc\View\Stream');
        file_put_contents('zend.view://Stream', 'test');
        $this->assertEquals(file_get_contents('zend.view://Stream'), 'test');
    }

    /**
     * @covers Gc\View\Stream::stream_open
     * @covers Gc\View\Stream::stream_read
     * @covers Gc\View\Stream::stream_write
     * @covers Gc\View\Stream::stream_eof
     * @covers Gc\View\Stream::stream_stat
     * @covers Gc\View\Stream::stream_seek
     * @covers Gc\View\Stream::url_stat
     */
    public function testStream_write()
    {
        stream_wrapper_register('zend.view', '\Gc\View\Stream');
        file_put_contents('zend.view://Stream', 'test');
        $this->assertEquals(file_get_contents('zend.view://Stream'), 'test');
    }

    /**
     * @covers Gc\View\Stream::stream_open
     * @covers Gc\View\Stream::stream_write
     * @covers Gc\View\Stream::stream_tell
     * @covers Gc\View\Stream::stream_seek
     * @covers Gc\View\Stream::url_stat
     */
    public function testStream_seekSEEK_SET()
    {
        stream_wrapper_register('zend.view', '\Gc\View\Stream');
        file_put_contents('zend.view://Stream', "test\ntest\ntest");
        $fp = fopen('zend.view://Stream', 'r');
        $this->assertEquals(0, fseek($fp, 0, SEEK_SET));
    }

    /**
     * @covers Gc\View\Stream::stream_open
     * @covers Gc\View\Stream::stream_write
     * @covers Gc\View\Stream::stream_tell
     * @covers Gc\View\Stream::stream_seek
     * @covers Gc\View\Stream::url_stat
     */
    public function testStream_seekSEEK_CUR()
    {
        stream_wrapper_register('zend.view', '\Gc\View\Stream');
        file_put_contents('zend.view://Stream', "test\ntest\ntest");
        $fp = fopen('zend.view://Stream', 'a+');
        $this->assertEquals(0, fseek($fp, 0, SEEK_CUR));
    }

    /**
     * @covers Gc\View\Stream::stream_open
     * @covers Gc\View\Stream::stream_write
     * @covers Gc\View\Stream::stream_tell
     * @covers Gc\View\Stream::stream_seek
     * @covers Gc\View\Stream::url_stat
     */
    public function testStream_seekSEEK_END()
    {
        stream_wrapper_register('zend.view', '\Gc\View\Stream');
        file_put_contents('zend.view://Stream', "test\ntest\ntest");
        $fp = fopen('zend.view://Stream', 'r');
        $this->assertEquals(0, fseek($fp, -1, SEEK_END));
    }

    /**
     * @covers Gc\View\Stream::stream_open
     * @covers Gc\View\Stream::stream_read
     * @covers Gc\View\Stream::stream_write
     * @covers Gc\View\Stream::stream_tell
     * @covers Gc\View\Stream::stream_eof
     * @covers Gc\View\Stream::stream_seek
     * @covers Gc\View\Stream::url_stat
     */
    public function testStream_eof()
    {
        stream_wrapper_register('zend.view', '\Gc\View\Stream');
        file_put_contents('zend.view://Stream', "test\ntest\ntest");
        $fp = fopen('zend.view://Stream', 'a+');
        do
        {
            $line = fgets($fp);
        }
        while(!feof($fp));

        $this->assertTrue(feof($fp));
    }
}
