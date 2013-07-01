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

namespace Datatypes\Textrich;

use Gc\Datatype\Model as DatatypeModel;
use Gc\DocumentType\Model as DocumentTypeModel;
use Gc\Layout\Model as LayoutModel;
use Gc\Property\Model as PropertyModel;
use Gc\User\Model as UserModel;
use Gc\Tab\Model as TabModel;
use Gc\View\Model as ViewModel;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:42:12.
 *
 * @group Datatypes
 * @category Gc_Tests
 * @package  Datatypes
 */
class EditorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Editor
     *
     * @return void
     */
    protected $object;

    /**
     * @var DatatypeModel
     *
     * @return void
     */
    protected $datatype;

    /**
     * @var PropertyModel
     *
     * @return void
     */
    protected $property;

    /**
     * @var ViewModel
     *
     * @return void
     */
    protected $view;

    /**
     * @var LayoutModel
     *
     * @return void
     */
    protected $layout;

    /**
     * @var TabModel
     *
     * @return void
     */
    protected $tab;

    /**
     * @var UserModel
     *
     * @return void
     */
    protected $user;

    /**
     * @var DocumentTypeModel
     *
     * @return void
     */
     protected $documentType;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->view = ViewModel::fromArray(
            array(
                'name' => 'View Name',
                'identifier' => 'View identifier',
                'description' => 'View Description',
                'content' => 'View Content'
            )
        );
        $this->view->save();

        $this->layout = LayoutModel::fromArray(
            array(
                'name' => 'Layout Name',
                'identifier' => 'Layout identifier',
                'description' => 'Layout Description',
                'content' => 'Layout Content'
            )
        );
        $this->layout->save();

        $this->user = UserModel::fromArray(
            array(
                'lastname' => 'User test',
                'firstname' => 'User test',
                'email' => 'pierre.rambaud86@gmail.com',
                'login' => 'test',
                'user_acl_role_id' => 1,
            )
        );
        $this->user->setPassword('test');
        $this->user->save();

        $this->documentType = DocumentTypeModel::fromArray(
            array(
                'name' => 'Document Type Name',
                'description' => 'Document Type description',
                'icon_id' => 1,
                'defaultview_id' => $this->view->getId(),
                'user_id' => $this->user->getId(),
            )
        );
        $this->documentType->save();

        $this->datatype = DatatypeModel::fromArray(
            array(
                'name' => 'TextrichTest',
                'prevalue_value' => 'a:1:{s:13:"toolbar-items";a:67:{s:6:"Source";s:1:"1";s:4:"Save";' .
                    's:1:"1";s:7:"NewPage";s:1:"1";s:8:"DocProps";s:1:"1";s:7:"Preview";s:1:"1";s:5:"Print";' .
                    's:1:"1";s:9:"Templates";s:1:"1";s:3:"Cut";s:1:"1";s:4:"Copy";s:1:"1";s:5:"Paste";s:1:"1";' .
                    's:9:"PasteText";s:1:"1";s:13:"PasteFromWord";s:1:"1";s:4:"Undo";s:1:"1";s:4:"Redo";s:1:"1";' .
                    's:4:"Find";s:1:"1";s:7:"Replace";s:1:"1";s:9:"SelectAll";s:1:"1";s:12:"SpellChecker";s:1:"1";' .
                    's:5:"Scayt";s:1:"1";s:4:"Form";s:1:"1";s:8:"Checkbox";s:1:"1";s:5:"Radio";s:1:"1";' .
                    's:9:"TextField";s:1:"1";s:8:"Textarea";s:1:"1";s:6:"Select";s:1:"1";s:6:"Button";s:1:"1";' .
                    's:11:"ImageButton";s:1:"1";s:11:"HiddenField";s:1:"1";s:4:"Bold";s:1:"1";s:6:"Italic";' .
                    's:1:"1";s:9:"Underline";s:1:"1";s:6:"Strike";s:1:"1";s:9:"Subscript";s:1:"1";' .
                    's:11:"Superscript";s:1:"1";s:12:"RemoveFormat";s:1:"1";s:12:"NumberedList";s:1:"1";' .
                    's:12:"BulletedList";s:1:"1";s:7:"Outdent";s:1:"1";s:6:"Indent";' .
                    's:1:"1";s:10:"Blockquote";s:1:"1";s:9:"CreateDiv";s:1:"1";s:11:"JustifyLeft";s:1:"1";' .
                    's:13:"JustifyCenter";s:1:"1";s:12:"JustifyRight";s:1:"1";s:12:"JustifyBlock";s:1:"1";' .
                    's:7:"BidiLtr";s:1:"1";s:7:"BidiRtl";s:1:"1";s:4:"Link";s:1:"1";s:6:"Unlink";s:1:"1";' .
                    's:6:"Anchor";s:1:"1";s:5:"Image";s:1:"1";s:5:"Flash";' .
                    's:1:"1";s:5:"Table";s:1:"1";s:14:"HorizontalRule";s:1:"1";s:6:"Smiley";' .
                    's:1:"1";s:11:"SpecialChar";s:1:"1";' .
                    's:9:"PageBreak";s:1:"1";s:6:"Iframe";s:1:"1";s:6:"Styles";s:1:"1";s:6:"Format";' .
                    's:1:"1";s:4:"Font";' .
                    's:1:"1";s:8:"FontSize";s:1:"1";s:9:"TextColor";s:1:"1";s:7:"BGColor";s:1:"1";' .
                    's:8:"Maximize";s:1:"1";' .
                    's:10:"ShowBlocks";s:1:"1";s:5:"About";s:1:"1";}}',
                'model' => 'Textrich',
            )
        );
        $this->datatype->save();

        $this->tab = TabModel::fromArray(
            array(
                'name' => 'TabTest',
                'description' => 'TabTest',
                'sort_order' => 1,
                'document_type_id' => $this->documentType->getId(),
            )
        );
        $this->tab->save();

        $this->property = PropertyModel::fromArray(
            array(
                'name' => 'DatatypeTest',
                'identifier' => 'DatatypeTest',
                'description' => 'DatatypeTest',
                'required' => false,
                'sort_order' => 1,
                'tab_id' => $this->tab->getId(),
                'datatype_id' => $this->datatype->getId(),
            )
        );

        $this->property->save();
        $datatype = new Datatype();
        $datatype->load($this->datatype);
        $this->object = $datatype->getEditor($this->property);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown()
    {
        $this->datatype->delete();
        $this->documentType->delete();
        $this->layout->delete();
        $this->property->delete();
        $this->tab->delete();
        $this->user->delete();
        $this->view->delete();

        unset($this->datatype);
        unset($this->documentType);
        unset($this->layout);
        unset($this->property);
        unset($this->tab);
        unset($this->user);
        unset($this->view);
        unset($this->object);
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSave()
    {
        $this->object->getRequest()->getPost()->set($this->object->getName(), '1');
        $this->object->save();
        $this->assertEquals('1', $this->object->getValue());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testLoad()
    {
        $this->assertInternalType('array', $this->object->load());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testLoadWithEmptyConfig()
    {
        $this->object->setConfig('');
        $this->assertInternalType('array', $this->object->load());
    }
}
