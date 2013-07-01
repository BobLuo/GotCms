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

namespace Development\Controller;

use Gc\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Gc\Script\Model as ScriptModel;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-15 at 23:50:27.
 *
 * @group    ZfModules
 * @category Gc_Tests
 * @package  ZfModules
 */
class ScriptControllerTest extends AbstractHttpControllerTestCase
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
        $this->dispatch('/admin/development/script');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testCreateAction()
    {
        $this->dispatch('/admin/development/script/create');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/create');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testCreateActionWithInvalidPostData()
    {
        $this->dispatch(
            '/admin/development/script/create',
            'POST',
            array(
            )
        );

        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/create');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testCreateActionWithPostData()
    {
        $this->dispatch(
            '/admin/development/script/create',
            'POST',
            array(
                'name' => 'ScriptName',
                'identifier' => 'Identifier',
                'description' => 'Description',
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/create');

        ScriptModel::fromIdentifier('Identifier')->delete();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testEditActionWithInvalidId()
    {
        $this->dispatch('/admin/development/script/edit/99999');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/edit');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testEditAction()
    {
        $scriptModel = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier'
            )
        );
        $scriptModel->save();

        $this->dispatch('/admin/development/script/edit/' . $scriptModel->getId());
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/edit');

        $scriptModel->delete();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testEditActionWithInvalidPostData()
    {
        $scriptModel = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier'
            )
        );
        $scriptModel->save();

        $this->dispatch(
            '/admin/development/script/edit/' . $scriptModel->getId(),
            'POST',
            array(
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/edit');

        $scriptModel->delete();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testEditActionWithPostData()
    {
        $scriptModel = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier'
            )
        );
        $scriptModel->save();

        $this->dispatch(
            '/admin/development/script/edit/' . $scriptModel->getId(),
            'POST',
            array(
                'name' => 'ScriptName',
                'identifier' => 'Identifier',
                'description' => 'Description',
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/edit');

        $scriptModel->delete();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testDeleteAction()
    {
        $scriptModel = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier'
            )
        );
        $scriptModel->save();

        $this->dispatch('/admin/development/script/delete/' . $scriptModel->getId());
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/delete');

        $scriptModel->delete();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testDeleteActionWithInvalidId()
    {
        $this->dispatch('/admin/development/script/delete/9999');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/delete');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testUploadAction()
    {
        $files = array(
            'upload' => array(
                'name' => __DIR__ . '/_files/upload.phtml',
                'type' => 'plain/text',
                'size' => 8,
                'tmp_name' => __DIR__ . '/_files/upload.phtml',
                'error' => 0,
            )
        );

        $scriptModel = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier'
            )
        );
        $scriptModel->save();

        $this->dispatch('/admin/development/script/upload/' . $scriptModel->getId());
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/upload');

        $scriptModel->delete();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testUploadActionWithoutId()
    {
        $files = array(
            'upload' => array(
                'name' => array(
                    'upload.phtml',
                    'test.phtml',
                    'test2.phtml',
                ),
                'type' => array(
                    'plain/text',
                    'plain/text',
                    'plain/text',
                ),
                'size' => array(
                    8,
                    8,
                    8,
                ),
                'tmp_name' => array(
                    __DIR__ . '/_files/upload.phtml',
                    __DIR__ . '/_files/test.phtml',
                    __DIR__ . '/_files/test.phtml',
                ),
                'error' => array(
                    UPLOAD_ERR_OK,
                    UPLOAD_ERR_OK,
                    UPLOAD_ERR_NO_FILE,
                ),
            ),
        );

        $scriptModel = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'upload'
            )
        );
        $scriptModel->save();

        $this->dispatch('/admin/development/script/upload');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/upload');

        $scriptModel->delete();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testUploadActionWithEmptyFilesData()
    {
        $files = array('upload' => array());
        $this->dispatch('/admin/development/script/upload');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/upload');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testUploadActionWithInvalidId()
    {
        $this->dispatch('/admin/development/script/upload/9999');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/upload');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testDownloadAction()
    {
        $scriptModel = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier',
                'content' => 'Test',
            )
        );
        $scriptModel->save();

        $this->dispatch('/admin/development/script/download/' . $scriptModel->getId());
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/download');

        $scriptModel->delete();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testDownloadActionWithEmptyContent()
    {
        $scriptModel = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier',
            )
        );
        $scriptModel->save();

        $this->dispatch('/admin/development/script/download/' . $scriptModel->getId());
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/download');

        $scriptModel->delete();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testDownloadActionWithInvalidId()
    {
        $this->dispatch('/admin/development/script/download/9999');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/download');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testDownloadActionWithoutId()
    {
        $scriptModel = ScriptModel::fromArray(
            array(
                'name' => 'ScriptName',
                'identifier' => 'ScriptIdentifier',
                'content' => 'Content',
            )
        );
        $scriptModel->save();

        $this->dispatch('/admin/development/script/download');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Development');
        $this->assertControllerName('ScriptController');
        $this->assertControllerClass('ScriptController');
        $this->assertMatchedRouteName('development/script/download');

        $scriptModel->delete();
    }
}
