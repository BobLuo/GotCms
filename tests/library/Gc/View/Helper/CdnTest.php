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

namespace Gc\View\Helper;

use Gc\Core\Config as CoreConfig;
use Zend\Form\Element;
use Gc\Registry;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:08.
 *
 * @group Gc
 * @category Gc_Tests
 * @package  Library
 */
class CdnTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FormCheckbox
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
        $this->object = new Cdn(Registry::get('Application')->getRequest());
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
    public function testInvokeSecure()
    {
        $basePath = CoreConfig::setValue('force_frontend_ssl', 1);
        $basePath = CoreConfig::setValue('secure_cdn_base_path', 'https://got-cms.com');
        $this->assertEquals('https://got-cms.com/test', $this->object->__invoke('test'));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testInvokeUnsecure()
    {
        $basePath = CoreConfig::setValue('force_frontend_ssl', 0);
        $basePath = CoreConfig::setValue('unsecure_cdn_base_path', 'http://got-cms.com');
        $this->assertEquals('http://got-cms.com/test', $this->object->__invoke('test'));
    }
}
