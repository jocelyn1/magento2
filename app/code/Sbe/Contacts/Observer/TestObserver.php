<?php

namespace Sbe\Contacts\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class TestObserver
 */
class TestObserver implements ObserverInterface
{


    protected $_logger;

    public function __construct(\Psr\Log\LoggerInterface $logger, array $data = [])
    {
        $this->_logger = $logger;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        // evenement creer
        //$displayText = $observer->getData('text');
        //$this->_logger->addDebug($displayText);

        // evenement natif add cart
        $product = $observer->getData('product');
        $this->_logger->addDebug($product->getName());
    }
}