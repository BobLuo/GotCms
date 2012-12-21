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

namespace Gc\Tab;

use Gc\DocumentType\Model as DocumentTypeModel,
    Gc\Layout\Model as LayoutModel,
    Gc\User\Model as UserModel,
    Gc\View\Model as ViewModel;
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:10.
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 * @group Gc
 * @category Gc_Tests
 * @package  Library
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Collection
     */
    protected $_object;

    /**
     * @var ViewModel
     */
    protected $_view;

    /**
     * @var LayoutModel
     */
    protected $_layout;

    /**
     * @var UserModel
     */
    protected $_user;

    /**
     * @var DocumentTypeModel
     */
    protected $_documentType;

    /**
     * @var Model
     */
    protected $_tab;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->_view = ViewModel::fromArray(array(
            'name' => 'View Name',
            'identifier' => 'View identifier',
            'description' => 'View Description',
            'content' => 'View Content'
        ));
        $this->_view->save();

        $this->_layout = LayoutModel::fromArray(array(
            'name' => 'Layout Name',
            'identifier' => 'Layout identifier',
            'description' => 'Layout Description',
            'content' => 'Layout Content'
        ));
        $this->_layout->save();

        $this->_user = UserModel::fromArray(array(
            'lastname' => 'User test',
            'firstname' => 'User test',
            'email' => 'test@test.com',
            'login' => 'test',
            'user_acl_role_id' => 1,
        ));
        $this->_user->setPassword('test');
        $this->_user->save();

        $this->_documentType = DocumentTypeModel::fromArray(array(
            'name' => 'Document Type Name',
            'description' => 'Document Type description',
            'icon_id' => 1,
            'default_view_id' => $this->_view->getId(),
            'user_id' => $this->_user->getId(),
        ));
        $this->_documentType->save();

        $this->_tab = Model::fromArray(array(
            'name' => 'TabTest',
            'description' => 'TabTest',
            'sort_order' => 1,
            'document_type_id' => $this->_documentType->getId(),
        ));
        $this->_tab->save();

        $this->_object = new Collection;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->_tab->delete();
        $this->_documentType->delete();
        $this->_user->delete();
        $this->_layout->delete();
        $this->_view->delete();
        unset($this->_tab);
        unset($this->_documentType);
        unset($this->_user);
        unset($this->_layout);
        unset($this->_view);
        unset($this->_object);
    }

    /**
     * @covers Gc\Tab\Collection::load
     */
    public function testLoad()
    {
        $this->assertInstanceOf('Gc\Tab\Collection', $this->_object->load(1));
    }

    /**
     * @covers Gc\Tab\Collection::getTabs
     */
    public function testGetTabsWithDocumentTypeId()
    {
        $this->_object->load(1);
        $this->assertInternalType('array', $this->_object->getTabs());
    }

    /**
     * @covers Gc\Tab\Collection::getTabs
     */
    public function testGetTabs()
    {
        $this->assertInternalType('array', $this->_object->getTabs());
    }

    /**
     * @covers Gc\Tab\Collection::getImportableTabs
     */
    public function testGetImportableTabs()
    {
        $this->assertInternalType('array', $this->_object->getImportableTabs(0));
    }

    /**
     * @covers Gc\Tab\Collection::setTabs
     */
    public function testSetTabs()
    {
        $this->assertNull($this->_object->setTabs(array(
            array(
                'name' => 'TabTest',
                'description' => 'TabTest',
                'sort_order' => 2,
                'document_type_id' => $this->_documentType->getId(),
            )
        )));
    }

    /**
     * @covers Gc\Tab\Collection::addTab
     */
    public function testAddTab()
    {
        $this->assertNull($this->_object->addTab(array(
            'name' => 'TabTest',
            'description' => 'TabTest',
            'sort_order' => 2,
            'document_type_id' => $this->_documentType->getId(),
        )));
    }

    /**
     * @covers Gc\Tab\Collection::save
     */
    public function testSave()
    {
        $this->_object->setTabs(array(
            array(
                'name' => 'TabTest',
                'description' => 'TabTest',
                'sort_order' => 2,
                'document_type_id' => $this->_documentType->getId(),
            )
        ));

        $this->assertNull($this->_object->save());
    }

    /**
     * @covers Gc\Tab\Collection::delete
     */
    public function testDelete()
    {
        $this->_object->setTabs(array(
            array(
                'name' => 'TabTest',
                'description' => 'TabTest',
                'sort_order' => 2,
                'document_type_id' => $this->_documentType->getId(),
            )
        ));
        $this->_object->save();

        $this->assertTrue($this->_object->delete());
    }
}
