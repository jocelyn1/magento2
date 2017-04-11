<?php

namespace Sbe\Contacts\Model\ResourceModel\Contact;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Contact Resource Model Collection
 *
 * @author      Pierre FAY
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Sbe\Contacts\Model\Contact', 'Sbe\Contacts\Model\ResourceModel\Contact');
    }
}