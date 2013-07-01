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
 * @package  ZfModules
 * @author   Pierre Rambaud (GoT) <pierre.rambaud86@gmail.com>
 * @license  GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link     http://www.got-cms.com
 */

namespace Admin\Controller;

use Gc\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Gc\Core\Config;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-15 at 23:51:25.
 *
 * @group    ZfModules
 * @category Gc_Tests
 * @package  ZfModules
 */
class IndexControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->init();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testIndexAction()
    {
        $this->dispatch('/admin');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Admin');
        $this->assertControllerName('AdminController');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('admin');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSaveDashboardAction()
    {
        $this->dispatch(
            '/admin/dashboard/save',
            'POST',
            array('sortable1' => 'fast-links,blog', 'sortable2' => 'stats')
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Admin');
        $this->assertControllerName('AdminController');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('admin/dashboard-save');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSaveDashboardActionWithDashboardParam()
    {
        $this->dispatch(
            '/admin/dashboard/save',
            'POST',
            array('dashboard' => true)
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Admin');
        $this->assertControllerName('AdminController');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('admin/dashboard-save');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSaveDashboardActionWithoutWidgets()
    {
        Config::setValue('dashboard_widgets', '');
        $this->dispatch(
            '/admin/dashboard/save',
            'POST',
            array('sortable1' => 'fast-links,blog', 'sortable2' => 'stats')
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Admin');
        $this->assertControllerName('AdminController');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('admin/dashboard-save');
    }
}
