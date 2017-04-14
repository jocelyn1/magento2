<?php

namespace Sbe\Migration\Model\ResourceModel\GroupVisibility;

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
        $this->_init('Sbe\Migration\Model\GroupVisibility', 'Sbe\Migration\Model\ResourceModel\GroupVisibility');
    }
}