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

namespace Datatypes\RadioButtonList;

use Gc\Datatype\Model as DatatypeModel;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:42:12.
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 * @group Datatypes
 * @category Gc_Tests
 * @package  Datatypes
 */
class PrevalueEditorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PrevalueEditor
     */
    protected $_object;

    /**
     * @var DatatypeModel
     */
    protected $_datatype;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

        $this->_datatype = DatatypeModel::fromArray(array(
            'name' => 'RadioButtonListTest',
            'prevalue_value' => '',
            'model' => 'RadioButtonList',
        ));
        $this->_datatype->save();
        $datatype = new Datatype();
        $datatype->load($this->_datatype);
        $this->_object = $datatype->getPrevalueEditor();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->_datatype->delete();
        unset($this->_datatype);
        unset($this->_object);
    }

    /**
     * @covers Datatypes\RadioButtonList\PrevalueEditor::save
     */
    public function testSave()
    {
        $this->_object->getRequest()->getPost()->set('values', array('key' => 'value'));
        $this->assertNull($this->_object->save());
    }

    /**
     * @covers Datatypes\RadioButtonList\PrevalueEditor::load
     */
    public function testLoad()
    {
        $this->_object->setConfig(array('key' => 'value'));
        $this->assertInternalType('string', $this->_object->load());
    }
}
