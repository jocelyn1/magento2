<?php

namespace Sbe\Order\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class TestObserver
 */
class PlaceOrderObserver implements ObserverInterface
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
        // evenement natif
        // sales_order_place_after

        //$order = $observer->getData('order');
        //$this->_logger->addDebug("Montant =>" . $order->getBaseTotalDue() . " Name => " . $order->getCustomerName());


        // if a faire si le client est un pro ou non

    }
}