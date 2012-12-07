<?php
namespace Gc\View\Helper;

use Zend\View\Renderer\PhpRenderer as View,
    Gc\View\Model as ViewModel;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:07.
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class PartialTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Partial
     */
    protected $_object;

    /**
     * @var ViewModel
     */
    protected $_view;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->_object = new Partial;

        $this->_view = new ViewModel();
        $this->_view->setData(array(
            'name' => 'View Name',
            'identifier' => 'view-identifier',
            'description' => 'View Description',
            'content' => 'View Content'
        ));
        $this->_view->save();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        unset($this->_object);
    }
    /**
     * @covers Gc\View\Helper\Partial::__invoke
     * @covers Gc\View\Helper\Partial::cloneView
     */
    public function test__invoke()
    {
        $model = $this->getMockForAbstractClass('Gc\Core\Object');
        $model->setData(array(
            'foo' => 'bar',
            'bar' => 'baz'
        ));

        $view = new View();
        $view->resolver()->addPath(__DIR__ . '/_files/views');
        $this->_object->setView($view);

        //With object
        $this->_object->partialCounter = TRUE;
        $return = $this->_object->__invoke('partial-vars.phtml', $model);
        $this->_object->partialCounter = FALSE;

        foreach($model->toArray() as $key => $value)
        {
            $string = sprintf('%s: %s', $key, $value);
            $this->assertContains($string, $return);
        }

        //With array
        $return = $this->_object->__invoke('partial-vars.phtml', array(
            'foo' => 'bar',
            'bar' => 'baz'
        ));

        foreach($model->toArray() as $key => $value)
        {
            $string = sprintf('%s: %s', $key, $value);
            $this->assertContains($string, $return);
        }

        //With object
        $model = new \stdClass();
        $model->foo = 'bar';
        $model->bar = 'baz';

        $return = $this->_object->__invoke('partial-vars.phtml', $model);

        foreach(get_object_vars($model) as $key => $value)
        {
            $string = sprintf('%s: %s', $key, $value);
            $this->assertContains($string, $return);
        }

        //With object
        $this->_object->setObjectKey('foo');
        $model = new \stdClass();
        $model->foo = 'bar';
        $model->bar = 'baz';
        $return = $this->_object->__invoke('partial-obj.phtml', $model);
        $this->assertNotContains('No object model passed', $return);


        $this->assertInstanceOf('Gc\View\Helper\Partial', $this->_object->__invoke(''));
        $this->assertFalse($this->_object->__invoke('fake-view-identifier'));
        $this->assertEquals('View Content', $this->_object->__invoke('view-identifier'));
    }
}
