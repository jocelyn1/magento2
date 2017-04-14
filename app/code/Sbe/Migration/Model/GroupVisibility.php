<?php

namespace Sbe\Migration\Model;

use Magento\Cron\Exception;
use Magento\Framework\Model\AbstractModel;

/**
 * GroupVisibility Model
 *
 * @author      Jocelyn Kelle
 */
class GroupVisibility extends AbstractModel
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Sbe\Migration\Model\ResourceModel\GroupVisibility::class);
    }

}