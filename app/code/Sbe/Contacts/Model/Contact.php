<?php

namespace Sbe\Contacts\Model;

use Magento\Cron\Exception;
use Magento\Framework\Model\AbstractModel;

/**
 * Contact Model
 *
 * @author      jocelyn Kelle
 */
class Contact extends AbstractModel
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime
     */
    protected $_dateTime;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Sbe\Contacts\Model\ResourceModel\Contact::class);
    }

}