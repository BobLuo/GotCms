<?php
namespace Datatypes\Textstring;

use Application\Model\Datatype\AbstractDatatype as AbstractDatatype,
    Zend\Form\Element;

class PrevalueEditor extends AbstractDatatype\PrevalueEditor
{
    public function save()
    {
        $length = $this->getRequest()->post()->get('length');
        $this->setConfig(array('length' => $length));
    }

    public function load()
    {
        $config = $this->getConfig();

        $length = new Element\Text('length');
        $length->setLabel('Length')->setValue(isset($config['length']) ? $config['length'] : '');

        return array($length);
    }
}