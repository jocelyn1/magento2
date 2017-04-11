<?php

namespace Sbe\Contacts\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Contact Resource Model
 *
 * @author      Pierre FAY
 */
class Contact extends AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('sbe_contacts', 'sbe_contacts_id');
    }
}