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
        $this->_init(\Sbe\Migration\Model\GroupVisibility::class, \Sbe\Migration\Model\ResourceModel\GroupVisibility::class);
    }

    /**
     * Retrieve option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return parent::_toOptionArray('group_visibility_id', 'name');
    }

    /**
     * Retrieve option hash
     *
     * @return array
     */
    public function toOptionHash()
    {
        return parent::_toOptionHash('group_visibility_id', 'name');
    }

}