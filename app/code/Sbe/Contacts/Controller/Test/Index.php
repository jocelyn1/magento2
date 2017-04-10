<?php

namespace Sbe\Contacts\Controller\Test;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        //die('test index');
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}