<?php

namespace Sbe\Contacts\Controller\Test;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        //die('test index');
       /* $this->_view->loadLayout();
        $this->_view->renderLayout();*/


       /* $contact = $this->_objectManager->create('Sbe\Contacts\Model\Contact');
        $contact->setName('Paul Dupond');
        $contact->save();
        die('test');*/

        $contactModel = $this->_objectManager->create('Sbe\Contacts\Model\Contact');
        $collection = $contactModel->getCollection()->addFieldToFilter('name', array('like'=> 'Paul Dupond'));
        foreach($collection as $contact) {
            var_dump($contact->getData());
        }
        die('test');

    }
}