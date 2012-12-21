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
 * @package  Datatypes
 * @author   Pierre Rambaud (GoT) <pierre.rambaud86@gmail.com>
 * @license  GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link     http://www.got-cms.com
 */

namespace Datatypes\Upload;

use Gc\Datatype\Model as DatatypeModel,
    Gc\Document\Model as DocumentModel,
    Gc\DocumentType\Model as DocumentTypeModel,
    Gc\Layout\Model as LayoutModel,
    Gc\Property\Model as PropertyModel,
    Gc\User\Model as UserModel,
    Gc\Tab\Model as TabModel,
    Gc\View\Model as ViewModel,
    Gc\Media\File;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:42:12.
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 * @group Datatypes
 * @category Gc_Tests
 * @package  Datatypes
 */
class EditorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Editor
     */
    protected $_object;

    /**
     * @var DatatypeModel
     */
    protected $_datatype;

    /**
     * @var PropertyModel
     */
    protected $_property;

    /**
     * @var ViewModel
     */
    protected $_view;

    /**
     * @var LayoutModel
     */
    protected $_layout;

    /**
     * @var TabModel
     */
    protected $_tab;

    /**
     * @var UserModel
     */
    protected $_user;

    /**
     * @var DocumentTypeModel
     */
     protected $_documentType;

    /**
     * @var DocumentModel
     */
     protected $_document;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->_view = new ViewModel();
        $this->_view->setData(array(
            'name' => 'View Name',
            'identifier' => 'View identifier',
            'description' => 'View Description',
            'content' => 'View Content'
        ));
        $this->_view->save();

        $this->_layout = new LayoutModel();
        $this->_layout->setData(array(
            'name' => 'Layout Name',
            'identifier' => 'Layout identifier',
            'description' => 'Layout Description',
            'content' => 'Layout Content'
        ));
        $this->_layout->save();

        $this->_user = new UserModel();
        $this->_user->setData(array(
            'lastname' => 'User test',
            'firstname' => 'User test',
            'email' => 'test@test.com',
            'login' => 'test',
            'user_acl_role_id' => 1,
        ));
        $this->_user->setPassword('test');
        $this->_user->save();

        $this->_documentType = new DocumentTypeModel();
        $this->_documentType->setData(array(
            'name' => 'Document Type Name',
            'description' => 'Document Type description',
            'icon_id' => 1,
            'default_view_id' => $this->_view->getId(),
            'user_id' => $this->_user->getId(),
        ));
        $this->_documentType->save();

        $this->_datatype = DatatypeModel::fromArray(array(
            'name' => 'UploadTest',
            'prevalue_value' => 'a:1:{s:6:"length";i:10;}',
            'model' => 'Upload',
        ));
        $this->_datatype->save();

        $this->_tab = TabModel::fromArray(array(
            'name' => 'TabTest',
            'description' => 'TabTest',
            'sort_order' => 1,
            'document_type_id' => $this->_documentType->getId(),
        ));
        $this->_tab->save();

        $this->_property = PropertyModel::fromArray(array(
            'name' => 'DatatypeTest',
            'identifier' => 'DatatypeTest',
            'description' => 'DatatypeTest',
            'required' => FALSE,
            'sort_order' => 1,
            'tab_id' => $this->_tab->getId(),
            'datatype_id' => $this->_datatype->getId(),
        ));

        $this->_property->save();

        $this->_document = DocumentModel::fromArray(array(
            'name' => 'jQueryFileUploadTest',
            'url_key' => '/jqueryfileupload-test',
            'status' => DocumentModel::STATUS_ENABLE,
            'sort_order' => 1,
            'show_in_nav' => FALSE,
            'user_id' => $this->_user->getId(),
            'document_type_id' => $this->_documentType->getId(),
            'view_id' => $this->_view->getId(),
            'layout_id' => $this->_layout->getId(),
            'parent_id' => 0,
        ));
        $this->_document->save();

        $datatype = new Datatype();
        $datatype->load($this->_datatype, $this->_document->getId());
        $this->_object = $datatype->getEditor($this->_property);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $_FILES = array();
        $_POST = array();
        $this->_datatype->delete();
        $this->_document->delete();
        $this->_documentType->delete();
        $this->_layout->delete();
        $this->_property->delete();
        $this->_tab->delete();
        $this->_user->delete();
        $this->_view->delete();

        unset($this->_datatype);
        unset($this->_document);
        unset($this->_documentType);
        unset($this->_layout);
        unset($this->_property);
        unset($this->_tab);
        unset($this->_user);
        unset($this->_view);
        unset($this->_object);
    }

    /**
     * @covers Datatypes\Upload\Editor::save
     */
    public function testSave()
    {
        $this->_object->setConfig(array(
            'is_multiple' => TRUE,
            'mime_list' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            )
        ));

        $_FILES = array(
            $this->_object->getName() => array(
                'name' => __DIR__ . '/_files/test.jpg',
                'type' => 'plain/text',
                'size' => 8,
                'tmp_name' => __DIR__ . '/_files/test.jpg',
                'error' => 0
            )
        );

        $this->_object->save();
        $result = $this->_object->getValue();
        $this->_removeDirectories();

        $this->assertInternalType('string', $this->_object->getValue());
    }

    /**
     * @covers Datatypes\Upload\Editor::save
     */
    public function testSaveWithEmptyFilesVar()
    {
        $this->_object->getRequest()->getPost()->set($this->_object->getName() . '-hidden', '1');
        $this->_object->setConfig(array(
            'is_multiple' => TRUE,
            'mime_list' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            )
        ));

        $this->_object->save();

        $this->assertEquals('1', $this->_object->getValue());
    }

    /**
     * @covers Datatypes\Upload\Editor::save
     */
    public function testSaveWithWrongMimeType()
    {
        $this->_object->setConfig(array(
            'is_multiple' => TRUE,
            'mime_list' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
            )
        ));

        $_FILES = array(
            $this->_object->getName() => array(
                'name' => __DIR__ . '/_files/test.bmp',
                'type' => 'plain/text',
                'size' => 8,
                'tmp_name' => __DIR__ . '/_files/test.bmp',
                'error' => 0
            )
        );

        $this->_object->save();
        $result = $this->_object->getValue();
        $this->_removeDirectories();

        $this->assertInternalType('string', $result);
    }

    /**
     * @covers Datatypes\Upload\Editor::load
     */
    public function testLoad()
    {
        $this->_object->setConfig(array('is_multiple' => TRUE));
        $this->_object->setValue('value');

        $this->assertInternalType('array', $this->_object->load());
    }

    protected function _removeDirectories()
    {
        $file = new File();
        $file->load($this->_property, $this->_document);
        $dir = $file->getPath() . $file->getDirectory();
        if(is_dir($dir))
        {
            $data = glob($dir . '/*');
            foreach($data as $file)
            {
                unlink($file);
            }

            $tmp_dir = $dir;
            while($tmp_dir != GC_MEDIA_PATH . '/files')
            {
                rmdir($tmp_dir);
                $tmp_dir = realpath(dirname($tmp_dir));
            }
        }
    }
}
