<?php

namespace Sbe\Migration\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * GroupVisibility Model
 *
 * @author      Jocelyn Kelle
 */
class GroupVisibility extends AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('group_visibility', 'group_visibility_id');
    }
}