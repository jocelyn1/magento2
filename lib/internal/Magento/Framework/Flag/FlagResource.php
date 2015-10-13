<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Flag;

/**
 * Flag Resource model
 */
class FlagResource extends \Magento\Framework\Model\ModelResource\Db\AbstractDb
{
    /**
     * Define main table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('flag', 'flag_id');
    }
}